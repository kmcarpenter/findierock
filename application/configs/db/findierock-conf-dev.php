<?php
// This file generated by Propel 1.5.2 convert-conf target
// from XML runtime conf file /home/ahsile/Documents/Programming/findierock/trunk/application/configs/conf/runtime-conf.xml
$conf = array (
  'datasources' => 
  array (
    'findierock' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => '',
        'user' => '',
        'password' => '',
        'settings' => 
        array (
          'charset' => 
          array (
            'value' => 'utf8',
          ),
        ),
      ),
    ),
    'default' => 'findierock',
  ),
  'generator_version' => '1.5.2',
);
$conf['classmap'] = include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classmap-findierock-conf.php');
return $conf;
