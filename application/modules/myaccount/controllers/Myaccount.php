<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myaccount extends MX_Controller {

    function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation','session'));
		$this->load->helper('form');
        }

        
	public function index()
	{
        if($this->session->userdata('username')){
        $this->load->view('myaccount');
        }else{
            redirect('member');
        }
    }
    
}