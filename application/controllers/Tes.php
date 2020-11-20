<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends CI_Controller {

	public function index()
	{
		$data['title'] = "Tes";

		$this->db->distinct();
		$this->db->select('tahun');
		$tahun_pajak = $this->db->get('pajak_badan')->result_array();
		$this->db->select('tahun');
		$tahun_biaya_lain = $this->db->get('biaya_lain')->result_array();
		$this->db->distinct();
		$this->db->select('pajak_badan.tahun');
		$this->db->join('biaya_lain', 'pajak_badan.tahun = biaya_lain.tahun');
		$tahun_joined_distinct= $this->db->get('pajak_badan')->result_array();
		$this->db->select('pajak_badan.tahun');
		$this->db->join('biaya_lain', 'pajak_badan.tahun = biaya_lain.tahun');
		$tahun_joined= $this->db->get('pajak_badan')->result_array();
		if (count($tahun_joined) % 12 !== 0) {
			$limit = count($tahun_pajak) - 1;
			$this->db->limit($limit);
			$this->db->order_by('id', 'ASC');
			$this->db->select('tahun');
			$data['tahun'] = $this->db->get('biaya_lain')->result_array();
		}else {
			$data['tahun'] = $tahun_joined_distinct;
		}
		// if (count($tahun_pajak) < count($tahun_biaya_lain)) {
		// 	$data['tahun'] = $tahun_pajak;
		// }elseif (count($tahun_pajak) > count($tahun_biaya_lain)) {
		// 	$data['tahun'] = $tahun_biaya_lain;
		// }elseif (count($tahun_joined) % 12 === 0) {
		// 	$data['tahun'] = $tahun_biaya_lain;
		// }else {
		// 	$limit = count($tahun_pajak) - 1;
		// 	$this->db->limit($limit);
		// 	$this->db->select('tahun');
		// 	$data['tahun'] = $this->db->get('biaya_lain')->result_array();
		// }

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('tes', $data);
		$this->load->view('templates/footer');

	}
}
