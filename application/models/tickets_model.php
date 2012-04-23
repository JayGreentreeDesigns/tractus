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

}