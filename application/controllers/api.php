<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('api_model');
	}

	public function get_all_users()
	{
	
		$offset = $this->input->get('offset');
		
		if(empty($offset)) {
			$offset = 0;
		}
		
		$users = $this->api_model->get_all_users($offset);
		
		$total_users = $this->api_model->get_user_count();
		
		$data = array('total_users' => $total_users, 'users' => $users->result());
		
		header('Content-Type: application/json');
		
		echo json_encode($data);
		
		//echo("<pre>".print_r($users->result(), 1)."</pre>");
		
	}
	
	function get_user_info($user_id = null) {
		
		if(!is_null($user_id) && !empty($user_id)) {
		
			header('Content-Type: application/json');
			
			$user = $this->api_model->get_user_info($user_id);
			
			echo json_encode($user->result());
			
		}
		
	}
}
