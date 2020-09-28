<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pajak_model extends CI_Model{
    
    function show(){
        $this->db->order_by('id', 'DESC');
    	$data = $this->db->get('pajak_badan')->result_array();
    	return $data;
    }

    function insert($data_input){
    	$this->db->insert('pajak_badan', $data_input);
    }

    function edit($data_input){
    	$this->db->where('id', $data_input['id']);
    	$this->db->update('pajak_badan', $data_input);
    }

    function hapus($id){
    	$this->db->delete('pajak_badan', ['id' => $id]);
    }
}