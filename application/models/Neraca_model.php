<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Neraca_model extends CI_Model{
    
    function show(){
        $this->db->order_by('id', 'DESC');
    	$data = $this->db->get('neraca')->result_array();
    	return $data;
    }

    function insert($data_input){
    	$this->db->insert('neraca', $data_input);
    }

    function edit($data_input){
    	$this->db->where('id', $data_input['id']);
    	$this->db->update('neraca', $data_input);
    }

    function hapus($id){
    	$this->db->delete('neraca', ['id' => $id]);
    }
}