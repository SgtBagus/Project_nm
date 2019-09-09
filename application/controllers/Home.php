<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['tbl_project'] = $this->db->limit(3)->get_where('tbl_project', array('public' => 'ENABLE', 'status' => 'ENABLE'))->result_array();
		$data['file'] = $this->mymodel->selectWhere('file',array('table'=>'tbl_project'));
        $this->template->load('template/template','index', $data); 
	}
	
}