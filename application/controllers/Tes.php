<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends CI_Controller {

	public function index()
	{
		$data['title'] = "Kosong";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('blank', $data);
		$this->load->view('templates/footer');

	}
}
