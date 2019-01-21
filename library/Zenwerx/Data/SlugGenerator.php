<?php

	class Zenwerx_Data_SlugGenerator
	{
		public static function MakeSlug($value)
		{
	        // Trim the string
	        $value = trim($value);
	        
	        // Generate slug by removing unwanted (other than alphanumeric and dash [-]) characters from the string
	        $value = preg_replace('/[\'"]/', '', $value);
	        $value = preg_replace('/[^a-z0-9-]/i', '-', $value);
	        $value = preg_replace('/-[-]*/', '-', $value);
	        $value = preg_replace('/-$/', '', $value);
	        $value = preg_replace('/^-/', '', $value);
			
	        return $value;
		}
		
	}