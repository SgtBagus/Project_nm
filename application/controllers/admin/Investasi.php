<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Investasi extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){

		if($this->session->userdata('role_id') == '17'){
			$data['tbl_project_invest'] = $this->mymodel->selectWithQuery("SELECT a.id as user_id, b.id as project_id, c.* FROM tbl_project_invest c INNER JOIN tbl_project b ON c.project_id = b.id INNER JOIN user a ON b.user_id = a.id ORDER BY created_at DESC");
		}else{
			$data['tbl_project_invest'] = $this->mymodel->selectWithQuery("SELECT a.id as user_id, b.id as project_id, c.* FROM tbl_project_invest c INNER JOIN tbl_project b ON c.project_id = b.id INNER JOIN user a ON b.user_id = a.id WHERE a.id = ".$this->session->userdata('id')." ORDER BY created_at DESC");
		}
		$data['page_name'] = "Investasi";
		$this->template->load('admin/template/template','admin/investasi/index', $data); 
	}

	public function approve($id){

		$data = array(
			'status_pembayaran' => 'APPROVE',
			'tgl_konfirmasi' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		);
		$this->mymodel->updateData('tbl_project_invest', $data , array('id'=>$id));
		$this->alert->alertsuccess('Success Update Data');  
	}
	
	public function reject($id){

		$data = array(
			'status_pembayaran' => 'REJECT',
			'tgl_konfirmasi' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		);

		$this->mymodel->updateData('tbl_project_invest', $data , array('id'=>$id));
		$this->alert->alertsuccess('Success Update Data');  
	}


	public function view($id){
		$data['tbl_project_invest'] = $this->mymodel->selectDataone('tbl_project_invest', array('id'=>$id)) ;
		$data['project'] = $this->mymodel->selectDataOne('tbl_project', array('id' => $data['tbl_project_invest']['project_id'] ));
		$data['investor'] = $this->mymodel->selectDataOne('tbl_investor', array('id' => $data['tbl_project_invest']['investor_id'] ));
		$data['file'] =  $this->mymodel->selectDataOne('file', array('table_id' => $data['investor']['id'], 'table' => 'tbl_investor'));
		$data['file_project'] =  $this->mymodel->selectDataOne('file', array('table_id' => $data['project']['id'], 'table' => 'tbl_project'));
		$data['file_invest'] =  $this->mymodel->selectDataOne('file', array('table_id' => $data['tbl_project_invest']['id'], 'table' => 'tbl_project_invest'));
		$data['page_name'] = "Investasi";
		$this->template->load('admin/template/template','admin/investasi/view', $data); 
	}

	public function sumbitImage($id){
		if (!empty($_FILES['file']['name'])){
			$dir  = "webfile/invest/";
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
					'dir'=> $dir.$file['file_name'],
					'table'=> 'tbl_project_invest',
					'table_id'=> $id,
					'created_at'=>date('Y-m-d H:i:s'),
					'updated_at'=>date('Y-m-d H:i:s'),
					'status' => 'ENABLE',
				);

				$file_dir = $this->mymodel->selectDataone('file', array('table_id' => $id, 'table' => 'tbl_project_invest'));
				if($file_dir['name']){
					@unlink($file_dir['dir']);
					$this->mymodel->updateData('file', $data , array('table_id'=>$id, 'table' => 'tbl_project_invest'));	
				}else{
					$this->mymodel->insertData('file', $data);	
				}
			}
		}
		$this->alert->alertsuccess('Success Send Data');   
	}

}