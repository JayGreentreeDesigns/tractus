<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('account_model');
	}

	public function index()
	{
		$this->load->view('account/index');
	}
	
	public function logout() {
		
		// Run some logout stuff here
		$this->session->sess_destroy();
		
		redirect('account/login');
		
	}
	
	public function login() {
		
		if($this->input->post('submit')) {
			
			// No need to sanitize user input here, as this is handled in the model
			$user = $this->account_model->check_user($this->input->post('email'), $this->input->post('password'));
			if($user) {
				
				// Sessions are set in the model, so all we need to do here is redirect
				redirect('dashboard');
				
			}
			
		}
		
		$this->load->view('account/login');
		
	}
	
}