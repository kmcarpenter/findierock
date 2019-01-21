#!/usr/bin/php5
<?php

	defined('APPLICATION_PATH')
    		|| define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../../'));


	require_once( APPLICATION_PATH . '/library/Propel/Propel.php'  );

ini_set("memory_limit", "256M");

	$path = get_include_path() . PATH_SEPARATOR . APPLICATION_PATH . '/application/models/classes';
	set_include_path( $path );

	function fmt_bytes($size) 
 	{ 
		$unit=array('b','kb','mb','gb','tb','pb'); 
 		return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i]; 
	} 
	
	class SitemapGenerator
	{
		const A = 65;
		const Z = 90;
		const MAP_FILE = "sitemap.xml";
		const PING_URL = "www.google.com/webmasters/tools/ping?sitemap=";
		
		private $URL_BASE = "http://www.findierock.com/";
		private $count = 0;
		private $map = "";
		
		public function __construct()
		{
		        Propel::init(APPLICATION_PATH . '/application/configs/db/findierock-conf-prod.php');
		}
		
		public function generateSitemap()
		{
			$start = time();
			
			$map  = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
			$map .= $this->createStaticMap();
			$map .= $this->createEventsMap();
			$map .= $this->createAlbumsMap();
			$map .= $this->createArtistsMap();
			$map .= $this->createVenuesMap();
			$map .= "</urlset>";
			
			$running = time() - $start;
			$avg = $this->count/$running;
			echo "Generated in {$running}s\n";
			echo "Total Urls: {$this->count}\n";
			echo "{$avg} urls/s\n";
			
			$this->map = $map;
		}
		
		public function getSitemap()
		{
			return $this->map;
		}
		
		public function outputSitemap($path = "", $compress = true, $ping = true)
		{
			$file = $path . self::MAP_FILE . ($compress ? ".gz" : "");
			
			$data = $this->map;
			
			$size = fmt_bytes(strlen($data));
			echo "Data size: $size\n"; 
			
			if ($compress)
			{
				$data = gzencode($data);
				$size = fmt_bytes(strlen($data));
				echo "Compressed size: $size\n";
			}
			
			$f = fopen($file, "w");
			if ($f)
			{
				fwrite($f, $data);
				fclose($f);
				echo "Sitemap \"{$file}\" updated!\n";
				
				if ($ping)
				{
					$url = self::PING_URL . urlencode($this->URL_BASE . basename($file));
					$ch = curl_init();
		       		$timeout = 3; // set to zero for no timeout
			       	curl_setopt($ch, CURLOPT_URL, $url);
		        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
					curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
		        	$data = curl_exec($ch);
			        curl_close($ch);
				}
			}
			else
			{
				echo "Can't get file \"{$file}\"!";
			}
						
		}
		
		private function createStaticMap()
		{
			$map = "";
			
			$urls = array("", "About");
			foreach ($urls as $url)
			{
				$map .= $this->getUrl($url);	
			}
			$this->count += count($urls);
			return $map;
		}
		
		private function createEventsMap()
		{
			$urls = array(
							"Events", "Events/Today", "Events/ThisWeek", "Events/Near",
							"Events/Search", "Events/Latest", "Events/Popular", "Events/List"
						);
						
			$map = "";
			foreach($urls as $url)
			{
				$map .= $this->getUrl($url);
			}
			$this->count += count($urls);
			
			// Do "list"
			for ($i = self::A;$i<=self::Z;$i++)
			{
				$map .= $this->getUrl("Events/List/" . chr($i));
			}
			$map .= $this->getUrl("Events/List/_");
			$this->count += 27; // A-Z + Other
						
			// Do "view"
			$events = EventQuery::create()
						->filterByStart(date("Y-m-d"), Criteria::GREATER_EQUAL)
						->find();
						
			foreach ($events as $event)
			{
				$map .= $this->getUrl("Events/View/{$event->getSlug()}");
			}
			$this->count += count($events);
			
			return $map;
		}
		
		private function createAlbumsMap()
		{
			$urls = array( "Albums", "Albums/Search", "Albums/Latest", "Albums/Popular", "Albums/List" );
			
			$map = "";
			foreach($urls as $url)
			{
				$map .= $this->getUrl($url);
			}
			$this->count += count($urls);
			
			// Do "list"
			for ($i = self::A;$i<=self::Z;$i++)
			{
				$map .= $this->getUrl("Albums/List/" . chr($i));
			}
			$map .= $this->getUrl("Albums/List/_");
			$this->count += 27; // A-Z + Other
			
			// Do "view"
			$albums = AlbumQuery::create()
						->joinWith("Album.Artist")
						->find();
			
			foreach ($albums as $album)
			{
				$map .= $this->getUrl("Albums/View/{$album->getArtist()->getSlug()}/{$album->getSlug()}");
			}
			$this->count += count($albums);
			
			return $map;
		}
		
		private function createArtistsMap()
		{
			$urls = array( "Artists", "Artists/Search", "Artists/Latest", "Artists/Popular", "Artists/List" );
			
			$map = "";
			foreach($urls as $url)
			{
				$map .= $this->getUrl($url);
			}
			$this->count += count($urls);
			
			// Do "list"
			for ($i = self::A;$i<=self::Z;$i++)
			{
				$map .= $this->getUrl("Artists/List/" . chr($i));
			}
			$map .= $this->getUrl("Artists/List/_");
			$this->count += 27; // A-Z + Other
			
			// Do "view"
			$artists = ArtistQuery::create()
						->find();
			
			foreach ($artists as $artist)
			{
				$map .= $this->getUrl("Artists/View/{$artist->getSlug()}");
			}
			$this->count += count($artists);
			
			return $map;
		}
		
		private function createVenuesMap()
		{
			$urls = array( "Venues", "Venues/Search", "Venues/Latest", "Venues/Popular", "Venues/List" );
			
			$map = "";
			foreach($urls as $url)
			{
				$map .= $this->getUrl($url);
			}
			$this->count += count($urls);
			
			// Do "list"
			for ($i = self::A;$i<=self::Z;$i++)
			{
				$map .= $this->getUrl("Venues/List/" . chr($i));
			}
			$map .= $this->getUrl("Venues/List/_");
			$this->count += 27; // A-Z + Other
			
			// Do "view"
			$venues = VenueQuery::create()
						->find();
			
			foreach ($venues as $venue)
			{
				$map .= $this->getUrl("Venues/View/{$venue->getSlug()}");
			}
			$this->count += count($venues);
			
			return $map;
		}
		
		private function getUrl($path)
		{
			return "\t<url>\n\t\t<loc>{$this->URL_BASE}{$path}</loc>\n\t</url>\n";
		}
	}

	$path = realpath(APPLICATION_PATH . "/public/") . "/";

	$generator = new SitemapGenerator();
	$generator->generateSitemap();
	$generator->outputSitemap($path, true, true);
	$generator->outputSitemap($path, false, false);
	
?>
