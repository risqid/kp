<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model{
    
    function show(){
        $this->db->limit(1);
        $this->db->order_by('id', 'DESC');
        $data['pajak_badan_terakhir'] = $this->db->get('pajak_badan')->row_array();
        $this->db->limit(1);
        $this->db->order_by('id', 'DESC');
        $data['pajak_pribadi_terakhir'] = $this->db->get('pajak_pribadi')->row_array();
        $this->db->limit(12);
        $this->db->order_by('id', 'DESC');
        $data['pajak_badan_12'] = $this->db->get('pajak_pribadi')->row_array();

    	return $data;
    }
}