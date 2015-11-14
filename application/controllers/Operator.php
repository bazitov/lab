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
		$this->output->set_header("HTTP/1.1 200 OK");
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		if($this->session->userdata('type') !== 'operator' || !$this->session->userdata('username')) {
			redirect("login");
		}
		$this->load->model('patient_model');
		$this->load->model('reports_model');
		$this->load->model('tests_model');
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

	public function editpatient($id = 0)
	{
		$data['title'] = 'Edit Patient';
		$data['username'] = $this->session->userdata('username');
		$data['menu'] = $this->load->view('menus/operator', NULL, TRUE);
		$this->load->view('templates/header', $data);

		$name = $this->input->post("name");
		$email = $this->input->post("email");
		$address = $this->input->post("address");
		$phoneno = $this->input->post("phoneno");

		//set validations
		$this->form_validation->set_rules("name", "Name", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|required");
		$this->form_validation->set_rules("address", "Address", "trim|required");
		$this->form_validation->set_rules("phoneno", "Phone No.", "trim|required");

		if ($this->form_validation->run() == FALSE)
		{
		   //validation fails
			$patient = $this->patient_model->getPatientById($id);
			$data['id'] = $patient[0]['id'];
			$data['name'] = $patient[0]['name'];
			$data['address'] = $patient[0]['address'];
			$data['email'] = $patient[0]['email'];
			$data['phoneno'] = $patient[0]['phoneno'];
		   	$this->load->view('patient/edit', $data);
		}
		else
		{
			if($this->input->post('btn-edit') == 'Edit') 
			{
				$this->patient_model->update($name,$address,$phoneno,$email,$id);
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center"><strong>Success!</strong> Patient Data saved.</div>');
				redirect('operator/editpatient/'.$id);
			}
		}
		$this->load->view('templates/footer');
	}

	public function editreport($id = 0)
	{
		$data['title'] = 'Edit Report';
		$data['username'] = $this->session->userdata('username');
		$data['menu'] = $this->load->view('menus/operator', NULL, TRUE);
		$this->load->view('templates/header', $data);

		$reportname = $this->input->post("reportname");
		$reportname = $this->input->post("reportname");
		

		//set validations
		$this->form_validation->set_rules("reportname", "Report Name", "trim|required");
		

		if ($this->form_validation->run() == FALSE)
		{
		   //validation fails
			$report = $this->reports_model->getReport($id);
			$data['id'] = $report[0]['reportid'];
			$data['reportname'] = $report[0]['reportname'];
			$data['name'] = $report[0]['name'];
			$i = 0;
			foreach ($report as $key => $value) {
				$data['tests'][$i]['test'] = $value['test'];
				$data['tests'][$i]['testid'] = $value['testid'];
				$data['tests'][$i++]['result'] = $value['result'];
			}
		   	$this->load->view('reports/edit', $data);
		}
		else
		{
			if($this->input->post('btn-edit') == 'Edit') 
			{
				$this->patient_model->update($name,$address,$phoneno,$email,$id);
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center"><strong>Success!</strong> Patient Data saved.</div>');
				redirect('operator/editpatient/'.$id);
			}
		}
		$this->load->view('templates/footer');
	}

	public function addpatient()
	{
		$data['title'] = 'Add Patient';
		$data['username'] = $this->session->userdata('username');
		$data['menu'] = $this->load->view('menus/operator', NULL, TRUE);
		$this->load->view('templates/header', $data);
		$name = $this->input->post("name");
		$email = $this->input->post("email");
		$address = $this->input->post("address");
		$phoneno = $this->input->post("phoneno");
		$passcode = $this->input->post("passcode");

		//set validations
		$this->form_validation->set_rules("name", "Name", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|required");
		$this->form_validation->set_rules("address", "Address", "trim|required");
		$this->form_validation->set_rules("phoneno", "Phone No.", "trim|required");
		$this->form_validation->set_rules("passcode", "Pass Code", "trim|required");

		if ($this->form_validation->run() == FALSE)
		{
		   //validation fails
		   $this->load->view('patient/add', $data);
		}
		else
		{
			if($this->input->post('btn-add') == 'Add') 
			{
				$this->patient_model->add($name,$address,$phoneno,$email,$passcode);
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center"><strong>Success!</strong> Patient Added.</div>');
				redirect('operator/addpatient');
			}
		}
		
		$this->load->view('templates/footer');
	}

	public function generatepasscode($id)
	{
		$data['title'] = 'Generate Passcode';
		$data['id'] = $id;
		$data['menu'] = $this->load->view('menus/operator', NULL, TRUE);
		$data['patientname'] = $this->patient_model->getName($id)[0]['name'];
		$passcode = $id.'-'.rand(10000,1);
		$this->patient_model->newPassCode($id,$passcode);
		$passcodemsg = '<div class="alert alert-success text-center">New Passcode is <strong>'.$passcode.'</strong></div>';
		$data['passcodemsg'] = $passcodemsg;
		$this->load->view('templates/header', $data);
		$this->load->view('patient/generatepasscode', $data);
		$this->load->view('templates/footer');
	}

	public function allreports($id=0)
	{
		$data['title'] = 'Operator Control Panel';
		$data['name'] = '';
		if($id !=0) {
			$data['name'] = $this->patient_model->getName($id)[0]['name'];
		}
		$rawData['noData'] = FALSE;
		$data['username'] = $this->session->userdata('username');
		$this->load->view('templates/header', $data);
		$reports = $this->reports_model->find($id);
		if(count($reports) == 0) {
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
		redirect('operator/allpatients');
	}

	public function delreport($id=0)
	{	
		if($id)
		{
			$this->reports_model->delete($id);
			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center"><strong>Success!</strong> Report Deleted</div>');
			redirect('operator/allreports');
		}
	}

	public function deltest($id=0,$rid)
	{	
		if($id)
		{
			$this->tests_model->delete($id);
			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center"><strong>Success!</strong> Test Deleted</div>');
			redirect('operator/editreport/'.$rid);
		}
	}

	public function addreport($id=0) 
	{
		$data['title'] = 'Add Report';
		$data['username'] = $this->session->userdata('username');
		$data['menu'] = $this->load->view('menus/operator', NULL, TRUE);
		$this->load->view('templates/header', $data);
		//$posts = json_decode(stripslashes($_POST['posts']));
		$reportname = $this->input->post("reportname");
		$patient_id = $this->input->post("patient_id");
		$tests = $this->input->post("completetests");
		$tests = json_decode(stripslashes($tests));
		//set validations
		$this->form_validation->set_rules("reportname", "Report Name", "trim|required");
		

		if ($this->form_validation->run() == FALSE)
		{
		   //validation fails
			$patients = array();
			$patients_list = $this->patient_model->findAll();
			foreach ($patients_list as $key => $value) {
				$patients[$value['id']] = $value['name'];
			}
			$data['patients'] = $patients;
		   	$this->load->view('reports/add', $data);
		}
		else
		{
			if($this->input->post('btn-add') == 'Add') 
			{
				$report_id = $this->reports_model->add($reportname,$patient_id);
				$this->tests_model->add($tests,$report_id);
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center"><strong>Success!</strong> Report Added.</div>');
				redirect('operator/addreport');
			}
		}
		
		$this->load->view('templates/footer');
	}

	public function report($id=0)
	{
		if($id)
		{
			$data['title'] = 'Report';
			$data['username'] = $this->session->userdata('username');
			$this->load->view('templates/header', $data);
			$data['report'] = $this->reports_model->getReport($id);
			$this->load->view('reports/show',$data);
			$this->load->view('templates/footer');
		}
		else
		{
			redirect('operator/allreports');
		}
	}

	public function addtests()
	{
		
		$data['title'] = 'Add Tests';
		$data['username'] = $this->session->userdata('username');
		$this->load->view('templates/header', $data);
		$this->load->view('reports/addtests',$data);
		$this->load->view('templates/footer');
	}

}