<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller
{

    function __construct(){
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('mdl_login');
        $this->load->library(array('form_validation','session'));
    }

    function index(){
        if($this->session->userdata('authenticated')){
            redirect(base_url('4dm1n/dashboard'));
        }else{
        $this->load->view('login');
        }
    }

    function aksi_login(){
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        $ip = $this->input->ip_address();
        $usr = $this->UserModel->get($user);
        $where = array(
            'username' => $user,
            'password' => md5($pass)
            );
        $session = array(
            'authenticated'=>true,
            'usernames' => $usr->username,
            'role' => $usr->role
        );    
            $cek = $this->mdl_login->cek_login("useradmin",$where)->num_rows();
            if($cek > 0){
                $this->session->set_userdata($session);
                $this->mdl_login->update_info($ip,$user);
                echo "<script type='text/javascript'>alert('Login Berhasil');</script>";
                redirect(base_url('4dm1n/dashboard'));
            } else {
                echo "<script type='text/javascript'>alert('Login Gagal');</script>";
                redirect(base_url('4dm1n'));
            }
    }

}