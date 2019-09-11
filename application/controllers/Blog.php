<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['tbl_blog'] = $this->mymodel->selectWhere('tbl_blog', array('public' => 'ENABLE'));
		$data['page_name'] = "Blog";
        $this->template->load('template/template','blog/index',$data); 
	}
	
	public function view($slug){

		$data['tbl_blog'] = $this->mymodel->selectDataone('tbl_blog',array('slug'=>$slug));
		$data['file'] = $this->mymodel->selectDataone('file',array('table_id'=>$data['tbl_blog']['id'],'table'=>'tbl_blog'));
		$data['user'] = $this->mymodel->selectDataone('user',array('id'=>$data['tbl_blog']['user_id']));
		$data['user_image'] = $this->mymodel->selectDataone('file',array('table_id'=>$data['user']['id'],'table'=>'user'));
		if($data['tbl_blog']){
        	$this->template->load('template/template','blog/view',$data); 
		}else{
			$this->load->view('errors/html/error_404');
			return false;
		}
	}
}