<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Howswork extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}



	public function index(){
		$data['page_name'] = "Cara Kerja";
		$this->template->load('admin/template/template','admin/hows_work/index',$data);
	}

	public function create(){
		$this->load->view('admin/hows_work/create');
	}

	public function validate(){
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[title]', '<strong>Title</strong>', 'required');
		$this->form_validation->set_rules('dt[value]', '<strong>Value</strong>', 'required');
	}



	public function store(){
		$this->validate();
		if ($this->form_validation->run() == FALSE){
			$this->alert->alertdanger(validation_errors());     
		}else{
			$dt = $_POST['dt'];
			$dt['created_at'] = date('Y-m-d H:i:s');
			$dt['status'] = "ENABLE";
			$str = $this->db->insert('tbl_hows_work', $dt);
			$last_id = $this->db->insert_id();$this->alert->alertsuccess('Success Send Data');   
		}
	}

	public function json(){
		$status = $_GET['status'];
		if($status==''){
			$status = 'ENABLE';
		}
		header('Content-Type: application/json');
		$this->datatables->select('id,title,value,status');
		$this->datatables->where('status',$status);
		$this->datatables->from('tbl_hows_work');
		if($status=="ENABLE"){
			$this->datatables->add_column('view', '<div class="btn-group"><button type="button" class="btn btn-sm btn-primary" onclick="edit($1)"><i class="fa fa-pencil"></i> Edit</button></div>', 'id');
		}else{
			$this->datatables->add_column('view', '<div class="btn-group"><button type="button" class="btn btn-sm btn-primary" onclick="edit($1)"><i class="fa fa-pencil"></i> Edit</button><button type="button" onclick="hapus($1)" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Hapus</button></div>', 'id');
		}
		echo $this->datatables->generate();
	}

	public function edit($id){
		$data['tbl_hows_work'] = $this->mymodel->selectDataone('tbl_hows_work',array('id'=>$id));$data['page_name'] = "tbl_hows_work";
		$this->load->view('admin/hows_work/edit',$data);
	}

	public function update(){
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->validate();
		if ($this->form_validation->run() == FALSE){
			$this->alert->alertdanger(validation_errors());     
		}else{
			$id = $this->input->post('id', TRUE);		$dt = $_POST['dt'];
			$dt['updated_at'] = date("Y-m-d H:i:s");
			$this->mymodel->updateData('tbl_hows_work', $dt , array('id'=>$id));
			$this->alert->alertsuccess('Success Update Data'); 
		}
	}


	public function delete(){
		$id = $this->input->post('id', TRUE);$this->alert->alertdanger('Success Delete Data');     
	}

	public function status($id,$status){
		$this->mymodel->updateData('tbl_hows_work',array('status'=>$status),array('id'=>$id));
		redirect('master/Tbl_hows_work');
	}
}