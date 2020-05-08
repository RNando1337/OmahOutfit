<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myproduct extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_product');
        $this->load->library(array('form_validation','session','pagination'));
        }

        
	public function index($num = '')
	{
        if($this->session->userdata('username')){
            
            $config['base_url'] = "http://localhost/e-Commerce/OmahOutfit/myproduct/index";
            $config['total_rows'] = $this->db->count_all('product');
            $config['per_page'] = 2;
            $config['uri_segment'] = 3;
            $jmldata = $config['total_rows']/$config['per_page'];
            $config['num_links'] = floor($jmldata);

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
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['data'] = $this->mdl_product->get_barangList($config['per_page'], $data['page']);
            $data['pagination'] = $this->pagination->create_links();

            $this->load->view('myproduct', $data);  
        }else{
            redirect(base_url('member'));
        } 
	}

    function edit(){
        $id = $this->input->get('id');

        if($id){
            $post= $this->input->post();
            $data['show_data'] = $this->mdl_product->getByID($id);
            $data['semua_kategori'] = $this->mdl_product->getKategori();
            if($this->input->post('Simpan')){
            $nama = $post["nama"];
            $hrg = $post["harga"];
            $stok = $post["stok"];
            $desk = $post["deskripsi"];
            $kat = $post["kat"];
            $username =$this->session->userdata('username');

                if(@$_FILES['gambar']['name'] != null){
                    $gbr   = $this->mdl_product->uploadGambar();
                    $link = APPPATH."../images/product/".$post['old_image'];
                    unlink($link);
                }else{
                    $gbr = $post['old_image'];
                }

                $this->mdl_product->ubah($nama,$hrg,$gbr,$desk,$stok,$kat,$username,$id);
                redirect('product');
            }
            $this->load->view('productedit', $data);
        }else{
            redirect('product');
        }
    }

    function hps(){
        $id = $this->input->get('id');

        $query = $this->db->select('productImage')->from('product')->where('productID', $id)->get();
        $result = $query->result_array();

        foreach($result as $row){
            $gbr = $row['productImage'];
        }
        $link = APPPATH."../images/product/".$gbr;
        unlink($link);
        $this->db->query('DELETE FROM product WHERE productID="'.$id.'"');
        redirect('myproduct');
    }

}
