<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends MX_Controller {

    function __construct() {
		parent::__construct();
		$this->load->model('mdl_product');
		$this->load->library(array('form_validation','session'));
		$this->load->helper('form');
        }

        
	public function index()
	{
		$data['products'] = $this->mdl_product->getAllProductUser();
		$data['product'] = $this->mdl_product->getAllProduct();
		if($this->session->userdata('username')){
			$this->load->view('homepage', $data);
        }else{
        	$this->load->view('homepage', $data);
        }
	}

	function Products(){
		$prod_id = $this->input->get('prodID');
		
		if($prod_id){
			$user=$this->session->userdata('username');
			$post= $this->input->post();
			$data['product'] = $this->mdl_product->getProduct($prod_id);
			if(isset($_POST['Simpan'])){
				if($this->session->userdata('username')){
					$ID	  = $this->mdl_product->countTransaksi()->result_array();
					foreach ($ID as $row)
                    {
                         $count = $row['id'];
					}
					$total = $count+1;
					$IDmaker = "K000".$total;
					$qty = $post['qty'];
					$isProduct = $this->mdl_product->isProduct($prod_id,$user)->result_array(); // Jika Produk sudah ada
					foreach ($isProduct as $row)
                    {
                         $adakah = $row['id'];
					}
					$stok = $this->mdl_product->getProduct($prod_id)->result_array();
						foreach ($stok as $row)
                    	{
                         $stoks = $row['productStok'];
						}
					$totalbeli = $this->mdl_product->totalBeli($prod_id)->result_array();
					foreach($totalbeli as $row){
						$total = $row['totalBeli'];
					}
					if($adakah>0){
						$this->mdl_product->isKeranjang($prod_id,$total,$qty);
						$this->mdl_product->productMin($prod_id,$qty,$stoks);
						redirect(base_url('cart'));
					}else{
						$value = [
							'keranjangID' => $IDmaker,
							'productID' => $prod_id,
							'totalBeli' => $qty,
							'username' => $user
						];
						$this->mdl_product->transaksi($value);
						$this->mdl_product->productMin($prod_id,$qty,$stoks);
						redirect(base_url('cart'));
					}
				}else{
					redirect(base_url('member'));
				}
				
			}
				
			$this->load->view('product', $data);
		}else{
			redirect(base_url());
		}
	}



	function search(){
		$kunci = $this->input->post('barang');
		$pencarian = $this->mdl_product->search($kunci);

		$data['search'] = $pencarian;
		$hasil = $this->load->view('search', $data, true);
		$callback = array(
			'hasil' => $hasil, // Set array hasil dengan isi dari view.php yang diload tadi
			);
			echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}


	function pencarian(){
		$kunci = $this->input->post('barang');
		print_r($this->input->post('cari'));
			if($this->input->post('cari')){
				redirect("http://localhost/e-Commerce/OmahOutfit/search/index/?keyword=".$kunci."");
			}
	}


	function logout(){
        $this->session->unset_userdata('username');
		redirect(base_url());
	}

}
