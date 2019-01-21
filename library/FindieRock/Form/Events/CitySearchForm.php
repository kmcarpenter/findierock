<?php

	class FindieRock_Form_Events_CitySearchForm extends Zend_Form
	{
		public function __construct($options = null)
    	{
        	parent::__construct($options);
        	
        	$this->setName('CityForm');
        	
        	$city = new Zend_Form_Element_Text('city');
        	$city->setOptions(array('length' => 60, 'size' => 26))
        		 ->setDescription("Just type the city name you want in here, and click 'search' button.")
        		 ->addFilter('StripTags');
        		 
        	$dateStart = new Zend_Form_Element_Hidden('dateStart');
        	$dateEnd   = new Zend_Form_Element_Hidden('dateEnd');
        		 
        	$search = new Zend_Form_Element_Button('search');
			$search->setLabel('» Search for Events!');
			        		 
        	$this->addElements(array($city, $search, $dateStart, $dateEnd));
		}
	}
	
?>