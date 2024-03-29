<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		if($_GET['title']){
			$data['tbl_blog'] = $this->mymodel->selectWithQuery('SELECT *, LOWER(title) FROM tbl_blog WHERE LOWER(title) LIKE LOWER("%'.$_GET['title'].'%")');	
		}else{
			$data['tbl_blog'] = $this->mymodel->selectWhere('tbl_blog', array('public' => 'ENABLE'));	
		}
		$data['page_name'] = "Blog";
		$this->template->load('template/template','blog/index',$data); 
	}
	
	public function view($slug){

		$data['tbl_blog'] = $this->mymodel->selectDataone('tbl_blog',array('slug'=>$slug));
		$data['file'] = $this->mymodel->selectDataone('file',array('table_id'=>$data['tbl_blog']['id'],'table'=>'tbl_blog'));
		$data['user'] = $this->mymodel->selectDataone('user',array('id'=>$data['tbl_blog']['user_id']));
		$data['user_image'] = $this->mymodel->selectDataone('file',array('table_id'=>$data['user']['id'],'table'=>'user'));
		if($data['tbl_blog']){
			$view['view'] = $data['tbl_blog']['view'] + 1;
			$this->mymodel->updateData('tbl_blog', $view , array('slug'=>$slug));
			$this->template->load('template/template','blog/view',$data); 
		}else{
			$this->load->view('errors/html/error_404');
			return false;
		}
	}
}