<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myproduct extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_product');
        $this->load->library(array('form_validation','session'));
        }

        
	public function index()
	{
            $data['show_data'] = $this->mdl_product->getAllproduk();
        	$this->load->view('myproduct', $data);   
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
