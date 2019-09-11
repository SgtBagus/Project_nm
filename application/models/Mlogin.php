<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mlogin extends CI_Model {

  public function __construct(){
    parent::__construct();
    $this->load->database();
  }
  
  
  public function login($email, $pass){
    $email_special = htmlspecialchars($this->db->escape($email));
    $user = $this->mymodel->selectDataone('tbl_investor',array('email'=>$email));
    return $user;
  }

  public function userAddProcess($data){
    $query = $this->db->insert('tbl_investor', $data);

    $last_id = $this->db->insert_id();
    $file = array(
      'name' => 'default.png',
      'mime' => 'image/png',
      'dir' => 'webfile/investor/default.png',
      'table' => 'tbl_investor',
      'table_id' => $last_id,
      'status' => 'ENABLE',
      'created_at' => date('Y-m-d H:i:s')
    );
    $this->db->insert('file', $file);
    return $query;
  }
  
}  

?>
