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
			$dt['public'] = "ENABLE";
			$dt['status'] = "ENABLE";

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

	public function json(){
		$status = $_GET['status'];
		if($status==''){
			$status = 'ENABLE';
		}

		header('Content-Type: application/json');
		$this->datatables->select('a.id,u.name,a.title,a.harga,a.unit,a.total_harga,a.periode,a.return,a.bagi_hasil,a.deskripsi,a.url_map,a.public,a.status');
		$this->datatables->join('user u','u.id=a.user_id','inner');
		$this->datatables->from('tbl_project a');
		$this->datatables->where('a.status',$status);

		if($this->session->userdata('role_id') == '18'){
			$this->datatables->where('a.user_id', $this->session->userdata('id'));			
		}

		if($status=="ENABLE"){
			$this->datatables->add_column('view', '<div class="btn-group"><button type="button" class="btn btn-sm btn-info" onclick="view($1)"><i class="fa fa-eye"></i></button><button type="button" class="btn btn-sm btn-primary" onclick="edit($1)"><i class="fa fa-edit"></i></button></div>', 'id');
		}else{
			$this->datatables->add_column('view', '<div class="btn-group"><button type="button" class="btn btn-sm btn-info" onclick="view($1)"><i class="fa fa-eye"></i></button><button type="button" class="btn btn-sm btn-primary" onclick="edit($1)"><i class="fa fa-edit"></i></button><button type="button" onclick="hapus($1)" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button></div>', 'id');
		}
		echo $this->datatables->generate();
	}

	public function investor_json($id){
		header('Content-Type: application/json');
		$this->datatables->select('a.id,inv.name,a.investor_id,a.unit,a.total_harga');
		$this->datatables->join('tbl_investor inv','inv.id=a.investor_id','inner');
		$this->datatables->from('tbl_project_invest a');
		$this->datatables->where('a.project_id',$id);
		$this->datatables->add_column('terima', '<div class="btn-group"><button type="button" class="btn btn-sm btn-primary" onclick="approve($1)"><i class="fa fa-check-circle"></i></button><button type="button" class="btn btn-sm btn-danger" onclick="reject($1)"><i class="fa fa-ban"></i></button></div>', 'id');
		echo $this->datatables->generate();
	}

	public function view($id){
		$data['tbl_project'] = $this->mymodel->selectDataone('tbl_project',array('id'=>$id));
		$data['user'] = $this->mymodel->selectDataone('user',array('id'=>$data['tbl_project']['user_id']));
		$data['user_image'] = $this->mymodel->selectDataone('file',array('table_id'=>$data['user']['id'],'table'=>'user'));
		$data['file'] = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'tbl_project'));
		$data['file_detail'] = $this->mymodel->selectWhere('file',array('table_id'=>$id,'table'=>'tbl_project_gambar'));
		$data['page_name'] = "Project";
		$this->template->load('admin/template/template','admin/project/view',$data);
	}

	public function edit($id){
		$data['tbl_project'] = $this->mymodel->selectDataone('tbl_project',array('id'=>$id));
		$data['file'] = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'tbl_project'));
		$data['file_detail'] = $this->mymodel->selectWhere('file',array('table_id'=>$id,'table'=>'tbl_project_gambar'));
		$data['page_name'] = "Project";
		$this->template->load('admin/template/template','admin/project/edit',$data);
	}

	public function editImage($id){
		$data['tbl_project'] = $this->mymodel->selectDataone('tbl_project',array('id'=>$id));
		$data['file_detail'] = $this->mymodel->selectWhere('file',array('table_id'=>$id,'table'=>'tbl_project_gambar'));
		$data['page_name'] = "Project";
		$this->template->load('admin/template/template','admin/project/editImage',$data);
	}

	public function editOneImage($id){
		$data['file_detail'] = $this->mymodel->selectDataone('file',array('id'=>$id,'table'=>'tbl_project_gambar'));
		$data['tbl_project'] = $this->mymodel->selectDataone('tbl_project', array('id'=>$data['file_detail']['table_id']));
		$data['page_name'] = "Project";
		$this->template->load('admin/template/template','admin/project/editOneImage',$data);
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
				if($project_name['slug'] != $_POST['dt']['slug']){
					unlink('webfile/project/'.$_POST['dt']['slug'].'/'.$project_gambar_master['name']); 
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

			// if($_POST['remove_image'] == '1'){
			// 	$this->mymodel->deleteData('file',  array('table_id'=>$_POST['dt']['id'], 'table'=>'tbl_project_gambar' ));

			// 	if($project_name['slug'] != $_POST['dt']['slug']){
			// 		foreach($project_gambar_detail as $gambar_detail){ 
			// 			unlink('webfile/project/'.$_POST['dt']['slug'].'/'.$gambar_detail['name']); 
			// 		}
			// 	}

			// 	if (!empty($_FILES['file_many']['name'])){
			// 		$countfiles = count($_FILES['file_many']['name']);

			// 		for($i=0;$i<$countfiles;$i++){

			// 			if(!empty($_FILES['file_many']['name'][$i])){

			// 				$_FILES['file']['name'] = $_FILES['file_many']['name'][$i];
			// 				$_FILES['file']['type'] = $_FILES['file_many']['type'][$i];
			// 				$_FILES['file']['tmp_name'] = $_FILES['file_many']['tmp_name'][$i];
			// 				$_FILES['file']['error'] = $_FILES['file_many']['error'][$i];
			// 				$_FILES['file']['size'] = $_FILES['file_many']['size'][$i];

			// 				$dir  = "webfile/project/".$project_name['slug']."/";

			// 				if($project_name['slug'] != $_POST['dt']['slug']){
			// 					$dir  = "webfile/project/".$_POST['dt']['slug']."/";
			// 				}

			// 				$config['upload_path']          = $dir;
			// 				$config['allowed_types']        = '*';
			// 				$config['file_name']           = md5('smartsoftstudio').rand(1000,100000);

			// 				$this->load->library('upload',$config); 

			// 				if (!$this->upload->do_upload('file')){
			// 					$error = $this->upload->display_errors();
			// 					$this->alert->alertdanger($error);		
			// 				}else{
			// 					$file = $this->upload->data();
			// 					$data = array(
			// 						'id' => '',
			// 						'name'=> $file['file_name'],
			// 						'mime'=> $file['file_type'],
			// 						'dir'=> $dir.$file['file_name'],
			// 						'table'=> 'tbl_project_gambar',
			// 						'table_id'=> $_POST['dt']['id'],
			// 						'status'=>'ENABLE',
			// 						'created_at'=>date('Y-m-d H:i:s')
			// 					);
			// 					$str = $this->db->insert('file', $data); 
			// 				}
			// 			}
			// 		}
			// 	}
			// }
			$dt = $_POST['dt'];
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

}

?>