<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajaxurl extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_kota($id)
	{
		$kota = $this->db->get_where('tbl_kota', array('provinsi_id' => $id))->result_array();
		echo json_encode($kota);
	}
}
