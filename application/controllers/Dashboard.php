<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){	
		$data['user'] = $this->mymodel->selectDataOne('tbl_investor',  array('id' => $this->session->userdata('id')));
		$data['file'] = $this->mymodel->selectDataOne('file',  array('table_id' => $data['user']['id'], 'table' => 'tbl_investor'));

		$data['invest_approve'] = $this->mymodel->selectWhere('tbl_project_invest', array('investor_id' => $this->session->userdata('id'), 'status_pembayaran' => 'APPROVE'));
		$sum_harga = $this->mymodel->selectWithQuery("SELECT SUM(total_harga) as total_harga FROM tbl_project_invest WHERE investor_id = ".$this->session->userdata('id')." AND status_pembayaran = 'APPROVE'");
		$count_project = $this->mymodel->selectWithQuery("SELECT count(id) as total_prj FROM tbl_project_invest WHERE investor_id = ".$this->session->userdata('id')." AND status_pembayaran = 'APPROVE' GROUP BY project_id ");

		$data['total_harga'] = $sum_harga[0]['total_harga'];
		$data['total_project'] = $count_project[0]['total_prj'];
		$data['title'] = "Dashboard";
		$data['content'] = "dashboard";
		$this->template->load('template/template','dashboard/index', $data);
	}

	public function account(){
		$data['user'] = $this->mymodel->selectDataOne('tbl_investor',  array('id' => $this->session->userdata('id')));
		$data['file'] = $this->mymodel->selectDataOne('file',  array('table_id' => $data['user']['id'], 'table' => 'tbl_investor'));

		$data['ktp'] = $this->mymodel->selectDataOne('file',  array('table_id' => $data['user']['id'], 'table' => 'tbl_investor_ktp'));
		$data['npwp'] = $this->mymodel->selectDataOne('file',  array('table_id' => $data['user']['id'], 'table' => 'tbl_investor_npwp'));

		$data['title'] = "Akun Saya";
		$data['content'] = "account";
		$this->template->load('template/template','dashboard/index', $data);
	}

	public function invest(){
		$data['invest'] = $this->mymodel->selectWhere('tbl_project_invest', array('investor_id' => $this->session->userdata('id')));
		$data['user'] = $this->mymodel->selectDataOne('tbl_investor',  array('id' => $this->session->userdata('id')));
		$data['file'] = $this->mymodel->selectDataOne('file',  array('table_id' => $data['user']['id'], 'table' => 'tbl_investor'));
		$data['title'] = "Investasi";
		$data['content'] = "invest";
		$this->template->load('template/template','dashboard/index', $data);
	}	

	public function grafik(){
		$data['grafik'] = $this->mymodel->selectWhere('tbl_project_invest', array('investor_id' => $this->session->userdata('id'),'status_pembayaran' => 'APPROVE'));
		$data['user'] = $this->mymodel->selectDataOne('tbl_investor',  array('id' => $this->session->userdata('id')));
		$data['file'] = $this->mymodel->selectDataOne('file',  array('table_id' => $data['user']['id'], 'table' => 'tbl_investor'));
		$data['title'] = "Grafik";
		$data['content'] = "grafik";
		$this->template->load('template/template','dashboard/index', $data);
	}	

	public function vali_akun(){

		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[name]', '<strong>Nama Lengkap</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[jk]', '<strong>Jenis Kelamin</strong> Mohon Dipilih', 'required');
		$this->form_validation->set_rules('dt[wrg_negara]', '<strong>Warga Negara</strong> Mohon Dipilih', 'required');
		$this->form_validation->set_rules('dt[agama_id]', '<strong>Agama</strong> Mohon Dipilih', 'required');
		$this->form_validation->set_rules('dt[tpt_lahir]', '<strong>Tempat Lahir</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[tgl_lahir]', '<strong>Tempat Lahir</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_message('required', '%s');
	}

	public function editaccount(){
		$this->vali_akun();
		if ($this->form_validation->run() == FALSE){
			$this->alert->alertdanger(validation_errors());     
		}else{
			$id = $this->session->userdata('id');
			$dt = $_POST['dt'];
			$dt['tgl_lahir'] = date("Y-m-d", strtotime($dt['tgl_lahir']));
			$dt['updated_at'] = date("Y-m-d H:i:s");
			$this->mymodel->updateData('tbl_investor', $dt , array('id'=>$id));

			$this->alert->alertsuccess('Success Send Data');   
		}
	}

	public function editphoto(){
		$id = $this->session->userdata('id');
		if (!empty($_FILES['file']['name'])){
			$dir  = "webfile/investor/";
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
				if($file_dir['name'] == 'default.png'){
					$this->mymodel->updateData('file', $data , array('table_id'=>$id, 'table' => 'tbl_investor'));	
				}else{
					@unlink($file_dir['dir']);
					$this->mymodel->updateData('file', $data , array('table_id'=>$id, 'table' => 'tbl_investor'));	
				}
			}
		}
		$this->alert->alertsuccess('Success Send Data');   
	}

	public function vali_contact(){

		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[email]', '<strong>Email</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[phone]', '<strong>Nomor Hp</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[kelurahan]', '<strong>Kelurahan</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[kecamatan]', '<strong>Kecamatan</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[provinsi_id]', '<strong>Provinsi</strong> Mohon Dipilih', 'required');
		$this->form_validation->set_rules('dt[kota_id]', '<strong>Kota</strong> Mohon Dipilih', 'required');
		$this->form_validation->set_rules('dt[kode_pos]', '<strong>Kode Post</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_message('required', '%s');
	}

	public function editcontact(){
		$this->vali_contact();
		if ($this->form_validation->run() == FALSE){
			$this->alert->alertdanger(validation_errors());     
		}else{
			$id = $this->session->userdata('id');
			$dt = $_POST['dt'];
			$dt['updated_at'] = date("Y-m-d H:i:s");
			$this->mymodel->updateData('tbl_investor', $dt , array('id'=>$id));

			$this->alert->alertsuccess('Success Send Data');   
		}
	}


	public function vali_dana(){

		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[sumberdana_id]', '<strong>Sumber Dana</strong> Mohon Dipilih', 'required');
		$this->form_validation->set_rules('dt[pekerjaan_id]', '<strong>Pekerjaan</strong> Mohon Dipilih', 'required');
		$this->form_validation->set_rules('dt[gaji_id]', '<strong>Penghasilan Bulanan</strong> Mohon Dipilih', 'required');
		$this->form_validation->set_message('required', '%s');
	}

	public function editdana(){
		$this->vali_dana();
		if ($this->form_validation->run() == FALSE){
			$this->alert->alertdanger(validation_errors());     
		}else{
			$id = $this->session->userdata('id');
			$dt = $_POST['dt'];
			$dt['updated_at'] = date("Y-m-d H:i:s");
			$this->mymodel->updateData('tbl_investor', $dt , array('id'=>$id));

			$this->alert->alertsuccess('Success Send Data');   
		}
	}

	public function vali_rek(){
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[bank_id]', '<strong>Bank</strong> Mohon Dipilih', 'required');
		$this->form_validation->set_rules('dt[bank_cabang]', '<strong>Cabang Bank</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[no_rek]', '<strong>No Rek</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[atas_nama]', '<strong>Atas Nama</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_message('required', '%s');
	}

	public function editrek(){
		$this->vali_rek();
		if ($this->form_validation->run() == FALSE){
			$this->alert->alertdanger(validation_errors());     
		}else{
			$id = $this->session->userdata('id');
			$dt = $_POST['dt'];
			$dt['updated_at'] = date("Y-m-d H:i:s");
			$this->mymodel->updateData('tbl_investor', $dt , array('id'=>$id));

			$this->alert->alertsuccess('Success Send Data');   
		}
	}


	public function vali_document(){
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[no_ktp]', '<strong>No KTP</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[no_npwp]', '<strong>No NPWP</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_message('required', '%s');
	}

	public function editdocument(){
		$this->vali_document();
		if ($this->form_validation->run() == FALSE){
			$this->alert->alertdanger(validation_errors());     
		}else{
			$id = $this->session->userdata('id');
			$dt = $_POST['dt'];
			$dt['updated_at'] = date("Y-m-d H:i:s");
			$this->mymodel->updateData('tbl_investor', $dt , array('id'=>$id));

			$id = $this->session->userdata('id');

			if (!empty($_FILES['fileKTP']['name'])){
				$dir  = "webfile/investor/doc/";
				$config['upload_path']          = $dir;
				$config['allowed_types']        = '*';
				$config['file_name']           = md5('smartsoftstudio').rand(1000,100000);

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('fileKTP')){
					$error = $this->upload->display_errors();
					$this->alert->alertdanger($error);
				}else{
					$file = $this->upload->data();

					$data = array(
						'name'=> $file['file_name'],
						'mime'=> $file['file_type'],
						'dir'=> $dir.$file['file_name'],
						'table'=> 'tbl_investor_ktp',
						'table_id'=> $id,
						'status' => 'ENABLE',
						'created_at'=>date('Y-m-d H:i:s'),
						'updated_at'=>date('Y-m-d H:i:s')
					);

					$file_dir = $this->mymodel->selectDataone('file', array('table_id' => $id, 'table' => 'tbl_investor_ktp'));
					if($file_dir){
						@unlink($file_dir['dir']);
						$this->mymodel->updateData('file', $data , array('table_id'=>$id, 'table' => 'tbl_investor_ktp'));	
					}else{
						$this->db->insert('file', $data);
					}
				}
			}
			
			if (!empty($_FILES['fileNPWP']['name'])){
				$dir  = "webfile/investor/doc/";
				$config['upload_path']          = $dir;
				$config['allowed_types']        = '*';
				$config['file_name']           = md5('smartsoftstudio').rand(1000,100000);
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('fileNPWP')){
					$error = $this->upload->display_errors();
					$this->alert->alertdanger($error);		
				}else{
					$file = $this->upload->data();

					$data = array(
						'name'=> $file['file_name'],
						'mime'=> $file['file_type'],
						'dir'=> $dir.$file['file_name'],
						'table'=> 'tbl_investor_npwp',
						'table_id'=> $id,
						'status' => 'ENABLE',
						'created_at'=>date('Y-m-d H:i:s'),
						'updated_at'=>date('Y-m-d H:i:s')
					);

					$file_dir = $this->mymodel->selectDataone('file', array('table_id' => $id, 'table' => 'tbl_investor_npwp'));
					if($file_dir){
						@unlink($file_dir['dir']);
						$this->mymodel->updateData('file', $data , array('table_id'=>$id, 'table' => 'tbl_investor_npwp'));	
					}else{
						$this->db->insert('file', $data);
					}
				}
			}

			$this->alert->alertsuccess('Success Send Data');   
		}
	}

}