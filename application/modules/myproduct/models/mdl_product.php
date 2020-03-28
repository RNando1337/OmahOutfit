<?php 
 
class mdl_product extends CI_Model{	

   function getAllproduk(){
       return $this->db->select('*')->from('product')->where('username', $this->session->userdata('username'))->get();
   }

   function getKategori(){
    return $this->db->select('kategori')->from('category')->order_by('kategori', 'DESC')->get();
   }

   function getByID($id){
    return $this->db->select('*')->from('product')->where('productID', $id)->get();
   }


   function ubah($nama,$hrg,$gbr,$desk,$stok,$kat,$username,$id){
    try{
        $this->db->query("UPDATE product SET productName='$nama',productPrice=$hrg,productImage='$gbr',productDesk='$desk',productStok=$stok,kategori='$kat',username='$username' WHERE productID = '$id'");
      return true;
    }catch(Exception $e){
        echo $e;
    }
  }

  function uploadGambar(){
  $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; //code
  $token = substr(str_shuffle($set), 0, 15);
  $config['upload_path']          = './images/product/';
  $config['allowed_types']        = 'gif|jpg|png';
  $config['overwrite']			      = true;
  $config['max_size']             = 1024; 
  $config['file_name']            = $token.date('ymd').'-'.$this->session->userdata('username').'.png';

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('gambar')) {
        $gbr = $config['file_name'];
        return $gbr;
    }
    
    return "nophoto.png";
  }

  function rupiah($angka){
	
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
   
  }

}