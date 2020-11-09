<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Labarugi extends CI_Controller {

	function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->model('labarugi_model');
		$this->load->model('update_model');
	}

	public function index()
	{
	  	$data['title'] = "Laba Rugi";
		$data['subtitle'] = "Data Laba Rugi";

		// data for table
		$data['data'] = $this->labarugi_model->show();

		// for select input options
		$this->db->distinct();
		$this->db->select('tahun');
		$data['tahun_pajak'] = $this->db->get('pajak_badan')->result_array();

		// ketika di hosting tidak menerima zero value untuk auro increment
		$this->db->limit(1);
		$this->db->order_by('id', 'DESC');
		$this->db->select('id');
		$last_id = $this->db->get('laba_rugi')->row_array();
		$new_id = $last_id['id'] + 1;
		// 

		if (isset($_POST['submit'])) {
			$id = htmlspecialchars($this->input->post('id', true));
			$tahun = htmlspecialchars($this->input->post('tahun', true));
			$penjualan = htmlspecialchars($this->input->post('penjualan', true));
			$bahan_baku = htmlspecialchars($this->input->post('bahan_baku', true));
			$tktl = htmlspecialchars($this->input->post('tktl', true));
			$hpp = htmlspecialchars($this->input->post('hpp', true));
			$biaya_lain = htmlspecialchars($this->input->post('biaya_lain', true));
			$total = htmlspecialchars($this->input->post('total', true));
			$data_input = [
				'id' => $id,
				'tahun' => $tahun,
				'penjualan' => $penjualan,
				'bahan_baku' => $bahan_baku,
				'tktl' => $tktl,
				'hpp' => $hpp,
				'biaya_lain' => $biaya_lain,
				'total' => $total
			];
			$data_is_exist = $this->db->get_where('laba_rugi', ['tahun' => $tahun])->row_array();
			if (empty($id)) {
				// check if data is exist
				if ($data_is_exist['tahun'] == $tahun) {
				 	$this->session->set_flashdata('message','<script>swal("Data dengan tahun tersebut sudah ada!", "", {icon : "error",buttons: {confirm: {className : "btn btn-danger"}},});</script>');
					redirect('labarugi');
				 }else{
				 	// ketika di hosting tidak menerima zero value untuk auro increment
					$data_input['id'] = $new_id;
					//
					$this->labarugi_model->insert($data_input);
					$this->update_model->update_neraca($tahun);
					$this->session->set_flashdata('message','<script>$.notify({icon: "flaticon-success",title: "Data berhasil ditambahkan",message: "",},{type: "primary",placement: {from: "top",align: "right"},time: 1000,});</script>');
					redirect('labarugi');
				 }
			}else {
				// check if id is not same
				if ($data_is_exist['tahun'] == $tahun && $data_is_exist['id'] !== $id) {
				 	$this->session->set_flashdata('message','<script>swal("Data dengan tahun tersebut sudah ada!", "", {icon : "error",buttons: {confirm: {className : "btn btn-danger"}},});</script>');
					redirect('labarugi');
				}else{
					$this->labarugi_model->edit($data_input);
					$this->update_model->update_neraca($tahun);
					$this->session->set_flashdata('message','<script>$.notify({icon: "flaticon-success",title: "Data berhasil diubah",message: "",},{type: "primary",placement: {from: "top",align: "right"},time: 1000,});</script>');
					redirect('labarugi');
				}
			}
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('labarugi/index', $data);
		$this->load->view('templates/footer');
	}

	function hapus($id){
		// select year from laba_rugi where id = $id
		$this->db->select('tahun');
		$result = $this->db->get_where('laba_rugi', ['id' => $id])->row_array();
		$tahun = $result['tahun'];

		$this->labarugi_model->hapus($id);
		$this->update_model->update_neraca($tahun);
		$this->session->set_flashdata('message','<script>$.notify({icon: "flaticon-success",title: "Data berhasil dihapus",message: "",},{type: "primary",placement: {from: "top",align: "right"},time: 1000,});</script>');
		redirect('labarugi');
	}
    function get_penjualan($tahun)
    {
        $this->db->select_sum('penjualan');
        $result = $this->db->get_where('pajak_badan', ['tahun' => $tahun])->row_array();
        if ($result !== null) {
            echo $result['penjualan'];
        }
    }

    function get_biaya_lain($tahun)
    {
        $this->db->select('total');
        $result = $this->db->get_where('biaya_lain', ['tahun' => $tahun])->row_array();
        if ($result !== null) {
            echo $result['total'];            
        }
    }
}
