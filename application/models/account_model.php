<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model {

	function check_user($email, $password) {
		
		$q = $this->db->query('SELECT * FROM tractus_users WHERE email=? AND password=?', array($email, sha1($password))); 
		
		if($q->num_rows() == 1) {
			
			// loop through the record and set session vars accordingly (although CI actually uses Cookies for its sessions - wierd)
			foreach($q->result() as $user) {
				$session = array(
                   'tractus_user_email'  => $user->email,
                   'tractus_user_role_id' => $user->role_id,
                   'tractus_user_name' => $user->name,
                   'tractus_user_logged_in' => TRUE,
                   'tractus_user_id' => $user->id
               );

				$this->session->set_userdata($session);
			}
			
			return true;
		}
		else {
			return false;
		}
		
	}

}