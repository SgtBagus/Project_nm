<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Project extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['tbl_project'] = $this->mymodel->selectData('tbl_project');
		$data['file'] = $this->mymodel->selectWhere('file',array('table'=>'tbl_project'));
		$this->template->load('template/template','project/index',$data); 
	}

	public function view($slug){
		$data['tbl_project'] = $this->mymodel->selectDataone('tbl_project',array('slug'=>$slug));
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

	public function invest(){
		header('Location: '.base_url('invoice/payment/').'asdasdqw341231234');
	}
}