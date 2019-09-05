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
  
  
  public function data($email){
    $email_special = htmlspecialchars($this->db->escape($email));    
    $this->db->select('*');
    $this->db->where("emailUser = $email_special"); 
    $query = $this->db->get('tbl_user');
    return $query->row();
  }
}  

?>
