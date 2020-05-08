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

}