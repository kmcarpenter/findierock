<?php
	class AlbumsController extends FindieRock_Controller_SidebarController {	
		public function init() {
			$this->adId = "4701338772";
		}
	
		public function indexAction() {
			$this->titleThis('Albums');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, albums, album of the day');
			$this->view->headMeta()->appendName('description', 'The main page for indie rock albums, including the album of the day.');
				
			$date = date('Y-m-d');
			$key = Zenwerx_Cache_KeyCleaner::MakeValidKey("AlbumOfTheDay{$date}");
				
			if (($album = $this->_cache->load($key)) === false ) {
				$album = AlbumQuery::create()
							->addAscendingOrderByColumn('rand()')
							->findOne();
					
				$album->image = FindieRock_Artwork_Grabber::GetArtistArtwork($artist, FindieRock_Artwork_Grabber::SIZE_LARGE);
				$album->tracks = $this->getAlbumTracks($album);
					
				// Save all day
				$this->_cache->save($album, $key, array(), FindieRock_Constants::ONE_DAY);
			}

			if ($this->isLoggedIn())
			{
				$rating = AlbumratingQuery::create()
							->filterByUser($this->getUser())
							->filterByAlbum($album)
							->findOne();
				$this->view->userRating = ($rating ? $rating->getRating(): 0);
			}
											
			$this->view->isValid = true;
			$this->view->album = $album;
				
			$this->view->hasTracks = !$album->tracks->isEmpty();
			$this->view->tracks = $album->tracks;
		}
	
		public function searchAction() {
			$this->titleThis('Album Search');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, albums, search');
			$this->view->headMeta()->appendName('description', 'Indie rock album search page.');
			
			$this->view->form = new FindieRock_Form_Albums_AlbumSearchForm();
		}
	
		public function latestAction() {
			$this->titleThis('Latest Albums');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, albums, latest');
			$this->view->headMeta()->appendName('description', 'The latest indie rock albums we know about.');
			
			if (($albums = $this->_cache->load('AlbumsLatest')) === false) {
				$albums = AlbumQuery::create()
								->addDescendingOrderByColumn(AlbumPeer::ALBUMID)
								->setLimit(10)
								->find();
	
				$this->_cache->save($albums, 'AlbumsLatest', array(), FindieRock_Constants::ONE_HOUR);
			}
				
			$this->view->hasAlbums = !$albums->isEmpty();
			$this->view->albums = $albums;
		}
	
		public function popularAction() {
			$this->titleThis('Popular Albums');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, albums, popular');
			$this->view->headMeta()->appendName('description', 'These are the most popular indie rock albums on Findie Rock.');
			
			if (($albums = $this->_cache->load('AlbumsPopular')) === false) {
				$trends = FindieRock_Data_Trend::LoadTrend(FindieRock_Constants::TRENDTYPE_ALBUM);
				$albumIds = array();
				foreach($trends as $trend) {
					$albumIds[] = $trend->getTrendTarget();
				}
	
				$albums = AlbumQuery::create()
							->findByAlbumid($albumIds);
	
				$this->_cache->save($albums, 'AlbumsPopular', array(), FindieRock_Constants::ONE_HOUR);
			}
				
			$this->view->hasAlbums = !$albums->isEmpty();
			$this->view->albums = $albums;
		}
	
		private function getAlbumTracks($album) {
			$tracks = AlbumtrackQuery::create()
								->filterByAlbum($album)
								->find();
	
			return $tracks;
		}
	
		public function viewspecificAction() {	
			$request = $this->getRequest();
				
			$this->view->isValid = false;
			$name = $request->getParam('name');
			$artist = $request->getParam('artist');
				print_r($name);
			if ($name && $artist) {
				$this->setRouteParams('albumslug_param', 'MARKER', array('name' => $name, 'artist' => $artist));
				
				$key = Zenwerx_Cache_KeyCleaner::MakeValidKey("album_{$name}_{$artist}");

				if (($album = $this->_cache->load($key)) === false) {	
					$album = AlbumQuery::create()
								->filterBySlug($name)
								->useArtistQuery()
									->filterBySlug($artist)
								->endUse()
								->findOne();

					if ($album) {
						$album->image = FindieRock_Artwork_Grabber::GetAlbumArtwork($album, FindieRock_Artwork_Grabber::SIZE_MEDIUM);
	
						FindieRock_Data_Trend::SaveTrend(FindieRock_Constants::TRENDTYPE_ALBUM,
						$album->getAlbumId(), $request->getServer('REMOTE_ADDR'));
	
						$amazon = new Amazon_ECS(AWS_API_KEY, AWS_API_SECRET_KEY);
						$buy = $amazon->responseGroup('Small')->category('Music')->search("\"{$album->getName()}\" and \"{$album->getArtist()->getName()}\"");
						if ($buy && isset($buy->Items->Item)) {
							$item = is_array($buy->Items->Item) ? $buy->Items->Item[0] : $buy->Items->Item;
							$album->amazonLink = $item->DetailPageURL;
						}
						
						$album->tracks = $album->getAlbumtracks();
						if (!$album->tracks->isEmpty()) {
							foreach ($album->tracks as $track) {
								$buy = $amazon->responseGroup('Small')->category('MP3Downloads')->search("\"{$track->getName()}\" and \"{$album->getName()}\"");
								if (isset($buy->Items->Item)) {
									$item = is_array($buy->Items->Item) ? $buy->Items->Item[0] : $buy->Items->Item;
									$track->amazonLink = $item->DetailPageURL;
								}
							}
						}

						$this->_cache->save($album, $key, array(), FindieRock_Constants::ONE_DAY);
					}
				}
				
				if ($album) {
					$this->titleThis('View Album : ' . $album->getName());
					$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, view, ' . $album->getName());
					$this->view->headMeta()->appendName('description', 'View the specifics for the indie rock album: ' . $album->getName());
			
					$this->view->thisUrl = urlencode("http://www.findierock.com/Albums/View/{$album->getArtist()->getSlug()}/{$album->getSlug()}");
					$this->view->thisTitle = urlencode($album->getName());
					$this->view->isValid = true;
					$this->view->album = $album;
					$this->view->tracks = $album->tracks;
					$this->view->hasTracks = !$album->tracks->isEmpty();
					
					if ($this->isLoggedIn())
					{
						$rating = AlbumratingQuery::create()
									->filterByUser($this->getUser())
									->filterByAlbum($album)
									->findOne();
						$this->view->userRating = ($rating ? $rating->getRating(): 0);
					}
				}
			} else {
				return $this->_helper->redirector('');
			}
		}
	
		public function doSearchAction() {
			$form = new FindieRock_Form_Albums_AlbumSearchForm();
			$request = $this->getRequest();
			 
			$result = new stdClass();
			$result->valid = false;
	
			// Check to see if this action has been POST'ed to.
			if ($this->getRequest()->isPost()) {
				// Now check to see if the form submitted exists, and
				// if the values passed in are valid for this form.
				if ($form->isValid($request->getPost())) {
					$searchAlbum = ucwords($form->getValue('albums'));
	
					$albums = AlbumQuery::Create()
									->filterByName("%{$searchAlbum}%")
									->orderByName()
									->find();
	
					$albumsView = new Zend_view();
					$albumsView->addBasePath(APPLICATION_PATH . "/views");
					$albumsView->hasAlbums = !$albums->isEmpty();
					$albumsView->albums = $albums;
	
					$result->valid = true;
					$result->detail = $albumsView->render("albums/_albums.phtml");
				}
			}
	
			$this->_helper->json($result);
		}
	
		public function getAlbumsAction() {
			$searchAlbum = $this->getRequest()->getParam("term");
			$callback = $this->getRequest()->getParam("callback");
			 
			if ($searchAlbum != null) {			  
				$albums = null;
			  
				if (($albums = $this->_cache->load('DistinctAlbums')) === false) {
					$albums = AlbumQuery::create()
									->addCond('AlbumNotEmpty', AlbumPeer::NAME, "", Criteria::NOT_EQUAL)
									->select(array("Name"))
									->setDistinct()
									->addAscendingOrderByColumn("Name")
									->find();
					 
					// Cache for an hour
					$this->_cache->save($albums, 'DistinctAlbums', array(), FindieRock_Constants::ONE_HOUR);
				}
			  
				$resultData = array();
			  
				$c = 0;
				foreach ($albums as $album) {
					if (stripos($album, $searchAlbum) !== false) {
						if (array_search(trim($album), $resultData) === false) {
							$c++;
							$resultData[] = trim($album);
						}
					}
					if ($c >= FindieRock_Constants::MAX_AUTOCOMPLETE)
					break;
				}

				echo "{$callback}(" . $this->_helper->json->encodeJson($resultData, false) . ")";
			}
		}
		 
		public function listAction() {
			$this->titleThis('Album List');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, list');
			$this->view->headMeta()->appendName('description', 'A list of all indie rock albums we know about from A-Z');
			
			$request = $this->getRequest();
	
			$filter = $request->getParam('filter');
			$page = $request->getParam('page');
				
			if (!$filter && !$page) {
				$this->_helper->redirector('List', 'Albums');
			}
			
			$this->setRouteParams('albumlist_param', 'MARKER', array('page' => $page, 'filter' => $filter));
				
			$this->view->alphaLinks = FindieRock_Helper_FilterHelper::MakeAlphaFilter($filter, "/Albums/List/");
				
			$this->view->noFilter = true;
	
			if ($filter != "@") {	
				$this->view->noFilter = false;
	
				if ($filter == "_") {
					$this->view->albums = AlbumQuery::create()
											->where("Name NOT RLIKE '^[A-Za-z]'")
											->orderByName()
											->paginate($page, FindieRock_Constants::MAX_LIST_ITEMSPERPAGE);
				} else {
					$this->view->albums = AlbumQuery::create()
											->filterByName("$filter%", Criteria::LIKE)
											->orderByName()
											->paginate($page, FindieRock_Constants::MAX_LIST_ITEMSPERPAGE);
				}
	
				$this->view->hasAlbums = $this->view->albums->getNbResults();
				$this->view->filter = $filter == "_" ? "Other" : $filter;
				$this->view->filterCount = $this->view->albums->getNbResults();
				$this->view->pagerLinks = FindieRock_Helper_FilterHelper::MakePager($this->view->albums, "/Albums/List/{$filter}/", $page);
			}
		}
		
		public function addAction() {   
	    	$this->titleThis('Add Album');
			$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, albums, add');
			$this->view->headMeta()->appendName('description', 'Add new albums.');
			
	    	$form = new  FindieRock_Form_Albums_AddAlbumForm();
           	$request = $this->getRequest();
	       	
	       	// Check to see if this action has been POST'ed to.
	        if (Zend_Auth::getInstance()->hasIdentity() && $this->getRequest()->isPost()) {
	        	$form->preValidation($request->getPost());
	        	
	        	if ($form->isValid($request->getPost())) {
	        		$artist = ArtistQuery::create()->filterByName($form->getValue('artist'))->findOne();
	        		
	        		$sess = new Zend_Session_Namespace("FindieRock");
	        		$user = UserQuery::Create()->filterByPrimaryKey($sess->userId)->findOne();
	        			
	        		$album = new Album();
	        		$album->setSubmittedbyuser($user);
	        		$album->setName($form->getValue('albumName'));
	        		$album->setLabel($form->getValue('albumLabel'));
	        		$album->setReleaseDate(date("Y-m-d", strtotime($form->getValue('releaseDate'))));
	        		$album->setArtist($artist);
	        		$albumType = "";
	        		
	        		foreach($form->getValue('albumType') as $type) {
	        			$albumType .= ($albumType ? "," : "") . $form->getElement('albumType')->getMultiOption($type);
	        		}
	        		$album->setAlbumType($albumType);
	        		
	        		$slug = $origSlug = Zenwerx_Data_SlugGenerator::MakeSlug($album->getName()); 
	        		$i = 1;
					while(AlbumQuery::create()->filterBySlug($slug)->count()) {
						$i++;
						$slug = "{$origSlug}-{$i}";
					}
	        		$album->setSlug($slug);
	        		$album->save();
	        		
	          		foreach( $form->getElements() as $element) {
		        		if (strpos($element->getName(), "track") === false)
		        			continue;
		        		
		        		if (trim($element->getValue()) == "")
		        			continue;
		        			
		        		$track = new Albumtrack();
		        		$track->setAlbum($album);
		        		$track->setName(trim($element->getValue()));
		        		$track->save();
		        	}
		        	
		        	$this->_helper->redirector('View', 'Albums', 
		        								array( "artist" => $artist->getSlug(), 
		        										"name" => $album->getSlug())
		        									);
		        	return;
	        	}
	        }
	        
	        $this->view->form = $form;
	    }
	    
	    public function saveRatingAction()
	    {
	    	$this->_helper->viewRenderer->setNoRender();
			$this->_helper->layout->disableLayout();
			
			if ($this->isLoggedIn())
			{
				$request = $this->getRequest();
				$albumid = $request->getParam("albumid");
				$rating = $request->getParam("rating");
				
				if ($albumid != null && $rating != null && is_numeric($albumid) && is_numeric($rating) 
						&& $rating >= FindieRock_Constants::MIN_RATING 
						&& $rating <= FindieRock_Constants::MAX_RATING)
				{
					$user = $this->getUser();
					
					$userRating = AlbumratingQuery::create()
									->filterByUser($user)
									->filterByAlbumid($albumid)
									->findOne();
					
					if ($rating > 0)
					{
						if (!$userRating)
						{
							$userRating = new Albumrating();
							$userRating->setUser($user);
							$userRating->setAlbumid($albumid);
						}
						$userRating->setRating((int)$rating);
						$userRating->save();
					}
					else
					{
						// Ignore the case where we don't have a rating and they clicked 0
						if ($userRating)
						{
							$userRating->delete();	
						}
					}
				}
			}
	    }
	}
?>
