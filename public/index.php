<?php

defined('ZEND_FRAMEWORK_PATH') || define('ZEND_FRAMEWORK_PATH', '/usr/share/php/libzend-framework-php');

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    ZEND_FRAMEWORK_PATH,
    realpath(APPLICATION_PATH . '/../library'),
    realpath(APPLICATION_PATH . '/models/classes'),
    get_include_path()
)));

/*
 * Hostname check! We only want to reside on
 * (www.)findierock.com - redirect all other
 * hosts                         
 */
if (! (
	   stristr($_SERVER['HTTP_HOST'], 'www.findierock.com') 
	|| stristr($_SERVER['HTTP_HOST'], 'findierock.local')  
	|| stristr($_SERVER['HTTP_HOST'], 'dev.findierock.com')  	
	) ) {
    header('Location: http://www.findierock.com' . $_SERVER['REQUEST_URI'], null, 301);
    exit();
}

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

$application->bootstrap()
            ->run();
