<?php
	
	class FindieRock_Form_Albums_AddAlbumForm extends Zend_Form
	{
		public function __construct($options = null)
    	{
        	parent::__construct($options);
        	
        	$this->setName('AlbumAddForm');
        	
        	$album = new Zend_Form_Element_Text('albumName');
        	$album->setOptions(array('length' => 60, 'size' => 26))
        			->setLabel("Album Name")
        		    ->addFilter('StripTags')
        		    ->setRequired(true);
        		   
			$artist = new Zend_Form_Element_Text('artist');
        	$artist->setOptions(array('length' => 60, 'size' => 26))
        			->setLabel('Artist')
        			->addFilter('StripTags')
        			->setRequired(true);
        			
           	$tracks = new Zend_Form_Element_Text('track0');
           	$error = $tracks->getDecorator('Errors');
        	$tracks->setOptions(array('length' => 60, 'size' => 26, 'class' => 'albumtrack'))
                	->setDecorators( array('ViewHelper',
											array('Description',array('escape'=>false,'tag'=>' span')),
											array('HtmlTag', array('tag' => 'dd')),
											array('Label', array('tag' => 'dt', 'class'=>'hidden')),
											array('Errors', $error)))
        		   ->addFilter('StripTags')
        		   ->setLabel("Tracks")
        		   ->setDescription("<a id='addTrack' class='plus' href=''>Add Track</a>")
        		   ->setRequired(true);
        	
        	$date = new Zend_Form_Element_Text('releaseDate');
        	$date->setOptions(array('length' => 60, 'size' => 26))
        			->setLabel('Release Date')
        			->addFilter('StripTags')
        			->setRequired(true);
        			
        	$label = new Zend_Form_Element_Text('albumLabel');
        	$label->setOptions(array('length' => 60, 'size' => 26))
        			->setLabel('Label')
        			->addFilter('StripTags');
        			
        	$type = new Zend_Form_Element_MultiCheckbox('albumType');
        	$type->addMultiOptions( array("Album", "Official", "Bootleg", "Live", "Single", "Interview","Ep", "Promotion", "Compilation"))
        		->setLabel("Album Type")
        		->addFilter('StripTags')
        		->setSeparator(" ");
        		

        	$add = new Zend_Form_Element_Submit('addAlbum');
			$add->setLabel('» Add Album!');
			        		 
        	$this->addElements(array($album, $artist, $tracks, $date, $label, $type, $add));
		}
		
		/**
		  * After post, pre validation hook
		  * 
		  * Finds all fields where name includes 'artists' and uses addNewField to add
		  * them to the form object
		  * 
		  * @param array $data $_GET or $_POST
		  */
		public function preValidation(array $data) {
	
		    // array_filter callback
		    function findFields($field) {
		      	$str = "tracks";
			  	$pos = strpos($field, $str) + strlen($str);
		      	if ($pos !== false  && (int)ltrim($field, $str) !== 0) {
		        	return $field;
      			}
		    }
	    
		    // Search $data for dynamically added fields using findFields callback
		    $newFields = array_filter(array_keys($data), 'findFields');
		    
		    foreach ($newFields as $fieldName) {
	      		// strip the id number off of the field name and use it to set new order
		      	$order = ltrim($fieldName, 'tracks') + 2;
		      	$this->addNewField($fieldName, $data[$fieldName], $order);
		    }
	  }
	  
	  /**
	   * Adds new fields to form
	   *
	   * @param string $name
	   * @param string $value
	   * @param int    $order
	   */
	  public function addNewField($name, $value, $order) {
	    	$element = new Zend_Form_Element_Text($name);
	  		$element->setOptions( array(
								      	'required'		=> false,
								      	'value'			=> $value,
								      	'order'			=> $order,
								      	'length'		=> 60,
								      	'size'			=> 26,
	  									'class' 		=> 'albumtrack'
								    ))
				    ->removeDecorator('label');
	    	$this->addElement($element);
	  	}
	  
		public function isValid($data)
	  	{
  			$valid = parent::isValid($data);
  			
  			$artist = $this->getValue("artist");
  			if ($artist && !ArtistQuery::create()->filterByName($artist)->count())
  			{
  				$this->getElement("artist")->addError("Artist \"{$artist}\" doesn't exist!");
        		$valid = false;
  			}
  			
  			$release = $this->getValue("releaseDate");
  			if ($release && strtotime($release) > time())
  			{
  				$this->getElement("releaseDate")->addError("Release date is in the future... that's funny!");
  				$valid = false;
  			}
  			
        	return $valid;
	  	}
	}

	?>