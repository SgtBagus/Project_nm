<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Investor extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['page_name'] = "Investor";
		$this->template->load('admin/template/template','admin/investor/index',$data);
	}

	public function view($id){
		$data['page_name'] = "Investor";
		$data['tbl_investor'] = $this->mymodel->selectDataone('tbl_investor',array('id'=>$id));
		$data['file'] = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'tbl_investor'));
		$this->template->load('admin/template/template','admin/investor/view',$data);
	}

	public function create(){
		$data['page_name'] = "Investor";
		$this->template->load('admin/template/template','admin/investor/create',$data);
	}

	public function validate(){
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[name]', '<strong>Name</strong>', 'required');
		$this->form_validation->set_rules('dt[email]', '<strong>Email</strong>', 'required');
		$this->form_validation->set_rules('dt[address]', '<strong>Address</strong>', 'required');
		$this->form_validation->set_rules('dt[phone]', '<strong>Phone</strong>', 'required');
	}

	public function store(){
		$this->validate();
		if ($this->form_validation->run() == FALSE){
			$this->alert->alertdanger(validation_errors());     
		}else{
			$dt = $_POST['dt'];
			$dt['created_at'] = date('Y-m-d H:i:s');
			$dt['status'] = "ENABLE";
			$str = $this->db->insert('tbl_investor', $dt);
			$last_id = $this->db->insert_id();	    
			if (!empty($_FILES['file']['name'])){
				$dir  = "webfile/users/";
				$config['upload_path']          = $dir;
				$config['allowed_types']        = '*';
				$config['file_name']           = md5('smartsoftstudio').rand(1000,100000);

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('file')){
					$error = $this->upload->display_errors();
					$this->alert->alertdanger($error);		
				}else{
					$file = $this->upload->data();
					$data = array(
						'id' => '',
						'name'=> $file['file_name'],
						'mime'=> $file['file_type'],
						'dir'=> $dir.$file['file_name'],
						'table'=> 'tbl_investor',
						'table_id'=> $last_id,
						'status'=>'ENABLE',
						'created_at'=>date('Y-m-d H:i:s')
					);

					$str = $this->db->insert('file', $data);
					$this->alert->alertsuccess('Success Send Data');    
				} 
			}else{
				$data = array(
					'id' => '',
					'name'=> '',
					'mime'=> '',
					'dir'=> '',
					'table'=> 'tbl_investor',
					'table_id'=> $last_id,
					'status'=>'ENABLE',
					'created_at'=>date('Y-m-d H:i:s')
				);
				$str = $this->db->insert('file', $data);
				$this->alert->alertsuccess('Success Send Data');
			}
		}
	}

	public function json(){
		header('Content-Type: application/json');
		$this->datatables->select('id,name,email,address,phone');
		$this->datatables->from('tbl_investor');
		$this->datatables->add_column('view', 
			'<div class="btn-group">
				<button type="button" class="btn btn-primary" onclick="view($1)"><i class="fa fa-eye"></i></button>
				<button type="button" class="btn btn-info" onclick="edit($1)"><i class="fa fa-edit"></i></button>
				<button type="button" class="btn btn-danger" onclick="hapus($1)"><i class="fa fa-trash"></i></button>
			</div>', 'id');
		echo $this->datatables->generate();
	}

	public function edit($id){
		$data['tbl_investor'] = $this->mymodel->selectDataone('tbl_investor',array('id'=>$id));
		$data['file'] = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'tbl_investor'));
		$data['page_name'] = "Investor";
		$this->template->load('admin/template/template','admin/investor/edit',$data);
	}

	public function update(){
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->validate();

		if ($this->form_validation->run() == FALSE){
			$this->alert->alertdanger(validation_errors());     
		}else{
			$id = $this->input->post('id', TRUE);
			if (!empty($_FILES['file']['name'])){
				$dir  = "webfile/users";
				$config['upload_path']          = $dir;
				$config['allowed_types']        = '*';
				$config['file_name']           = md5('smartsoftstudio').rand(1000,100000);
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('file')){
					$error = $this->upload->display_errors();
					$this->alert->alertdanger($error);		
				}else{
					$file = $this->upload->data();
					$data = array(
						'name'=> $file['file_name'],
						'mime'=> $file['file_type'],
						// 'size'=> $file['file_size'],
						'dir'=> $dir.$file['file_name'],
						'table'=> 'tbl_investor',
						'table_id'=> $id,
						'updated_at'=>date('Y-m-d H:i:s')
					);
					$file = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'tbl_investor'));
					@unlink($file['dir']);
					if($file==""){
						$this->mymodel->insertData('file', $data);
					}else{
						$this->mymodel->updateData('file', $data , array('id'=>$file['id']));
					}

					$dt = $_POST['dt'];
					$dt['updated_at'] = date("Y-m-d H:i:s");
					$this->mymodel->updateData('tbl_investor', $dt , array('id'=>$id));
					$this->alert->alertsuccess('Success Update Data');  
				}
			}else{
				$dt = $_POST['dt'];
				$dt['updated_at'] = date("Y-m-d H:i:s");
				$this->mymodel->updateData('tbl_investor', $dt , array('id'=>$id));
				$this->alert->alertsuccess('Success Update Data');  
			}
		}
	}

	public function delete(){
		$id = $this->input->post('id', TRUE);$file = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'tbl_investor'));
		@unlink($file['dir']);
		$this->mymodel->deleteData('file',  array('table_id'=>$id,'table'=>'tbl_investor'));
		$this->mymodel->deleteData('tbl_investor',  array('id'=>$id));$this->alert->alertdanger('Success Delete Data');     
	}

	public function status($id,$status){
		$this->mymodel->updateData('tbl_investor',array('status'=>$status),array('id'=>$id));
		header('Location: '.base_url('admin/investor'));
	}
}