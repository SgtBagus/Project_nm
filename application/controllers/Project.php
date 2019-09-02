<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Project extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['page_name'] = "home";
        $this->template->load('template/template','project/index',$data); 
	}

	public function view($slug){
		$data['page_name'] = "home";
        $this->template->load('template/template','project/view', $data); 
	}
	
}