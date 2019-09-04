<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['content'] = "dashboard";
		$this->template->load('template/template','dashboard/index', $data);
    }

	public function account()
	{
		$data['title'] = "Akun Saya";
		$data['content'] = "account";
		$this->template->load('template/template','dashboard/index', $data);
    }
    	
	public function notif()
	{
		$data['title'] = "Notifikasi";
		$data['content'] = "notif";
		$this->template->load('template/template','dashboard/index', $data);
    }
    
	public function mitra()
	{
		$data['title'] = "Jadi Mitra";
		$data['content'] = "mitra";
		$this->template->load('template/template','dashboard/index', $data);
    }
}