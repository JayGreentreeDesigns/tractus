<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tickets extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('tickets_model');
	}

	public function index()
	{
	
		$cats = $this->tickets_model->get_categories();
		$priorities = $this->config->item('priority_settings');
		$statuses = $this->config->item('status_settings');
		$users = $this->tickets_model->get_users();
		
		
		$this->load->view('tickets/index', array('categories' => $cats, 'priorities' => $priorities, 'statuses' => $statuses, 'users' => $users));
	}
	
	public function add() {
		
		
		
	}
}
