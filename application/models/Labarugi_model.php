<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Labarugi_model extends CI_Model{
    
    function show(){
        $this->db->order_by('id', 'DESC');
    	$data = $this->db->get('laba_rugi')->result_array();
    	return $data;
    }

    function insert($data_input){
    	$this->db->insert('laba_rugi', $data_input);
    }

    function edit($data_input){
    	$this->db->where('id', $data_input['id']);
    	$this->db->update('laba_rugi', $data_input);
    }

    function hapus($id){
    	$this->db->delete('laba_rugi', ['id' => $id]);
    }
}