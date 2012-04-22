<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	public function index()
	{
		$this->load->view('account/index');
	}
	
	public function logout() {
		
		// Run some logout stuff here
		
	}
	
	public function login() {
		
		
		
		$this->load->view('account/login');
		
	}
	
}