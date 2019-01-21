<?php
	class EventsController extends FindieRock_Controller_SidebarController {
		public function init() {
			$this->adId = "3565319916";
		}
		
		public function indexAction() {
			$this->titleThis('Events');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, events');
			$this->view->headMeta()->appendName('description', 'The main page for indie rock events, including the event of the day.');
			
			$date = date('Y-m-d');
			$key = Zenwerx_Cache_KeyCleaner::MakeValidKey("EventOfTheDay{$date}");
			
			if (($event = $this->_cache->load($key)) === false ) {
				$event = EventQuery::create()
							->filterByStart("$date%", Criteria::LIKE)
							->addAscendingOrderByColumn('rand()')
							->findOne();
							
				// Save all day
				$this->_cache->save($event, $key, array(), FindieRock_Constants::ONE_DAY);
			}
			
			$this->view->isValid = true;
			$this->view->event = $event;
			$this->view->eventartists = EventartistQuery::create()
											->filterByEvent($event)
											->leftJoinWith('Eventartist.Artist')
											->find();
		}
		
		public function searchAction() {
			$this->titleThis('Events');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, events, search');
			$this->view->headMeta()->appendName('description', 'The search page for indie rock events.');
			$this->view->form = new FindieRock_Form_Events_EventSearchForm();
		}
		
		public function latestAction() {
			$this->titleThis('Latest Events');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, events, latest, newest');
			$this->view->headMeta()->appendName('description', 'The most recent indie rock events we have found at Findie Rock.');
			
			if (($events = $this->_cache->load('EventsLatest')) === false) {
				$events = EventQuery::create()
							->addDescendingOrderByColumn(EventPeer::EVENTID)
							->setLimit(10)
							->find();
							
				$this->_cache->save($events, 'EventsLatest', array(), FindieRock_Constants::ONE_DAY);
			}
			
			$this->view->hasEvents = !$events->isEmpty();
			$this->view->events = $events;
		}
		
		public function popularAction() {
			$this->titleThis('Popular Events');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, events, popular');
			$this->view->headMeta()->appendName('description', 'The most popular indie rock events at Findie Rock.');
			
			$this->view->hasEvents = false;
			
			if (($events = $this->_cache->load('EventsPopular')) === false) {
				$trends = FindieRock_Data_Trend::LoadTrend( FindieRock_Constants::TRENDTYPE_EVENT );

				$eventIds = array();
				foreach($trends as $trend) {
					$eventIds[] = $trend->getTrendTarget();
				}

				$events = EventQuery::create()
							->findByEventid($eventIds);

				$this->_cache->save($events, 'EventsPopular', array(), FindieRock_Constants::ONE_HOUR);
			}
			
			$this->view->hasEvents = !$events->isEmpty();
			$this->view->events = $events;
		}
		
		public function todayAction() {
			$this->_redirect('Events/View/' . date('Y-m-d'));
		}
		
		public function thisweekAction() {
			$this->_redirect('Events/View/Week/' . date('Y-m-d'));
		}
		
		public function viewspecificAction() {
			$request = $this->getRequest();
			
			$this->view->isValid = false;
			$name = $request->getParam('name');
			
			if ($name) {
				$this->setRouteParams('eventslug_param', 'MARKER', array('name' => $name));
				
				$event = EventQuery::create()
							->filterBySlug($name)
							->findOne();
				
				if ($event) {
					$this->titleThis('View Event : ' . $event->getName());
					$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, events, view, ' . $event->getName());
					$this->view->headMeta()->appendName('description', 'This is what we know about the indie rock event ' . $event->getName() . ' happening on ' . $event->getStart());
			
					FindieRock_Data_Trend::SaveTrend(FindieRock_Constants::TRENDTYPE_EVENT, 
																	$event->getEventId(), $request->getServer('REMOTE_ADDR'));
					
																	
					$this->view->thisUrl = urlencode("http://www.findierock.com/Events/View/{$event->getSlug()}");
					$this->view->thisTitle = urlencode($event->getName());
				
					$this->view->isValid = true;
					$this->view->event = $event;
					$this->view->eventartists = EventartistQuery::create()
													->filterByEvent($event)
													->leftJoinWith('Eventartist.Artist')
													->find();
				}
			} else {
				return $this->_helper->redirector('');
			}
		}
		
		private function viewByDate($start, $end = null) {
			$location = new Zenwerx_GeoIP_Location();
			$city = "Near {$location->getCity()}";
	    	$this->view->city = $city;
	    	
	    	$this->view->date = $start;
	    	$this->view->dateFinish = $end;
	    	
	    	if ($start) {				
	    		$events = null;
	    		if ($end) {
	    			$events = FindieRock_Data_Location::GetEventsNearLocationByDateRange($location, $start, $end);
	    		} else {
	    			$events = FindieRock_Data_Location::GetEventsNearLocationByDate($location, $start); 
	    		}
	    		
		    	$nearby = FindieRock_Data_Location::GetCitiesNearLocation($location);
	    		
	    		$this->view->events = $events;
				$this->view->isValid = $this->view->hasEvents = !$events->isEmpty();
				
				$this->view->nearby = $nearby;
    			$this->view->form = new FindieRock_Form_Events_CitySearchForm();	
	    	}
						
			if ($this->view->isValid) {
				$this->view->events = Zenwerx_Data_PageSplitter::SplitPages($this->view->events);
			}
		}
		
		public function viewbydateAction() {
			$request = $this->getRequest();
			$date = $request->getParam('date');
			
			$this->setRouteParams('eventsbydate_param', 'MARKER', array('date' => $date));
			
			$this->view->isValid = false;
			
			$this->titleThis('Events on ' . $date);
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, events, date, ' . $date);
			$this->view->headMeta()->appendName('description', 'These are the indie rock events we know happening on ' . $date);
			
			$this->viewByDate($date);
		}
		
		public function viewbyweekAction() {
			$request = $this->getRequest();
			
			$this->view->isValid = false;
			$date = $request->getParam('date');
			$dateFinish = date('Y-m-d', strtotime('+7 days', strtotime($date)));
			
			$this->setRouteParams('eventsbyweek_param', 'MARKER', array('date' => $date));
			
			$this->titleThis('Events from ' . $date . ' to ' . $dateFinish);
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, events, date, ' . $date . ', ' . $dateFinish);
			$this->view->headMeta()->appendName('description', 'These are the indie rock events we know happening from ' . $date . ' to '. $dateFinish);
			
			$this->viewByDate($date, $dateFinish);
		}	
				
		public function doSearchAction() {
	    	$form = new FindieRock_Form_Events_EventSearchForm();
	       	$request = $this->getRequest();
	       	
	       	$result = new stdClass();
	       	$result->valid = false;
	
	       	// Check to see if this action has been POST'ed to.
	        if ($this->getRequest()->isPost()) {
	            // Now check to see if the form submitted exists, and
	            // if the values passed in are valid for this form.
	            if ($form->isValid($request->getPost())) {
	            	
	            	$searchEvent = ucwords($form->getValue('events'));
	            	
	    			$events = EventQuery::Create()
									->filterByName("%{$searchEvent}%")
									->orderByStart()
									->find();
	    			
	    			$eventsView = new Zend_view();
	    			$eventsView->addBasePath(APPLICATION_PATH . "/views");
	    			$eventsView->hasEvents = !$events->isEmpty();
	    			$eventsView->events = $events;
	    			
	    			$result->valid = true;
	    			$result->detail = $eventsView->render("events/_events.phtml");
	            }
	        }
	    	
	   		$this->_helper->json($result);
		}
		
		public function getEventsAction() {
	       	$searchEvent = $this->getRequest()->getParam("term");       	
	       	$callback = $this->getRequest()->getParam("callback");
	       	
	       	if ($searchEvent != null) {
		    	$events = null;
		    	
		    	if (($events = $this->_cache->load('DistinctEvents')) === false) {
			    	$events = EventQuery::create()
			    				->addCond('EventNotEmpty', EventPeer::NAME, "", Criteria::NOT_EQUAL)
			    				->select(array("Name"))
			    				->setDistinct()
			    				->addAscendingOrderByColumn("Name")
			    				->find();
			    				
			    	$this->_cache->save($events, 'DistinctEvents', array(), FindieRock_Constants::ONE_HOUR);
		    	}
		    	
		    	$resultData = array();

		    	$c = 0;
		    	foreach ($events as $event) {
		    		if (stripos($event, $searchEvent) !== false) {
	    				if (array_search(trim($event), $resultData) === false) {
	    					$c++;
	    					$resultData[] = trim($event);
	    				}	
		    		}
		    		if ($c >= FindieRock_Constants::MAX_AJAX_AUTOCOMPLETE)
		    			break;
		    	}
		    	
		    	echo "{$callback}(" . $this->_helper->json->encodeJson($resultData, false) . ")";
	       	}
	    }
	    
	    
	    public function getCitiesAction() {
	        return FindieRock_AjaxHelper_GetCities::GetCities($this, FindieRock_Constants::MAX_AJAX_AUTOCOMPLETE);
	    }
	    
	    public function searchByDateAction() {
	    	$form = new FindieRock_Form_Events_CitySearchForm();
	       	$request = $this->getRequest();
	       	
	       	$result = new stdClass();
	       	$result->valid = false;
	
	       	// Check to see if this action has been POST'ed to.
	        if ($this->getRequest()->isPost()) {
	            // Now check to see if the form submitted exists, and
	            // if the values passed in are valid for this form.
	            if ($form->isValid($request->getPost())) {
	
	            	$startDate = $form->getValue('dateStart');
	            	$endDate = $form->getValue('dateEnd');
	            	$city = ucwords($form->getValue('city'));
	            	
	            	$result->city =  "Event Info In {$city}";
	            	
	    			$events = FindieRock_Data_City::GetEventsForCity($city, $startDate, $endDate);
	    			
	    			$eventsView = new Zend_view();
	    			$eventsView->addBasePath(APPLICATION_PATH . "/views");
	    			$eventsView->hasEvents = !$events->isEmpty();
	    			$eventsView->events = Zenwerx_Data_PageSplitter::SplitPages($events);
	    			
	    			$result->valid = true;
	    			$result->events = $eventsView->render("events/_eventPages.phtml");
	            }
	        }
	    	
	   		$this->_helper->json($result);
	    }
	    
	    public function listAction() {
			$this->titleThis('Event List');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, events, list');
			$this->view->headMeta()->appendName('description', 'These are all the indie rock events we know about listed from A-Z.');
					
			$request = $this->getRequest();
    		
    		$filter = $request->getParam('filter');
			$page = $request->getParam('page');
			
			if (!$filter && !$page) {
				$this->_redirect('/Events/List');
			}
			
			$this->setRouteParams('eventlist_param', 'MARKER', array('filter' => $filter, 'page' => $page));
			
    		$this->view->alphaLinks = FindieRock_Helper_FilterHelper::MakeAlphaFilter($filter, "/Events/List/");
			
    		$this->view->noFilter = true;
    		
			if ($filter != "@") {
				$this->view->noFilter = false;

				if ($filter == "_") {
					$this->view->events = EventQuery::create()
											->filterByStart(date("Y-m-d"), Criteria::GREATER_EQUAL)
											->where("Name NOT RLIKE '^[A-Za-z]'")
											->orderByName()
											->paginate($page, FindieRock_Constants::MAX_LIST_ITEMSPERPAGE);
				} else {
					$this->view->events = EventQuery::create()
											->filterByStart(date("Y-m-d"), Criteria::GREATER_EQUAL)
											->filterByName("$filter%", Criteria::LIKE)
											->orderByName()
											->paginate($page, FindieRock_Constants::MAX_LIST_ITEMSPERPAGE);
				}

				$this->view->hasEvents = $this->view->events->getNbResults();
				$this->view->filter = $filter == "_" ? "Other" : $filter;
				$this->view->filterCount = $this->view->events->getNbResults();
				$this->view->pagerLinks = FindieRock_Helper_FilterHelper::MakePager($this->view->events, "/Events/List/{$filter}/", $page);
			}
	    }
	    
	    public function nearAction() {
	    	$this->view->form = new FindieRock_Form_Events_CitySearchForm();
	    	
	    	$request = $this->getRequest();
	    	
	    	$city = $request->getParam("city");
	    	$state = $request->getParam("state");
	    	
	    	$city  = $city  == "0" ? "" : $city;
	    	$state = $state == "0" ? "" : $state;
	    	
	    	$address = $city;
    		if ($state)
    			$address .= ", $state";
    		
    		if ($city) {
    			$location = Zenwerx_GeoIP_AddressGeoLocator::GetGeoLocation($address);
    		} else {
    			$location = new Zenwerx_GeoIP_Location();
    			$address = $location->getCity();
    		}
    			
    		$this->titleThis('Event List Near ' . $address);
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, events, list, near, ' . $address);
			$this->view->headMeta()->appendName('description', 'These are all the indie rock events we know about near ' . $address);
	    		
	    	FindieRock_Data_Event::GetEventsNear($location, $this->view);
	    }
	    
	    public function searchForCitiesAction() {
	    	$form = new FindieRock_Form_Events_CitySearchForm();
	       	$request = $this->getRequest();
	       	
	       	$result = new stdClass();
	       	$result->valid = false;
	
	       	// Check to see if this action has been POST'ed to.
	        if ($this->getRequest()->isPost()) {
	            // Now check to see if the form submitted exists, and
	            // if the values passed in are valid for this form.
	            if ($form->isValid($request->getPost()))  {
	            	$city = trim($form->getValue('city'));
	            	
	            	if (strlen($city) > 2) {
		            	$result->valid = true;
		            	
				    	$cities = VenueQuery::create()
				    							->filterByCity("%$city%", Criteria::LIKE)
				    							->select(array('Venue.City', 'Venue.Province'))
		    									->setDistinct()
		    									->addAscendingOrderByColumn('venue.City')
		    									->find();
				    	
				    	$cityList = "Unable to find any cities matching that description";
				    	if (!$cities->isEmpty()) {
				    		$cityList = "";
							foreach ($cities as $city) {
								$cityList .= "<a href='/Events/Near/{$city['Venue.City']}/{$city['Venue.Province']}'>{$city['Venue.City']}, {$city['Venue.Province']}</a><br/>";
							}
				    	}
				    	
				    	$result->detail = $cityList;
	            	}
	            }
	        }
	    	
	    	$this->_helper->json($result);
	    }
	    	    
	    public function addAction() {   
	    	$form = new  FindieRock_Form_Events_AddEventForm();
           	$request = $this->getRequest();
	       	
	       	// Check to see if this action has been POST'ed to.
	        if (Zend_Auth::getInstance()->hasIdentity() && $this->getRequest()->isPost()) {
	        	$form->preValidation($request->getPost());
	        	
	        	if ($form->isValid($request->getPost())) {
	        		$venue = VenueQuery::create()->filterByName($form->getValue('venueName'))->findOne();
	        		
	        		$sess = new Zend_Session_Namespace("FindieRock");
	        		$user = UserQuery::Create()->filterByPrimaryKey($sess->userId)->findOne();
	        		
	        		$event = new Event();
	        		$event->setSubmittedbyuser($user);
	        		$event->setName($form->getValue('eventName'));
	        		$event->setStart(trim($form->getValue('eventDate') . " " . $form->getValue("eventTime")));
	        		$event->setEventTypeId(1);
	        		$event->setVenue($venue);
	        		$event->setDescription($form->getValue('description'));
	        		$slug = $origSlug = Zenwerx_Data_SlugGenerator::MakeSlug($event->getName());
					$i = 1;
					while(EventQuery::create()->filterBySlug($slug)->count()) {
						$i++;
						$slug = "{$origSlug}-{$i}";
					}
	        		$event->setSlug($slug);
	        		
	        		$event->save();
	        		
	          		foreach( $form->getElements() as $element) {
		        		if (strpos($element->getName(), "artists") === false)
		        			continue;
		        		
		        		if (trim($element->getValue()) == "")
		        			continue;
		        			
		        		$artist = ArtistQuery::create()->filterByName($element->getValue())->findOne();
		        		
		        		$eventartist = new Eventartist();
		        		$eventartist->setArtist($artist);
		        		$eventartist->setEvent($event);
		        		$eventartist->save();
		        	}
		        	
		        	$this->_redirect("/Events/View/{$event->getSlug()}");
		        	return;
	        	}
	        }
	        
	        $this->view->form = $form;
	    }
	}
?>