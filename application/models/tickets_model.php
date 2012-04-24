<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tickets_model extends CI_Model {

	function get_categories() {
		
		$this->db->select('*');
		$q = $this->db->get('tractus_tickets_categories');
		
		$cats = array();
		
		foreach($q->result() as $category) {
			$cats[$category->category_id] = $category->category_name;
		}
		
		return $cats;
		
	}
	
	function get_users() {
		
		$this->db->select('id, name');
		$q = $this->db->get('tractus_users');
		
		$users = array();
		
		foreach($q->result() as $user) {
			$users[$user->id] = $user->name;
		}
		
		return $users;
		
	}
	
	function add($ticket_title, $ticket_raised_by, $ticket_assigned_to, $ticket_status, $ticket_category, $ticket_priority, $ticket_description, $ticket_received, $ticket_resolved) {
		
		$data = array(
			'title' => $ticket_title,
			'user_id' => $ticket_raised_by,
			'user_assigned' => $ticket_assigned_to,
			'status' => $ticket_status,
			'category' => $ticket_category,
			'priority' => $ticket_priority,
			'description' => $ticket_description,
			'date_received' => $ticket_received,
			'date_resolved' => $ticket_resolved
		);
		
		$this->db->insert('tractus_tickets', $data);
		
	}
	
	
	function edit($ticket_title, $ticket_raised_by, $ticket_assigned_to, $ticket_status, $ticket_category, $ticket_priority, $ticket_description, $ticket_received, $ticket_resolved, $id) {
	
		$data = array(
			'title' => $ticket_title,
			'user_id' => $ticket_raised_by,
			'user_assigned' => $ticket_assigned_to,
			'status' => $ticket_status,
			'category' => $ticket_category,
			'priority' => $ticket_priority,
			'description' => $ticket_description,
			'date_received' => $ticket_received,
			'date_resolved' => $ticket_resolved
		);
		
		
		$this->db->where('id', $id);
		$this->db->update('tractus_tickets', $data); 
		
	}
	
	function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete('tractus_tickets');
	}
	
	function add_comment($comment, $user_id, $ticket_id) {
		
		$data = array(
			'comment' => $comment,
			'user_id' => $user_id,
			'ticket_id' => $ticket_id
			
		);
		
		$this->db->insert('tractus_tickets_comments', $data);
		
	}

}