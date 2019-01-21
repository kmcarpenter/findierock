<?php
	
	class FindieRock_Form_Albums_AlbumSearchForm extends Zend_Form
	{
		public function __construct($options = null)
    	{
        	parent::__construct($options);
        	
        	$this->setName('AlbumForm');
        	
        	$album = new Zend_Form_Element_Text('albums');
        	$album->setOptions(array('length' => 60, 'size' => 26))
        		   ->setDescription("Just type the album name you want in here, and click 'search' button.")
        		   ->addFilter('StripTags');
        		 
        	$search = new Zend_Form_Element_Button('search');
			$search->setLabel('» Search for Albums!');
			        		 
        	$this->addElements(array($album, $search));
		}
	}

	?>