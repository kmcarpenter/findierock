<?php
	
	class FindieRock_Data_Location
	{
		
		public static function GetEventsNearLocationByDate($location, $date, $radius = 100)
		{
			$cache = Zend_Registry::get('cache');
			
			$key = Zenwerx_Cache_KeyCleaner::MakeValidKey("EventsNear{$location->getCity()}ByDate{$date}WithRadius{$radius}");

	    	if (($events = $cache->load($key)) === false)
	    	{
		    	$events = EventQuery::create()
				    		->filterByStart("$date%", Criteria::LIKE )
							->where("(((acos(sin(({$location->getPoint()->getLatitude()}*pi()/180)) *
									sin((`Latitude`*pi()/180))+cos(({$location->getPoint()->getLatitude()}*pi()/180)) *
									cos((`Latitude`*pi()/180)) * cos((({$location->getPoint()->getLongitude()}-
									`Longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) < $radius")
				    		->joinVenue()
				    		->orderByStart()
				    		->find();
	    		
				$cache->save($events, $key, array(), 3600);
	    	}
	    	
	    	return $events;
		}
		
		public static function GetEventsNearLocationByDateRange($location, $date, $end, $radius = 100)
		{
			$cache = Zend_Registry::get('cache');
			
			$key = Zenwerx_Cache_KeyCleaner::MakeValidKey("EventsNear{$location->getCity()}ByDateRange{$date}To{$end}");
    		
	    	if (($events = $cache->load($key)) === false)
	    	{
		    	$events = EventQuery::create()
				    		->filterByStart("$date", Criteria::GREATER_EQUAL )
				    		->filterByStart("$end", Criteria::LESS_EQUAL )
							->where("(((acos(sin(({$location->getPoint()->getLatitude()}*pi()/180)) *
									sin((`Latitude`*pi()/180))+cos(({$location->getPoint()->getLatitude()}*pi()/180)) *
									cos((`Latitude`*pi()/180)) * cos((({$location->getPoint()->getLongitude()}-
									`Longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) < $radius")
				    		->joinVenue()
				    		->orderByStart()
				    		->find();
	    		
				$cache->save($events, $key, array(), 3600);
	    	}
	    	
	    	return $events;
		}
		
		public static function GetCitiesNearLocation($location, $radius = 100)
		{
			$cache = Zend_Registry::get('cache');
			
			$key = Zenwerx_Cache_KeyCleaner::MakeValidKey("IndexCitiesNear" . $location->getCity());
			
	    	if (($nearby = $cache->load($key)) === false)
	    	{
	    		$nearby = EventQuery::create()
	    					->select(array('Venue.City', 'Venue.Province'))
	    					->setDistinct()
	    					->addAscendingOrderByColumn('venue.City')
							->where("(((acos(sin(({$location->getPoint()->getLatitude()}*pi()/180)) *
									sin((`Latitude`*pi()/180))+cos(({$location->getPoint()->getLatitude()}*pi()/180)) *
									cos((`Latitude`*pi()/180)) * cos((({$location->getPoint()->getLongitude()}-
									`Longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) < $radius")
				    		->joinVenue()
				    		->find();
	    		
				$cache->save($nearby, $key, array(), 3600);
	    	}
	    	
	    	return $nearby;
		}
	}

?>
