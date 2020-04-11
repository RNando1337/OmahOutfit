<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller
{

    function __construct(){
        parent::__construct();
        $this->load->model('mdl_login');
        $this->load->library(array('form_validation','session'));
    }

    function index(){
        $this->load->view('dashboard');
    }

    function logout(){
        $this->session->unset_userdata('useradmin');
		redirect(base_url('adminpanel/Login'));
    }

    function kategori(){
        $data['show_data'] = $this->mdl_login->getAllkategori();
        $this->load->view('kategori', $data);
    }

    function tbhKategori(){
        $this->form_validation->set_rules('kat', 'Kategori','required');
        
            $kode = $this->mdl_login->countKat()->result_array();
            foreach($kode as $row){
                $count = $row['id'];
            }
            $total = $count+1;
            $IDmake = "KT000".$total;
            $kat  =	$this->input->post('kat');
            
            $data = [
                'category_id' => $IDmake,
                'kategori' => $kat
            ];


            $this->mdl_login->input($data); 
            redirect('4dm1n/kategori');
    }

    function edit(){
        if($this->input->get('kat')){
            $id = $this->input->get('kat');
            $data['show_data'] = $this->mdl_login->getByID($id);
            $this->load->view('editKat', $data);
            if($this->input->post('Simpan')){
                $nama = $this->input->post('kat');

                $this->db->query('UPDATE category SET category_id="'.$kode.'", kategori="'.$nama.'" WHERE category_id="'.$id.'"');
                redirect('4dm1n/kategori');
            }
        }
    }

    function hps(){
        if($this->input->get('kat')){
            $id = $this->input->get('kat');
            $this->db->query('DELETE FROM category WHERE category_id="'.$id.'"');
            redirect('4dm1n/kategori');
        }
    }
}