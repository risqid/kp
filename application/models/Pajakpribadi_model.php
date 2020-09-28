<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pajakpribadi_model extends CI_Model{
    
    function show(){
        $this->db->order_by('id', 'DESC');
    	$data = $this->db->get('pajak_pribadi')->result_array();
    	return $data;
    }

    function insert($data_input){
    	$this->db->insert('pajak_pribadi', $data_input);
    }

    function edit($data_input){
    	$this->db->where('id', $data_input['id']);
    	$this->db->update('pajak_pribadi', $data_input);
    }

    function hapus($id){
    	$this->db->delete('pajak_pribadi', ['id' => $id]);
    }
}