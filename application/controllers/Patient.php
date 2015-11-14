<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

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
		if($this->session->userdata('type') !== 'patient' || !$this->session->userdata('username')) {
			redirect("login");
		}
		$this->load->model('reports_model');
		$this->load->model('patient_model');
	}
	public function index()
	{
		$data['title'] = 'Patient Control Panel';
		$data['username'] = $this->session->userdata('username');
		$this->load->view('templates/header', $data);
		$data['menu'] = $this->load->view('menus/patient', NULL, TRUE);
		$this->load->view('patient', $data);
		$this->load->view('templates/footer');
	}

	public function generatepdf($id=0,$download='no')
	{
		$tests_flag = true;
		$report = $this->reports_model->getReport($id);
		if(!$report) {
			$tests_flag = false;
			$report = $this->reports_model->getReportWithoutTests($id);
		}
		$data['report'] = $report;
		$data['tests'] = $tests_flag;
		$data['title'] = 'Report';
		$data['username'] = $this->session->userdata('username');
		$rid = $report[0]['id'];
		$name = $report[0]['name'];
		$name = str_replace(' ', '_', $name);
		$html = '';
		$html .= $this->load->view('templates/pdfheader',$data, TRUE);
		$html .= $this->load->view('reports/show',$data, TRUE);
		$html .= $this->load->view('templates/footer', NULL, TRUE);
		$pdfData['html'] = $html;
		$this->load->library('pdf');
		$this->pdf->load_view('pdf/report',array('html'=>$html));
		$this->pdf->render();
		$output = $this->pdf->output();
		$path = "pdfreports/".$id."_".$rid."_".$name.".pdf";
		file_put_contents($path, $output);
		if($download == 'no')
		{
			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center"><strong>Success!</strong> PDF Generated.</div>');
			redirect('patient/reports');
		}
		elseif($download == 'yes')
			$this->downloadpdf($id);
		elseif($download == 'email')
			$this->emailpdf($id);
	}

	public function downloadpdf($id=0)
	{
		if($id)
		{
			$tests_flag = true;
			$report = $this->reports_model->getReport($id);
			if(!$report) {
				$tests_flag = false;
				$report = $this->reports_model->getReportWithoutTests($id);
			}
			$rid = $report[0]['id'];
			$name = $report[0]['name'];
			$name = str_replace(' ', '_', $name);
			$filename = $id."_".$rid."_".$name.".pdf";
			$urlpath = base_url()."pdfreports/".$filename;
			$filepath = FCPATH."pdfreports/".$filename;
			if(file_exists($filepath))
			{
				header('Content-type: application/pdf');
				header('Content-Disposition: attachment; filename="'.$filename.'"');
				readfile($urlpath);
			}
			else
			{
				$this->generatepdf($id,'yes');
			}
		}
		
	}

	public function emailpdf($id=0)
	{

		if($id)
		{
			$tests_flag = true;
			$report = $this->reports_model->getReport($id);
			if(!$report) {
				$tests_flag = false;
				$report = $this->reports_model->getReportWithoutTests($id);
			}
			$rid = $report[0]['id'];
			$name = $report[0]['name'];
			$name = str_replace(' ', '_', $name);
			$filename = $id."_".$rid."_".$name.".pdf";
			$urlpath = base_url()."pdfreports/".$filename;
			$filepath = FCPATH."pdfreports/".$filename;
			if(file_exists($filepath))
			{
				$this->load->library('email');
				$pid = $this->session->userdata('id');
				$pemail = $this->patient_model->getEmail($pid);
				$pemail = $pemail[0]['email'];
				$this->email->from('admin@lababc.com', 'Lab Admin');
				$this->email->to($pemail);
				$this->email->subject('Lab Report');
				$this->email->message('Please find the attachment to get Lab Report');	
				$this->email->attach($filepath);
				if($this->email->send())
				{
					$this->session->set_flashdata('msg', '<div class="alert alert-success text-center"><strong>Success!</strong> Email sent.</div>');
				}
				else
				{
					$this->session->set_flashdata('msg', '<div class="alert alert-error text-center"><strong>Success!</strong> Email not sent.</div>');
				}
				//redirect('patient/reports');
			}
			else
			{
				$this->generatepdf($id,'email');
			}
		}
	}

	public function report($id=0)
	{
		if($id)
		{
			$tests_flag = true;
			$report = $this->reports_model->getReport($id);
			if(!$report) {
				$tests_flag = false;
				$report = $this->reports_model->getReportWithoutTests($id);
			}
			$data['report'] = $report;
			$data['tests'] = $tests_flag;
			$tests_flag = true;
			$data['title'] = 'Report';
			$data['username'] = $this->session->userdata('username');
			$this->load->view('templates/header', $data);
			$this->load->view('reports/show',$data);
			$this->load->view('templates/footer');
			
		}
		else
		{
			redirect('patient/reports');
		}
	}

	public function reports()
	{
		$data['title'] = 'Patient Control Panel';
		$data['patient'] = TRUE;
		$data['name'] = '';
		$id = $this->session->userdata('id');
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
		$rawData['menu'] = $this->load->view('menus/patient', NULL, TRUE);
		$this->load->view('reports/all', $rawData);
		$this->load->view('templates/footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('patient/index');
	}

}