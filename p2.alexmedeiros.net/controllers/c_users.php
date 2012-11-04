<?php
class users_controller extends base_controller {

	public function __construct() {
		parent::__construct();
		//echo "users_controller construct called<br><br>";
	} 
	
	public function index() {
		header('Location: /users/directory/');
	}
	
	public function signup() {
		# Setup view
		$this->template->content = View::instance('v_users_signup');
		$this->template->title   = "Sign up";
		
		# Render template
		echo $this->template;
	}
	
	public function p_signup() {
		# Setup view
		$this->template->content = View::instance('v_users_p_signup');
		$this->template->title   = "Signup";
		
		# Encrypt the password
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		
		# More data we want stored with the user
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();
		$_POST['token']    = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
		
		# Insert this user into the database
		$user_id = DB::instance(DB_NAME)->insert("users", $_POST);
		
		# Confirm the sign up and render template
		echo $this->template;
	}
	
	public function login($error = NULL) {
		# Setup view
		$this->template->content = View::instance('v_users_login');
		$this->template->title   = "Login";
		
		# Pass data to the view
		$this->template->content->error = $error;
		
		# Render template
		echo $this->template;
	}
	
	public function p_login() {
		# Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
	
		# Hash submitted password so we can compare it against one in the db
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
	
		# Search the db for this email and password
		# Retrieve the token if it's available
		$q = "SELECT token 
			FROM users 
			WHERE email = '".$_POST['email']."' 
			AND password = '".$_POST['password']."'";
	
		$token = DB::instance(DB_NAME)->select_field($q);
		
		# If we didn't get a token back, login failed
		if(!$token) {
			
			# Send them back to the login page with an error
			Router::redirect("/users/login/error");
		
		# But if we did, login succeeded!
		} else {
			
			# Store this token in a cookie
			setcookie("token", $token, strtotime('+1 year'), '/');
		
			# Redirect to the main page
			Router::redirect("/");
		}
	}
	
	public function logout() {
		# Generate and save a new token for next login
		$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
	
		# Create the data array we'll use with the update method
		# In this case, we're only updating one field, so our array only has one entry
		$data = Array("token" => $new_token);
	
		# Do the update
		DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");
	
		# Delete their token cookie - effectively logging them out
		setcookie("token", "", strtotime('-1 year'), '/');

		# Send them back to the main landing page
		Router::redirect("/");
	}
	
	public function profile() {
		# If user is blank, they're not logged in, show message and don't do anything else
		if(!$this->user) {
			Router::redirect("/");

			# Return will force this method to exit here so the rest of 
			# the code won't be executed and the profile view won't be displayed.
			return false;
		}

		# Setup view
		$this->template->content = View::instance('v_users_profile');
		$this->template->title   = "Profile - ".$this->user->first_name;
			
		# Render template
		echo $this->template;
	}
	
	public function directory() {
		# Set up view
		$this->template->content = View::instance("v_users_directory");
		$this->template->title   = "All Users";
		
		# Query to get all users
		$q = "SELECT *
			FROM users";
		
		# Run query and store results in $directories
		$directories = DB::instance(DB_NAME)->select_rows($q);
		
		# Pass data to view
		$this->template->content->directories = $directories;
		
		# Render view
		echo $this->template;
	}

}