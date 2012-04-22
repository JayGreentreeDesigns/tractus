<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('users_model');
	}

	public function index()
	{
		
		$data['roles'] = $this->users_model->get_roles();
		
		
		$this->load->view('users/index', $data);
	
	}
	
	public function add() {
		
		$name = $this->input->post('user_name');
		$email = $this->input->post('user_email');
		$role = $this->input->post('user_role');
		$summary = $this->input->post('user_summary');
		$password = $this->input->post('user_password');
		
		$this->users_model->add($name, $email, $role, $summary, $password);
		
	}
	
	public function edit() {
		
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$role = $this->input->post('role');
		$summary = $this->input->post('summary');
		$password = $this->input->post('password');
		$id = $this->input->post('id');
		
		$this->users_model->edit($name, $email, $role, $summary, $password, $id);
		
	}
	
	public function delete() {
	
		$id = $this->input->post('id');
		
		$this->users_model->delete($id);
		
	}
}
