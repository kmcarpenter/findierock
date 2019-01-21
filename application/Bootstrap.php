<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initApp()
	{
		$this->bootstrap('view');
	}
	
	protected function _initDbAdapter()
	{
		$this->bootstrap('Config');
		
		$config = Zend_Registry::get('config');
		
		$dbAdapter = Zend_Db::factory($config->db->adapter, $config->db->params->toArray());
		Zend_Db_Table::setDefaultAdapter($dbAdapter);
	}    
	
	protected function _initLogging()
	{
		$this->bootstrap('Config');
		
		$config = Zend_Registry::get('config');
		
		$logLevel = $config->log->level;
		$logFile = realpath($config->log->path) . "/" . $config->log->file;
		
		$log = new Zend_Log();
		$filter = new Zend_Log_Filter_Priority((int)$logLevel);
		$writer = new Zend_Log_Writer_Stream($logFile);
		$log->addWriter($writer);
		$log->addFilter($filter);
		
		if (defined('APPLICATION_ENV') && APPLICATION_ENV == "development")
		{
			$fbWriter = new Zend_Log_Writer_Firebug();
			$log->addWriter($fbWriter);
		}
		
		Zend_Registry::set('log', $log);
	}
	
	protected function _initNavigation()
	{
		$this->bootstrap('Config');
		$this->bootstrap('layout');
		$layout = $this->getResource('layout');
		$view = $layout->getView();
		
		$config = Zend_Registry::get('config');
		$navConfig = new Zend_Config_Xml($config->nav->path, "nav");
		
		$container = new Zend_Navigation($navConfig);
		$view->navigation($container);
	}
	
	protected function _initNamespaces()
	{
		$loader = Zend_Loader_Autoloader::getInstance();
		$loader->registerNamespace('FindieRock_');
		$loader->registerNamespace('Propel_');
		$loader->registerNamespace('LastFM_');
		$loader->registerNamespace('MusicBrainz_');
		$loader->registerNamespace('Zenwerx_');
		$loader->registerNamespace('Amazon_');
	}
	
	protected function _initConfig()
	{
	    $config = new Zend_Config($this->getOptions(), true);
	    Zend_Registry::set('config', $config);
	    
	    return $config;
	}
	
	protected function _initRoutes()
	{
		$this->bootstrap('FrontController');
		$router = $this->getResource('FrontController')->getRouter();

		$router->addConfig(new Zend_Config_Ini(APPLICATION_PATH . '/configs/routes.ini', 'routes'), 'routes');
	}
	
	protected function _initCache()
	{
		$this->bootstrap('Logging');
		
		$log = Zend_Registry::get('log');
		
		$log->debug("Initializing cache backend.");
		$back = new Zend_Cache_Backend_Memcached(
						array(
							'servers' => array( array (
								'host' => 'localhost',
								'port' => '11211'
						)),
						'compression' => true
						)
					);
		
		$log->debug("Initializing cache frontend.");
		$front = new Zend_Cache_Core(
						array(
							'caching'	 				=> 'true',
							'cache_id_prefix'			=> 'findie',
							'write_control' 			=> true,
							'automatic_serialization' 	=> true,
							'ignore_user_abort' 		=> true
						)
					);
		
		$log->debug("Creating cache object");
		$cache = Zend_Cache::factory($front, $back);
		
		$log->debug("Cache object created, storing in registry.");
		Zend_Registry::set('cache', $cache);
	}
	
	protected function _initPropel()
    {
    	$this->bootstrap('Config');
    	$this->bootstrap('Namespaces');
		
		$config = Zend_Registry::get('config');
		
        require 'Propel/Propel.php';
		Propel::init($config->db->datasource);
    }
	
	protected function _initSession()
	{
		Zend_Session::start();
		if(!Zend_Registry::isRegistered('session'))
	    {
	    	$session = new Zend_Session_Namespace('FindieRock');
			if (!isset($session->initialized)) {
			    Zend_Session::regenerateId();
			    $session->initialized = true;
			}
	       
	       	Zend_Registry::set('session', $session);
		}
	}
		
	protected function _initBaseUrl()
	{	
		return;
		// This stuff isn't used any more
		/*
		 
		$this->bootstrap('FrontController');
		$this->bootstrap('Config');
		
		$front = $this->getResource('FrontController');	
		
		$config = Zend_Registry::get('config');
		
		Zend_Registry::set('baseurl', $config->app->baseurl);
		
		$front->setBaseUrl( $config->app->baseurl );
		*/
	}

}
