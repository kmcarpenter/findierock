<?php

	class Zenwerx_GeoIP_Location
	{
		private $location;
		private $point;
		
		public function __construct($city = false, $region = null, $country = null, $lat = null, $lng = null)
		{
			if (!$city)
			{
				$address = $_SERVER['REMOTE_ADDR'];
			
				if ($address == '127.0.0.1' || strpos($address, "10.") === 0 || strpos($address, "192.") === 0)
				{
					$address = '174.117.28.6';
				}
				$this->location = geoip_record_by_name($address);
				$this->point = new Zenwerx_GeoIP_Point($this->location['latitude'], $this->location['longitude']);		
			} else
			{
				$this->location = array();
				$this->location["city"] = $city;
				$this->location["region"] = $region;
				$this->location["country_name"] = $country;
				$this->point = new Zenwerx_GeoIP_Point($lat, $lng);
			}
		}
		
		public function getCountry()
		{
			return $this->location['country_name'];
		}
		
		public function getRegion()
		{
			return $this->location['region'];
		}
		
		public function getCity()
		{
			return $this->location['city'];
		}
		
		public function getPoint()
		{
			return $this->point;
		}
		
	}

?>