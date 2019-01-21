<?php
	class FindieRock_Controller_SidebarController extends Zenwerx_Controller_BaseController {	
		protected $adId = "5218441806";
		protected $_sess = null;
		
		public function __construct(Zend_Controller_Request_Abstract $request, Zend_Controller_Response_Abstract $response, array $invokeArgs = array()) {
			parent::__construct($request,$response,$invokeArgs);
			
			$this->_sess = new Zend_Session_Namespace("FindieRock");
			 
			$this->logTime("base construct");
			
			if (($count = $this->_cache->load('ArtistCount')) === false) {
				$count = ArtistQuery::create()->count();
				$this->_cache->save($count, 'ArtistCount', array(), 3600);
			}

			$this->view->randomArtist = ArtistQuery::create()
											->filterByArtistId(rand(1,$count))
											->findOne();
											
			$this->view->randomArtist->image = FindieRock_Artwork_Grabber::GetArtistArtwork($this->view->randomArtist, FindieRock_Artwork_Grabber::SIZE_MEDIUM); 
			$this->view->sidebarLayout = "_sidebar.phtml";
			$this->view->adLayout = "_google_ads_left.phtml";

			// Static ad by default
			$this->view->adId = $this->adId;
			
			$this->logTime("pre feeds");
			
			$this->view->feeds = $this->getFeeds();
			
			$this->logTime("got feeds");

			$this->getLoginLogoutUrl();
			
			$this->view->isLoggedIn = $this->isLoggedIn();
			
			$this->logTime("sidebar construct");
		}
		
	    function getLoginLogoutUrl() {
	    	$this->view->loginLogoutTitle = "Log In";
	    	$this->view->loginLogoutUrl = "/blog/wp-login.php?redirect_to=" . urlencode( "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"] );
	    	
	    	if ($this->isLoggedIn()) {
	    		/***
	    		 * This is not ideal. I'm loading up a TONNE of wordpress just to get a url.
	    		 */
		    	$GLOBALS['findieUserCheck'] = true;
				@require_once( realpath(APPLICATION_PATH . "/../public/blog/") . "/wp-config.php" );
				
				$url = wp_logout_url( "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);
				$GLOBALS['findieUserCheck'] = false;
				
				$this->view->loginLogoutTitle = "Log Out";
				$this->view->loginLogoutUrl = $url;
				
				$this->view->username = $this->getUser()->getUserName();
	    	} else {
	    		$this->view->registerUrl = "/blog/register";
	    	}
	    }
	    
	    protected function getUser()
	    {
	    	$user = null;
	    	if ($this->isLoggedIn())
	    	{
	    		$user = UserQuery::Create()->filterByPrimaryKey($this->_sess->userId)->findOne();
	    	}
	    	return $user;
	    }

	    private function getFeeds() {
			Zend_Feed_Reader::setCache($this->_cache);
			
			$this->logTime("got feed cache");

			$feed = null;
			try {	
			$feed = Zend_Feed_Reader::import('http://www.findierock.com/blog/feed/');
			} catch (Exception $e) {
				$this->logTime("feed failed");
			}
			$this->logTime("got feeds");
			
			$data = array();
			foreach ($feed as $entry) {
			    $data[] = array(
			    'title'        => $entry->getTitle(),
	        	    'description'  => $entry->getDescription(),
	                    'dateModified' => $entry->getDateModified(),
	        	    'authors'      => $entry->getAuthors(),
	        	    'link'         => $entry->getLink(),
	        	    'content'      => $entry->getContent());
			}
			
			$this->logTime("handled feeds");
	
			return $data;		
	    }
	}
?>
