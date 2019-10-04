<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sayhalal extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
        $data['page'] = 'Index';
        $this->template->load('sayhalal/template','sayhalal/index', $data); 
	}
	
	public function menu(){
        $data['page'] = 'Menu';
        $this->template->load('sayhalal/template','sayhalal/menu', $data); 
	}

	public function view(){
        $data['page'] = 'View';
        $this->template->load('sayhalal/template','sayhalal/view', $data); 
	}
	
	public function account(){
        $data['page'] = 'View';
        $this->template->load('sayhalal/template','sayhalal/account', $data); 
	}
}