#!/usr/bin/php5
<?php

	defined('APPLICATION_PATH')
    		|| define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../../'));


    require_once( APPLICATION_PATH . '/library/Propel/Propel.php'  );
    require_once( APPLICATION_PATH . '/library/LastFM/Service.php' );
    require_once( APPLICATION_PATH . '/library/LastFM/ArtDownloader.php' );
    require_once( APPLICATION_PATH . '/library/Zenwerx/GeoIP/Address.php' );
    require_once( APPLICATION_PATH . '/library/Zenwerx/GeoIP/AddressGeoLocator.php' );
    require_once( APPLICATION_PATH . '/library/Zenwerx/GeoIP/Point.php' );
    
    $path = get_include_path() . PATH_SEPARATOR . APPLICATION_PATH . '/application/models/classes';
    set_include_path( $path );
    
    class VenueAddressFixer
	{

		private $service;
		private $downloader;
		
		public function __construct()
		{
				Propel::init(APPLICATION_PATH . '/application/configs/db/findierock-conf-prod.php');
		}
		
		public function fixVenueAddresses()
		{
			$venues = VenueQuery::create()->find();
			
			foreach ($venues as $venue)
			{
				try
				{
					$point = new Zenwerx_GeoIP_Point($venue->getLatitude(), $venue->getLongitude());
					$address = Zenwerx_GeoIP_AddressGeoLocator::GetAddress($point); 
					if ($address)
					{
						// Only set the address if necessary
						if (!$venue->getAddress())
						{
							$venue->setAddress($address->getStreetAddress());
						}
						$venue->setCity($address->getCity());
						$venue->setProvince($address->getState());
						$venue->save();
					}
				}
				catch (Exception $e)
				{
					$e->printStackTrace();
				}
			}
		}
	}
	
	$fixer = new VenueAddressFixer();
	
	$fixer->fixVenueAddresses();
?>
