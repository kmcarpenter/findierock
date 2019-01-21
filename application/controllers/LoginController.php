<?php
class LoginController extends Zend_Controller_Action {
	public function init() {
	}
		
    public function indexAction() {
        $this->view->form = $this->getForm();
    }
    
    public function preDispatch() {
    	// redirect an authenticated user to the root
    	if (Zend_Auth::getInstance()->hasIdentity()) {
    		$this->_helper->redirector('index', 'index');
    	}
    }
    
    public function logoutAction() {
    	Zend_Auth::getInstance()->clearIdentity();
    	Zend_Session::stop();
    }
    
    public function processAction() {
    	$request = $this->getRequest();

        // Check if we have a POST request
        if (!$request->isPost()) {
            return $this->_helper->redirector('index');
        }

        // Get our form and validate it
        $form = $this->getForm();
        if (!$form->isValid($request->getPost())) {
            // Invalid entries
            $this->view->form = $form;
            return $this->render('index'); // re-render the login form
        }

        // Get our authentication adapter and check credentials
        $adapter = $this->getAuthAdapter($form->getValues());
        $auth    = Zend_Auth::getInstance();
        $result  = $auth->authenticate($adapter);
        if (!$result->isValid()) {
            // Invalid credentials
            $form->setDescription('Invalid credentials provided');
            $this->view->form = $form;
            return $this->render('index'); // re-render the login form
        }

        // We're authenticated! Redirect to the home page
        $this->_helper->redirector('index', 'index');
    }

	public function  getForm() {
        return new FindieRock_Form_Login_LoginForm(array(
            'action' => Zend_Registry::get('baseurl') . '/login/process',
            'method' => 'post',
        ));
    }
    
    public function  getAuthAdapter(array  $params) {
    	// TODO: Change to use propel						
		$authAdapter
			->setIdentity($params['username'])
    		->setCredential(sha1($params['password']));
							
		return $authAdapter;
    }
}
?>