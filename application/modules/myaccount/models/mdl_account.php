<?php 
 
class mdl_account extends CI_Model{	


    function getAccount($username){
        $this->db->where('username', $username);
        return $this->db->get('member');
    }

    function checkPass($username,$pass){
        $this->db->where('username', $username);
        $this->db->where('password', $pass);
        return $this->db->get('member');
    }

    function updateInfo($username,$pass){
        
    }
}
?>