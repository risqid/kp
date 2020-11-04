<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		// prevent user access to auth controller directly in url 
		if($this->session->userdata('username')){
			redirect('dashboard');
		}
		$data['title'] = "Log in";

		// this code only to create username and password
		// if (isset($_POST['submit'])) {
		// 	$data_input = [
		// 		'username' => htmlspecialchars($this->input->post('username', true)),
		// 		'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
		// 	];
		// 	$this->db->insert('user', $data_input);
		// }

		if (isset($_POST['submit'])) {
			$this->_login();
		}

		$this->load->view('auth/index', $data);
	}

	private function _login()
	{
		// get data from form 
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// get data from user table
		$user = $this->db->get_where('user', ['username' => $username])->row_array();
		// if username is exist
		if ($user) {
			// if password is correct
			if (password_verify($password, $user['password'])) {
				$data = ['username' => $user['username']];
				$this->session->set_userdata($data);
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('message','<script>swal("Password salah!", "", {icon : "error",buttons: {confirm: {className : "btn btn-danger"}},});</script>');
				redirect('auth');
			}
		}else{
			$this->session->set_flashdata('message','<script>swal("Username salah!", "", {icon : "error",buttons: {confirm: {className : "btn btn-danger"}},});</script>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		redirect('auth');

	}
}