<?php
	class VenuesController extends FindieRock_Controller_SidebarController {
		public function init() {
			$this->adId = "4020802237";
		}
		
		public function indexAction() {
			$this->titleThis('Venues');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, venues');
			$this->view->headMeta()->appendName('description', 'The main page for indie rock venues, including the venue of the day.');
			
			$date = date('Y-m-d');
			$key = Zenwerx_Cache_KeyCleaner::MakeValidKey("VenueOfTheDay{$date}");
			
			if (($venue = $this->_cache->load($key)) === false ) {
				$venue = VenueQuery::create()
							->addAscendingOrderByColumn('rand()')
							->findOne();
											
				$venue->events = $this->getVenueEvents($venue);
				$this->_cache->save($venue, $key, array(), FindieRock_Constants::ONE_DAY);
			}

			$venue->image = FindieRock_Artwork_Grabber::GetVenueArtwork($venue, FindieRock_Artwork_Grabber::SIZE_LARGE);
			
			if ($this->isLoggedIn()) {
				$rating = VenueratingQuery::create()
							->filterByUser($this->getUser())
							->filterByVenue($venue)
							->findOne();
				$this->view->userRating = ($rating ? $rating->getRating(): 0);
			}
			
			$this->view->isValid = true;
			$this->view->venue = $venue;
			
			$this->view->hasEvents = !$venue->events->isEmpty();
			$this->view->events = Zenwerx_Data_PageSplitter::SplitPages($venue->events);	
		}
		
		public function searchAction() {
			$this->titleThis('Artists');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, venues, search');
			$this->view->headMeta()->appendName('description', 'The search page for indie rock venues.');
			$this->view->form = new FindieRock_Form_Venues_VenueSearchForm();
		}
		
		private function getVenueEvents($venue) {
			$events = EventQuery::create()
								->filterByVenue($venue)
								->filterByStart(date('Y-m-d'), Criteria::GREATER_EQUAL)
								->orderByStart()
								->find();
			return $events;
		}
		
		public function viewAction() {
			$request = $this->getRequest();
			
			$this->view->isValid = false;
			$name = $request->getParam('name');

			if ($name) {
				$this->setRouteParams('venueslug_param', 'MARKER', array('name' => $name));
				
				$venue = VenueQuery::create()
							->filterBySlug($name)
							->findOne();
				
				if ($venue) {
					$this->titleThis('View Venue : ' . $venue->getName());
					$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, venues, view, ' . $venue->getName());
					$this->view->headMeta()->appendName('description', 'All the details we know about indie rock venue ' . $venue->getName());
			
					$this->view->thisUrl = urlencode("http://www.findierock.com/Venues/View/{$venue->getSlug()}");
					$this->view->thisTitle = urlencode($venue->getName());
				
					FindieRock_Data_Trend::SaveTrend(FindieRock_Constants::TRENDTYPE_VENUE, 
																	$venue->getVenueId(), $request->getServer('REMOTE_ADDR'));
																
					$venue->image = FindieRock_Artwork_Grabber::GetVenueArtwork($venue, FindieRock_Artwork_Grabber::SIZE_LARGE);
					
					$this->view->isValid = true;
					$this->view->venue = $venue;
					
					$events = $this->getVenueEvents($venue);
					
					$this->view->hasEvents = !$events->isEmpty();
					$this->view->events = Zenwerx_Data_PageSplitter::SplitPages($events);
					
					if ($this->isLoggedIn()) {
						$rating = VenueratingQuery::create()
									->filterByUser($this->getUser())
									->filterByVenue($venue)
									->findOne();
						$this->view->userRating = ($rating ? $rating->getRating(): 0);
					}
				}
			} else {
				return $this->_helper->redirector('');
			}
		}
		
		public function doSearchAction() {
	    	$form = new FindieRock_Form_Venues_VenueSearchForm();
	       	$request = $this->getRequest();
	       	
	       	$result = new stdClass();
	       	$result->valid = false;
	
	       	// Check to see if this action has been POST'ed to.
	        if ($this->getRequest()->isPost()) {
	            // Now check to see if the form submitted exists, and
	            // if the values passed in are valid for this form.
	            if ($form->isValid($request->getPost())) {
	            	
	            	$searchVenue = ucwords($form->getValue('venues'));
	            	
	    			$venues = VenueQuery::Create()
									->filterByName("%{$searchVenue}%")
									->orderByName()
									->find();
	    			
	    			$venuesView = new Zend_view();
	    			$venuesView->addBasePath(APPLICATION_PATH . "/views");
	    			$venuesView->hasVenues = !$venues->isEmpty();
	    			$venuesView->venues = $venues;
	    			
	    			$result->valid = true;
	    			$result->detail = $venuesView->render("venues/_venues.phtml");
	            }
	        }
	    	
	   		$this->_helper->json($result);
		}
		
		public function getVenuesAction() {
	       	$searchVenue = $this->getRequest()->getParam("term");       	
	       	$callback = $this->getRequest()->getParam("callback");
	       	
	       	if ($searchVenue != null) {
		    	$venues = null;
		    	if (($venues = $this->_cache->load('DistinctVenues')) === false) {
			    	$venues = VenueQuery::create()
			    				->addCond('VenueNotEmpty', VenuePeer::NAME, "", Criteria::NOT_EQUAL)
			    				->select(array("Name"))
			    				->setDistinct()
			    				->addAscendingOrderByColumn("Name")
			    				->find();
			    				
			    	// Cache for an hour
			    	$this->_cache->save($venues, 'DistinctVenues', array(), FindieRock_Constants::ONE_HOUR);
		    	}
		    	
		    	$resultData = array();

		    	$c = 0;
		    	foreach ($venues as $venue) {
		    		if (stripos($venue, $searchVenue) !== false) {
	    				if (array_search(trim($venue), $resultData) === false) {
	    					$c++;
	    					$resultData[] = trim($venue);
	    				}	
		    		}
		    		if ($c >= FindieRock_Constants::MAX_AJAX_AUTOCOMPLETE)
		    			break;
		    	}
		    	
		    	echo "{$callback}(" . $this->_helper->json->encodeJson($resultData, false) . ")";
	       	}
	    }
	    
		public function listAction() {
			$this->titleThis('Venue List');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, venues, list');
			$this->view->headMeta()->appendName('description', 'A list of all indie rock venues we know about from A-Z.');
			
			$request = $this->getRequest();
    		
    		$filter = $request->getParam('filter');
			$page = $request->getParam('page');
			
			if (!$filter && !$page) {
				$this->_redirect('/Venues/List');
			}
			
			$this->setRouteParams('venuelist_param', 'MARKER', array('page' => $page, 'filter' => $filter));
			
    		$this->view->alphaLinks = FindieRock_Helper_FilterHelper::MakeAlphaFilter($filter, "/Venues/List/");
			
    		$this->view->noFilter = true;
    		
			if ($filter != "@") {
				$this->view->noFilter = false;

				if ($filter == "_") {
					$this->view->venues = VenueQuery::create()
											->where("Name NOT RLIKE '^[A-Za-z]'")
											->orderByName()
											->paginate($page, FindieRock_Constants::MAX_LIST_ITEMSPERPAGE);
				} else {
					$this->view->venues = VenueQuery::create()
											->filterByName("$filter%", Criteria::LIKE)
											->orderByName()
											->paginate($page, FindieRock_Constants::MAX_LIST_ITEMSPERPAGE);
				}

				$this->view->hasVenues = $this->view->venues->getNbResults();				
				$this->view->filter = $filter == "_" ? "Other" : $filter;
				$this->view->filterCount = $this->view->venues->getNbResults();
				$this->view->pagerLinks = FindieRock_Helper_FilterHelper::MakePager($this->view->venues, "/Venues/List/{$filter}/", $page);
			}
		}
		
		public function latestAction() {
			$this->titleThis('Venues');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, venues, latest');
			$this->view->headMeta()->appendName('description', 'The most recent indie rock venues we have found out about.');
			
			if (($venues = $this->_cache->load('VenuesLatest')) === false) {
				$venues = VenueQuery::create()
							->addDescendingOrderByColumn(VenuePeer::VENUEID)
							->setLimit(10)
							->find();
							
				$this->_cache->save($venues, 'VenuesLatest', array(), FindieRock_Constants::ONE_HOUR);
			}
			
			$this->view->hasVenues = !$venues->isEmpty();
			$this->view->venues = $venues;
		}
		
		public function popularAction() {
			$this->titleThis('Venues');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, venues, popular');
			$this->view->headMeta()->appendName('description', 'The most popular indie rock venues.');

			if (($venues = $this->_cache->load('VenuesPopular')) === false) {
				$trends = FindieRock_Data_Trend::LoadTrend(FindieRock_Constants::TRENDTYPE_VENUE);
				$venueIds = array();
				foreach($trends as $trend) {
					$venueIds[] = $trend->getTrendTarget();
				}
				
				$venues = VenueQuery::create()
										->findByVenueid($venueIds);

				$this->_cache->save($venues, 'VenuesPopular', array(), FindieRock_Constants::ONE_HOUR);
			}
			
			$this->view->hasVenues = !$venues->isEmpty();
			$this->view->venues = $venues;
		}
		
		public function addAction() {   
	    	$form = new  FindieRock_Form_Venues_AddVenueForm();
           	$request = $this->getRequest();
	       	
	       	// Check to see if this action has been POST'ed to.
	        if (Zend_Auth::getInstance()->hasIdentity() && $this->getRequest()->isPost()) {
	        	if ($form->isValid($request->getPost())) {
	        		$sess = new Zend_Session_Namespace("FindieRock");
	        		$user = UserQuery::Create()->filterByPrimaryKey($sess->userId)->findOne();
	        		
	        		$venue = new Venue();
	        		$venue->setSubmittedbyuser($user);
	        		$venue->setAddress($form->getValue("streetAddress"));
	        		$venue->setCity($form->getValue("city"));
	        		$venue->setProvince($form->getValue("prov"));
	        		$venue->setCountry($form->getElement("country")->getMultiOption($form->getValue("country")));
	        		$venue->setName($form->getValue("venueName"));
	        		$venue->setDescription($form->getValue("description"));
	        		
	        		$address = urlencode($venue->getFullAddress());
	        		
	        		$ch = curl_init("http://maps.googleapis.com/maps/api/geocode/json?address={$address}&sensor=false");
	        		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        		$result = curl_exec($ch);
	        		
	        		$result = json_decode($result);
	        		
	        		$venue->setLatitude($result->results[0]->geometry->location->lat);
	        		$venue->setLongitude($result->results[0]->geometry->location->lng);
	        		
	        		$slug = $origSlug = Zenwerx_Data_SlugGenerator::MakeSlug($venue->getName()); 
	        		$i = 1;
	        		
					while(VenueQuery::create()->filterBySlug($slug)->count()) {
						$i++;
						$slug = "{$origSlug}-{$i}";
					}
	        		$venue->setSlug($slug);
	        		
	        		$venue->save();
		        	
		        	$this->_redirect("/Venues/View/{$venue->getSlug()}");
		        	return;
	        	}
	        }
	        
	        $this->view->form = $form;
	    }
	    
		public function saveRatingAction() {
	    	$this->_helper->viewRenderer->setNoRender();
			$this->_helper->layout->disableLayout();
			
			if ($this->isLoggedIn()) {
				$request = $this->getRequest();
				$venueid = $request->getParam("venueid");
				$rating = $request->getParam("rating");
				
				if ($venueid != null && $rating != null && is_numeric($venueid) && is_numeric($rating) 
						&& $rating >= FindieRock_Constants::MIN_RATING 
						&& $rating <= FindieRock_Constants::MAX_RATING) {
					$user = $this->getUser();
					
					$userRating = VenueratingQuery::create()
									->filterByUser($user)
									->filterByVenueid($venueid)
									->findOne();
					
					if ($rating > 0) {
						if (!$userRating) {
							$userRating = new Venuerating();
							$userRating->setUser($user);
							$userRating->setVenueid($venueid);
						}
						$userRating->setRating((int)$rating);
						$userRating->save();
					} else {
						// Ignore the case where we don't have a rating and they clicked 0
						if ($userRating) {
							$userRating->delete();	
						}
					}
				}
			}
	    }
	}
?>
