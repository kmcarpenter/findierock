<?php
	class AboutController extends FindieRock_Controller_SidebarController {
		
		public function init() {
			$this->view->adLayout = "_google_ads_static.phtml";
		}
		
		public function indexAction() {
			$this->titleThis('About Findie Rock');
            $this->view->headMeta()->appendName('keywords', 'indie, rock, indie rock, about');
            $this->view->headMeta()->appendName('description', 'The about page for findie rock.');
		}
	}
?>