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
        $data['output'] = '';
        $this->form_validation->set_rules('nama', 'Nama Lengkap','required');
        $this->form_validation->set_rules('telp', 'Telephone','required');
        $this->form_validation->set_rules('Alamat', 'Alamat','required');
        $this->form_validation->set_rules('pass', 'Password','required');

        $nama = $this->input->post('nama');
        $telp = $this->input->post('telp');
        $alamat = $this->input->post('Alamat');

        if($this->input->post('pass') !== ''){
        $pass = md5($this->input->post('pass'));
        }else{
        $pass = 'NULL';
        }

        if($this->session->userdata('username')){
        $username = $this->session->userdata('username');
        $checkPass = $this->mdl_account->checkPass($username,$pass)->row();
        if(!empty($checkPass)){
            if($checkPass->password == $pass){
                $this->db->query('UPDATE member SET name="'.$nama.'", telp="'.$telp.'", Alamat="'.$alamat.'" WHERE username="'.$username.'"');
                $data['output'] .= '<div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert"
                aria-label="close">&times;</a>
                Data berhasil diubah
                </div>';
                redirect(base_url());
            }
        }else if(empty($checkPass)){
            $data['output'] .= '<div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert"
            aria-label="close">&times;</a>
            Data profil gagal diubah
            </div>';
        }
        $data['pengguna'] = $this->mdl_account->getAccount($username)->result_array();
        $this->load->view('myaccount', $data);
        }else{
            redirect('member');
        }
    }
    
}