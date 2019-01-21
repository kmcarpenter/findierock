<?php

	class FindieRock_Artwork_Grabber
	{
		const DIR_BASE = "/img";
		
		const ALB_BASE = "/alb";
		const VEN_BASE = "/ven";
		const ART_BASE = "/art";
		
		const SIZE_SMALL 	= "/s";
		const SIZE_MEDIUM	= "/m";
		const SIZE_LARGE	= "/l";
		
		const DEFAULT_IMAGE = "/img/default.png";
		
		public static function GetAlbumArtwork($album, $size)
		{
			$img = self::DEFAULT_IMAGE;
			if ($album && $album->getHasPhotos())
			{
				$img = self::GetArtwork(self::ALB_BASE, $size, $album->getLastFmId());
			}
			return $img;
		}
		
		public static function GetArtistArtwork($artist, $size)
		{
			$img = self::DEFAULT_IMAGE;
			if ($artist && $artist->getHasPhotos())
			{
				$img = self::GetArtwork(self::ART_BASE, $size, $artist->getLastFmId());
			}
			return $img;			
		}
		
		public static function GetVenueArtwork($venue, $size)
		{
			$img = self::DEFAULT_IMAGE;
			if ($venue && $venue->getHasPhotos())
			{
				$img = self::GetArtwork(self::VEN_BASE, $size, $venue->getLastFmId());
			}
			return $img;
		}
		
		private static function GetArtwork($base, $size, $id)
		{
			$realpath = realpath(APPLICATION_PATH . "/../public");
			$url = self::DIR_BASE . $base . $size . "/" . $id . ".jpg";
			$img = self::DEFAULT_IMAGE;
			if (file_exists($realpath . $url ))
			{
				$img = $url;
			}
			
			return $img;
		}
	}
?>