<?php
	
	class FindieRock_Form_Events_EventSearchForm extends Zend_Form
	{
		public function __construct($options = null)
    	{
        	parent::__construct($options);
        	
        	$this->setName('EventForm');
        	
        	$events = new Zend_Form_Element_Text('events');
        	$events->setOptions(array('length' => 60, 'size' => 26))
        		   ->setDescription("Just type the event name you want in here, and click 'search' button.")
        		   ->addFilter('StripTags');
        		 
        	$search = new Zend_Form_Element_Button('search');
			$search->setLabel('» Search for Events!');
			        		 
        	$this->addElements(array($events, $search));
		}
	}

	?>