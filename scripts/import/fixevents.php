#!/usr/bin/php5
<?php

    defined('APPLICATION_PATH')
            || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../../'));

    ini_set("memory_limit", "256M");

    require_once( APPLICATION_PATH . '/library/Propel/Propel.php'  );

    $path = get_include_path() . PATH_SEPARATOR . APPLICATION_PATH . '/application/models/classes';
    set_include_path( $path );

    class Event_Description_Fixer
    {
	const CC_LIC = "User-contributed text is available under the Creative Commons By-SA License and may also be available under the GNU FDL.";

        public function __construct()
        {
            Propel::init(APPLICATION_PATH . '/application/configs/db/findierock-conf-prod.php');
        }

        public function fixDescriptions()
        {
            $events = EventQuery::create()->find();

            foreach ($events as $event)
            {
                 $desc = strip_tags($event->getDescription());
		 $desc = str_replace(self::CC_LIC, '', $desc);
                 $event->setDescription($desc);
                 $event->save();
            }
        }
    }

    $fixer = new Event_Description_Fixer();
    $fixer->fixDescriptions();
?>
