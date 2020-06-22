<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myproduct extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_product');
        $this->load->library(array('form_validation','session','pagination'));
        }

        
	public function index()
	{
        if($this->session->userdata('username')){
            
            // $config['base_url'] = "http://localhost/e-Commerce/OmahOutfit/myproduct/index";
            // $config['total_rows'] = $this->db->count_all('product');
            // $config['per_page'] = 2;
            // $config['uri_segment'] = 3;
            // $jmldata = $config['total_rows']/$config['per_page'];
            // $config['num_links'] = floor($jmldata);

            // //Style pagination
            // $config['use_page_numbers'] = TRUE;
            // $config['first_link']       = 'First';
            // $config['last_link']        = 'Last';
            // $config['next_link']        = 'Next';
            // $config['prev_link']        = 'Prev';
            // $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
            // $config['full_tag_close']   = '</ul></nav></div>';
            // $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            // $config['num_tag_close']    = '</span></li>';
            // $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            // $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
            // $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            // $config['next_tagl_close']  = '<span aria-hidden="true"></span></span></li>';
            // $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            // $config['prev_tagl_close']  = '</span>Next</li>';
            // $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            // $config['first_tagl_close'] = '</span></li>';
            // $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
            // $config['last_tagl_close']  = '</span></li>';

            // $this->pagination->initialize($config);
            // $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            // $data['data'] = $this->mdl_product->get_barangList($config['per_page'], $data['page']);
            // $data['pagination'] = $this->pagination->create_links();

            $this->load->view('myproduct');  
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

    function search(){
        $output='';
        $kunci='';

        if($this->input->post('query')){
            $kunci = $this->input->post('query');
        }

        $pencarian = $this->mdl_product->search($kunci,5,0);

        $output = '<table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Gambar</th>
            <th class="w-25" scope="col">Nama</th>
            <th class="w-25" scope="col">Kategori</th>
            <th class="w-25" scope="col">Deskripsi</th>
            <th scope="col">Stok</th>
            <th class="w-25" scope="col">Harga</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>';

        if($pencarian->num_rows() > 0){
            $no = 1;
            foreach($pencarian->result_array() as $row){

                $output .= ' <tr>
                <td>'. $no++ .'</td>
                <td><img src="http://localhost/e-Commerce/OmahOutfit/images/product/'.  $row['productImage'] .'" width="150px" height="150px"></td>
                <td>'. $row['productName'] .'</td>
                <td>'. $row['kategori'] .'</td>
                <td>'. $row['productDesk'] .'</td>
                <td>'. $row['productStok'] .'</td>
                <td>'. $this->mdl_product->rupiah($row["productPrice"]) .'</td>
                <td><a href="'. base_url() .'myproduct/edit?id='. $row['productID'] .'"><i class="fas fa-edit" style="color: green;"></i>
                  </a>&nbsp<a href="'. base_url() .'myproduct/hps?id='. $row['productID'] .'"><i class="far fa-times-circle" style="color: red;"></i>
                  </a></td>
              </tr>';
            }
        }else{
            $output .= '<tr>
            <td colspan="8">No Data Found</td>
           </tr>';
        }

        $output .= '</tbody></table>';

        echo $output;

        // $kunci = $this->input->post('barang');
		// $pencarian = $this->mdl_product->search($kunci);

		// $data['search'] = $pencarian;
		// $hasil = $this->load->view('search', $data, true);
		// $callback = array(
		// 	'hasil' => $hasil, // Set array hasil dengan isi dari view.php yang diload tadi
		// 	);
		// 	echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    function fetch_data(){
            sleep(1);
            $kunci = '';
            if($this->input->post('barang')){
                $kunci = $this->input->post('barang');
            }

            $config = array();
            $config['base_url'] = "#";
            $config['total_rows'] = $this->mdl_product->count_all($kunci)->num_rows(); // Ganti
            $config['per_page'] = 5;
            $config['uri_segment'] = 3;
            $jmldata = $config['total_rows']/$config['per_page'];
            $config['num_links'] = floor($jmldata);
            

            $config['use_page_numbers'] = TRUE;
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
            $page = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
            $start = ($page - 1) * $config['per_page'];
            $output = array(
                'pagination_link'  => $this->pagination->create_links(),
                'product_list'   => $this->mdl_product->fetch_data($kunci,$config['per_page'],$start)
            );

            
            echo json_encode($output);

    }

}
