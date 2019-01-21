<?php
class IndexController extends FindieRock_Controller_SidebarController {
	public function init() {
		$this->adId = "6851965248";
	}

    public function indexAction() {
    	$this->logTime("starting index");

    	$this->titleThis('Home');
		$this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, album, near, geo, events, events near you, indie rock events');
		$this->view->headMeta()->appendName('description', 'This is where the magic begins by finding indie rock events which are near where you are right now!');
    	
		$this->logTime("getting city form");
		
    	$this->view->form = new FindieRock_Form_Index_CitySearchForm();
    	
    	$this->logTime("looking up geo-ip");
    	
    	$location = new Zenwerx_GeoIP_Location();
    	
    	$this->logTime("getting events");
    	
    	FindieRock_Data_Event::GetEventsNear($location, $this->view);
    	
    	$this->logTime("got events");
    }
}
?>