<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('api_model');
	}

	public function get_all_users()
	{
	
		$offset = $this->input->get('offset');
		$sort = $this->input->get('sort');
		$order = $this->input->get('order');
		
		if(empty($offset)) {
			$offset = 0;
		}
		
		if(empty($sort)) {
			$sort = 'id';
		}
		
		if(empty($order)) {
			$order = 'ASC';
		}
		
		$users = $this->api_model->get_all_users($offset, $sort, $order);
		
		$total_users = $this->api_model->get_user_count();
		
		$data = array('total_users' => $total_users, 'users' => $users->result());
		
		header('Content-Type: application/json');
		
		echo json_encode($data);
		
		//echo("<pre>".print_r($users->result(), 1)."</pre>");
		
	}
	
	public function get_user_info($user_id = null) {
		
		if(!is_null($user_id) && !empty($user_id)) {
		
			header('Content-Type: application/json');
			
			$user = $this->api_model->get_user_info($user_id);
			
			echo json_encode($user->result());
			
		}
		
	}
	
	
	// Ticket Data
	
	public function get_all_tickets() {
	
		$offset = $this->input->get('offset');
		$sort = $this->input->get('sort');
		$order = $this->input->get('order');
		
		if(empty($offset)) {
			$offset = 0;
		}
		
		if(empty($sort)) {
			$sort = 'id';
		}
		
		if(empty($order)) {
			$order = 'ASC';
		}
	
		$tickets = $this->api_model->get_all_tickets($offset, $sort, $order);
		
		$statuses = $this->config->item('status_settings');
		$priorities = $this->config->item('priority_settings');
		
		$total_tickets = $this->api_model->get_user_count();
		
		$formatted_tickets = array();
		
		
		
		foreach($tickets->result() as $ticket) {
			
			$formatted_tickets[] = array(
					'id' => $ticket->id,
					'user_id' => $ticket->user_id,
					'user_name' => $ticket->user_name,
					'user_assigned' => $ticket->user_assigned,
					'user_assigned_name' => $ticket->user_assigned_name,
					'comments_total' => $ticket->comments_total,
					'attachments_total' => $ticket->attachments_total,
					'status' => $statuses[$ticket->status],
					'category' => $ticket->category,
					'priority' => $priorities[$ticket->priority],
					'title' => $ticket->title,
					'date_received' => date('d/m/Y H:i:s', strtotime($ticket->date_received)),
					'date_resolved' => date('d/m/Y H:i:s', strtotime($ticket->date_resolved)),
					'category_id' => $ticket->category_id,
					'category_name' => $ticket->category_name,
					'category_colour' => $ticket->category_colour,
					'category_icon' => base_url().'public/img/icons/'.$ticket->category_icon
			);
			
		}
		
		
		$data = array('total_tickets' => $total_tickets, 'tickets' => $formatted_tickets);
		
		header('Content-Type: application/json');
		
		echo json_encode($data);
		
	}
}
