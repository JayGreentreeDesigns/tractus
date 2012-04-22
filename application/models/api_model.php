<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model {

	public function get_all_users($offset)
	{
		
		$sql = "SELECT
tractus_users.id,
tractus_users.name,
tractus_users.email,
tractus_users.summary,
tractus_users.role_id,


COALESCE(SUM(tractus_tickets.status = '1'), 0) as user_open_tickets,

COALESCE(SUM(tractus_tickets.status = '2'), 0) as user_closed_tickets,

COALESCE(SUM(tractus_tickets.status = '3'), 0) as user_ongoing_tickets,

tractus_roles.title AS role


from tractus_users

LEFT JOIN tractus_tickets ON tractus_users.id = tractus_tickets.user_id
LEFT JOIN tractus_roles on tractus_users.role_id = tractus_roles.id GROUP BY tractus_users.id LIMIT ".$offset.", 10";
		
		$query = $this->db->query($sql);
		
		return $query;
		
	}
	
	function get_user_info($user_id) {
	
		$sql = "SELECT
tractus_users.id,
tractus_users.name,
tractus_users.email,
tractus_users.summary,
tractus_users.role_id,

COALESCE(SUM(tractus_tickets.status = '1'), 0) as user_open_tickets,

COALESCE(SUM(tractus_tickets.status = '2'), 0) as user_closed_tickets,

COALESCE(SUM(tractus_tickets.status = '3'), 0) as user_ongoing_tickets,

(SELECT COALESCE(COUNT(id), 0) FROM tractus_tickets WHERE user_assigned = tractus_users.id and status = '1') as user_assigned_open_tickets,
(SELECT COALESCE(COUNT(id), 0) FROM tractus_tickets WHERE user_assigned = tractus_users.id and status = '2') as user_assigned_closed_tickets,
(SELECT COALESCE(COUNT(id), 0) FROM tractus_tickets WHERE user_assigned = tractus_users.id and status = '3') as user_assigned_ongoing_tickets,



tractus_roles.title AS role

from tractus_users


LEFT JOIN tractus_tickets ON tractus_users.id = tractus_tickets.user_id
LEFT JOIN tractus_roles on tractus_users.role_id = tractus_roles.id 

WHERE tractus_users.id = '".$user_id."'


GROUP BY tractus_users.id LIMIT 0, 1";
		
		
		
		$query = $this->db->query($sql);
		
		return $query;
		
	}
	
	function get_user_count() {
		$this->db->select('id');
		$q = $this->db->get('tractus_users');
		return $q->num_rows();
	}
}
