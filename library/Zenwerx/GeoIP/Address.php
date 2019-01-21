<?php

	class Zenwerx_GeoIP_Address
	{
		private $streetAddr;
		private $city;
		private $state;
		private $postal;
		
		public function __construct($streetAddr, $city, $state, $postal)
		{
			$this->streetAddr = $streetAddr;
			$this->city = $city;
			$this->state = $state;
			$this->postal = $postal;
		}
		
		public function getStreetAddress()
		{
			return $this->streetAddr;
		}
		
		public function getCity()
		{
			return $this->city;
		}
		
		public function getState()
		{
			return $this->state;
		}
		
		public function getPostal()
		{
			return $this->postal;
		}
	}

?>