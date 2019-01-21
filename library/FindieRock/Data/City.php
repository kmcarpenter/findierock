<?php

	class FindieRock_Data_City
	{
		public static function GetDistinctCities()
		{
			$cache = Zend_Registry::get('cache');
			
			if (($cities = $cache->load('DistinctCities')) === false)
	    	{
		    	$cities = VenueQuery::create()
		    				->addCond('CityNotEmpty', VenuePeer::CITY, "", Criteria::NOT_EQUAL)
		    				->select(array("City", "Province"))
		    				->setDistinct()
		    				->addAscendingOrderByColumn("City")
		    				->addAscendingOrderByColumn("Province")
		    				->find();
		    				
		    	// Cache for an hour
		    	$cache->save($cities, 'DistinctCities', array(), 3600);
	    	}
	    	
	    	return $cities;
		}
		
		public static function GetEventsForCity($city, $startDate, $endDate = null)
		{
			$cache = Zend_Registry::get('cache');
			$events = null;
			
			if ($endDate)
			{
				$key = Zenwerx_Cache_KeyCleaner::MakeValidKey("EventsIn{$city}ByDateRange{$startDate}To{$endDate}");
				
				if (($events = $cache->load($key)) === false)
				{
			    	$events = EventQuery::create()
					    		->filterByStart($startDate, Criteria::GREATER_EQUAL )
					    		->filterByStart($endDate, Criteria::LESS_EQUAL)
					    		->useVenueQuery()
					    			->filterByCity($city)
					    		->endUse()
					    		->orderByStart()
					    		->find();
				}
			}
			else
			{
				$key = Zenwerx_Cache_KeyCleaner::MakeValidKey("EventsIn{$city}ByDate{$startDate}");
				
				if (($events = $cache->load($key)) === false)
				{
		    		$events = EventQuery::create()
					    		->filterByStart("$startDate%", Criteria::LIKE )
					    		->useVenueQuery()
					    			->filterByCity($city)
					    		->endUse()
					    		->orderByStart()
					    		->find();
				}
			}
			
			return $events;
		}
	}