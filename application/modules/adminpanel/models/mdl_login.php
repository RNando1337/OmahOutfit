<?php 
 
class mdl_login extends CI_Model{	
    private $_tables = 'useradmin';
    private $_ipaddress = 'ip_address';
    private $_username = 'username';

	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
    }	
    
    function update_info($ip,$user){
        return $this->db->query("UPDATE useradmin SET ip_address = '$ip' WHERE username = '$user'");
    }

    function getAllkategori(){
        return $this->db->select('*')->from('category')->get();
    }

    function input($data){
        try{
          $this->db->insert('category', $data);
          return true;
        }catch(Exception $e){
        }
      }

      function getByID($id){
        return $this->db->select('*')->from('category')->where('category_id', $id)->get();
      }
    

      function countKat(){
        return $this->db->select('count(*) as id')->from('category')->get();
      }

      function get_kategoriList($limit, $start){
        return $this->db->get('category', $limit, $start);
      }

      function get_Allproduct(){
        $this->db->join('category c', 'c.category_id=p.category_id');
        return $this->db->get('product p');
      }

      function get_productlist($limit, $start){
        $this->db->join('category c', 'c.category_id=p.category_id');
        return $this->db->get('product p', $limit, $start);
      }

      function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
      }

      function getPengguna(){
        return $this->db->get('member');
      }

}