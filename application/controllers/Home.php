<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['avg'] = $this->mymodel->selectWithQuery('SELECT AVG(return_tahun) as AVG from tbl_project_return');
		$data['project'] = $this->mymodel->selectWithQuery('SELECT count(id) as project from tbl_project WHERE status = "ENABLE" ');
		$data['harga'] = $this->mymodel->selectWithQuery('SELECT AVG(harga) as harga from tbl_project WHERE status = "ENABLE"');
		$data['users'] = $this->mymodel->selectWithQuery('SELECT count(id) as users from tbl_investor');
		$data['cara_pertama'] = $this->mymodel->selectDataOne('tbl_hows_work', array('id'=>1));
		$data['cara_kedua'] = $this->mymodel->selectDataOne('tbl_hows_work', array('id'=>2));
		$data['cara_ketiga'] = $this->mymodel->selectDataOne('tbl_hows_work', array('id'=>3));
		$data['cara_keempat'] = $this->mymodel->selectDataOne('tbl_hows_work', array('id'=>4));
		$data['tbl_project'] = $this->db->limit(3)->order_by('id', 'DESC')->get_where('tbl_project', array('public' => 'ENABLE'))->result_array();
		$data['file'] = $this->mymodel->selectWhere('file',array('table'=>'tbl_project'));
        $this->template->load('template/template','index', $data); 
	}
	
}