<?php

class base_controller {
	
	public $user;
	public $userObj;
	public $template;
	public $email_template;

	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
	
		# Instantiate User class
			$this->userObj = new User();
			
		# Authenticate / load user
			$this->user = $this->userObj->authenticate();
			
		# Set up us the templates
			$this->template 	  = View::instance('_v_template');
			$this->email_template = View::instance('_v_email');	
			
		# So we can use $user in views
			$this->template->set_global('user', $this->user);
			
		# Load global CSS
		$client_files = Array(
			"/css/global.css",
		);
		$this->template->client_files = Utils::load_client_files($client_files);
	}
	
}