<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Investasi extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){

		if($this->session->userdata('role_id') == '17'){
			$data['tbl_project_invest'] = $this->mymodel->selectWithQuery("SELECT a.id as user_id, b.id as project_id, c.* FROM tbl_project_invest c INNER JOIN tbl_project b ON c.project_id = b.id INNER JOIN user a ON b.user_id = a.id");
		}else{
			$data['tbl_project_invest'] = $this->mymodel->selectWithQuery("SELECT a.id as user_id, b.id as project_id, c.* FROM tbl_project_invest c INNER JOIN tbl_project b ON c.project_id = b.id INNER JOIN user a ON b.user_id = a.id WHERE a.id = ".$this->session->userdata('id')." ");
		}
		$data['page_name'] = "Investasi";
        $this->template->load('admin/template/template','admin/investasi/index', $data); 
	}
	
}