<?php
	
	class Zenwerx_GeoIP_AddressGeoLocator
	{
		const URL = "http://maps.googleapis.com/maps/api/geocode/json?address=%s&sensor=false";
		const REVERSE_URL = "http://maps.googleapis.com/maps/api/geocode/json?latlng=%s,%s&sensor=false";
		
		public static function GetGeoPoint($address)
		{
			$data = json_decode(self::GetGeoData($address));
			
			if ($data->status == "OK")
			{
				$point = $data->results[0]->geometry->location;
				return new Zenwerx_GeoIP_Point($point->lat, $point->lng);	
			}
			
			return null;
		}
		
		public static function GetGeoLocation($address)
		{
			$data = json_decode(self::GetGeoData($address));
			
			if ($data->status == "OK")
			{
				$addr = explode(",", $data->results[0]->formatted_address);
				$point = $data->results[0]->geometry->location;
				return new Zenwerx_GeoIP_Location($addr[0], $addr[1], $addr[2], $point->lat, $point->lng);
			}
			return null;
		}
		
		public static function GetAddress($point)
		{
			$data = json_decode(self::GeoCall(sprintf(self::REVERSE_URL, $point->getLatitude(), $point->getLongitude())));
			
			if ($data->status == "OK")
			{
				// pick the first result
				$components = $data->results[0]->address_components;
				
				$streetNum = "";
				$street = "";
				$city = "";
				$state = "";
				$postal = "";
				
				foreach ($components as $component)
				{
					foreach($component->types as $type)
					{
						switch ($type)
						{
							case "street_number":
								$streetNum = $component->long_name;
								break;
							case "route":
								$street = $component->long_name;
								break;
							case "administrative_area_level_1":
								$state = $component->long_name;
								break;
							case "locality":
								$city = $component->long_name;
								break;
							case "postal_code":
								$postal = $component->long_name;
								break;
						}
					}
				}
				
				$streetAddress = "";
				if ($streetNum && $street)
				{
					$streetAddress = "$streetNum $street";
				}
				else if ($street)
				{
					$streetAddress = $street;
				}
				
				return new Zenwerx_GeoIP_Address($streetAddress, $city, $state, $postal);
			}
			return null;
		}
		
		private static function GetGeoData($address)
		{
			return self::GeoCall(sprintf(self::URL, urlencode($address)));
		}
		
		private static function GeoCall($url)
		{
			$ch = curl_init();
       		$timeout = 3; // set to zero for no timeout
	       	curl_setopt($ch, CURLOPT_URL, $url);
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
			
        	$data = curl_exec($ch);
	        curl_close($ch);

    		return $data;			
		}
		
	
	}

?>