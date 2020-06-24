<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myaccount extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_account');
		$this->load->library(array('form_validation','session'));
		$this->load->helper('form');
        }

        
	public function index()
	{
        $data['rules'] = 'Account Settings';
        if($this->session->userdata('username')){
        $username = $this->session->userdata('username');
        $data['pengguna'] = $this->mdl_account->getAccount($username)->result_array();
        $this->load->view('myaccount', $data);
        }else{
            redirect('member');
        }
    }
    
}