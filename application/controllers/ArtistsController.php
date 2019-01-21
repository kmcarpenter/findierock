<?php
	class ArtistsController extends FindieRock_Controller_SidebarController {

		public function init() {
			$this->adId = "4806195483";
		}
				
		public function indexAction() {
			$this->titleThis('Artists');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, artists');
			$this->view->headMeta()->appendName('description', 'The main page for indie rock artists, including the artist of the day.');
					
			$date = date('Y-m-d');
			$key = Zenwerx_Cache_KeyCleaner::MakeValidKey("ArtistOfTheDay{$date}");
			
			if (($artist = $this->_cache->load($key)) === false ) {
				$artist = ArtistQuery::create()
							->addAscendingOrderByColumn('rand()')
							->findOne();
							
				$artist->image = FindieRock_Artwork_Grabber::GetArtistArtwork($artist, FindieRock_Artwork_Grabber::SIZE_LARGE);
				
				$artist->albums = $this->getArtistAlbums($artist);
				$artist->events = $this->getArtistEvents($artist);
				$artist->pastEvents = $this->getArtistPastEvents($artist);
							
				// Save all day
				$this->_cache->save($artist, $key, array(), FindieRock_Constants::ONE_DAY);
			}
			
			if ($this->isLoggedIn()) {
				$rating = ArtistratingQuery::create()
							->filterByUser($this->getUser())
							->filterByArtist($artist)
							->findOne();
				$this->view->userRating = ($rating ? $rating->getRating(): 0);
			}
			
			$this->view->isValid = true;
			$this->view->artist = $artist;
			
			$this->view->hasAlbums = !$artist->albums->isEmpty();	
			$this->view->albums = Zenwerx_Data_PageSplitter::SplitPages($artist->albums);
			
			$this->view->hasEvents = !$artist->events->isEmpty();
			$this->view->events = Zenwerx_Data_PageSplitter::SplitPages($artist->events);

			$this->view->hasPastEvents = !$artist->pastEvents->isEmpty();
			$this->view->pastEvents = Zenwerx_Data_PageSplitter::SplitPages($artist->pastEvents);
		}
		
		public function searchAction() {
			$this->titleThis('Artists');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, artists, search');
			$this->view->headMeta()->appendName('description', 'The search page for indie rock artists.');
			
			$this->view->form = new FindieRock_Form_Artists_ArtistSearchForm();
		}
		
		private function getArtistAlbums($artist) {
			$albums = AlbumQuery::create()->orderByReleasedate('desc')->filterByArtist($artist)->find();
			foreach($albums as $album) {
				$album->image = FindieRock_Artwork_Grabber::GetAlbumArtwork($album, FindieRock_Artwork_Grabber::SIZE_MEDIUM);
			}
			
			return $albums;
		}
		
		private function getArtistEvents($artist) {
			$events = EventQuery::create()
						->filterByStart(Zend_Date::now()->toString(Zend_Date::ISO_8601), Criteria::GREATER_EQUAL)
						->useEventartistQuery()
							->filterByArtist($artist)
						->endUse()
			    		->orderByStart()
			    		->find();
    		return $events;
		}
		
		private function getArtistPastEvents($artist) {
			$events = EventQuery::create()
						->filterByStart(Zend_Date::now()->toString(Zend_Date::ISO_8601), Criteria::LESS_THAN)
						->useEventartistQuery()
							->filterByArtist($artist)
						->endUse()
			    		->orderByStart()
			    		->find();
    		return $events;
		}
		
		public function viewAction() {
			$request = $this->getRequest();
			
			$this->view->isValid = false;
			$name = $request->getParam('name');
			
			if ($name) {	
				$this->setRouteParams('artistslug_param', 'MARKER', array('name' => $name));
				$key = Zenwerx_Cache_KeyCleaner::MakeValidKey("ArtistView{$name}");
				
				if (($artist = $this->_cache->load($key)) === false ) {
					$artist = ArtistQuery::create()->filterBySlug($name)->findOne();
					if ($artist) {
						$artist->image = FindieRock_Artwork_Grabber::GetArtistArtwork($artist, FindieRock_Artwork_Grabber::SIZE_LARGE);
						
						FindieRock_Data_Trend::SaveTrend(FindieRock_Constants::TRENDTYPE_ARTIST, 
																		$artist->getArtistId(), $request->getServer('REMOTE_ADDR'));
						
						$artist->albums = $this->getArtistAlbums($artist);
						$artist->events = $this->getArtistEvents($artist);
						$artist->pastEvents = $this->getArtistPastEvents($artist);
					}

					$this->_cache->save($artist, $key, array(), FindieRock_Constants::ONE_DAY);
				}
				if ($artist) {
					$this->titleThis('View Artist : ' . $artist->getName());
					$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, artists, view, details, ' . $artist->getName());
					$this->view->headMeta()->appendName('description', 'View all the details of indie rock artist ' . $artist->getName());

					$this->view->thisUrl = urlencode("http://www.findierock.com/Artists/View/{$artist->getSlug()}");
					$this->view->thisTitle = urlencode($artist->getName());

					$this->view->isValid = true;
					$this->view->artist = $artist;

					$this->view->hasAlbums = !$artist->albums->isEmpty();
					$this->view->albums = Zenwerx_Data_PageSplitter::SplitPages($artist->albums);

					$this->view->hasEvents = !$artist->events->isEmpty();
					$this->view->events = Zenwerx_Data_PageSplitter::SplitPages($artist->events);

					if (isset($artist->pastEvents))
					{
						$this->view->hasPastEvents = !$artist->pastEvents->isEmpty();
						$this->view->pastEvents = Zenwerx_Data_PageSplitter::SplitPages($artist->pastEvents);
					}

					if ($this->isLoggedIn()) {
						$rating = ArtistratingQuery::create()
									->filterByUser($this->getUser())
									->filterByArtist($artist)
									->findOne();
						$this->view->userRating = ($rating ? $rating->getRating(): 0);
					}
				}
			} else {
				return $this->_helper->redirector('');
			}
		}
		
		public function doSearchAction() {
	    	$form = new FindieRock_Form_Artists_ArtistSearchForm();
	       	$request = $this->getRequest();
	       	
	       	$result = new stdClass();
	       	$result->valid = false;
	
	       	// Check to see if this action has been POST'ed to.
	        if ($this->getRequest()->isPost()) {
	            // Now check to see if the form submitted exists, and
	            // if the values passed in are valid for this form.
	            if ($form->isValid($request->getPost())) {
	            	$searchArtist = ucwords($form->getValue('artists'));
	            	
	    			$artists = ArtistQuery::Create()
									->filterByName("%{$searchArtist}%")
									->orderByName()
									->find();
	    			
	    			$artistsView = new Zend_view();
	    			$artistsView->addBasePath(APPLICATION_PATH . "/views");
	    			$artistsView->hasArtists = !$artists->isEmpty();
	    			$artistsView->artists = $artists;
	    			
	    			$result->valid = true;
	    			$result->detail = $artistsView->render("artists/_artists.phtml");
	            }
	        }
	    	
	   		$this->_helper->json($result);
		}
		
		public function getArtistsAction() {
	       	$searchArtist = $this->getRequest()->getParam("term");       	
	       	$callback = $this->getRequest()->getParam("callback");
	       	
	       	if ($searchArtist != null) {
		    	$artists = null;
		    	if (($artists = $this->_cache->load('DistinctArtists')) === false) {
			    	$artists = ArtistQuery::create()
			    				->addCond('ArtistNotEmpty', ArtistPeer::NAME, "", Criteria::NOT_EQUAL)
			    				->select(array("Name"))
			    				->setDistinct()
			    				->addAscendingOrderByColumn("Name")
			    				->find();
			    				
			    	// Cache for an hour
			    	$this->_cache->save($artists, 'DistinctArtists', array(), FindieRock_Constants::ONE_HOUR);
		    	}
		    	
		    	$resultData = array();

		    	$c = 0;
		    	foreach ($artists as $artist) {
		    		if (stripos($artist, $searchArtist) !== false) {
	    				if (array_search(trim($artist), $resultData) === false) {
	    					$c++;
	    					$resultData[] = trim($artist);
	    				}	
		    		}
		    		if ($c >= FindieRock_Constants::MAX_AJAX_AUTOCOMPLETE)
		    			break;
		    	}
		    	
		    	echo "{$callback}(" . $this->_helper->json->encodeJson($resultData, false) . ")";
	       	}
	    }
	    
		public function listAction() {
			$this->titleThis('Artist List');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, artists, list');
			$this->view->headMeta()->appendName('description', 'A list of all indie rock artists we know about from A-Z.');
			
			$request = $this->getRequest();
    		
    		$filter = $request->getParam('filter');
			$page = $request->getParam('page');
			
			if (!$filter && !$page) {
				$this->_redirect('/Artists/List');
			}
			$this->setRouteParams('artistlist_param', 'MARKER', array('filter' => $filter, 'page' => $page));
			
    		$this->view->alphaLinks = FindieRock_Helper_FilterHelper::MakeAlphaFilter($filter, "/Artists/List/");
			
    		$this->view->noFilter = true;
    		
			if ($filter != "@") {			
				$this->view->noFilter = false;

				if ($filter == "_") {
					$this->view->artists = ArtistQuery::create()
											->where("Name NOT RLIKE '^[A-Za-z]'")
											->orderByName()
											->paginate($page, FindieRock_Constants::MAX_LIST_ITEMSPERPAGE);
				} else {
					$this->view->artists = ArtistQuery::create()
											->filterByName("$filter%", Criteria::LIKE)
											->orderByName()
											->paginate($page, FindieRock_Constants::MAX_LIST_ITEMSPERPAGE);
				}

				$this->view->hasArtists = $this->view->artists->getNbResults();
				
				$this->view->filter = $filter == "_" ? "Other" : $filter;
				$this->view->filterCount = $this->view->artists->getNbResults();
				
				$this->view->pagerLinks = FindieRock_Helper_FilterHelper::MakePager($this->view->artists, "/Artists/List/{$filter}/", $page);
			}
		}
		
		public function latestAction() {
			$this->titleThis('Latest Artists');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, artists, latest, newest');
			$this->view->headMeta()->appendName('description', 'The latest indie rock artists we have added to Findie Rock.');
			
			if (($artists = $this->_cache->load('ArtistsLatest')) === false) {
				$artists = ArtistQuery::create()
							->addDescendingOrderByColumn(ArtistPeer::ARTISTID)
							->setLimit(10)
							->find();
							
				$this->_cache->save($artists, 'ArtistsLatest', array(), FindieRock_Constants::ONE_HOUR);
			}
			
			$this->view->hasArtists = !$artists->isEmpty();
			$this->view->artists = $artists;
		}
		
		public function popularAction() {
			$this->titleThis('Popular Artists');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, artists, popular');
			$this->view->headMeta()->appendName('description', 'The most popular indie rock artists on Findie Rock');
			
			if (($artists = $this->_cache->load('ArtistsPopular')) === false) {
				$trends = FindieRock_Data_Trend::LoadTrend(
							FindieRock_Constants::TRENDTYPE_ARTIST);
				
				$artistIds = array();
				foreach($trends as $trend) {
					$artistIds[] = $trend->getTrendTarget();
				}

				$artists = ArtistQuery::create()
								->findByArtistid($artistIds);

				$this->_cache->save($artists, 'ArtistsPopular', array(), FindieRock_Constants::ONE_HOUR);
			}

			$this->view->hasArtists = !$artists->isEmpty();
			$this->view->artists = $artists;
		}
		
		public function addAction() {   
	    	$form = new  FindieRock_Form_Artists_AddArtistForm();
           	$request = $this->getRequest();
	       	
	       	// Check to see if this action has been POST'ed to.
	        if (Zend_Auth::getInstance()->hasIdentity() && $this->getRequest()->isPost()) {
	        	if ($form->isValid($request->getPost())) {
	        		$artist = new Artist();
	        		
	        		$sess = new Zend_Session_Namespace("FindieRock");
	        		$user = UserQuery::Create()->filterByPrimaryKey($sess->userId)->findOne();
	        		
	        		$artist->setSubmittedbyuser($user);
	        		$artist->setName($form->getValue("artistName"));
	        		$artist->setBiography($form->getValue("bio"));
                	$slug = $origSlug = Zenwerx_Data_SlugGenerator::MakeSlug($artist->getName());
					$i = 1;
					while(ArtistQuery::create()->filterBySlug($slug)->count()) {
						$i++;
						$slug = "{$origSlug}-{$i}";
					}
	        		$artist->setSlug($slug);
	        		
	        		$artist->save();
	        		
		        	$this->_redirect("/Artists/View/{$artist->getSlug()}");
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
				$artistid = $request->getParam("artistid");
				$rating = $request->getParam("rating");
				
				if ($artistid != null && $rating != null && is_numeric($artistid) && is_numeric($rating) 
						&& $rating >= FindieRock_Constants::MIN_RATING 
						&& $rating <= FindieRock_Constants::MAX_RATING) {
					$user = $this->getUser();
					
					$userRating = ArtistratingQuery::create()
									->filterByUser($user)
									->filterByArtistId($artistid)
									->findOne();
					
					if ($rating > 0) {
						if (!$userRating) {
							$userRating = new Artistrating();
							$userRating->setUser($user);
							$userRating->setArtistid($artistid);
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
