<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){	
		$data['user'] = $this->mymodel->selectDataOne('tbl_investor',  array('id' => $this->session->userdata('id')));
		$data['file'] = $this->mymodel->selectDataOne('file',  array('table_id' => $data['user']['id'], 'table' => 'tbl_investor'));

		$data['invest'] = $this->mymodel->selectData('tbl_project_invest', array('investor_id' => $this->session->userdata('id')));
		$sum_harga = $this->mymodel->selectWithQuery("SELECT SUM(total_harga) as total_harga FROM tbl_project_invest WHERE investor_id = ".$this->session->userdata('id'));
		$count_project = $this->mymodel->selectWithQuery("SELECT count(id) as total_prj FROM tbl_project_invest WHERE investor_id = ".$this->session->userdata('id'));

		$data['total_harga'] = $sum_harga[0]['total_harga'];
		$data['total_project'] = $count_project[0]['total_prj'];
		$data['title'] = "Dashboard";
		$data['content'] = "dashboard";
		$this->template->load('template/template','dashboard/index', $data);
	}

	public function account(){
		$data['user'] = $this->mymodel->selectDataOne('tbl_investor',  array('id' => $this->session->userdata('id')));
		$data['file'] = $this->mymodel->selectDataOne('file',  array('table_id' => $data['user']['id'], 'table' => 'tbl_investor'));
		$data['title'] = "Akun Saya";
		$data['content'] = "account";
		$this->template->load('template/template','dashboard/index', $data);
	}

	public function notif(){
		$data['user'] = $this->mymodel->selectDataOne('tbl_investor',  array('id' => $this->session->userdata('id')));
		$data['file'] = $this->mymodel->selectDataOne('file',  array('table_id' => $data['user']['id'], 'table' => 'tbl_investor'));
		$data['title'] = "Notifikasi";
		$data['content'] = "notif";
		$this->template->load('template/template','dashboard/index', $data);
	}	


	public function validate(){

		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[name]', '<strong>Nama Lengkap</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[phone]', '<strong>Nomor Whatsapp</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[email]', '<strong>Email</strong> Tidak Boleh Kosong', 'required');

		$supported_file = array(
			'jpg', 'jpeg', 'png'
		);
		
		$src_file_name = $_FILES['file']['name'];

		if($src_file_name){
			$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); 

			if (!in_array($ext, $supported_file)) {
				$this->form_validation->set_rules('dt[gambar]', '<strong>Gambar Profil</strong> Harus berformat PNG, JPG, JPEG', 'required');
			} 	
		}

		$this->form_validation->set_message('required', '%s');
	}

	public function editaccount(){
		$this->validate();
		if ($this->form_validation->run() == FALSE){
			$this->alert->alertdanger(validation_errors());     
		}else{
			$id = $this->session->userdata('id');
			$dt = $_POST['dt'];
			$dt['updated_at'] = date("Y-m-d H:i:s");
			$this->mymodel->updateData('tbl_investor', $dt , array('id'=>$id));

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
						'name'=> $file['file_name'],
						'mime'=> $file['file_type'],
						'dir'=> $dir.$file['file_name'],
						'table'=> 'tbl_investor',
						'table_id'=> $id,
						'updated_at'=>date('Y-m-d H:i:s')
					);

					$file_dir = $this->mymodel->selectDataone('file', array('table_id' => $id, 'table' => 'tbl_investor'));
					@unlink($file_dir['dir']);

					$this->mymodel->updateData('file', $data , array('table_id'=>$id, 'table' => 'tbl_investor'));
				}
			}

			$this->alert->alertsuccess('Success Send Data');   
		}
	}

}