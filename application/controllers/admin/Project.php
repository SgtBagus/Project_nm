<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Project extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['page_name'] = "Project";
		$this->template->load('admin/template/template','admin/project/index', $data);
	}

	public function create(){
		$data['page_name'] = "Project";
		$this->template->load('admin/template/template','admin/project/create', $data);
	}

	public function validate(){


		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[title]', '<strong>Judul Proyek</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[slug]', '<strong>Slug Proyek</strong> Tidak Boleh Kosong', 'required');
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

		$this->form_validation->set_rules('dt[harga]', '<strong>Harga Proyek</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[unit]', '<strong>Unit</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[total_harga]', '<strong>Total Harga</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[total_harga]', '<strong>Total Harga</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[periode]', 'Detail : <strong>Periode </strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[return]', 'Detail : <strong>Return Didapat </strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[bagi_hasil]', 'Detail : <strong>Periode Bagi Hasil</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_message('required', '%s');
	}

	public function store(){
		$this->validate();
		if ($this->form_validation->run() == FALSE){
			$this->alert->alertdanger(validation_errors());     
		}else{
			$dt = $_POST['dt'];
			$dt['user_id'] = $this->session->userdata('id');
			$dt['harga'] = str_replace( ',', '', $dt['harga'] );
			$dt['unit'] = str_replace( ',', '', $dt['unit'] );
			$dt['total_harga'] = str_replace( ',', '', $dt['total_harga'] );
			$dt['created_at'] = date('Y-m-d H:i:s');
			$dt['status'] = "ENABLE";

			$slug_folder = $dt['slug'];
			$str = $this->db->insert('tbl_project', $dt);
			$last_id = $this->db->insert_id();	    
			if (!empty($_FILES['file']['name'])){
				mkdir('webfile/project/'.$slug_folder, 0777, true);
				$dir  = "webfile/project/".$slug_folder;
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
						'table'=> 'tbl_project',
						'table_id'=> $last_id,
						'status'=>'ENABLE',
						'created_at'=>date('Y-m-d H:i:s')
					);
					$str = $this->db->insert('file', $data); 
				}
			}
			$this->alert->alertsuccess('Success Send Data');   
		}
	}

	public function json(){
		$status = $_GET['status'];
		if($status==''){
			$status = 'ENABLE';
		}

		header('Content-Type: application/json');
		$this->datatables->select('id,user_id,title,harga,slug,unit,total_harga,periode,return,bagi_hasil,deskripsi,url_map,status');
		$this->datatables->where('status',$status);
		$this->datatables->from('tbl_project');
		if($status=="ENABLE"){
			$this->datatables->add_column('view', '<div class="btn-group"><button type="button" class="btn btn-sm btn-primary" onclick="edit($1)"><i class="fa fa-pencil"></i> Edit</button></div>', 'id');
		}else{
			$this->datatables->add_column('view', '<div class="btn-group"><button type="button" class="btn btn-sm btn-primary" onclick="edit($1)"><i class="fa fa-pencil"></i> Edit</button><button type="button" onclick="hapus($1)" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Hapus</button></div>', 'id');
		}
		echo $this->datatables->generate();
	}

	public function edit($id){
		$data['tbl_project'] = $this->mymodel->selectDataone('tbl_project',array('id'=>$id));$data['file'] = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'tbl_project'));$data['page_name'] = "tbl_project";
		$this->template->load('template/template','master/tbl_project/edit-tbl_project',$data);
	}

	public function update(){
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->validate();

		if ($this->form_validation->run() == FALSE){
			$this->alert->alertdanger(validation_errors());     
		}else{
			$id = $this->input->post('id', TRUE);
			if (!empty($_FILES['file']['name'])){
				$dir  = "webfile/";
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
						'table'=> 'tbl_project',
						'table_id'=> $id,
						'updated_at'=>date('Y-m-d H:i:s')
					);
					$file = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'tbl_project'));
					@unlink($file['dir']);
					if($file==""){
						$this->mymodel->insertData('file', $data);
					}else{
						$this->mymodel->updateData('file', $data , array('id'=>$file['id']));
					}
					$dt = $_POST['dt'];
					$dt['updated_at'] = date("Y-m-d H:i:s");
					$this->mymodel->updateData('tbl_project', $dt , array('id'=>$id));
					$this->alert->alertsuccess('Success Update Data');  
				}
			}else{
				$dt = $_POST['dt'];
				$dt['updated_at'] = date("Y-m-d H:i:s");
				$this->mymodel->updateData('tbl_project', $dt , array('id'=>$id));
				$this->alert->alertsuccess('Success Update Data');  
			}
		}
	}

	public function delete(){
		$id = $this->input->post('id', TRUE);$file = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'tbl_project'));
		@unlink($file['dir']);
		$this->mymodel->deleteData('file',  array('table_id'=>$id,'table'=>'tbl_project'));
		$this->mymodel->deleteData('tbl_project',  array('id'=>$id));$this->alert->alertdanger('Success Delete Data');     
	}

	public function status($id,$status){
		$this->mymodel->updateData('tbl_project',array('status'=>$status),array('id'=>$id));
		redirect('master/Tbl_project');
	}
}

?>