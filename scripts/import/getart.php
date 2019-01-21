#!/usr/bin/php5
<?php

	defined('APPLICATION_PATH')
    		|| define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../../'));

    ini_set("memory_limit", "512M");

    require_once( APPLICATION_PATH . '/library/Propel/Propel.php'  );
    require_once( APPLICATION_PATH . '/library/LastFM/Service.php' );
    require_once( APPLICATION_PATH . '/library/LastFM/ArtDownloader.php' );
    require_once( APPLICATION_PATH . '/library/Zenwerx/Data/SlugGenerator.php' );
    
    $path = get_include_path() . PATH_SEPARATOR . APPLICATION_PATH . '/application/models/classes';
    set_include_path( $path );

	class ArtScraper
	{

		private $service;
		private $downloader;
		
		public function __construct()
		{
				Propel::init(APPLICATION_PATH . '/application/configs/db/findierock-conf-prod.php');

				$this->service = new LastFM_Service();
				$this->downloader = new LastFM_ArtDownloader();
		}
		
		public function scrapeAlbumArt()
		{
			$albums = AlbumQuery::create()->find();
			$count = count($albums);
			$idx = 0;
			foreach ($albums as $album)
			{
				$idx++;
				echo "($idx of $count) Looking for art: {$album->getName()} :: ";
				if (!$album->getHasPhotos())
				{
					$lastfmAlbum = $this->service->getAlbumInfo($album->getLastFmId());
					if ($lastfmAlbum && isset($lastfmAlbum->album))
					{
						$lastfmAlbum = $lastfmAlbum->album;
						$images = $lastfmAlbum->image;
						$this->downloader->parseImages($images, LastFM_ArtDownloader::TYPE_ALBUM, $album->getLastFmId());
						$album->setHasPhotos(1);
						$album->save();
						echo "\tGot it!";
					} else
					{
						echo "\tLast.fm doesn't have it...";
					}
				}
				else
				{
					echo "\tHave it!";
				}
				echo "\n";
			}	
		}
		
		public function scrapeArtistArt()
		{
			$artists = ArtistQuery::create()->find();
			$count = count($artists);
			$idx = 0;
			foreach ($artists as $artist)
			{
				$idx++;
				echo "($idx of $count) Looking for art: {$artist->getName()} :: ";
				if (!$artist->getHasPhotos())
				{
					$lastfmArtist = $this->service->getArtistInfoById($artist->getLastFmId());
					if ($lastfmArtist && isset($lastfmArtist->artist))
					{
						$lastfmArtist = $lastfmArtist->artist;
						$images = $lastfmArtist->image;
						$this->downloader->parseImages($images, LastFM_ArtDownloader::TYPE_ARTIST, $artist->getLastFmId());
						$artist->setHasPhotos(1);
						$artist->save();
						echo "\tGot it!";
					} else
					{
						echo "\tLast.fm doesn't have it...";
					}
				}
				else
				{
					echo "\tHave it!";
				}
				echo "\n";
			}	
		}
		
		public function scrapeVenueArt()
		{
			$venues = VenueQuery::create()->find();
			$count = count($venues);
			$idx = 0;
			foreach ($venues as $venue)
			{
				$idx++;
				echo "($idx of $count) Looking for art: {$venue->getName()} :: ";
				if (!$venue->getHasPhotos())
				{
					$lastfmVenue = $this->service->getVenueEvents($venue->getLastFmId(), 1);
					if (!$lastfmVenue || !isset($lastfmVenue->events->event->venue))
					{
						$lastfmVenue = $this->service->getVenueEvents($venue->getLastFmId(), 1);
					}
					if ($lastfmVenue && isset($lastfmVenue->events->event->venue))
					{
						$lastfmVenue = $lastfmVenue->events->event->venue;
						$images = $lastfmVenue->image;
						$this->downloader->parseImages($images, LastFM_ArtDownloader::TYPE_VENUE, $venue->getLastFmId());
						$venue->setHasPhotos(1);
						$venue->save();
						echo "\tGot it!";
					} else
					{
						echo "\tLast.fm doesn't have it...";
					}
				}
				else
				{
					echo "\tHave it!";
				}
				echo "\n";
			}		
		}
	}
	
	$scraper = new ArtScraper();
	
	//$scraper->scrapeAlbumArt();
	//$scraper->scrapeArtistArt();
	$scraper->scrapeVenueArt();
?>
