<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Project extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){

		if($_GET['search']){
			if($_GET['search'] == 'new'){
				$data['tbl_project'] = $this->mymodel->selectWithQuery("SELECT * FROM tbl_project WHERE public = 'ENABLE' ORDER BY created_at DESC ");
			} else if ($_GET['search'] == 'last'){
				$data['tbl_project'] = $this->mymodel->selectWithQuery("SELECT * FROM tbl_project WHERE public = 'ENABLE' ORDER BY created_at ASC ");
			} else if ($_GET['search'] == 'return'){
				$data['tbl_project'] = $this->mymodel->selectWithQuery("SELECT (a.harga*AVG(b.return_tahun)/100) as return_besar, a.* from tbl_project a LEFT JOIN tbl_project_return b on a.id = b.project_id WHERE a.public = 'ENABLE' GROUP BY a.id ORDER BY `return_besar` DESC");
			} else if ($_GET['search'] == 'invest'){
				$data['tbl_project'] = $this->mymodel->selectWithQuery("SELECT *
					FROM (SELECT * FROM tbl_project a) x
					LEFT OUTER JOIN
					(SELECT a.project_id, COUNT(a.investor_id) as count_invest
					from  tbl_project_invest a 
					WHERE a.status_pembayaran = 'APPROVE' GROUP BY a.project_id) y
					ON x.id = y.project_id ORDER BY count_invest DESC");
			}
		}else{
			$data['tbl_project'] = $this->mymodel->selectWhere('tbl_project', array('public' => 'ENABLE'));
		}
		$data['file'] = $this->mymodel->selectWhere('file',array('table'=>'tbl_project'));
		$this->template->load('template/template','project/index',$data);
	}

	public function view($slug){
		$data['tbl_project'] = $this->mymodel->selectDataone('tbl_project',array('slug'=>$slug));
		$data['tbl_project_return'] = $this->mymodel->selectDataone('tbl_project_return', array('project_id'=>$data['tbl_project']['id'], 'public' => 'ENABLE'));
		$data['tbl_project_return_grafik'] = $this->mymodel->selectWhere('tbl_project_return', array('project_id'=>$data['tbl_project']['id']));

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
			$usercheck = $this->mymodel->selectDataone('tbl_investor', array('id' => $this->session->userdata('id')));
			foreach($usercheck as $key => $field) {  
				if(empty($usercheck[$key])){
					$this->alert->alertdanger('Mohon Untuk melengkapi data yang di perlukan untuk melakukan Investasi, Buka <a href
						="'.base_url('dashboard/account').'"> Data Akun </a>');   
					return false;  
				}
			}

			$dt = $_POST['dt'];

			$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$res = "";
			for(;;){
				for ($i = 0; $i < 10; $i++) {
					$res .= $chars[mt_rand(0, strlen($chars)-1)];
				}

				$query = $this->db->query("SELECT * FROM tbl_project_invest WHERE code='$res'")->result();
				if(count($query)==0){
					break;
				}else{
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

			$this->alert->alertsuccess('Investasi Telah Dikirim dan menunggu untuk melakukan Pembayaran <br> Cek Proses Investasi di <a href="'.base_url('dashboard/invest').'"> Dashboard</a>');
			echo '<script type="text/javascript" language="Javascript">window.open("'.base_url('invoice/payment/').$dt['code'].'");</script>';
		}
	}
}
