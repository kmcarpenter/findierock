<?php
	class Zenwerx_Controller_BaseController extends Zend_Controller_Action
	{
		private $_start = 0;
		protected $_cache = null;
		protected $_config = null;
		protected $_log = null;
		
		public function __construct(Zend_Controller_Request_Abstract $request, Zend_Controller_Response_Abstract $response, array $invokeArgs = array()) {
			$this->_start = microtime(true);
			
			parent::__construct($request, $response, $invokeArgs);

			// add log variable for views
			$this->view->logStart = $this->_start;
			
			$this->_log = Zend_Registry::get('log');
			$this->_cache = Zend_Registry::get('cache');
			$this->_config = Zend_Registry::get('config');
		}
		
	    protected function logTime($event) {
	    	if ($this->_config->log->logTime) {
		    	$time = (microtime(true) - $this->_start) * 1000.0;
		    	
		    	$this->_log->debug("Time until $event : $time milliseconds");
	    	}
	    }
	    		
		function titleThis($title) {
	        $this->view->title = "Findie Rock &raquo; " . $title;
	    }
	    
	    function setRouteParams($prop, $propval, $params)
	    {
	    	$pages = $this->view->navigation()->getContainer()->findAllBy($prop, $propval);
			foreach($pages as &$page)
			{
				$page->setParams($params);
			}
	    }
	    
	    protected function isLoggedIn()
	    {
	    	return Zend_Auth::getInstance()->hasIdentity();
	    }
	}
?>