<?php
	
	class FindieRock_Form_Venues_AddVenueForm extends Zend_Form
	{
		public function __construct($options = null)
    	{
        	parent::__construct($options);
        	
        	$this->setName('VenueAddForm');
        			
        	$venue = new Zend_Form_Element_Text('venueName');
        	$venue->setOptions(array('length' => 60, 'size' => 26))
        			->setLabel("Venue Name")
        		    ->addFilter('StripTags')
        		    ->setRequired(true);
        		    
			$street = new Zend_Form_Element_Text('streetAddress');
			$error = $street->getDecorator('Errors');
        	$street->setOptions(array('length' => 60, 'size' => 26))
        			->setDecorators( array('ViewHelper',
											array('Description',array('escape'=>false,'tag'=>' span')),
											array('HtmlTag', array('tag' => 'dd')),
											array('Label', array('tag' => 'dt', 'class'=>'hidden')),
											array('Errors', $error)))
        			->setLabel("Address")
        		    ->addFilter('StripTags')
        		    ->setRequired(true)
        		    ->setDescription("Lat/Long: <span id='geo'>Unknown</span>");
        		    
        	$city = new Zend_Form_Element_Text('city');
        	$city->setOptions(array('length' => 60, 'size' => 26))
        			->setLabel("City/Town")
        		    ->addFilter('StripTags')
        		    ->setRequired(true);
        		    
            $prov = new Zend_Form_Element_Text('prov');
        	$prov->setOptions(array('length' => 60, 'size' => 26))
        			->setLabel("State/Province")
        		    ->addFilter('StripTags')
        		    ->setRequired(true);
        		    
            $country = new Zend_Form_Element_Select('country');
            $country->setLabel("State/Province")
        		    ->addFilter('StripTags')
        		    ->setRequired(true)
        		    ->addMultiOptions( array(
        		    	"United States",
        		    	"Canada",
        		    	"Australia",
        		    	"Germany",
        		    	"Mexico",
        		    	"Spain",
        		    	"United Kingdom"
        		    ));
        		    
            $site = new Zend_Form_Element_Text('site');
        	$site->setOptions(array('length' => 60, 'size' => 26))
        			->setLabel("Website")
        		    ->addFilter('StripTags');
        		    
            $desc = new Zend_Form_Element_Textarea("description");
			$desc->setOptions(array('length' => 60, 'size' => 26, 'rows' => 10, 'cols' => 70))
        			->setLabel("Description")
        		    ->addFilter('StripTags');
        		    
        	$add = new Zend_Form_Element_Submit('addVenue');
			$add->setLabel('» Add Venue!');
			        		 
        	$this->addElements(array($venue, $street, $city, $prov, $country, $site, $desc, $add));
		}
			  
		public function isValid($data)
	  	{
  			$valid = parent::isValid($data);
        	
        	$venue = $this->getValue("venueName");
        	if ($venue)
        	{
        		if (VenueQuery::create()->filterByName($venue)->count())
        		{
        			$valid = false;
        			$this->getElement("venueName")->addError("Venue \"{$venue}\" already exists!");
        		}	
        	}
        	
        	return $valid;
	  	}
	}

	?>