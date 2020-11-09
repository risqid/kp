<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pajakpribadi extends CI_Controller {

	function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->model('pajakpribadi_model');
	}

	public function index()
	{
	  	$data['title'] = "Pajak Pribadi";
		$data['subtitle'] = "Data Perpajakan Pribadi";

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

		$data['data'] = $this->pajakpribadi_model->show();

		// ketika di hosting tidak menerima zero value untuk auro increment
		$this->db->limit(1);
		$this->db->order_by('id', 'DESC');
		$this->db->select('id');
		$last_id = $this->db->get('pajak_pribadi')->row_array();
		$new_id = $last_id['id'] + 1;
		// 

		if (isset($_POST['submit'])) {
			$id = htmlspecialchars($this->input->post('id', true));
			$tahun = htmlspecialchars($this->input->post('tahun', true));
			$bulan = htmlspecialchars($this->input->post('bulan', true));
			$penghasilan = htmlspecialchars($this->input->post('penghasilan', true));
			$pajak = htmlspecialchars($this->input->post('pajak', true));
			$data_input = [
				'id' => $id,
				'tahun' => $tahun,
				'bulan' => $bulan,
				'penghasilan' => $penghasilan,
				'pajak' => $pajak
			];
			$data_is_exist = $this->db->get_where('pajak_pribadi', ['tahun' => $tahun, 'bulan' => $bulan])->row_array();
			if (empty($id)) {
				if ($data_is_exist['tahun'] == $tahun && $data_is_exist['bulan'] == $bulan) {
					$this->session->set_flashdata('message','<script>swal("Data sudah ada!", "", {icon : "error",buttons: {confirm: {className : "btn btn-danger"}},});</script>');
					redirect('pajakpribadi');
				}else{
					// ketika di hosting tidak menerima zero value untuk auro increment
					$data_input['id'] = $new_id;
					//
					$this->pajakpribadi_model->insert($data_input);
					$this->session->set_flashdata('message','<script>$.notify({icon: "flaticon-success",title: "Data berhasil ditambahkan",message: "",},{type: "primary",placement: {from: "top",align: "right"},time: 1000,});</script>');
					redirect('pajakpribadi');					
			}
			}else {
				if ($data_is_exist['tahun'] == $tahun && $data_is_exist['bulan'] == $bulan && $data_is_exist['id'] !== $id) {
					$this->session->set_flashdata('message','<script>swal("Data sudah ada!", "", {icon : "error",buttons: {confirm: {className : "btn btn-danger"}},});</script>');
					redirect('pajak');
				}else{
					$this->pajakpribadi_model->edit($data_input);
					$this->session->set_flashdata('message','<script>$.notify({icon: "flaticon-success",title: "Data berhasil diubah",message: "",},{type: "primary",placement: {from: "top",align: "right"},time: 1000,});</script>');
					redirect('pajakpribadi');
				}
			}
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pajakpribadi/index', $data);
		$this->load->view('templates/footer');
	}

	function hapus($id){
		$this->pajakpribadi_model->hapus($id);
		$this->session->set_flashdata('message','<script>$.notify({icon: "flaticon-success",title: "Data berhasil hapus",message: "",},{type: "primary",placement: {from: "top",align: "right"},time: 1000,});</script>');
		redirect('pajakpribadi');
	}
}
