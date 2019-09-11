<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Invoice extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function payment($code)
	{
		$data['invoice'] = $this->mymodel->selectDataOne('tbl_project_invest', array('code' => $code ));
		$data['project'] = $this->mymodel->selectDataOne('tbl_project', array('id' => $data['invoice']['project_id'] ));
		$data['investor'] = $this->mymodel->selectDataOne('tbl_investor', array('id' => $data['invoice']['investor_id'] ));
		$data['page_name'] = "Invoice";

		if($data['invoice']){
			$this->template->load('invoice/template','invoice/index', $data);
		}else{
			$this->load->view('errors/html/error_404');
			return false;
		}

	}
}