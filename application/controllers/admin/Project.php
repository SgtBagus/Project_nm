<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Project extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['page_name'] = "Project";

		$tbl_project = $this->mymodel->selectData('tbl_project');
		if($this->session->userdata('role_id') == '18'){
			$tbl_project = $this->mymodel->selectWhere('tbl_project',  array('user_id' => $this->session->userdata('id')));
		}

		$data['tbl_project'] = $tbl_project;
		$this->template->load('admin/template/template','admin/project/index', $data);
	}

	public function create(){
		$data['page_name'] = "Project";

		if($this->session->userdata('role_id') == '17'){
			$this->template->load('admin/template/template','admin/project/create', $data);
		}else{
			$this->load->view('errors/html/error_404.php');
		}
	}

	public function validate(){

		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[title]', '<strong>Judul Proyek</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[user_id]', '<strong>Hak Milik Proyek</strong> Harus Di Pilih', 'required');
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

		$image_detail_row = count($_FILES["file_many"]['name']);
		if($image_detail_row > 6){
			$this->form_validation->set_rules('file[image_detail]', '<strong>Detail Gambar </strong> Maksimal Berjumlah 6 File', 'required');
		}

		if($_FILES["file_many"]["name"][0] != null){
			for ($i=0; $i < $image_detail_row; $i++) {
				$src_file_name_detail = $_FILES["file_many"]["name"][$i];
				if($src_file_name_detail){
					$ext_detail = strtolower(pathinfo($src_file_name_detail, PATHINFO_EXTENSION));
					if (!in_array($ext_detail, $supported_file)) {
						$this->form_validation->set_rules('file[image_detail]', '<strong>Detail Gambar </strong> Harus berformat PNG, JPG, JPEG semuanya', 'required');
					}
				}
			}
		}

		$this->form_validation->set_rules('dt[harga]', '<strong>Harga Proyek</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[modal_back]', '<strong>Pengembalian Modal</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[unit]', '<strong>Unit</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[total_harga]', '<strong>Total Harga</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_message('required', '%s');
	}

	public function return_validate(){
		$this->form_validation->set_rules('dt[return_tahun]', '<strong>Return Didapat </strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_message('required', '%s');
	}

	public function addReturn($id){
		$this->return_validate();
		if ($this->form_validation->run() == FALSE){
			$this->alert->alertdanger(validation_errors());
		}else{
			$project = $this->mymodel->selectDataOne('tbl_project', array('id' => $id));

			$periode = 0;
			if($project['periode']){
				$periode = $project['periode'];
			}

			$return = $this->mymodel->selectWithQuery("SELECT count(id) as return_row FROM tbl_project_return WHERE project_id = $id");
			$public = "DISABLE";
			if($return[0][return_row] == '0'){
				$public = "ENABLE";
			}

			$dt = $_POST['dt'];
			$dt['project_id'] = $id;
			$dt['tahun'] = $periode+1;
			$dt['public'] = $public;
			$dt['status'] = "ENABLE";
			$dt['created_at'] = date('Y-m-d H:i:s');
			$this->db->insert('tbl_project_return', $dt);

			$prj['periode'] = $periode+1;
			$prj['bagi_hasil'] = '1';
			$prj['public'] = "ENABLE";
			$prj['status'] = "ENABLE";
			$this->mymodel->updateData('tbl_project', $prj , array('id'=>$id));
			$this->alert->alertsuccess('Success Send Data');
		}
	}

	public function editReturn($id){
		$this->return_validate();
		if ($this->form_validation->run() == FALSE){
			$this->alert->alertdanger(validation_errors());
		}else{
			$dt = $_POST['dt'];
			$dt['updated_at'] = date('Y-m-d H:i:s');
			$this->mymodel->updateData('tbl_project_return', $dt , array('id'=>$id));

			$this->alert->alertsuccess('Success Send Data');
		}
	}

	public function delReturn(){
		$return = $this->mymodel->selectDataOne('tbl_project_return', array('id' => $_POST['id']));
		$project = $this->mymodel->selectDataOne('tbl_project', array('id' => $return['project_id']));

		$periode = $project['periode'];
		$prj['periode'] = $periode-1;

		$this->mymodel->deleteData('tbl_project_return',  array('id'=>$_POST['id']));
		$this->mymodel->updateData('tbl_project', $prj , array('id'=>$project['id']));

		$return = $this->mymodel->selectWithQuery("SELECT count(id) as return_row FROM tbl_project_return WHERE project_id = ".$_POST['id']);

		if($return[0][return_row] == '0'){
			$prj['public'] = "DISABLE";
			$prj['status'] = "DISABLE";
			$this->mymodel->updateData('tbl_project', $prj , array('id'=>$id));
		}

		$this->alert->alertsuccess('Berhasil Hapus Data');
	}

	public function store(){
		$this->validate();
		if ($this->form_validation->run() == FALSE){
			$this->alert->alertdanger(validation_errors());
		}else{
			$dt = $_POST['dt'];
			if($this->session->userdata('role_id') != '17'){
				$dt['user_id'] = $this->session->userdata('id');
			}
			$dt['harga'] = str_replace( ',', '', $dt['harga'] );
			$dt['unit'] = str_replace( ',', '', $dt['unit'] );
			$dt['total_harga'] = str_replace( ',', '', $dt['total_harga'] );
			$dt['modal_back'] = str_replace( ',', '', $dt['modal_back'] );
			$dt['created_at'] = date('Y-m-d H:i:s');
			$dt['public'] = "DISABLE";
			$dt['status'] = "DISABLE";
			$slug_folder = $dt['slug'];

			mkdir('webfile/project/'.$slug_folder, 0777, true);
			$str = $this->db->insert('tbl_project', $dt);
			$last_id = $this->db->insert_id();
			if (!empty($_FILES['file']['name'])){
				$dir  = "webfile/project/".$slug_folder."/";
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

			if (!empty($_FILES['file_many']['name'])){
				$countfiles = count($_FILES['file_many']['name']);

				for($i=0;$i<$countfiles;$i++){

					if(!empty($_FILES['file_many']['name'][$i])){

						$_FILES['file']['name'] = $_FILES['file_many']['name'][$i];
						$_FILES['file']['type'] = $_FILES['file_many']['type'][$i];
						$_FILES['file']['tmp_name'] = $_FILES['file_many']['tmp_name'][$i];
						$_FILES['file']['error'] = $_FILES['file_many']['error'][$i];
						$_FILES['file']['size'] = $_FILES['file_many']['size'][$i];

						$dir  = "webfile/project/".$slug_folder."/";
						$config['upload_path']          = $dir;
						$config['allowed_types']        = '*';
						$config['file_name']           = md5('smartsoftstudio').rand(1000,100000);

						$this->load->library('upload',$config);

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
								'table'=> 'tbl_project_gambar',
								'table_id'=> $last_id,
								'status'=>'ENABLE',
								'created_at'=>date('Y-m-d H:i:s')
							);
							$str = $this->db->insert('file', $data);
						}
					}

				}
				$this->alert->alertsuccess('Success Send Data');
			}
		}
	}

	public function view($id){
		$data['tbl_project'] = $this->mymodel->selectDataone('tbl_project',array('id'=>$id));
		$data['tbl_project_invest'] = $this->mymodel->selectWhere('tbl_project_invest',array('project_id'=>$id));
		$data['tbl_project_return'] = $this->mymodel->selectDataone('tbl_project_return', array('project_id'=>$data['tbl_project']['id'], 'public' => 'ENABLE'));
		$data['tbl_project_return_grafik'] = $this->mymodel->selectWhere('tbl_project_return', array('project_id'=>$data['tbl_project']['id']));
		$data['user'] = $this->mymodel->selectDataone('user',array('id'=>$data['tbl_project']['user_id']));
		$data['user_image'] = $this->mymodel->selectDataone('file',array('table_id'=>$data['user']['id'],'table'=>'user'));
		$data['file'] = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'tbl_project'));
		$data['file_detail'] = $this->mymodel->selectWhere('file',array('table_id'=>$id,'table'=>'tbl_project_gambar'));
		$data['page_name'] = "Project";
		if($data['tbl_project']){
			$this->template->load('admin/template/template','admin/project/view',$data);
		}else{
			$this->load->view('errors/html/error_404');
			return false;
		}
	}

	public function viewReturn($id){
		$data['tbl_project'] = $this->mymodel->selectDataone('tbl_project',array('id'=>$id));
		$data['tbl_project_return'] = $this->mymodel->selectWhere('tbl_project_return',array('project_id'=>$id));
		$data['page_name'] = "Project";


		if($data['tbl_project']){
			$this->template->load('admin/template/template','admin/project/viewReturn',$data);
		}else{
			$this->load->view('errors/html/error_404');
			return false;
		}

	}

	public function viewReturnEdit($id){
		$data['tbl_project_return'] = $this->mymodel->selectDataone('tbl_project_return', array('id'=>$id));
		$data['tbl_project'] = $this->mymodel->selectDataone('tbl_project', array('id'=>$data['tbl_project_return']['project_id']));
		$data['page_name'] = "Project";

		if($data['tbl_project_return']){
			$this->template->load('admin/template/template','admin/project/viewReturnEdit',$data);
		}else{
			$this->load->view('errors/html/error_404');
			return false;
		}

	}

	public function edit($id){
		$data['tbl_project'] = $this->mymodel->selectDataone('tbl_project',array('id'=>$id));
		$data['file'] = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'tbl_project'));
		$data['file_detail'] = $this->mymodel->selectWhere('file',array('table_id'=>$id,'table'=>'tbl_project_gambar'));
		$data['page_name'] = "Project";

		if($data['tbl_project']){
			$this->template->load('admin/template/template','admin/project/edit',$data);
		}else{
			$this->load->view('errors/html/error_404');
			return false;
		}

	}

	public function editImage($id){
		$data['tbl_project'] = $this->mymodel->selectDataone('tbl_project',array('id'=>$id));
		$data['file_detail'] = $this->mymodel->selectWhere('file',array('table_id'=>$id,'table'=>'tbl_project_gambar'));
		$data['page_name'] = "Project";

		if($data['tbl_project']){
			$this->template->load('admin/template/template','admin/project/editImage',$data);
		}else{
			$this->load->view('errors/html/error_404');
			return false;
		}

	}

	public function editOneImage($id){
		$data['file_detail'] = $this->mymodel->selectDataone('file',array('id'=>$id,'table'=>'tbl_project_gambar'));
		$data['tbl_project'] = $this->mymodel->selectDataone('tbl_project', array('id'=>$data['file_detail']['table_id']));
		$data['page_name'] = "Project";

		if($data['file_detail']){
			$this->template->load('admin/template/template','admin/project/editOneImage',$data);
		}else{
			$this->load->view('errors/html/error_404');
			return false;
		}
	}

	public function update(){

		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->validate();

		if ($this->form_validation->run() == FALSE){
			$this->alert->alertdanger(validation_errors());
		}else{
			$project_name = $this->mymodel->selectDataone('tbl_project', array('id' => $_POST['dt']['id']));
			$project_gambar_master = $this->mymodel->selectDataone('file', array('table_id' => $_POST['dt']['id'], 'table' => 'tbl_project'));
			$project_gambar_detail = $this->mymodel->selectWhere('file', array('table_id' => $_POST['dt']['id'], 'table' => 'tbl_project_gambar'));

			if($project_name['slug'] != $_POST['dt']['slug']){
				mkdir('webfile/project/'.$_POST['dt']['slug'], 0777, true);
				rename($project_gambar_master['dir'], 'webfile/project/'.$_POST['dt']['slug'].'/'.$project_gambar_master['name']);

				$file['dir'] = 'webfile/project/'.$_POST['dt']['slug'].'/'.$project_gambar_master['name'];
				$this->mymodel->updateData('file', $file , array('id'=>$project_gambar_master['id']));

				foreach($project_gambar_detail as $file_detail){
					rename($file_detail['dir'], 'webfile/project/'.$_POST['dt']['slug'].'/'.$file_detail['name']);

					$file_detail['dir'] = 'webfile/project/'.$_POST['dt']['slug'].'/'.$file_detail['name'];
					$this->mymodel->updateData('file', $file_detail , array('id'=>$file_detail['id']));
				}

				rmdir('webfile/project/'.$project_name['slug']);
			}

			if (!empty($_FILES['file']['name'])){
				$this->mymodel->deleteData('file',  array('table_id'=>$_POST['dt']['id'], 'table'=>'tbl_project' ));

				$dir  = "webfile/project/".$project_name['slug']."/";
				@unlink('webfile/project/'.$project_name['slug'].'/'.$project_gambar_master['name']);

				if($project_name['slug'] != $_POST['dt']['slug']){
					@unlink('webfile/project/'.$_POST['dt']['slug'].'/'.$project_gambar_master['name']);
					$dir  = "webfile/project/".$_POST['dt']['slug']."/";
				}

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
						'table_id'=> $_POST['dt']['id'],
						'status'=>'ENABLE',
						'created_at'=>date('Y-m-d H:i:s')
					);
					$str = $this->db->insert('file', $data);
				}
			}

			$dt = $_POST['dt'];

			if($this->session->userdata('role_id') != '17'){
				$dt['user_id'] = $this->session->userdata('id');
			}

			$dt['harga'] = str_replace( ',', '', $dt['harga'] );
			$dt['unit'] = str_replace( ',', '', $dt['unit'] );
			$dt['total_harga'] = str_replace( ',', '', $dt['total_harga'] );
			$dt['modal_back'] = str_replace( ',', '', $dt['modal_back'] );
			$dt['updated_at'] = date("Y-m-d H:i:s");
			$this->mymodel->updateData('tbl_project', $dt , array('id'=>$_POST['dt']['id']));
			$this->alert->alertsuccess('Success Update Data');
		}
	}

	public function delete(){
		$id = $this->input->post('id', TRUE);

		$project_slug = $this->mymodel->selectDataone('tbl_project', array('id' => $id));

		$files = glob('webfile/project/'.$project_slug['slug'].'/*');
		foreach($files as $file){
			if(is_file($file))
				unlink($file);
		}

		rmdir('webfile/project/'.$project_slug['slug']);

		$this->mymodel->deleteData('file',  array('table_id'=>$id,'table'=>'tbl_project'));
		$this->mymodel->deleteData('file',  array('table_id'=>$id,'table'=>'tbl_project_gambar'));
		$this->mymodel->deleteData('tbl_project',  array('id'=>$id));$this->alert->alertdanger('Success Delete Data');
	}

	public function add_image($id){
		$project_name = $this->mymodel->selectDataone('tbl_project', array('id' => $id));

		$project_image = $this->mymodel->selectWithQuery("SELECT count(id) as count from file WHERE table_id = '$id' AND file.table = 'tbl_project_gambar'");

		if($project_image[0]['count'] < 6){
			if (!empty($_FILES['file']['name'])){
				$dir  = "webfile/project/".$project_name['slug']."/";
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
						'table'=> 'tbl_project_gambar',
						'table_id'=> $id,
						'status'=>'ENABLE',
						'created_at'=>date('Y-m-d H:i:s')
					);
					$str = $this->db->insert('file', $data);
					header('Location: '.base_url('admin/project/editImage/'.$id));
				}
			}
			header('Location: '.base_url('admin/project/editImage/'.$id));
		}else{
			$this->alert->alertdanger('<strong>Detail Gambar</strong> Tidak bisa lebih dari 6 Gambar');
			return false;
		}
	}

	public function edit_images($id){

		$file_dir = $this->mymodel->selectDataone('file', array('id' => $id));

		$project_slug = $this->mymodel->selectDataone('tbl_project', array('id' => $file_dir['table_id']));
		if (!empty($_FILES['file']['name'])){
			$dir  = "webfile/project/".$project_slug['slug']."/";
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
					'table'=> 'tbl_project_gambar',
					'table_id'=> $project_slug['id'],
					'updated_at'=>date('Y-m-d H:i:s')
				);

				@unlink($file_dir['dir']);

				$this->mymodel->updateData('file', $data , array('id'=>$id));

				$this->alert->alertsuccess('Success Update Data');
				header('Location: '.base_url('admin/project/editImage/'.$project_slug['id']));
			}
		}
	}

	public function delete_image($id){
		$file_dir = $this->mymodel->selectDataone('file', array('id' => $id));
		$project_slug = $this->mymodel->selectDataone('tbl_project', array('id' => $file_dir['table_id']));
		@unlink($file_dir['dir']);

		$this->mymodel->deleteData('file',  array('id'=>$id));
		header('Location: '.base_url('admin/project/editImage/'.$project_slug['id']));
	}

	public function delete_Allimage($id){
		$project = $this->mymodel->selectDataone('tbl_project',  array('id'=>$id));
		$file_dir = $this->mymodel->selectWhere('file', array('table_id' => $id, 'table' => 'tbl_project_gambar'));
		foreach($file_dir as $dir){
			unlink($dir['dir']);
		}

		$this->mymodel->deleteData('file',  array('table_id'=>$id,'table'=>'tbl_project_gambar'));
		header('Location: '.base_url('admin/project/editImage/'.$project['id']));
	}

	public function status($id,$status){
		$this->mymodel->updateData('tbl_project',array('status'=>$status),array('id'=>$id));
		header('Location: '.base_url('admin/project'));
	}

	public function statusView_disable($id){
		$this->mymodel->updateData('tbl_project',array('status'=>'DISABLE'),array('id'=>$id));
		header('Location: '.base_url('admin/project/view/'.$id));
	}

	public function statusView_enable($id){
		$this->mymodel->updateData('tbl_project',array('status'=>'ENABLE'),array('id'=>$id));
		header('Location: '.base_url('admin/project/view/'.$id));
	}

	public function publicStatus($id,$status){
		$this->mymodel->updateData('tbl_project',array('public'=>$status),array('id'=>$id));
		header('Location: '.base_url('admin/project'));
	}

	public function statusPublic_disable($id){
		$this->mymodel->updateData('tbl_project',array('public'=>'DISABLE'),array('id'=>$id));
		header('Location: '.base_url('admin/project/view/'.$id));
	}

	public function statusPublic_enable($id){
		$this->mymodel->updateData('tbl_project',array('public'=>'ENABLE'),array('id'=>$id));
		header('Location: '.base_url('admin/project/view/'.$id));
	}

	public function publicStatusReturn($id){
		$return = $this->mymodel->selectDataone('tbl_project_return', array('id'=>$id));
		$project = $this->mymodel->selectDataone('tbl_project', array('id'=>$return['project_id']));

		$this->mymodel->updateData('tbl_project_return', array('public'=>'DISABLE'), array('project_id'=>$project['id']));
		$this->mymodel->updateData('tbl_project_return', array('public'=>'ENABLE'), array('id'=>$id));

		header('Location: '.base_url('admin/project/viewReturn/'.$project['id']));
	}


}

?>
