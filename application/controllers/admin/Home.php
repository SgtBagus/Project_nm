<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$project = $this->mymodel->selectData('tbl_project');

		if( $this->session->userdata('role_id') == '17'){
			$data['Totalproyek'] = $this->mymodel->selectWithQuery("SELECT COUNT(id) as total FROM tbl_project");
			$data['AVGpersent'] = $this->mymodel->selectWithQuery("SELECT AVG(return_tahun) as persent FROM tbl_project_return");
			$data['SUMReturn'] = $this->mymodel->selectWithQuery("SELECT SUM(total_harga) as SUM FROM tbl_project");
			$data['AVGReturn'] = $this->mymodel->selectWithQuery("SELECT AVG(total_harga) as AVG FROM tbl_project");

			$data['AVGpersentyear1'] = $this->mymodel->selectWithQuery("SELECT AVG(return_tahun) as year1 FROM tbl_project_return WHERE Tahun = '1'");
			$data['AVGpersentyear2'] = $this->mymodel->selectWithQuery("SELECT AVG(return_tahun) as year2 FROM tbl_project_return WHERE Tahun = '2'");
			$data['AVGpersentyear3'] = $this->mymodel->selectWithQuery("SELECT AVG(return_tahun) as year3 FROM tbl_project_return WHERE Tahun = '3'");
			$data['AVGpersentyear4'] = $this->mymodel->selectWithQuery("SELECT AVG(return_tahun) as year4 FROM tbl_project_return WHERE Tahun = '4'");
			$data['AVGpersentyear5'] = $this->mymodel->selectWithQuery("SELECT AVG(return_tahun) as year5 FROM tbl_project_return WHERE Tahun = '5'");

			
			$data['tbl_project'] = $this->db->limit(5)->get_where('tbl_project', array('public' => 'ENABLE'))->result_array();
			$data['tbl_project_all'] = $this->mymodel->selectData("tbl_project");

		}else{
			$data['Totalproyek'] = $this->mymodel->selectWithQuery("SELECT COUNT(id) as total FROM tbl_project WHERE user_id = '".$this->session->userdata('id')."'");

			$data['SUMReturn'] = $this->mymodel->selectWithQuery("SELECT SUM(total_harga) as SUM FROM tbl_project WHERE user_id = '".$this->session->userdata('id')."'");

			$data['AVGReturn'] = $this->mymodel->selectWithQuery("SELECT AVG(total_harga) as AVG FROM tbl_project WHERE user_id = '".$this->session->userdata('id')."'");
			$data['tbl_project'] = $this->db->limit(5)->get_where('tbl_project', array('public' => 'ENABLE'))->result_array();
			$data['tbl_project_all'] = $this->mymodel->selectData("tbl_project");
		}

		$data['InvestorJOIN'] = $this->mymodel->selectWithQuery("SELECT COUNT(id) as InvestorJOIN FROM tbl_investor");
		$data['investor'] = $this->db->limit(6)->get_where('tbl_investor')->result_array();

		$data['page_name'] = "Dashboard";
		$this->template->load('admin/template/template','admin/index', $data); 
	}
	
}