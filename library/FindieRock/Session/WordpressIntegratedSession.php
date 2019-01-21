<?php
/**
 * The session model wraps basic session creation and destruction methods
 * into one single interface.
 */
class FindieRock_Session_WordpressIntegratedSession
{
	/**
	 * Creates a new session (aka logs in a user)
	 *
	 * @param string $user
	 * @param string $password
	 * @return
	 */
	public function create ( $user, $password )
	{
		// Get our authentication adapter and check credentials
		$adapter    =   $this->_getAuthAdapter( $user, $password );
		$auth       =   Zend_Auth::getInstance();
		$result     =   $auth->authenticate($adapter);

		if ( !$result->isValid() )
		{
			return false;
		}
		else
		{
			$user = UserQuery::create()->filterByUserName($user)->findOne();
			$sess = new Zend_Session_Namespace("FindieRock");
			$sess->userId = $user->getUserId();

			return true;
		}
	}

	/**
	 * Destroys a session (aka logs out a user)
	 */
	public function destroy ( )
	{
		Zend_Session::forgetMe();
		Zend_Auth::getInstance()->clearIdentity();
	}

	/**
	 * Constructs an instance of the auth adapter for this model.
	 *
	 * @return Zend_Auth_Adapter_DbTable
	 */
	protected function _getAuthAdapter( $login, $password )
	{
		$dbAdapter = Zend_Db_Table::getDefaultAdapter();
		 
		$authAdapter = new Zend_Auth_Adapter_DbTable(
		$dbAdapter,
						    'user',
						    'username',
						    'password'
						    );
						    	
						    $authAdapter
						    ->setIdentity($login)
						    ->setCredential(sha1($password));
						    	
						    return $authAdapter;
	}
}
