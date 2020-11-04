<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pajak extends CI_Controller {

	function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->model('pajak_model');
		$this->load->model('update_model');
	}

	public function index()
	{
	  	$data['title'] = "Pajak Badan";
		$data['subtitle'] = "Data Perpajakan Badan";

		// data untuk modal
		$data['bulan'] = [
			"01" => 'Januari',
			"02" => 'Februari',
			"03" => 'Maret',
			"04" => 'April',
			"05" => 'Mei',
			"06" =>'Juni',
			"07" =>'Juli',
			"08" => 'Agustus',
			"09" => 'September',
			"10" => 'Oktober',
			"11" => 'November',
			"12" => 'Desember'
		];
		$data['month_now'] = date("m");

		$data['data'] = $this->pajak_model->show();

		if (isset($_POST['submit'])) {
			$id = htmlspecialchars($this->input->post('id', true));
			$tahun = htmlspecialchars($this->input->post('tahun', true));
			$bulan = htmlspecialchars($this->input->post('bulan', true));
			$penjualan = htmlspecialchars($this->input->post('penjualan', true));
			$pajak = htmlspecialchars($this->input->post('pajak', true));
			$data_input = [
				'id' => $id,
				'tahun' => $tahun,
				'bulan' => $bulan,
				'penjualan' => $penjualan,
				'pajak' => $pajak
			];
			$data_is_exist = $this->db->get_where('pajak_badan', ['tahun' => $tahun, 'bulan' => $bulan])->row_array();
			if (empty($id)) {
				if ($data_is_exist['tahun'] == $tahun && $data_is_exist['bulan'] == $bulan) {
					$this->session->set_flashdata('message','<script>swal("Data sudah ada!", "", {icon : "error",buttons: {confirm: {className : "btn btn-danger"}},});</script>');
					redirect('pajak');
				}else{
					$this->pajak_model->insert($data_input);
					$this->update_model->update_labarugi($tahun);
					$this->update_model->update_neraca($tahun);
					$this->session->set_flashdata('message','<script>$.notify({icon: "flaticon-success",title: "Data berhasil ditambahkan",message: "",},{type: "primary",placement: {from: "top",align: "right"},time: 1000,});</script>');
					redirect('pajak');
				}
			}else {
				if ($data_is_exist['tahun'] == $tahun && $data_is_exist['bulan'] == $bulan && $data_is_exist['id'] !== $id) {
					$this->session->set_flashdata('message','<script>swal("Data sudah ada!", "", {icon : "error",buttons: {confirm: {className : "btn btn-danger"}},});</script>');
					redirect('pajak');
				}else{
					$this->pajak_model->edit($data_input);
					$this->update_model->update_labarugi($tahun);
					$this->update_model->update_neraca($tahun);
					$this->session->set_flashdata('message','<script>$.notify({icon: "flaticon-success",title: "Data berhasil diubah",message: "",},{type: "primary",placement: {from: "top",align: "right"},time: 1000,});</script>');
					redirect('pajak');
				}
			}
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pajak/index', $data);
		$this->load->view('templates/footer');
	}

	function hapus($id){
		// get year form pajak_badan where id = $id
		$this->db->select('tahun');
		$result = $this->db->get_where('pajak_badan', ['id' => $id])->row_array();
		$tahun = $result['tahun'];

		$this->pajak_model->hapus($id);
		$this->update_model->update_labarugi($tahun);
		$this->update_model->update_neraca($tahun);
		$this->session->set_flashdata('message','<script>$.notify({icon: "flaticon-success",title: "Data berhasil dihapus",message: "",},{type: "primary",placement: {from: "top",align: "right"},time: 1000,});</script>');
		redirect('pajak');
	}
}
