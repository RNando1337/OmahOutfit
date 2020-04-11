<?php 
 
class mdl_product extends CI_Model{	

    private $_table = "product";
    private $_kategori = "category";


    public function getKategori(){
        return $this->db->select('*')->from($this->_kategori)->order_by('kategori', 'ASC')->get();
    }

    public function countID(){
        return $this->db->select('count(*) as id')->from($this->_table)->get();
    }

    function input($data){
        try{
          $this->db->insert('product', $data);
          return true;
        }catch(Exception $e){
        }
      }
    

    
    
}