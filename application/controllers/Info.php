<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Info extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['content'] = "info";
		$this->template->load('template/template','info', $data);
    }
}