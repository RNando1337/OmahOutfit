<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MX_Controller {

    function __construct() {
		parent::__construct();
		$this->load->model('mdl_cart');
        }

        
	public function index()
	{
		if($this->session->userdata('username')){
            $data['cart'] = $this->mdl_cart->getProduct()->result_array();
			$this->load->view('cart', $data);
        }else{
        	redirect(base_url('member'));
        }
	}

	

}
