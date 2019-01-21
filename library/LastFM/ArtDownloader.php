<?php

	class LastFM_ArtDownloader
	{
		const SIZE_SMALL 	= "s";
		const SIZE_MEDIUM	= "m";
		const SIZE_LARGE 	= "l";
		
		const TYPE_VENUE 	= "ven";
		const TYPE_ALBUM 	= "alb";
		const TYPE_ARTIST 	= "art";
		
		private $basePath;
		
		public function __construct()
		{
			$this->basePath = APPLICATION_PATH . "/public/img/%s/%s/%s.jpg";
		}
		
		private function saveImage($type, $size, $location, $name)
		{
			$path = sprintf($this->basePath, $type, $size, $name);
			$ch = curl_init();
		    curl_setopt ($ch, CURLOPT_URL, $location);
		    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 0);
		    $fileContents = curl_exec($ch);
		    curl_close($ch);
		    unset($ch);
		    $newImg = imagecreatefromstring($fileContents);
		    $result = imagejpeg($newImg, $path, 100);
		    imagedestroy($newImg);
		    return $result;
		}
		
		public function parseImages($images, $type, $name)
		{
			if (!$images)
				return;
			if (!is_array($images))
				$images = array( $images );
			
			foreach($images as $image)
			{
				$location = $image->{"#text"};
				$size = ""; 
				switch ($image->size)
				{
					default:
						$size = "";
						break;
					case "small":
						$size = self::SIZE_SMALL;
						break;
					case "medium":
						$size = self::SIZE_MEDIUM;
						break;
					case "large":
						$size = self::SIZE_LARGE;
						break;
				}
				if ($location && $size)
				{
					$this->saveImage($type, $size, $location, $name);
				}
			}
		}
		
		
	}