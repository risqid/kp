<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biayalain extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('biayalain_model');
		$this->load->model('update_model');
	}

	public function index()
	{
	  	$data['title'] = "Biaya Lain";
		$data['subtitle'] = "Data Biaya Lain";

		$data['data'] = $this->biayalain_model->show();

		if (isset($_POST['submit'])) {
			$id = htmlspecialchars($this->input->post('id', true));
			$tahun = htmlspecialchars($this->input->post('tahun', true));
			$kantor = htmlspecialchars($this->input->post('kantor', true));
			$gaji = htmlspecialchars($this->input->post('gaji', true));
			$bonus = htmlspecialchars($this->input->post('bonus', true));
			$transport = htmlspecialchars($this->input->post('transport', true));
			$listrik = htmlspecialchars($this->input->post('listrik', true));
			$keamanan = htmlspecialchars($this->input->post('keamanan', true));
			$kesehatan = htmlspecialchars($this->input->post('kesehatan', true));
			$konsumsi = htmlspecialchars($this->input->post('konsumsi', true));
			$air = htmlspecialchars($this->input->post('air', true));
			$lain_lain = htmlspecialchars($this->input->post('lain_lain', true));
			$total = htmlspecialchars($this->input->post('total', true));
			$data_input = [
				'id' => $id,
				'tahun' => $tahun,
				'kantor' => $kantor,
				'gaji' => $gaji,
				'bonus' => $bonus,
				'transport' => $transport,
				'listrik' => $listrik,
				'keamanan' => $keamanan,
				'kesehatan' => $kesehatan,
				'konsumsi' => $konsumsi,
				'air' => $air,
				'lain_lain' => $lain_lain,
				'total' => $total
			];
			$data_is_exist = $this->db->get_where('biaya_lain', ['tahun' => $tahun])->row_array();
			if (empty($id)) {
				// check if data is exist
				if ($data_is_exist['tahun'] == $tahun) {
				 	$this->session->set_flashdata('message','<script>swal("Data dengan tahun tersebut sudah ada!", "", {icon : "error",buttons: {confirm: {className : "btn btn-danger"}},});</script>');
					redirect('biayalain');
				 }else{
					$this->biayalain_model->insert($data_input);
					$this->update_model->update_labarugi($tahun);
					$this->update_model->update_neraca($tahun);
					$this->session->set_flashdata('message','<script>$.notify({icon: "flaticon-success",title: "Data berhasil ditambahkan",message: "",},{type: "primary",placement: {from: "top",align: "right"},time: 1000,});</script>');
					redirect('biayalain');
				 }
			}else {
				// check if id is not same
				if ($data_is_exist['tahun'] == $tahun && $data_is_exist['id'] !== $id) {
				 	$this->session->set_flashdata('message','<script>swal("Data dengan tahun tersebut sudah ada!", "", {icon : "error",buttons: {confirm: {className : "btn btn-danger"}},});</script>');
					redirect('biayalain');
				}else{
					$this->biayalain_model->edit($data_input);
					$this->update_model->update_labarugi($tahun);
					$this->update_model->update_neraca($tahun);
					$this->session->set_flashdata('message','<script>$.notify({icon: "flaticon-success",title: "Data berhasil diubah",message: "",},{type: "primary",placement: {from: "top",align: "right"},time: 1000,});</script>');
					redirect('biayalain');
				}
			}
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('biayalain/index', $data);
		$this->load->view('templates/footer');
	}

	function hapus($id){
		// select year from biaya_lain where id = $id
		$this->db->select('tahun');
		$result = $this->db->get_where('biaya_lain', ['id' => $id])->row_array();
		$tahun = $result['tahun'];

		$this->biayalain_model->hapus($id);
		$this->update_model->update_labarugi($tahun);
		$this->update_model->update_neraca($tahun);
		$this->session->set_flashdata('message','<script>$.notify({icon: "flaticon-success",title: "Data berhasil dihapus",message: "",},{type: "primary",placement: {from: "top",align: "right"},time: 1000,});</script>');
		redirect('biayalain');
	}
}
