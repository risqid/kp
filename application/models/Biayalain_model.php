<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biayalain_model extends CI_Model{
    
    function show(){
        $this->db->order_by('id', 'DESC');
    	$data = $this->db->get('biaya_lain')->result_array();
    	return $data;
    }

    function insert($data_input){
    	$this->db->insert('biaya_lain', $data_input);
    }

    function edit($data_input){
    	$this->db->where('id', $data_input['id']);
    	$this->db->update('biaya_lain', $data_input);
    }

    function hapus($id){
    	$this->db->delete('biaya_lain', ['id' => $id]);
    }
}