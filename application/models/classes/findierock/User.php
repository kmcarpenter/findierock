<?php



/**
 * Skeleton subclass for representing a row from the 'user' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.findierock
 */
class User extends BaseUser {

		public function setPasswordWithPlaintext($pass)
		{
			$this->setPassword(sha1($pass));	
		}
		
		public function getWpPassword()
		{
			if (!$this->getUserid() || !$this->getUsername())
				throw new Exception("User not valid");
				
			return sha1( $this->getUsername() . "::" . $this->getUserId() );
		}
} // User
