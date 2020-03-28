<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MX_Controller {

    function __construct() {
		parent::__construct();
		$this->load->model('mdl_product');
		$this->load->library(array('form_validation','session'));
        }

        
	function index()
	{	
			$panggil['semua_kategori'] = $this->mdl_product->getKategori();
			$this->load->view('product', $panggil);
	}

	function tbh(){
		$rules['Add_Product'] = 'Add Product';
		$this->form_validation->set_rules('nama', 'Nama','required');
		$this->form_validation->set_rules('kat', 'Kategori','required');
		$this->form_validation->set_rules('harga','harga','required|numeric');
		$this->form_validation->set_rules('stok','Stok','required|numeric');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|max_length[500]');

			$nama = $this->input->post('nama');
			$kat  =	$this->input->post('kat');
			$hrg  = $this->input->post('harga');
			$stok = $this->input->post('stok');
			$desk = $this->input->post('deskripsi');
			
			$ID	  = $this->mdl_product->countID()->result_array();
			foreach ($ID as $row)
                    {
                         $count = $row['id'];
					}
			$total = $count+1;
			$IDmaker = "P000".$total;

			$config['upload_path']          = './images/product/';
    		$config['allowed_types']        = 'gif|jpg|png';
			$config['overwrite']			= true;
			$config['file_name']            = 'product'.date('ymd').'-'.$this->session->userdata('username').'.png';
    		$config['max_size']             = 1024; 

			$this->load->library('upload', $config);
			

			if ($this->upload->do_upload('gambar')) //jika gagal upload
      		{
          		//mengambil data di form
				  $data = ['productID' => $IDmaker,
						   'productName' => $nama,
						   'productPrice' => $hrg,
						   'productImage' => $config['file_name'],
						   'productDesk' => $desk,
						   'productStok' => $stok,
						   'kategori' => $kat,	
						   'username' => $this->session->userdata('username')
         				];
          			$this->mdl_product->input($data); //memasukan data ke database
          			redirect('myproduct'); //mengalihkan halaman

			  } 
			  // if($this->form_validation->run() === FALSE){
			// 	$this->load->view('product', $rules);
			// }else{
			// 	$data = array(
			// 		'productName' => $nama,
			// 		'kategori' => $user,
			// 		'productPrice' => $email,
			// 		'productStok' => md5($password),
			// 		'productDesk' => $telp,
			// 		'productImage' => $gbr
			// 		);
			// }
      }


			


	}
	

	

