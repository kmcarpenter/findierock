<?php
	class FindieRock_View_Helper_EventJSON extends Zend_View_Helper_Abstract
	{
	    public function eventJSON($today = null, $tomorrow = null, $week = null)
	    {
			$json = "{";

			$json .= $this->doDay($today, 'today');
			$json .= ", ";
			$json .= $this->doDay($tomorrow, 'tomorrow');
			$json .= ", ";
			$json .= $this->doWeek($week);
			
			$json .= "}";
			
			return $json;
		}
		
		private function doDay($day, $name)
		{
			$json = "$name : {\r\n";
			if ($day)
			{
				$json .= $this->getDayJson($day);
			}
			$json .= "}\r\n";
			return $json;
		}
		
		private function doWeek($week)
		{
			$json = "week: [";
			if ($week)
			{
				$x = 0;
				foreach($week as $day => $events)
				{
					if ($x) { $json .= ", "; }
					$json .= "{\r\n";
					$json .= $this->getDayJson($events);
					$json .= " }\r\n";
					$x++;
				}
			}
			
			$json .= "]\r\n";
			
			return $json;
		} 
		
		private function getDayJson($events)
		{
			$json = "loaded: false, data: [";
			$y = 0;
			foreach ($events as $event)
			{
				if ($y) { $json .= ", "; }
				$json .= "{";
				$json .= "\tlatitude: {$event->getVenue()->getLatitude()},\r\n";
				$json .= "\tlongitude: {$event->getVenue()->getLongitude()},\r\n";
				$json .= "\ttitle: \"{$event->getName()}\"\r\n";
				$json .= "}";
				$y++;
			}
			$json .= "]";
			
			return $json;
		}
	}
?>