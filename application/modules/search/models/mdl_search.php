<?php

class mdl_search extends CI_Model{	
    function getProduct($kunci){
        $this->db->like('productName', $kunci);
        $this->db->or_like('productDesk', $kunci);
        $result = $this->db->get('product');
        return $result;
    }

    function getProductLimit($kunci,$limit,$start){
        $this->db->like('productName', $kunci);
        $this->db->or_like('productDesk', $kunci);
        $result = $this->db->get('product', $limit, $start);
        return $result;
    }

    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
      }
}

