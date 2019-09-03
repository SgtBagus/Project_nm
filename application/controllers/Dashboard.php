<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['content'] = "overview";
		$this->template->load('template/template','dashboard/index', $data);
    }

	public function account()
	{
		$data['content'] = "account";
		$this->template->load('template/template','dashboard/index', $data);
    }
    	
	public function notif()
	{
		$data['content'] = "notif";
		$this->template->load('template/template','dashboard/index', $data);
    }
    
	public function mitra()
	{
		$data['content'] = "mitra";
		$this->template->load('template/template','dashboard/index', $data);
    }
}