<?php


class UserModel extends CI_Model {
    public function get($username){
        $this->db->where('username', $username);
        $result = $this->db->get('useradmin')->row();
        return $result;
        }
}