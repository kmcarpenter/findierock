#!/usr/bin/php5
<?php
	defined('APPLICATION_PATH')
    		|| define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../../'));

	ini_set("memory_limit", "512M");

	require_once( APPLICATION_PATH . '/library/Propel/Propel.php'  );
	require_once( APPLICATION_PATH . '/library/LastFM/Service.php' );
	require_once( APPLICATION_PATH . '/library/LastFM/ArtDownloader.php' );
	require_once( APPLICATION_PATH . '/library/Zenwerx/Data/SlugGenerator.php' );
    require_once( APPLICATION_PATH . '/library/Zenwerx/GeoIP/Address.php' );
    require_once( APPLICATION_PATH . '/library/Zenwerx/GeoIP/AddressGeoLocator.php' );
    require_once( APPLICATION_PATH . '/library/Zenwerx/GeoIP/Point.php' );

	$path = get_include_path() . PATH_SEPARATOR . APPLICATION_PATH . '/application/models/classes';
	set_include_path( $path );

	function fmt_bytes($size) 
 	{ 
		$unit=array('b','kb','mb','gb','tb','pb'); 
 		return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i]; 
	} 
 	
        function getLogDate()
        {
                return "[ " . date('Y-m-d H:i:s') . " ] ";
        }

	class LastFm_Event_Importer
	{
		private $service;
		private $downloader;

		private $venueCacheLookups = 0;
		private $venueCacheHits = 0;
		private $cachedVenues = array();
		private $artistCacheLookups = 0;
		private $artistCacheHits = 0;
		private $cachedArtists = array();
		private $eventCacheLookups = 0;
		private $eventCacheHits = 0;
		private $cachedEvents = array();
		private $callCount = 0;
		private $startSet = false;
		private $start;
		
		public function __construct()
		{
		        Propel::init(APPLICATION_PATH . '/application/configs/db/findierock-conf-prod.php');

		        $this->service = new LastFM_Service();
		        $this->downloader = new LastFM_ArtDownloader();
		}

		public function import($country)
		{
			// Events and venues shouldn't persist    
			// over countries. Artists possibly could.
			// This isn't technically 100% true since we're using a radius search
			// But in most cases it's a good enough rule.
			unset($this->cachedEvents);
			$this->cachedEvents = array();
			
			unset($this->cachedVenues);
			$this->cachedVenues = array();
			
			if (!$this->startSet)
			{
				$this->start = time();
				$this->startSet = true;
			}

			$start = $this->start;

			$this->callCount++;
			$metros = $this->service->getMetros($country);
			$metros = $metros->metros;
			foreach ($metros->metro as $metro)
			{
				echo getLogDate() .  "Looking in metro {$metro->name}...\r\n";

				$page = 1;
				$pages = 0;
				$radius = 500;

				// reset the time limit
				set_time_limit(600);

				$this->callCount++;
				$events = $this->service->getEvents($metro->name, $radius, $page);
				if (!isset($events->events))
					continue;
				$events = $events->events;
				$pages  = $events->{'@attr'}->totalPages;

				$this->callCount += $pages;
				$eventPages = $this->service->getMultiEvents($metro->name, $radius, $pages);

				$page = 1;
				foreach ($eventPages as $events)
				{
					$events = $events->events;
					echo getLogDate() .  "Looking for events on page {$page} of {$pages}...\r\n";
					$this->parseEvents($events);
					$page++;
					unset($events);
				}
				unset($eventPages);

				echo getLogDate() .  "Memory performance:\r\n"; 
				echo getLogDate() .  "\tCurrent:" . fmt_bytes(memory_get_usage(true)) . "\r\n"; 
				echo getLogDate() .  "\tMax    :" . fmt_bytes(memory_get_peak_usage(true)) . "\r\n"; 
				echo getLogDate() .  "Cache performance:\r\n";
				echo getLogDate() .  "\tVenues : " . (($this->venueCacheLookups > 0) ? ($this->venueCacheHits/$this->venueCacheLookups) : "INF") . "\r\n";
				echo getLogDate() .  "\tArtists: " . (($this->artistCacheLookups > 0) ? ($this->artistCacheHits/$this->artistCacheLookups) : "INF") . "\r\n";
				echo getLogDate() .  "\tEvents : " . (($this->eventCacheLookups > 0) ? ($this->eventCacheHits/$this->eventCacheLookups) : "INF") . "\r\n";
				echo getLogDate() .  "Running:\r\n";
				echo getLogDate() .  "\t" . (time() - $start) . "s\r\n";
				echo getLogDate() .  "Service Calls:\r\n";
				echo getLogDate() .  "\t{$this->callCount}\r\n";
				echo getLogDate() .  "\t" . ($this->callCount/(time()-$start)) . " API calls/s\r\n";
			}
			echo getLogDate() .  "Total Running Time:";
			echo getLogDate() .  "\t" . (time() - $start) . "s\r\n";
		}

		private function parseEvents($events)
		{
			if (!isset($events->event))
			{
				echo getLogDate() .  "There are no events...\r\n";
				return;
			}
				
			foreach ($events->event as $event)
			{
				try
				{
					$isIndie = false;
					if (!isset($event->tags))
					{
						//echo getLogDate() .  "Event \"{$event->title}\" has no tags to search...\r\n";
						continue;
					}
					
					if (!is_array($event->tags->tag))
						$event->tags->tag = array( $event->tags->tag );
						
	
					foreach($event->tags->tag as $tag)
					{
						if (strpos($tag, "indie") !== false)
						{
							$isIndie = true;
							break;
						}
					}
					if (!$isIndie)
						continue;
					
					$this->eventCacheLookups++;
					if (isset($this->cachedEvents[$event->id]))
					{
						$this->eventCacheHits++;
						//echo getLogDate() .  "We already have event \"{$event->title}\" on file...\r\n";
						continue;
					}
					if (($oldEvent = EventQuery::create()->filterByLastFmId($event->id)->findOne()))
					{
						$oldEvent->clearAllReferences(true);
						$this->cachedEvents[$event->id] = 1;
						//echo getLogDate() .  "We already have event \"{$event->title}\" on file...\r\n";
						continue;
					}
					
					if ($isIndie)
					{
						//echo getLogDate() .  "Event \"{$event->title}\" is an indie event...\r\n";
						
						if ($event->id)
						{
							$this->callCount++;
							$event = $this->service->getEventInfo($event->id)->event;
						}
						
						$artists = $this->parseArtists($event->artists);
						$venue   = $this->parseVenue($event->venue);
						
						
						$dbEvent = new Event();
						$dbEvent->setLastFmId($event->id);
						$dbEvent->setName($event->title);
						$dbEvent->setStart($event->startDate);
						$dbEvent->setCancelled($event->cancelled);
						$dbEvent->setDescription(strip_tags($event->description));
						$dbEvent->setEventTypeId(1); // Concert
						$dbEvent->setVenue($venue);
						
						$slug = $origSlug = Zenwerx_Data_SlugGenerator::MakeSlug($event->title);
						$i = 1;
						while(EventQuery::create()->filterBySlug($slug)->count())
						{
							$i++;
							$slug = "{$origSlug}-{$i}";
						}
						$dbEvent->setSlug($slug);
						
						$dbEvent->save();
						
						$this->cachedEvents[$event->id] = 1;
						
						foreach ($artists as $artist)
						{
							try
							{
								$eventArtist = new Eventartist();
								$eventArtist->setEvent($dbEvent);
								$eventArtist->setArtist($artist);
								$eventArtist->setHeadliner( $artist->getName() == $event->artists->headliner );
								$eventArtist->save();
								
								$artist->clearAllReferences(true);
								unset($artist);
								$eventArtist->clearAllReferences(true);
								unset($eventArtist);
							} 
							catch (Exception $e) 
							{
								print_r($artist->getName());
								echo getLogDate() .  "Someone added a duplicate artist...\r\n";
							}
						}
						
						unset($artists);
						
						$venue->clearAllReferences(true);
						unset($venue);
						
						$dbEvent->clearAllReferences(true);
						unset($dbEvent);
					}
					else
					{
						//echo getLogDate() .  "Event \"{$event->title}\" is not an indie event...\r\n";
					}
				}
				catch (Exception $e)
				{
					echo getLogDate() .  "\r\n************************************\r\n";
					echo getLogDate() .  "Whoa... something bad happened!\r\n";
					echo getLogDate() .  $e->getTraceAsString();
					echo getLogDate() .  "\r\n************************************\r\n";
				}
				unset($event);
			}
		}

		private function parseArtists($artists)
		{
			$parsedArtists = array();
			if (!is_array($artists->artist))
				$artists->artist = array( $artists->artist );
				
			foreach($artists->artist as $artist)
			{
				$this->artistCacheLookups++;
				if ((isset($this->cachedArtists[$artist]) && ($dbArtist = $this->cachedArtists[$artist])))
				{
					$this->artistCacheHits++;
					$parsedArtists[] = ArtistQuery::create()->filterByArtistid($dbArtist)->findOne();
					continue;
				}
				
				$this->callCount++;
				$artistList = $this->service->searchArtists($artist);
				$artistList = $artistList->results->artistmatches;
				if (isset($artistList->artist))
				{
					if (is_array($artistList->artist))
					{
						$artist = $artistList->artist[0];
					}
					else
					{
						$artist = $artistList->artist;
					}
					
					if ($artist->mbid)
					{
						if(($dbArtist = ArtistQuery::create()->filterByLastFmId($artist->mbid)->findOne()))
						{
							$this->cachedArtists[$dbArtist->getName()] = $dbArtist->getArtistId();
							$parsedArtists[] = $dbArtist;
							continue;
						}
						$this->callCount++;
						$artist = $this->service->getArtistInfoById($artist->mbid);
					}
					else
					{
						if (!$artist->name)
							continue;
						
						if ( ($dbArtist = ArtistQuery::create()->filterByName($artist->name)->findOne()) )
						{
							$this->cachedArtists[$dbArtist->getName()] = $dbArtist->getArtistId();
							$parsedArtists[] = $dbArtist;
							continue;
						}
						$this->callCount++;
						$artist = $this->service->getArtistInfoByName($artist->name);
					}	
						
					$artist = $artist->artist;
					
					if (!$artist || $artist->name == "")
						continue;
					
					$dbArtist = new Artist();
					$dbArtist->setName($artist->name);
					$dbArtist->setLastFmId($artist->mbid);
					$dbArtist->setBiography(strip_tags($artist->bio->content));
					
					if ($artist->mbid)
					{
						try
						{
							$this->downloader->parseImages($artist->image, LastFM_ArtDownloader::TYPE_ARTIST, $artist->mbid);
							$dbArtist->setHasPhotos(1);
						}
						catch (Exception $e)
						{
							echo getLogDate() .  $e->getTraceAsString();
						}
					}
					
					$slug = $origSlug = Zenwerx_Data_SlugGenerator::MakeSlug($artist->name);
					$i = 1;
					while(ArtistQuery::create()->filterBySlug($slug)->count())
					{
						$i++;
						$slug = "{$origSlug}-{$i}";
					}
					$dbArtist->setSlug($slug);
					
					$dbArtist->save();
					
					$this->cachedArtists[$dbArtist->getName()] = $dbArtist->getArtistId();
					
					$parsedArtists[] = $dbArtist;
					
					unset($artist);
				}
			}
			
			return $parsedArtists;
		}

		private function parseVenue($venue)
		{
			$this->venueCacheLookups++;
			if ((isset($this->cachedVenues[$venue->id]) && ($dbVenue = $this->cachedVenues[$venue->id])))
			{
				$this->venueCacheHits++;
				$dbVenue = VenueQuery::create()->filterByVenueId($dbVenue)->findOne();
				return $dbVenue;
			}
			
			if (($dbVenue = VenueQuery::create()->filterByLastFmId($venue->id)->findOne()))
			{
				$this->cachedVenues[$venue->id] = $dbVenue->getVenueId();
				return $dbVenue;
			}

			$city = explode(",", $venue->location->city);
			
			$dbVenue = new Venue();
			$dbVenue->setName($venue->name);
			$dbVenue->setLastFmId($venue->id);
			$dbVenue->setLatitude($venue->location->{'geo:point'}->{'geo:lat'});
			$dbVenue->setLongitude($venue->location->{'geo:point'}->{'geo:long'});
			
			$point = new Zenwerx_GeoIP_Point($dbVenue->getLatitude(), $dbVenue->getLongitude());
			
			// Try using the google reverse lookup first
			// fallback to last.fm's suspect data if it fails
			$address = Zenwerx_GeoIP_AddressGeoLocator::GetAddress($point); 
			if ($address)
			{
				$street = $venue->location->street ? $venue->location->street : $address->getStreetAddress();
				$dbVenue->setAddress($street);
				$dbVenue->setCity($address->getCity());
				$dbVenue->setProvince($address->getState());
			}
			else
			{
				$dbVenue->setCity($city[0]);
				if (isset($city[1]))
				{
					$dbVenue->setProvince($city[1]);
				}
				$dbVenue->setAddress($venue->location->street);
			}
			$dbVenue->setCountry($venue->location->country);
			$dbVenue->setWebsite($venue->website);
			$dbVenue->setPhone($venue->phonenumber);
			
			$slug = $origSlug = Zenwerx_Data_SlugGenerator::MakeSlug($venue->name);
			$i = 1;
			while(VenueQuery::create()->filterBySlug($slug)->count())
			{
				$i++;
				$slug = "{$origSlug}-{$i}";
			}
			$dbVenue->setSlug($slug);
			
			$dbVenue->save();
			
			$this->cachedVenues[$venue->id] = $dbVenue->getVenueId();
			
			unset($venue);
			
			return $dbVenue;
		}
	}

	$countries = array( 
						"united kingdom",
						"australia",
						"new zealand",
						"spain",
						"mexico",
						"france",
						"germany",
						"ireland",
						"italy",
						"brazil",
						"japan",
						"china",
						"poland",
						"portugal",
						"switzerland",
						"sweden",
						"turkey",
						"canada",
						"united states"

	);
	
	$importer = new LastFm_Event_Importer();
	foreach($countries as $country)
	{
		$importer->import($country);
	}
?>
