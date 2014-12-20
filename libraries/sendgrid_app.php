<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Sanjay Maurya <sanjay.m@ebrandz.com>
 */

require_once(APPPATH.'third_party/sendgrid/sendgrid-php.php');

/**
 * The class extends the SendGrid Class to integrate into CodeIgniter
 */

/*
|--------------------------------------------------------------------------
| Example of Usage: refer online manual of Sendgrid v2.1.1
|--------------------------------------------------------------------------
| 
| 1. Create an array holding keys username and password
|		$config = array(
|			'username'=>'your username of sendgrid account',
|			'password' => 'your password of sendgrid account'
|		);
|
| 2. Load library in the controller
|		$this->load->library('sendgrid_app', $config);
|
| 3. Create email object
|		$email = new SendGrid\Email();
|
| 4. Populate email object by adding email ids, categories and so on
|		$email -> addTo('your_self@domain.com')
|			   -> setFrom('from_email@domain.com')
|			   -> setSubject('Your subject')
|			   -> setHtml('Body of email');
|
| 5. Finally send email, note object sendgrid_app is created when we load library
|		$this->sendgrid_app->send($email);
|----------------------------------------------------------------------------
 */

class Sendgrid_app{

	/**
	 * Global class object to store SendGrid object
	 * @var [Object]
	 */
	private $sendgrid_app;

	/**
	 * Bootstrap class function
	 * @param [array] $config [Initialize sendgrid object with username and password]
	 */
	function __construct($config){

		if(empty($config['username'])){
			die('Please provide username for Sendgrid account');
		}elseif (empty($config['password'])) {
			die('Please provide password for Sendgrid account');
		}

		$CI =& get_instance();
		$this->sendgrid_app = new SendGrid($config['username'], $config['password']);
		$CI->sendgrid_app = $this->sendgrid_app;
	}

	/**
	 * Function is required for sending email, below function is required due loss of scope
	 * @param  [SendGrid Object] $email [SendGrid Object created in controller]
	 */
	public function send($email){
		$this->sendgrid_app->send($email);
	}
}