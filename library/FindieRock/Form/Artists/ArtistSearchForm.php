<?php
	
	class FindieRock_Form_Artists_ArtistSearchForm extends Zend_Form
	{
		public function __construct($options = null)
    	{
        	parent::__construct($options);
        	
        	$this->setName('ArtistForm');
        	
        	$artist = new Zend_Form_Element_Text('artists');
        	$artist->setOptions(array('length' => 60, 'size' => 26))
        		   ->setDescription("Just type the artist name you want in here, and click 'search' button.")
        		   ->addFilter('StripTags');
        		 
        	$search = new Zend_Form_Element_Button('search');
			$search->setLabel('» Search for Artist!');
			        		 
        	$this->addElements(array($artist, $search));
		}
	}

	?>