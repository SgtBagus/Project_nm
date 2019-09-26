<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sayhalal extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
        $data['page'] = 'index';
        $this->template->load('template/template','sayhalal', $data); 
	}
	
}