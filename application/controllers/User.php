<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function password(){
		$data['page_name'] = "password";
		$this->template->load('template/template','user/password',$data); 
	}

	public function register(){
		$data['page_name'] = "register";
		$this->template->load('template/template','user/register',$data); 
	}


	public function validate(){
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[name]', '<strong>Name</strong> Tidak Boleh Kosong', 'required');

		$this->form_validation->set_message('required', '%s');
	}

	public function register_proses(){
		$this->validate();
		if ($this->form_validation->run() == FALSE){
			$this->alert->alertdanger(validation_errors());     
		}else{
			$email_query = $this->mymodel->selectWhere('tbl_investor', array('email' => $_POST['dt']['email']));
			if($email_query != null){
				$this->alert->alertdanger('<strong>Email</strong> tersebut sudah Terdaftar');   
				return false;  
			}else{
				$dt = $_POST['dt'];
				$dt['status'] = "ENABLE";
				$dt['created_at'] = date('Y-m-d H:i:s');
				$dt['updated_at'] = date('Y-m-d H:i:s');

				$str = $this->db->insert('tbl_investor', $dt);

				$file['name'] = 'default.png';
				$file['mime'] = 'image/png';
				$file['dir'] = 'webfile/users/default.png';
				$file['table'] = 'tbl_investor';
				$file['table_id'] = $this->db->insert_id();	    
				$file['status'] = 'ENABLE';
				$file['created_at'] = date('Y-m-d H:i:s');
				$file['updated_at'] = date('Y-m-d H:i:s');
				
				$str = $this->db->insert('file', $file);

				$this->alert->alertsuccess('Akun Sudah Terdaftar Silakan Login Menggunakan Email Terdaftar');
			}
		}
	}
}