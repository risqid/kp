<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model{
    
    function get_pajak_badan()
    {
        $this->db->limit(1);
        $this->db->order_by('id', 'DESC');
        $data = $this->db->get('pajak_badan')->row_array();
    	return $data;
    }

    function get_pajak_pribadi()
    {
        $this->db->limit(1);
        $this->db->order_by('id', 'DESC');
        $data = $this->db->get('pajak_pribadi')->row_array();
        return $data;
    }
}