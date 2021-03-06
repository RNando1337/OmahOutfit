<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_search');
        $this->load->library(array('form_validation','session','pagination'));
        }

        public function index($page = 0)
	        {
                $_POST = $_GET;
                $kunci = $this->input->get('keyword');
                if(strlen($kunci)>0){
                    $data['title'] = $kunci;
                    $data['products'] = $this->mdl_search->getProduct($kunci);
                    
                    $config['enable_query_strings']=TRUE;
                    $getData = array('keyword'=>$kunci);
                    $config['base_url'] = "http://localhost/e-Commerce/OmahOutfit/search/index/";
                    $config['first_url'] = "http://localhost/e-Commerce/OmahOutfit/search/index/?keyword=".$kunci;
                    $config['suffix'] = '?'.http_build_query($getData,'',"&amp;");
                    $config['total_rows'] = $this->mdl_search->getProduct($kunci)->num_rows();
                    $config['per_page'] = 12;
                    $config['uri_segment'] = 3;
                    $jmldata = $config['total_rows']/$config['per_page'];
                    $config['num_links'] = floor($jmldata);
                    if(!empty($config['total_rows'])){
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
                        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                        $data['data'] = $this->mdl_search->getProductLimit($kunci,$config['per_page'], $data['page']);
                        $data['pagination'] = $this->pagination->create_links();
                    }else{
                        $data['data'] = '';
                        $data['output'] = '<div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Barang Tidak Ditemukan</div>';
                    }
                }else if(strlen($kunci)==0){
                    $data['data'] = '';
                    $data['output'] = '<div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Barang Tidak Ditemukan</div>';
                }
                

                //Style pagination
                $this->load->view('search', $data);
            }

    }