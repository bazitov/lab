<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {

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

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('type') !== 'operator' || !$this->session->userdata('username')) {
			redirect("login");
		}
		$this->load->model('patient_model');
		$this->load->model('reports_model');
	}
	public function index()
	{
		$data['title'] = 'Operator Control Panel';
		$data['menu'] = $this->load->view('menus/operator', NULL, TRUE);
		$data['username'] = $this->session->userdata('username');
		$this->load->view('templates/header', $data);
		$this->load->view('operator', $data);
		$this->load->view('templates/footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('operator/index');
	}

	public function allpatients()
	{
		$data['title'] = 'Operator Control Panel';
		$data['username'] = $this->session->userdata('username');
		$this->load->view('templates/header', $data);
		$this->load->view('patient/all', array('patients' => $this->patient_model->findAll(),'menu' => $this->load->view('menus/operator', NULL, TRUE)));
		$this->load->view('templates/footer');
	}

	public function allreports($id=0)
	{
		$data['title'] = 'Operator Control Panel';
		$data['name'] = '';
		$rawData['noData'] = FALSE;
		$data['username'] = $this->session->userdata('username');
		$this->load->view('templates/header', $data);
		$reports = $this->reports_model->find($id);
		if(count($reports) > 0) {
			$rawData['name'] = ' of '.$reports[0]['name'];
		} else {
			$rawData['noData'] = TRUE;
		}
		$rawData['reports'] = $reports;
		$rawData['menu'] = $this->load->view('menus/operator', NULL, TRUE);
		$this->load->view('reports/all', $rawData);
		$this->load->view('templates/footer');
	}

	public function delpatient($id) 
	{
		$this->patient_model->delete($id);
		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center"><strong>Success!</strong> Patient Deleted</div>');
		redirect('operator/allpatients', 'location', 301);
	}

}