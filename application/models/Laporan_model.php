<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model{
    
    function show($tahun){
        // pajak badan
    	$laporan['pajak_badan'] = $this->db->get_where('pajak_badan', ['tahun' => $tahun])->result_array();
        $this->db->select_sum('penjualan');
        $laporan['total_penjualan'] = $this->db->get('pajak_badan')->row_array();
        $this->db->select_sum('pajak');
        $laporan['total_pajak'] = $this->db->get('pajak_badan')->row_array();

        // pajak pribadi
        $laporan['pajak_pribadi'] = $this->db->get_where('pajak_pribadi', ['tahun' => $tahun])->result_array();
        $this->db->select_sum('penghasilan');
        $laporan['total_penghasilan'] = $this->db->get('pajak_pribadi', ['tahun' => $tahun])->row_array();
        $this->db->select_sum('pajak');
        $laporan['total_pajak_pribadi'] = $this->db->get('pajak_pribadi', ['tahun' => $tahun])->row_array();

        // biaya lain, laba trugi, neraca
        $laporan['biaya_lain'] = $this->db->get_where('biaya_lain', ['tahun' => $tahun])->row_array();
        $laporan['laba_rugi'] = $this->db->get_where('laba_rugi', ['tahun' => $tahun])->row_array();
        $laporan['neraca'] = $this->db->get_where('neraca', ['tahun' => $tahun])->row_array();
    	return $laporan;
    }

}