<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends MY_Controller {
    public function __construct(){
		parent::__construct();
	}

	public function logout(){
        $this->session->sess_destroy();
        header('Location: '.base_url());
	}

    public function act_login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $pass = md5($password);
    
        $session     = $this->mlogin->login($email,$pass);
        if ($session) {
            $this->session->set_userdata('session_sop', true);
            $this->session->set_userdata('id', $session['id']);
            $this->session->set_userdata('email', $session['email']);
            $this->session->set_userdata('name', $session['name']);
            $this->session->set_userdata('role', 'investor');
            echo "success";
            return TRUE;
        } else {
            $this->alert->alertdanger("Cek Kembali Email dan Password anda !");
            return FALSE;
        }
    }
}