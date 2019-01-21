#!/usr/bin/php5
<?php

	defined('APPLICATION_PATH')
    		|| define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../../'));


    require_once( APPLICATION_PATH . '/library/Propel/Propel.php'  );
    require_once( APPLICATION_PATH . '/library/LastFM/Service.php' );
    require_once( APPLICATION_PATH . '/library/Zenwerx/Data/SlugGenerator.php' );
    
    $path = get_include_path() . PATH_SEPARATOR . APPLICATION_PATH . '/application/models/classes';
    set_include_path( $path );

	class Slug_Maker
	{
		public function __construct()
		{
		        Propel::init(APPLICATION_PATH . '/application/configs/db/findierock-conf-dev.php');
		}
		
		public function slugVenues()
		{
			$slugs = array();
			
			$venues = VenueQuery::create()->find();
			foreach ($venues as $venue)
			{
				$origSlug = $slug = Zenwerx_Data_SlugGenerator::MakeSlug($venue->getName());
				$i=2;
				while (array_key_exists(strtolower($slug), $slugs))
				{
					$slug = $origSlug . "-$i";
					$i++;
				} 
				try
				{
					$venue->setSlug($slug);
					$venue->save();
					$slugs[strtolower($slug)] = "";
					echo "Venue slug created: $slug\n";
				}
				catch (Exception $e)
				{
					echo $e->getTraceAsString();
				}
			}
		}
		
		public function slugEvents()
		{
			$slugs = array();
			
			$events = EventQuery::create()->find();
			foreach ($events as $event)
			{
				$origSlug = $slug = Zenwerx_Data_SlugGenerator::MakeSlug($event->getName());
				$i=2;
				while (array_key_exists(strtolower($slug), $slugs))
				{
					$slug = $origSlug . "-$i";
					$i++;
				}
				try
				{ 
					$event->setSlug($slug);
					$event->save();
					$slugs[strtolower($slug)] = "";
					echo "Event slug created: $slug\n";
				}
				catch (Exception $e)
				{
					echo $e->getTraceAsString();
				}
			}
		}
		
		public function slugArtists()
		{
			$slugs = array();
			
			$artists = ArtistQuery::create()->find();
			foreach ($artists as $artist)
			{
				$origSlug = $slug = Zenwerx_Data_SlugGenerator::MakeSlug($artist->getName());
				$i=2;
				while (array_key_exists(strtolower($slug), $slugs))
				{
					$slug = $origSlug . "-$i";
					$i++;
				} 
				try
				{
					$artist->setSlug($slug);
					$artist->save();
					$slugs[strtolower($slug)] = "";
					echo "Artist slug created: $slug\n";
				}
				catch (Exception $e)
				{
					echo $e->getTraceAsString();
				}
			}			
		}
		
		public function slugAlbums()
		{
			$slugs = array();
			
			$albums = AlbumQuery::create()->find();
			foreach ($albums as $album)
			{
				$origSlug = $slug = Zenwerx_Data_SlugGenerator::MakeSlug($album->getName());
				$i=2;
				while (array_key_exists(strtolower($slug), $slugs))
				{
					$slug = $origSlug . "-$i";
					$i++;
				} 
				
				try
				{
					$album->setSlug($slug);
					$album->save();
					$slugs[strtolower($slug)] = $album->getLastFmId();
					echo "Album slug created: $slug\n";
				}
				catch (Exception $e)
				{
					echo $e->getTraceAsString();
				}
			}
		}
	}
	
	$sluggo = new Slug_Maker();
	
	$sluggo->slugVenues();
	$sluggo->slugEvents();
	$sluggo->slugArtists();
	$sluggo->slugAlbums();
?>