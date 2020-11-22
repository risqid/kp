<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
        is_logged_in();
		$this->load->model('dashboard_model');
	}

	public function index()
	{
		$data['title'] = "Dashboard";

		$data['pajak_badan'] = $this->dashboard_model->get_pajak_badan();
        $data['pajak_pribadi'] = $this->dashboard_model->get_pajak_pribadi();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer');
	}
    function chart_penjualan()
    {
    	$this->db->limit(12);
    	$this->db->order_by('id', 'DESC');
        $result = $this->db->get('pajak_badan')->result_array();
        $result_json = json_encode($result);
        echo $result_json;
    }
    function chart_tahunan()
    {
    	$this->db->limit(5);
    	$this->db->order_by('id', 'DESC');
    	$result['laba_rugi'] = $this->db->get('laba_rugi')->result_array();
    	$result['neraca'] = $this->db->get('neraca')->result_array();
    	$result_json = json_encode($result);
    	echo $result_json;
    }
}
