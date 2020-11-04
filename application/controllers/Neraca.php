<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Neraca extends CI_Controller {

	function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->model('neraca_model');
	}

	public function index()
	{
	  	$data['title'] = "Neraca";
		$data['subtitle'] = "Data Neraca";

		// data for table
		$data['data'] = $this->neraca_model->show();

		$this->db->select('tahun');
		$data['tahun'] = $this->db->get('laba_rugi')->result_array();

		if (isset($_POST['submit'])) {
			$id = htmlspecialchars($this->input->post('id', true));
			$tahun = htmlspecialchars($this->input->post('tahun', true));
			$modal = htmlspecialchars($this->input->post('modal', true));
			$laba_rugi = htmlspecialchars($this->input->post('laba_rugi', true));
			$kas = htmlspecialchars($this->input->post('kas', true));
			$total = htmlspecialchars($this->input->post('total', true));
			$data_input = [
				'id' => $id,
				'tahun' => $tahun,
				'modal' => $modal,
				'laba_rugi' => $laba_rugi,
				'kas' => $kas,
				'total' => $total
			];
			$data_is_exist = $this->db->get_where('neraca', ['tahun' => $tahun])->row_array();
			if (empty($id)) {
				// check if data is exist
				if ($data_is_exist['tahun'] == $tahun) {
				 	$this->session->set_flashdata('message','<script>swal("Data dengan tahun tersebut sudah ada!", "", {icon : "error",buttons: {confirm: {className : "btn btn-danger"}},});</script>');
					redirect('neraca');
				 }else{
					$this->neraca_model->insert($data_input);
					$this->session->set_flashdata('message','<script>$.notify({icon: "flaticon-success",title: "Data berhasil ditambahkan",message: "",},{type: "primary",placement: {from: "top",align: "right"},time: 1000,});</script>');
					redirect('neraca');
				 }
			}else {
				// check if id is not same
				if ($data_is_exist['tahun'] == $tahun && $data_is_exist['id'] !== $id) {
				 	$this->session->set_flashdata('message','<script>swal("Data dengan tahun tersebut sudah ada!", "", {icon : "error",buttons: {confirm: {className : "btn btn-danger"}},});</script>');
					redirect('neraca');
				}else{
					$this->neraca_model->edit($data_input);
					$this->session->set_flashdata('message','<script>$.notify({icon: "flaticon-success",title: "Data berhasil diubah",message: "",},{type: "primary",placement: {from: "top",align: "right"},time: 1000,});</script>');
					redirect('neraca');
				}
			}
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('neraca/index', $data);
		$this->load->view('templates/footer');
	}

	function hapus($id){
		$this->neraca_model->hapus($id);
		$this->session->set_flashdata('message','<script>$.notify({icon: "flaticon-success",title: "Data berhasil dihapus",message: "",},{type: "primary",placement: {from: "top",align: "right"},time: 1000,});</script>');
		redirect('neraca');
	}
    function get_laba_rugi($tahun)
    {
        $this->db->select('total');
        $result = $this->db->get_where('laba_rugi', ['tahun' => $tahun])->row_array();
        if ($result !== null) {
            echo $result['total'];            
        }
    }
}
