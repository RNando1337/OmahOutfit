<?php 
 
class mdl_cart extends CI_Model{	

	function getProduct(){
    $user = $this->session->userdata('username');
    $where = "k.username='".$user."'";
    return $this->db->select('*')->from('product p')->join('keranjang k', 'k.productID=p.productID')->where($where)->get();
    }

    function rupiah($angka){
    $hasil_rupiah = "Rp " . number_format($angka,0,'','.');
        return $hasil_rupiah;
    }

}