<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Project extends MY_Controller {
	public function __construct(){
		parent::__construct();
	} 

	public function index(){
		$data['tbl_project'] = $this->mymodel->selectWhere('tbl_project', array('public' => 'ENABLE'));
		$data['file'] = $this->mymodel->selectWhere('file',array('table'=>'tbl_project'));
		$this->template->load('template/template','project/index',$data);
	}

	public function view($slug){
		$data['tbl_project'] = $this->mymodel->selectDataone('tbl_project',array('slug'=>$slug));
		$data['tbl_project_return'] = $this->mymodel->selectDataone('tbl_project_return', array('project_id'=>$data['tbl_project']['id'], 'public' => 'ENABLE'));
		$data['tbl_project_return_grafik'] = $this->mymodel->selectWhere('tbl_project_return', array('project_id'=>$data['tbl_project']['id'], 'public' => 'ENABLE'));

		$data['user'] = $this->mymodel->selectDataone('user',array('id'=>$data['tbl_project']['user_id']));
		$data['user_image'] = $this->mymodel->selectDataone('file',array('table_id'=>$data['user']['id'],'table'=>'user'));
		$data['file'] = $this->mymodel->selectDataone('file',array('table_id'=>$data['tbl_project']['id'],'table'=>'tbl_project'));
		$data['file_detail'] = $this->mymodel->selectWhere('file',array('table_id'=>$data['tbl_project']['id'],'table'=>'tbl_project_gambar'));

		if($data['tbl_project']){
			$this->template->load('template/template','project/view', $data);
		}else{
			$this->load->view('errors/html/error_404');
			return false;
		}
	}

	public function validate(){
		$this->form_validation->set_rules('dt[unit]', '<strong>Jumlah Unit </strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_message('required', '%s');
	}

	public function invest(){
		$this->validate();
		if ($this->form_validation->run() == FALSE){
			$this->alert->alertdanger(validation_errors());
		}else{
			$dt = $_POST['dt'];

			$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$res = "";
			for(;;){
				for ($i = 0; $i < 10; $i++) {
					$res .= $chars[mt_rand(0, strlen($chars)-1)];
				}

				$query = $this->db->query("SELECT * FROM tbl_project_invest WHERE code='$res'")->result();
	// echo "SELECT * FROM donasi WHERE kodeDonasi='$res'";
				if(count($query)==0){
		// echo 'TIDAK ADA';
					break;
				}else{
		// echo 'ADA';
				}
			}

			$dt['code'] = 'AN-'.$res;
			$dt['investor_id'] = $this->session->userdata('id');
			$dt['total_harga'] = str_replace( ',', '', $dt['total_harga'] );
			$dt['status_pembayaran'] = 'WAITING';
			$dt['created_at'] = date('Y-m-d H:i:s');
			$dt['tgl_kadarluasa'] = date('Y-m-d H:i:s', time() + 86400);
			$dt['status'] = 'ENABLE';
			$this->db->insert('tbl_project_invest', $dt);
			
			// $unit = $this->mymodel->selectDataOne('tbl_project', array('id' => $_POST['dt']['project_id']));
			// $minUnit['unit'] = $unit['unit']-$_POST['dt']['unit'];
			// $this->mymodel->updateData('tbl_project', $minUnit , array('id'=>$_POST['dt']['project_id']));

			$this->alert->alertsuccess('Investasi Telah Dikirim dan menunggu untuk melakukan Pembayaran <br> Cek Proses Investasi di <a href="'.base_url('dashboard/invest').'"> Dashboard</a>');
			echo '<script type="text/javascript" language="Javascript">window.open("'.base_url('invoice/payment/').$dt['code'].'");</script>';
		}
	}
}
