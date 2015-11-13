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

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('type') === 'operator' && $this->session->userdata('username')) {
			redirect("operator");
		} elseif($this->session->userdata('type') === 'patient' && $this->session->userdata('username')) {
			redirect("patient");
		}
		$this->load->model('login_model');
	}
	public function getPatientName(){
        $keyword=$this->input->post('keyword');
        $data=$this->login_model->getData($keyword);
        echo json_encode($data);
    }

	public function index()
	{
		$data['title'] = 'Login Page';
		$this->load->view('templates/header', $data);
		$this->load->view('login', $data);
		$this->load->view('templates/footer');
	}

	public function operator()
	{

		$dataView['title'] = 'Operator Login';
		$this->load->view('templates/header', $dataView);
		//get the posted values
          $username = $this->input->post("username");
          $password = $this->input->post("password");

          //set validations
          $this->form_validation->set_rules("username", "Username", "trim|required");
          $this->form_validation->set_rules("password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               $this->load->view('login/operator', $dataView);
          }
          else
          {
               //validation succeeds
               if ($this->input->post('btn_login') == "Login")
               {
                    //check if username and password is correct
                    $usr_result = $this->login_model->get_operator($username, $password);
                    if ($usr_result > 0) //active user record is present
                    {
                         //set the session variables
                         $sessiondata = array(
                              'username' => $username,
                              'loginuser' => TRUE,
                              'type' => 'operator'
                         );
                         $this->session->set_userdata($sessiondata);
                         redirect("operator");
                    }
                    else
                    {
                         $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                         redirect('login/operator');
                    }
               }
               else
               {
                    redirect('login/index');
               }
          }
		
		$this->load->view('templates/footer');
	}

	public function patient() 
	{
		$data['title'] = 'Patient Login';
		$this->load->view('templates/header', $data);
		//$this->load->view('login/patient', $data);
		//get the posted values
          $username = $this->input->post("username");
          $password = $this->input->post("password");

          //set validations
          $this->form_validation->set_rules("username", "Username", "trim|required");
          $this->form_validation->set_rules("password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               $this->load->view('login/patient', $data);
          }
          else
          {
               //validation succeeds
               if ($this->input->post('btn_login') == "Login")
               {
                    //check if username and password is correct
                    $usr_result = $this->login_model->get_patient($username, $password);
                    if ($usr_result > 0) //active user record is present
                    {
                         //set the session variables
                         $sessiondata = array(
                              'username' => $username,
                              'loginuser' => TRUE,
                              'type' => 'patient'
                         );
                         $this->session->set_userdata($sessiondata);
                         redirect("patient");
                    }
                    else
                    {
                         $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                         redirect('login/patient');
                    }
               }
               else
               {
                    redirect('login/index');
               }
          }
		$this->load->view('templates/footer');
	}
}
