<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function password(){
		$data['page_name'] = "password";
        $this->template->load('template/template','password',$data); 
	}

	public function register(){
		$data['page_name'] = "register";
        $this->template->load('template/template','register',$data); 
	}
	
}