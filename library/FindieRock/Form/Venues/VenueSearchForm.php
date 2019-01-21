<?php
	
	class FindieRock_Form_Venues_VenueSearchForm extends Zend_Form
	{
		public function __construct($options = null)
    	{
        	parent::__construct($options);
        	
        	$this->setName('VenueForm');
        	
        	$events = new Zend_Form_Element_Text('venues');
        	$events->setOptions(array('length' => 60, 'size' => 26))
        		   ->setDescription("Just type the venue name you want in here, and click 'search' button.")
        		   ->addFilter('StripTags');
        		 
        	$search = new Zend_Form_Element_Button('search');
			$search->setLabel('» Search for Venues!');
			        		 
        	$this->addElements(array($events, $search));
		}
	}

	?>