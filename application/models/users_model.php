<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function get_roles()
	{
	
		$this->db->select('id, title');
		$q = $this->db->get('tractus_roles');
		
		$data = array();
		
		foreach($q->result() as $item) {
			$data[$item->id] = $item->title;
		}
		
		return $data;
	
	}
	
	function add($name, $email, $role, $summary, $password) {
		
		$data = array(
			'name' => $name,
			'email' => $email,
			'role_id' => $role,
			'summary' => $summary,
			'password' => sha1($password)
		);
		
		// Do a select here, to see if there is a user with the email address specified, if there is, return false immediately
		
		$this->db->select('email');
		$this->db->where('email', $email);
		$q = $this->db->get('tractus_users');
		
		if($q->num_rows() >= 1) {
			return false;
		}
		else {
			$this->db->insert('tractus_users', $data);
			return true;
		}
		
	}
	
	function edit($name, $email, $role, $summary, $password, $id) {
	
		$data = array(
			'name' => $name,
			'email' => $email,
			'role_id' => $role,
			'summary' => $summary,
			'password' => sha1($password)
		);
		
		if(empty($password)) {
			array_pop($data);
		}
		
		$this->db->where('id', $id);
		$this->db->update('tractus_users', $data); 
		
	}
	
	function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete('tractus_users');
	}
	
	function user_exists($email) {
		
		$this->db->select('email');
		$this->db->where('email', $email);
		$q = $this->db->get('tractus_users');
		
		if($q->num_rows() >= 1) {
			$exists = true;
		}
		else {
			$exists = false;
		}
		
		return $exists;
		
	}

}