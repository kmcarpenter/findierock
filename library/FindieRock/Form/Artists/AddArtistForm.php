<?php
	
	class FindieRock_Form_Artists_AddArtistForm extends Zend_Form
	{
		public function __construct($options = null)
    	{
        	parent::__construct($options);
        	
        	$this->setName('EventAddForm');
        	
        	$artist = new Zend_Form_Element_Text('artistName');
        	$artist->setOptions(array('length' => 60, 'size' => 26, "escape" => false))
        			->setLabel("Artist Name")
        		    ->addFilter('StripTags')
        		    ->setRequired(true);
        		   
           	$bio = new Zend_Form_Element_Textarea('bio');
           	$bio->setOptions(array('length' => 60, 'size' => 26, 'rows' => 10, "cols" => 70, "escape" => false))
           		->setLabel("Biography")
           		->addFilter('StripTags');       	

        	$add = new Zend_Form_Element_Submit('addArtist');
			$add->setLabel('» Add Artist!');
			        		 
        	$this->addElements(array($artist, $bio, $add));
		}
		
		public function isValid($data)
	  	{
  			$valid = parent::isValid($data);
  			$artist = $this->getValue("artistName");
  			if ($artist && ArtistQuery::create()->filterByName($artist)->count())
        	{
        		$valid = false;
        		$this->getElement("artistName")->addError("Artist \"{$artist}\" already exists!");
        	}
        	
        	return $valid;
	  	}
	}

	?>