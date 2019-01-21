<?php   
	class RestController extends Zend_Controller_Action {
		public function init() {
			date_default_timezone_set("UTC");
		}
		
		public function indexAction() {
			$this->_redirect('/');
		}

		public function eventsAction() {
			$lat     = $this->getRequest()->getParam("latitude");
			$long    = $this->getRequest()->getParam("longitude");
			$dist    = $this->getRequest()->getParam("maxdistance");
			$updated = $this->getRequest()->getParam("lastupdate");

			$serializableEvents = null;
			if ($lat && $long && $dist && $updated) {				
				$loc = new Zenwerx_GeoIP_Location(md5($lat . ":" . $long), null, null, $lat, $long);
				$now = Zend_Date::now();
				$fmt = "YYYY-MM-dd";
				$events = FindieRock_Data_Location::GetEventsNearLocationByDate($loc, $now->toString($fmt), $dist );

				if ($events->count() > 0) {
					$serializableEvents = array();
					foreach ($events as $event) {
						$serializableEvents[] = $this->_serializeEvent($event, true);
					}
				}
			}

			$this->_helper->json($serializableEvents);
		}
		
		private function _serializeDateTime($date)
		{
			$date = new Zend_Date($date, "Y-MM-DD HH:m:s");
			return $date->toString("Y-MM-dd'T'HH:m:s") . "ZEST";
		}
		
		private function _serializeEvent($event, $deep = false) {
			$venue = $event->getVenue(); 
			
			$sEvent = new stdClass();
			$sEvent->eventId = $event->getEventId();
			$sEvent->ageOfMajority = $event->getAgeOfMajority();
			$sEvent->name = $event->getName();
			$sEvent->description = $event->getDescription();
			$sEvent->startTime = $this->_serializeDateTime($event->getStart());
			$sEvent->endTime = $this->_serializeDateTime($event->getFinish());
			$sEvent->latitude = $venue->getLatitude();
			$sEvent->longitude = $venue->getLongitude();
			$sEvent->venueId = $event->getVenueId();
			$sEvent->artists = array();
			
			if ($deep)
			{
				$artists = EventartistQuery::create()
							->filterByEvent($event)
								->joinArtist()
							->find();
							
				foreach($artists as $artist)
				{
					$sEvent->artists[] = $this->_serializeArtist($artist->getArtist());
				}
				
				$sEvent->venue = $this->_serializeVenue($venue);
			}
			
			return $sEvent;
		}
		
		private function _serializeArtist($artist, $deep = false) {
			$sArtist = new stdClass();
			$sArtist->artistId = $artist->getArtistId();
			$sArtist->name = $artist->getName();
			$sArtist->bio = $artist->getBiography();
			$sArtist->website = $artist->getWebsite();
			$sArtist->smallImage = FindieRock_Artwork_Grabber::GetArtistArtwork($artist, FindieRock_Artwork_Grabber::SIZE_SMALL);
			$sArtist->largeImage = FindieRock_Artwork_Grabber::GetArtistArtwork($artist, FindieRock_Artwork_Grabber::SIZE_LARGE);
			$sArtist->upcomingEvents = array();

			if ($deep)
			{
				$events = EventQuery::create()->filterByStart(Zend_Date::now()->toString(Zend_Date::ISO_8601), Criteria::GREATER_EQUAL)
									->useEventartistQuery()
										->filterByArtist($artist)
									->endUse()
						    		->orderByStart()
						    		->find();
				foreach($events as $event)
				{
					$sArtist->upcomingEvents[] = $this->_serializeEvent($event, true);
				}

				$albums = AlbumQuery::create()->filterByArtist($artist)
							->find();

				foreach ($albums as $album)
				{
					$sArtist->albums[] = $this->_serializeAlbum($album, true);
				}
			}
			return $sArtist;
		}

		private function _serializeAlbum($album, $deep = false)
		{
			$sAlbum = new stdClass();
			$sAlbum->albumId = $album->getAlbumId();
			$sAlbum->artistId = $album->getArtistId();
			$sAlbum->name = $album->getName();
			$sAlbum->releaseDate = $this->_serializeDateTime($album->getReleaseDate());
			$sAlbum->moreUrl = $this->view->url( array( "artist" => $album->getArtist()->getSlug(), "name" => $album->getSlug() ), "albumslug" );
			$sAlbum->smallImage = FindieRock_Artwork_Grabber::GetAlbumArtwork($album, FindieRock_Artwork_Grabber::SIZE_SMALL);
			$sAlbum->largeImage = FindieRock_Artwork_Grabber::GetAlbumArtwork($album, FindieRock_Artwork_Grabber::SIZE_LARGE);
			$sAlbum->lastFmId = $album->getLastFmId();

			$sAlbum->tracks = array();

			if ($deep) {
				$tracks = AlbumtrackQuery::create()
                                                                ->filterByAlbum($album)
                                                                ->find();
				foreach($tracks as $track) {
					$sTrack = new stdClass();
					$sTrack->trackId = $track->getTrackId();
					$sTrack->albumId = $track->getAlbumId();
					$sTrack->name = $track->getName();
					$sTrack->length = $track->getLength()/1000;
					$sTrack->lastfmId = $track->getLastFmId();

					$sAlbum->tracks[] = $sTrack;
				}
			}

			return $sAlbum;
		}

		private function _serializeVenue($venue, $deep = false) {
			$sVenue = new stdClass();
			$sVenue->venueId = $venue->getVenueId();
			$sVenue->name = $venue->getName();
			$sVenue->address = $venue->getAddress();
			$sVenue->address2 = $venue->getAddress2();
			$sVenue->city = $venue->getCity();
			$sVenue->prov = $venue->getProvince();
			$sVenue->country = $venue->getCountry();
			$sVenue->website = $venue->getWebsite();
			$sVenue->latitude = $venue->getLatitude();
			$sVenue->longitude = $venue->getLongitude();
			$sVenue->smallImage = FindieRock_Artwork_Grabber::GetVenueArtwork($venue, FindieRock_Artwork_Grabber::SIZE_SMALL);
			$sVenue->largeImage = FindieRock_Artwork_Grabber::GetVenueArtwork($venue, FindieRock_Artwork_Grabber::SIZE_LARGE);
			$sVenue->events = array();

			if ($deep)
			{
				$events = EventQuery::create()->filterByVenue($venue)
						->filterByStart(Zend_Date::now()->toString(Zend_Date::ISO_8601), Criteria::GREATER_EQUAL)
				    		->orderByStart()
				    		->find();

		    		foreach($events as $event)
		    		{
	    				$sVenue->events[] = $this->_serializeEvent($event, true);
	    			}
			}

			return $sVenue;
		}
		
		public function albumsAction() {
			$artist	= $this->getRequest()->getParam("artist");

			$serializableAlbums = array();
			
			if ($artist) {
				$albums = AlbumQuery::create()
								->filterByArtistid($artist)
								->find();
				
				$uh = $this->_helper->getHelper('url');

				if ($albums)
				{
					foreach($albums as $album)
					{
						$serializableAlbums[] = $this->_serializeAlbum($album, true);
					}
				}
			}

			$this->_helper->json($serializableAlbums);			
		}	

public function artistAction() {
			$artist = $this->getRequest()->getParam("artist");
			
			$sArtist = null;
			
			if ($artist) {
				$artist = ArtistQuery::create()->filterByArtistId($artist)->findOne();
				$sArtist = $this->_serializeArtist($artist, true);
			}
		
			$this->_helper->json($sArtist);
		}
		
		public function venueAction()
		{
			$venue = $this->getRequest()->getParam("venue");
			
			$sVenue = null;
			
			if ($venue) {
				$venue = VenueQuery::create()->filterByVenueId($venue)->findOne();
				$sVenue = $this->_serializeVenue($venue, true);		
			}
			
			$this->_helper->json($sVenue);
		}
	}
?>
