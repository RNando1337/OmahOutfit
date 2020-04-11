<?php 
 
class mdl_product extends CI_Model{	

	function getProduct($product_id){
    return $this->db->select('*')->from('product')->where('productID', $product_id)->get();
  }

  function getAllProduct(){
    return $this->db->select('*')->from('product')->order_by('productID DESC','rand() ASC')->limit(18)->get();
  }

  function transaksi($value){
    return $this->db->insert('keranjang',$value);
  }

  function totalBeli($prodid){
    return $this->db->select('totalBeli')->from('keranjang')->where('productID',$prodid)->get();
  }

  function isKeranjang($prod_id,$totalBeli,$qty){
    $total = $totalBeli+$qty;
    return $this->db->query("UPDATE keranjang SET totalBeli=$total WHERE productID='$prod_id'");
  }

  function productMin($prodid,$qty,$stok){
    $sisa = $stok-$qty;
    return $this->db->query("UPDATE product SET productStok='$sisa' WHERE productID = '$prodid'");
  }

  function isProduct($prod_id,$user){
    $where = "productID='$prod_id' AND username='".$user."'";
    return $this->db->select('count(*) as id')->from('keranjang')->where($where)->get();
  }

  function countTransaksi(){
    return $this->db->select('count(*) as id')->from('keranjang')->get();
  }

  function rupiah($angka){
    $hasil_rupiah = "Rp " . number_format($angka,0,'','.');
    return $hasil_rupiah;
  }

}