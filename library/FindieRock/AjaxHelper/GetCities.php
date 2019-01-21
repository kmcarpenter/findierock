<?php
	class FindieRock_AjaxHelper_GetCities {
		public static function GetCities($controller, $max) {
	       	$searchCity = trim($controller->getRequest()->getParam("term"));       	
	       	$callback = $controller->getRequest()->getParam("callback");
	       	
	       	if ($searchCity != null && strlen($searchCity) > 2) {
		    	
		    	$resultData = array();
	
		    	$cities = FindieRock_Data_City::GetDistinctCities();
		    	
		    	$c = 0;
		    	foreach ($cities as $city) {
		    		$cityName = $city["City"];
		    		if (stripos($cityName, $searchCity) !== false) {
	    				if (array_search(trim($cityName), $resultData) === false) {
	    					$c++;
	    					$resultData[] = trim($cityName);
	    				}	
		    		}
		    		if ($c >= $max)
		    			break;
		    	}
		    	
		    	echo "{$callback}(" . $controller->_helper->jsonEncode($resultData, false) . ")";
	       	}
		}
	}
?>