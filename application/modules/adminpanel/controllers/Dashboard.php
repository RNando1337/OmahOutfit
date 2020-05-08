<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller
{

    function __construct(){
        parent::__construct();
        $this->load->model('mdl_login');
        $this->load->library(array('form_validation','session','pagination'));
    }

    function index(){
        $this->load->view('dashboard');
    }

    function logout(){
        $this->session->unset_userdata('useradmin');
		redirect(base_url('adminpanel/Login'));
    }

    function kategori($num = 1){
        if($this->session->userdata('useradmin')){
            $num++;
            $config['base_url'] = "http://localhost/e-Commerce/OmahOutfit/4dm1n/kategori/";
            $config['total_rows'] = $this->mdl_login->getAllkategori()->num_rows();
            $config['per_page'] = 5;

            //Style pagination
            $config['first_link']       = 'First';
            $config['last_link']        = 'Last';
            $config['next_link']        = 'Next';
            $config['prev_link']        = 'Prev';
            $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
            $config['full_tag_close']   = '</ul></nav></div>';
            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '<span aria-hidden="true"></span></span></li>';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span>Next</li>';
            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close']  = '</span></li>';

            $this->pagination->initialize($config);
            $data['start'] = $this->uri->segment(3);
            $data['data'] = $this->mdl_login->get_kategoriList($config['per_page'], $data['start']);
            $data['pagination'] = $this->pagination->create_links();


        $data['show_data'] = $this->mdl_login->getAllkategori();
        $this->load->view('kategori', $data);
        }else{
            redirect(base_url('adminpanel/Login'));
        }
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