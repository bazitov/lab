<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$data['title'] = 'Login Page';
		$this->load->view('templates/header', $data);
		$this->load->view('login', $data);
		$this->load->view('templates/footer');
	}

	public function operator()
	{
		$data['title'] = 'Operator Login';
		$this->load->view('templates/header', $data);
		$this->load->view('login/operator', $data);
		$this->load->view('templates/footer');
	}

	public function patient() 
	{
		$data['title'] = 'Patient Login';
		$this->load->view('templates/header', $data);
		$this->load->view('login/patient', $data);
		$this->load->view('templates/footer');
	}
}
