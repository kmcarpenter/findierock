<?php
	
	class FindieRock_Form_Events_AddEventForm extends Zend_Form
	{
		public function __construct($options = null)
    	{
        	parent::__construct($options);
        	
        	$this->setName('EventAddForm');
        	
        	$events = new Zend_Form_Element_Text('eventName');
        	$events->setOptions(array('length' => 60, 'size' => 26))
        			->setLabel("Event Name")
        		    ->addFilter('StripTags')
        		    ->setRequired(true);
        		   
           	$artists = new Zend_Form_Element_Text('artists0');
           	$error = $artists->getDecorator('Errors');
        	$artists->setOptions(array('length' => 60, 'size' => 26, 'class' => 'artist'))
                	->setDecorators( array('ViewHelper',
											array('Description',array('escape'=>false,'tag'=>' span')),
											array('HtmlTag', array('tag' => 'dd')),
											array('Label', array('tag' => 'dt', 'class'=>'hidden')),
											array('Errors', $error)))
        		   ->addFilter('StripTags')
        		   ->setLabel("Artist")
        		   ->setDescription("<a id='addArtist' class='plus' href=''>Add Artist</a>")
        		   ->setRequired(true);
        	
        	$date = new Zend_Form_Element_Text('eventDate');
        	$date->setOptions(array('length' => 60, 'size' => 26))
        			->setLabel('Date')
        			->addFilter('StripTags')
        			->setRequired(true);
        	
        	$time = new Zend_Form_Element_Text('eventTime');
        	$time->setOptions(array('length' => 60, 'size' => 26))
        			->setLabel('Time')
        			->setDescription('Start time of event (optional)')
        			->addFilter('StripTags');		
        			
        	$venue = new Zend_Form_Element_Text('venueName');
        	$venue->setOptions(array('length' => 60, 'size' => 26))
        			->setLabel("Venue Name")
        		    ->addFilter('StripTags')
        		    ->setRequired(true);
        		    
			$desc = new Zend_Form_Element_Textarea("description");
			$desc->setOptions(array('length' => 60, 'size' => 26, 'rows' => 10, 'cols' => 70))
        			->setLabel("Description")
        		    ->addFilter('StripTags');
        	

        	$add = new Zend_Form_Element_Submit('addEvent');
			$add->setLabel('» Add Event!');
			        		 
        	$this->addElements(array($events, $artists, $date, $time, $venue, $desc, $add));
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
		      	$str = "artists";
			  	$pos = strpos($field, $str) + strlen($str);
		      	if ($pos !== false  && (int)ltrim($field, $str) !== 0) {
		        	return $field;
      			}
		    }
	    
		    // Search $data for dynamically added fields using findFields callback
		    $newFields = array_filter(array_keys($data), 'findFields');
		    
		    foreach ($newFields as $fieldName) {
	      		// strip the id number off of the field name and use it to set new order
		      	$order = ltrim($fieldName, 'artists') + 1;
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
	  									'class' 		=> 'artist'
								    ))
				    ->removeDecorator('label');
	    	$this->addElement($element);
	  	}
	  
		public function isValid($data)
	  	{
  			$valid = parent::isValid($data);
  			$artists = array();
  			
	  		foreach( $this->getElements() as $element)
        	{
        		if (strpos($element->getName(), "artists") === false)
        			continue;
        		
        		if (trim($element->getValue()) == "")
        			continue;
        			
        		if (!ArtistQuery::create()->filterByName($element->getValue())->count())
        		{
        			$valid = false;
        			$element->addError("Artist \"{$element->getValue()}\" doesn't exist!");
        		}
        		else
        		{
        			$artists[] = $element->getValue();
        		}
        	}
        	
        	$date = $this->getValue("eventDate");
        	if ($date && strtotime($date) < strtotime(date("-1 days")))
        	{
        		$this->getElement("eventDate")->addError("Event date \"" . date("Y-m-d", strtotime($date)) . "\" is in the past!");
        		$valid = false;
        	}
        	
        	$venue = $this->getValue("venueName");
        	if ($venue)
        	{
        		if (!VenueQuery::create()->filterByName($venue)->count())
        		{
        			$valid = false;
        			$this->getElement("venueName")->addError("Venue \"{$venue}\" doesn't exist!");
        		}	
        	}
        	
        	$override = (isset($data["override"]) && $data["override"]);
        	if ($valid && !$override )
        	{        		
        		// Search for events like this one
        		$events = EventQuery::create()
        						->filterByStart(date("Y-m-d", strtotime($date)) . "%", Criteria::LIKE)
			        			->useEventartistQuery()
			        				->useArtistQuery()
			        					->filterByName($artists)
			        				->endUse()
		        				->endUse()
		        				->find();
        		$e = $this->getElement("eventName");
        		if (count($e))
        		{
        			$valid = false;
        			$override = new Zend_Form_Element_Hidden("override");
        			$override->setValue(1);
        			$this->addElement($override);
        			
	        		foreach($events as $event)
	        		{
	        			$e->addError("Event \"{$event->getName()}\" is similar to your event!");
	        		}
        		}
        	}
        	
        	return $valid;
	  	}
	}

	?>