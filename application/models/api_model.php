<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model {

	public function get_all_users($offset, $sort, $order)
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
LEFT JOIN tractus_roles on tractus_users.role_id = tractus_roles.id GROUP BY tractus_users.id ORDER BY ".$sort." ".$order." LIMIT ".$offset.", 10";
		
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
	
	function get_all_tickets($offset, $sort, $order) {
		
		$sql = "SELECT
tractus_tickets.id,

tractus_tickets.user_id,

(SELECT name FROM tractus_users WHERE id = tractus_tickets.user_id) as user_name,

tractus_tickets.user_assigned,
(SELECT name FROM tractus_users WHERE id = tractus_tickets.user_assigned) as user_assigned_name,

(SELECT COUNT(comment_id) FROM tractus_tickets_comments WHERE tractus_tickets_comments.comment_id = tractus_tickets.id) as comments_total,

(SELECT COUNT(attachment_id) FROM tractus_tickets_attachments WHERE tractus_tickets_attachments.attachment_id = tractus_tickets.id) as attachments_total,

tractus_tickets.status,
tractus_tickets.category,
tractus_tickets.priority,

tractus_tickets_categories.category_id,
tractus_tickets_categories.category_name,
tractus_tickets_categories.category_colour,
tractus_tickets_categories.category_icon,

tractus_tickets.title,
tractus_tickets.date_received,
tractus_tickets.date_resolved


FROM tractus_tickets

LEFT JOIN tractus_tickets_categories on tractus_tickets.category = tractus_tickets_categories.category_id

GROUP BY tractus_tickets.id ORDER BY ".$sort." ".$order." LIMIT ".$offset.", 10";
		
		$query = $this->db->query($sql);
		
		return $query;
		
	}
	
	function get_ticket_count() {
		$this->db->select('id');
		$q = $this->db->get('tractust_tickets');
		return $q->num_rows();
	}
}
