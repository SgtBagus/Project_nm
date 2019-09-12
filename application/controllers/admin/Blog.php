	<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Blog extends MY_Controller {
		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$data['page_name'] = "Blog";

			$tbl_blog = $this->mymodel->selectData('tbl_blog');
			$data['tbl_blog'] = $tbl_blog;

			if($this->session->userdata('role_id') != '17'){
				$this->load->view('errors/html/error_404.php');
			}else{
				$this->template->load('admin/template/template','admin/blog/index', $data);	
			}
		}

		public function create(){
			$data['page_name'] = "Blog";

			if($this->session->userdata('role_id') != '17'){
				$this->load->view('errors/html/error_404.php');
			}else{
				$this->template->load('admin/template/template','admin/blog/create', $data);
			}
		}


		public function validate(){

			$this->form_validation->set_error_delimiters('<li>', '</li>');
			$this->form_validation->set_rules('dt[title]', '<strong>Judul Blog</strong> Tidak Boleh Kosong', 'required');
			$this->form_validation->set_rules('dt[slug]', '<strong>Slug Blog</strong> Tidak Boleh Kosong', 'required');

			$supported_file = array(
				'jpg', 'jpeg', 'png'
			);

			$src_file_name = $_FILES['file']['name'];

			if($src_file_name){
				$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));

				if (!in_array($ext, $supported_file)) {
					$this->form_validation->set_rules('dt[gambar]', '<strong>Gambar Proyek</strong> Harus berformat PNG, JPG, JPEG', 'required');
				}
			}
			$this->form_validation->set_message('required', '%s');
		}


		public function store(){
			$this->validate();
			if ($this->form_validation->run() == FALSE){
				$this->alert->alertdanger(validation_errors());
			}else{
				$dt = $_POST['dt'];
				$dt['user_id'] = $this->session->userdata('id');
				$dt['view'] = 0;
				$dt['created_at'] = date('Y-m-d H:i:s');
				$dt['public'] = "ENABLE";
				$dt['status'] = "ENABLE";

				$str = $this->db->insert('tbl_blog', $dt);
				$last_id = $this->db->insert_id();
				if (!empty($_FILES['file']['name'])){
					$dir  = "webfile/blog/";
					$config['upload_path']          = $dir;
					$config['allowed_types']        = '*';
					$config['file_name']           = md5('smartsoftstudio').rand(1000,100000);

					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('file')){
						$error = $this->upload->display_errors();
						$this->alert->alertdanger($error);
					}else{
						$file = $this->upload->data();
						$data = array(
							'id' => '',
							'name'=> $file['file_name'],
							'mime'=> $file['file_type'],
							'dir'=> $dir.$file['file_name'],
							'table'=> 'tbl_blog',
							'table_id'=> $last_id,
							'status'=>'ENABLE',
							'created_at'=>date('Y-m-d H:i:s')
						);
						$str = $this->db->insert('file', $data);
					}
				}else{
					$data = array(
						'id' => '',
						'name'=> 'default.png',
						'mime'=> 'image/png',
						'dir'=> 'webfile/blog/default.png',
						'table'=> 'tbl_blog',
						'table_id'=> $last_id,
						'status'=>'ENABLE',
						'created_at'=>date('Y-m-d H:i:s')
					);
					$str = $this->db->insert('file', $data);
				}
				$this->alert->alertsuccess('Success Send Data');
			}
		}

		public function edit($id){
			$data['tbl_blog'] = $this->mymodel->selectDataone('tbl_blog',array('id'=>$id));
			$data['file'] = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'tbl_blog'));
			$data['page_name'] = "Blog";
			
			if($this->session->userdata('role_id') != '17'){
				$this->load->view('errors/html/error_404.php');
			}else{
				$this->template->load('admin/template/template','admin/blog/edit',$data);
			}
		}

		public function update(){

			$this->form_validation->set_error_delimiters('<li>', '</li>');
			$this->validate();

			if ($this->form_validation->run() == FALSE){
				$this->alert->alertdanger(validation_errors());
			}else{

				$id = $_POST['dt']['id'];

				if (!empty($_FILES['file']['name'])){
					$dir  = "webfile/blog/";
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
							'table'=> 'user',
							'table_id'=> $id,
							'updated_at'=>date('Y-m-d H:i:s')
						);
						$file = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'tbl_blog'));
						@unlink($file['dir']);
						if($file==""){
							$this->mymodel->insertData('file', $data);
						}else{
							$this->mymodel->updateData('file', $data , array('id'=>$file['id']));
						}
					}
				}
				$dt = $_POST['dt'];
				$dt['updated_at'] = date("Y-m-d H:i:s");
				$this->mymodel->updateData('tbl_blog', $dt , array('id'=>$id));
				$this->alert->alertsuccess('Success Update Data');  
			}
		}

		public function delete(){
			$id = $_GET['id'];
			$file = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'tbl_blog'));
			unlink($file['dir']);

			$this->mymodel->deleteData('tbl_blog',array('id'=>$id));
			$this->mymodel->deleteData('file',array('table_id'=>$id,'table'=>'tbl_blog'));
			$this->session->set_flashdata('message', 'Success Delete Data');
			$this->session->set_flashdata('class', 'success');

			header('Location: '.base_url('admin/blog/'));
		}
	}