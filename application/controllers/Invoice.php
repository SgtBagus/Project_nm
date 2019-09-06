<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Invoice extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function payment()
	{
		$data['page_name'] = "Invoice";
		$this->template->load('invoice/template','invoice/index', $data);
    }
}