<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['page_name'] = "Blog";
        $this->template->load('template/template','blog/index',$data); 
	}
	
	public function view($slug){
		$data['page_name'] = "Blog";
        $this->template->load('template/template','blog/view',$data); 
	}


	public function create(){
		$data['page_name'] = "Blog";
        $this->template->load('template/template','blog/create',$data); 
	}
	
	public function edit($id){
		$data['page_name'] = "Blog";
        $this->template->load('template/template','blog/create',$data); 
	}
}