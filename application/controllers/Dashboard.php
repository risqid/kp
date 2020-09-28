<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('dashboard_model');
	}

	public function index()
	{
		$data['title'] = "Dashboard";

		$data['data'] = $this->dashboard_model->show();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer');
	}
    function chart_data()
    {
    	$this->db->limit(12);
    	$this->db->order_by('id', 'DESC');
        $result = $this->db->get('pajak_badan')->result_array();
        $result_json = json_encode($result);
        echo $result_json;
    }
}
