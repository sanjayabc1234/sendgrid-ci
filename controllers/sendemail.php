<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sendemail extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	function index(){

		$config = array(
			'username'=>'', #Put your sendgrid account username
			'password' => '' #Put your sendgrid account username
		);

		$this->load->library('sendgrid_app', $config);

		$email = new SendGrid\Email();

		$email->addTo('your_self@domain.com')
		      ->setFrom('from_email@domain.com')
		      ->setSubject('Your subject')
		      ->setHtml('Body of email');

		$this->sendgrid_app->send($email);		
	}
}
?>