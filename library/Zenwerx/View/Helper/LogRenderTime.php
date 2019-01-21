<?php
	class Zenwerx_View_Helper_LogRenderTime
	{
		public function logRenderTime($event, $start)
		{
			$config = Zend_Registry::get('config');
	    	if ($config->log->logTime)
	    	{
				$time = (microtime(true) - $start) * 1000.0;
		    	
		    	$log = Zend_Registry::get('log');
		    	
		    	$log->debug("Time until $event : $time milliseconds");
	    	}
		}
	}
?>