<?php

	class FindieRock_Data_Event
	{
		public static function GetEventsNear($location, $view)
		{
			$log = Zend_Registry::get('log');
			
			$log->debug("Looking in city: " . $location->getCity());
	    	
	    	$view->hasCity = true;
	    	
	    	$view->location = $location;
	    	
	    	$city = "Near {$location->getCity()}";
	    	
	    	$cache = Zend_Registry::get('cache');
	    	
	    	$key = Zenwerx_Cache_KeyCleaner::MakeValidKey("IndexEventsNear" . $location->getCity() . "_" . $location->getRegion());
	    	
	    	if (($events = $cache->load($key)) === false)
	    	{
				$now = Zend_Date::now();
				$fmt = "YYYY-MM-dd";
		    	$eventToday = EventQuery::create()
						    		->filterByStart($now->toString($fmt) . "%", Criteria::LIKE )
						    		->where("(((acos(sin(({$location->getPoint()->getLatitude()}*pi()/180)) *
											sin((`Latitude`*pi()/180))+cos(({$location->getPoint()->getLatitude()}*pi()/180)) *
											cos((`Latitude`*pi()/180)) * cos((({$location->getPoint()->getLongitude()}-
											`Longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) < 25")
						    		->joinWithVenue()
						    		->orderByStart()
						    		->find();	    		
				
				$now->addDay(1);
				$eventTomorrow = EventQuery::create()
						    		->filterByStart($now->toString($fmt) . "%", Criteria::LIKE )
						    		->where("(((acos(sin(({$location->getPoint()->getLatitude()}*pi()/180)) *
											sin((`Latitude`*pi()/180))+cos(({$location->getPoint()->getLatitude()}*pi()/180)) *
											cos((`Latitude`*pi()/180)) * cos((({$location->getPoint()->getLongitude()}-
											`Longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) < 25")
						    		->joinWithVenue()
						    		->orderByStart()
						    		->find();
	
				$events = array();
				$events['today'] = $eventToday;
				$events['tomorrow'] = $eventTomorrow;
	
				for ($i=0;$i<3;$i++)
				{
					$now->addDay(1);
					$eventlist = EventQuery::create()
						    		->filterByStart($now->toString($fmt) . "%", Criteria::LIKE )
						    		->where("(((acos(sin(({$location->getPoint()->getLatitude()}*pi()/180)) *
											sin((`Latitude`*pi()/180))+cos(({$location->getPoint()->getLatitude()}*pi()/180)) *
											cos((`Latitude`*pi()/180)) * cos((({$location->getPoint()->getLongitude()}-
											`Longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) < 25")
						    		->joinWithVenue()
						    		->orderByStart()
						    		->find();
	
					$events["week"][$now->toString($fmt)] = $eventlist;
				}
	
				
				$cache->save($events, $key, array(), 3600);
	    	}
	    	
	    	$key = Zenwerx_Cache_KeyCleaner::MakeValidKey("IndexCitiesNear" . $location->getCity() . "_" . $location->getRegion());
	    	if (($nearby = $cache->load($key)) === false)
	    	{
	    		$nearby = EventQuery::create()
	    					->select(array('Venue.City', 'Venue.Province'))
	    					->setDistinct()
	    					->addAscendingOrderByColumn('venue.City')
							->where("(((acos(sin(({$location->getPoint()->getLatitude()}*pi()/180)) *
									sin((`Latitude`*pi()/180))+cos(({$location->getPoint()->getLatitude()}*pi()/180)) *
									cos((`Latitude`*pi()/180)) * cos((({$location->getPoint()->getLongitude()}-
									`Longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) < 100")
				    		->joinVenue()
				    		->find();
	    		
				$cache->save($nearby, $key, array(), 3600);
	    	}
			
			$view->nearby = $nearby;	
	    	
	    	if ($view->hasCity)
	    	{
	    		$view->start = Zend_Date::now()->toString('Y-M-d');
	    		$view->end = Zend_Date::now()->addDay(4)->toString('Y-M-d');
	    		$view->city = $city;
	    		$view->events = $events;
	    	}
		}
	}