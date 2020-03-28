<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends MX_Controller {

    function __construct() {
        parent::__construct();
        }

        
	public function index()
	{
		if($this->session->userdata('username')){
			$this->load->view('homepage');
        }else{
        	$this->load->view('homepage');
        }
	}


	function logout(){
        $this->session->unset_userdata('username');
		redirect(base_url());
	}

}
