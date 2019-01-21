#!/usr/bin/php5
<?php

	defined('APPLICATION_PATH')
    		|| define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../../'));

	ini_set("memory_limit", "256M");

    require_once( APPLICATION_PATH . '/library/Propel/Propel.php'  );
    require_once( APPLICATION_PATH . '/library/LastFM/Service.php' );
    require_once( APPLICATION_PATH . '/library/LastFM/ArtDownloader.php' );
    require_once( APPLICATION_PATH . '/library/MusicBrainz/MusicBrainz.php' );
    require_once( APPLICATION_PATH . '/library/Zenwerx/Data/SlugGenerator.php' );
    
    $path = get_include_path() . PATH_SEPARATOR . APPLICATION_PATH . '/application/models/classes';
    set_include_path( $path );

	function getLogDate()
	{
		return "[ " . date('Y-m-d H:i:s') . " ] ";
	}

	class MusicBrainz_Album_Importer
	{
                const CC_LIC = "User-contributed text is available under the Creative Commons By-SA License and may also be available under the GNU FDL.";

		private $lastFmService;
		private $artDownloader;
		private $musicBrainzService;
		
		public function __construct()
		{
		        Propel::init(APPLICATION_PATH . '/application/configs/db/findierock-conf-prod.php');
		        
		        $this->lastFmService = new LastFM_Service();
		        $this->artDownloader = new LastFM_ArtDownloader();
		        $this->musicBrainzService = new MusicBrainz();
		}
		
		public function importAlbums()
		{
			// find whoever has the last album
			$album = AlbumQuery::create()
						->orderByArtistid('desc')
						->findOne();
			// now only look for new albums after this point
			$artists = ArtistQuery::create()
						->filterByArtistid($album->getArtistId(), Criteria::GREATER_THAN)
						->find();

			//$artists = ArtistQuery::create()->find();
			
			foreach ($artists as $artist)
			{
				$bio = strip_tags($artist->getBiography());
		                $bio = str_replace(self::CC_LIC, '', $bio);
                 		$artist->setBiography($bio);

				$artist->save();

				echo getLogDate() . "Loading data for artist {$artist->getName()}...\r\n";
				
				$albums = "";
				if ($artist->getLastFmId() != "")
				{
					$albums = $this->musicBrainzService->release(null, 
									array( 
										'artistid' => $artist->getLastFmId(), 
										'inc' => MUSICBRAINZ_DATA_RELEASE )
									);
				}
				else
				{
					$albums = $this->musicBrainzService->release(null, 
									array( 
										'artist' => $artist->getName(), 
										'inc' => MUSICBRAINZ_DATA_RELEASE )
									);
				}
				
				if (isset($albums->body->{'release-list'}))
					$this->parseAlbums($artist, $albums->body->{'release-list'});
			}
		}
		
		private function parseAlbums($artist, $albums)
		{
			foreach ($albums->release as $album)
			{
				if ($artist->getLastFmId() == "")
				{
					echo getLogDate() . "Adding lastFmId for {$artist->getName()}...\r\n";
					
					$artist->setLastFmId($album->artist->attributes()->id);
					$artist->save();
					
					$this->checkForAristArt($artist);
				}
				
				try
				{
					$id = (string)$album->attributes()->id;
					if (!($dbAlbum = AlbumQuery::create()->filterByLastFmId($id)->findOne()))
					{
						echo getLogDate() . "Creating new album: {$album->title}...\r\n";
						
						$dbAlbum = new Album();
						$dbAlbum->setName($album->title);
						$dbAlbum->setAlbumType(str_replace(" ", ",", $album->attributes()->type));
						$dbAlbum->setLastFmId($id);
						$dbAlbum->setArtist($artist);
						
						// Set a release date if possible
						if (isset($album->{'release-event-list'}))
						{
							$dbAlbum->setLabel($album->{'release-event-list'}->event->label->name);
							$dbAlbum->setReleaseDate($album->{'release-event-list'}->event->attributes()->date);
						}
						
						$slug = $origSlug = Zenwerx_Data_SlugGenerator::MakeSlug($album->title);
						$i = 1;
						while(AlbumQuery::create()->filterBySlug($slug)->count())
						{
							$i++;
							$slug = "{$origSlug}-{$i}";
						}
						$dbAlbum->setSlug($slug);
							
						$dbAlbum->save();
						
						$this->checkForAlbumArt($dbAlbum);
					}
					else
					{
						echo getLogDate() . "Album {$album->title} already exists...\r\n";
						continue;
					}
					
					$tracks = $this->musicBrainzService->track(null,
										array(
											'releaseid' => $id,
											'inc' => MUSICBRAINZ_DATA_TRACK )
										);
					
					if (isset($tracks->body->{'track-list'}))
						$this->parseTracks($dbAlbum, $tracks->body->{'track-list'});
					
						
				} catch (Exception $e)
				{
					echo getLogDate() . "\r\n************************************\r\n";
					echo getLogDate() . "Whoa... something bad happened!\r\n";
					echo getLogDate() . $e->getTraceAsString();
					echo getLogDate() . "\r\n************************************\r\n";	
				}
			}
		}
		
		private function parseTracks($album, $tracks)
		{
			foreach ($tracks->track as $track)
			{
				$id = $track->attributes()->id;
				if (AlbumtrackQuery::create()->filterByLastFmId($id)->findOne())
				{
					echo getLogDate() . "Found track {$track->title}...\r\n";
					continue;
				}
				else
				{
					echo getLogDate() . "Parsing track {$track->title}...\r\n";
				}
				
				$dbTrack = new Albumtrack();
				$dbTrack->setAlbum($album);
				$dbTrack->setName($track->title);
				$dbTrack->setLength($track->duration);
				$dbTrack->setLastFmId($id);
				$dbTrack->save();
			}
		}
		
		private function checkForAristArt($artist)
		{
			// This check should be moot... we're only here if we added a last.fm id
			if (!$artist->getHasPhotos())
			{
				$lastfmArtist = $this->lastFmService->getArtistInfoById($artist->getLastFmId());
				if ($lastfmArtist && isset($lastfmArtist->artist))
				{
					$lastfmArtist = $lastfmArtist->artist;
					$images = $lastfmArtist->image;
					$this->artDownloader->parseImages($images, LastFM_ArtDownloader::TYPE_ARTIST, $artist->getLastFmId());
					$artist->setHasPhotos(1);
					$artist->save();
					echo getLogDate() . "\tGot artist art!\r\n";
				} else
				{
					echo getLogDate() . "\tLast.fm doesn't have artist art...\r\n";
				}
			}
			else
			{
				echo getLogDate() . "We already have art for this artist...\r\n";
			}
		}
		
		private function checkForAlbumArt($album)
		{
			// No need to check if we have art already. This is brand spankin new
			$lastfmAlbum = $this->lastFmService->getAlbumInfo($album->getLastFmId());
			if ($lastfmAlbum && isset($lastfmAlbum->album))
			{
				$lastfmAlbum = $lastfmAlbum->album;
				$images = $lastfmAlbum->image;
				$this->artDownloader->parseImages($images, LastFM_ArtDownloader::TYPE_ALBUM, $album->getLastFmId());
				$album->setHasPhotos(1);
				$album->save();
				echo getLogDate() . "\tGot album art!\r\n";
			} else
			{
				echo getLogDate() . "\tLast.fm doesn't have album art...\r\n";
			}
		}	
	}
	
	$importer = new MusicBrainz_Album_Importer();
	$importer->importAlbums();
?>
