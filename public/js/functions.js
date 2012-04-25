$(document).ready(function() {
	
	$('.datetimepicker').datetimepicker({ dateFormat: 'yy-mm-dd', timeFormat: 'hh:mm:ss' });
	
});

var glob_offset = 0;
var glob_sort = '';
var glob_order = '';

function load_users(url, action, sort) {
	
	$('#modal-loading').modal();
	
	if(action === 'prev') {
		if((glob_offset - 10) <= 0) {
			glob_offset = 0;
		}
		else {
			glob_offset = glob_offset - 10;
		}
	}
	
	if(action === 'next') {
		glob_offset = glob_offset + 10;
	}
	
	if(sort) {
		glob_sort = sort;
		
		
		if(glob_order === 'ASC') {
			glob_order = 'DESC';
		}
		else {
			glob_order = 'ASC';
		}
		
	}
	else {
		if(glob_sort) {
			glob_sort = glob_sort;
		}
		else {
			glob_sort = 'id';
		}
	}
	
	//alert(glob_sort)
	
	
	var html = '';
	
	
	$.getJSON(url + '?offset=' + glob_offset + '&sort=' + glob_sort + '&order=' + glob_order, function(data) {
	
		if(data.users.length >= 1) {
			
			$.each(data.users, function(i,item) {
			
				html = html + '<tr>';
				html = html + '<td>' + item.id + '</td>';
				html = html + '<td>' + item.name + '</td>';
				html = html + '<td>' + item.email + '</td>';
				html = html + '<td>' + item.role + '</td>';
				html = html + '<td><span class="badge badge-success">' + item.user_open_tickets + '</span></td>';
				html = html + '<td><span class="badge badge-error">' + item.user_closed_tickets + '</span></td>';
				html = html + '<td><span class="badge badge-info">' + item.user_ongoing_tickets + '</span></td>';
				html = html + '<td><div class="btn-group">';
				html = html + '<button title="View user" onclick="view_user(\'' + item.id + '\')" class="btn"><i class="icon-info-sign"></i></button>';
				html = html + '<button title="Edit user" onclick="edit_user(' + item.id + ')" class="btn"><i class="icon-pencil"></i></button>';
				html = html + '<button title="Delete user" onclick="delete_user('+item.id+', false)" class="btn"><i class="icon-remove-sign"></i></button>';
				html = html + '</div></td></tr>';
				
			});
		}
		
		$('#user-list').html(html);
		$('#total_users').html(data.total_users);
		
		$('#modal-loading').modal('hide');
	
	});
	
}

function view_user(id) {
	
	$('#modal-view-user').modal();
	
	$.getJSON('api/get_user_info/' + id, function(data) {
	
		$('p#name').html(data[0].name);
		$('p#email').html(data[0].email);
		$('p#role').html(data[0].role);
		$('p#summary').html(data[0].summary);
		
		$('#open_raised_tickets').html(data[0].user_open_tickets);
		$('#closed_raised_tickets').html(data[0].user_closed_tickets);
		$('#ongoing_raised_tickets').html(data[0].user_ongoing_tickets);
		
		$('#open_assigned_tickets').html(data[0].user_assigned_open_tickets);
		$('#closed_assigned_tickets').html(data[0].user_assigned_closed_tickets);
		$('#ongoing_assigned_tickets').html(data[0].user_assigned_ongoing_tickets);
		
	
	});
	
	
}

function insert_user(url) {

	var user_name = $('input[name="user_name"]').val();
	var user_email = $('input[name="user_email"]').val();
	var user_role = $('select[name="user_role"] :selected').val();
	var user_summary = $('textarea[name="user_summary"]').val();
	var user_password = $('input[name="user_password"]').val();
	
	if(user_name.length < 5) {
		alert('Username must be >= 5 chars');
		return false;
	}
	
	if(user_email.length < 5) {
		alert('Email must be >= 5 chars');
		return false;
	}
	
	if(user_password.length < 5) {
		alert('Password must be >= 5 chars');
		return false;
	}
	
	// At this point we know the form data should be fine, so we can post it over to the users controller for submission.
	
	$.post('users/add', {
		user_name: user_name,
		user_email: user_email,
		user_role: user_role,
		user_summary: user_summary,
		user_password: user_password
	}, function(data) {
	
		if(data.user_added === false) {
			alert('User with email specified already exists')
		}
		else {
			$('#modal-add-user').modal('hide');
		
			// Empty the form item values
			$('input[name="user_name"]').val('');
			$('input[name="user_email"]').val('');
			$("select[name='user_role'] option:selected").removeAttr("selected");
			$('textarea[name="user_summary"]').val('');
			$('input[name="user_password"]').val('');
		
			load_users('api/get_all_users', '');
		}
	});
	
}

function add_user() {
	
	$('#modal-add-user').modal();

}


function edit_user(id) {
	
	$('#modal-edit-user').modal();
	
	$.getJSON('api/get_user_info/' + id, function(data) {
		$('input[name="name"]').val(data[0].name);
		$('input[name="email"]').val(data[0].email);
		$("#roles option[value="+data[0].role_id+"]").attr('selected', 'selected');
		$('textarea[name="summary"]').val(data[0].summary);
		$('input[name="id"]').val(data[0].id);
	});
	
}

function update_user() {
	
	var name = $('input[name="name"]').val();
	var email = $('input[name="email"]').val();
	var role = $('select[name="roles"] :selected').val();
	var summary = $('textarea[name="summary"]').val();
	var password = $('input[name="password"]').val();
	var id = $('input[name="id"]').val();
	
	
	if(name.length < 5) {
		alert('Username must be >= 5 chars');
		return false;
	}
	
	if(email.length < 5) {
		alert('Email must be >= 5 chars');
		return false;
	}
	
	if(password.length > 0 && password.length < 5) {
		alert('Password must be >= 5 chars');
		return false;
	}

	$.post('users/edit', {
		name: name,
		email: email,
		role: role,
		summary: summary,
		password: password,
		id: id
	}, function() {
		$('#modal-edit-user').modal('hide');
		load_users('api/get_all_users', '')
	});
		
}

function delete_user(id, confirmed) {
	
	if(confirmed == true) {
		var posturl = 'users/delete';
		$.post(posturl, {
			id: id
		},
		function() {
			load_users('api/get_all_users', '');
		});
	}
	else {
		
		var answer = confirm ("Are you sure you want to delete the user? If you do, all tickets related to this user will not show the user's name.")
		
		if(answer) {
			delete_user(id, true);
		}

	}
	
}


/* Not for the ticket functionality */
function load_tickets(action, sort) {
	
	var url = 'api/get_all_tickets';
	
	
	$('#modal-loading').modal();
	
	if(action === 'prev') {
		if((glob_offset - 10) <= 0) {
			glob_offset = 0;
		}
		else {
			glob_offset = glob_offset - 10;
		}
	}
	
	if(action === 'next') {
		glob_offset = glob_offset + 10;
	}
	
	if(sort) {
		glob_sort = sort;
		
		
		if(glob_order === 'ASC') {
			glob_order = 'DESC';
		}
		else {
			glob_order = 'ASC';
		}
		
	}
	else {
		if(glob_sort) {
			glob_sort = glob_sort;
		}
		else {
			glob_sort = 'id';
		}
	}
	
	var html = '';
	
	$.getJSON(url + '?offset=' + glob_offset + '&sort=' + glob_sort + '&order=' + glob_order, function(data) {
	
		if(data.tickets.length >= 1) {
			
			$.each(data.tickets, function(i,item) {
			
				html = html + '<tr>';
				html = html + '<td>'+item.id+'</td>';
				html = html + '<td><a href="tickets/view/'+item.id+'">'+item.title+'</a></td>';
				html = html + '<td>'+item.user_name+'</td>';
				html = html + '<td>'+item.user_assigned_name+'</td>';
				html = html + '<td>'+item.status+'</td>';
				html = html + '<td><img src="'+item.category_icon+'">'+item.category_name+'</td>';
				html = html + '<td>'+item.priority+'</td>';
				html = html + '<td>'+item.date_received+'</td>';
				html = html + '<td>'+item.date_resolved+'</td>';
				html = html + '<td><div class="btn-group">';
				html = html + '<button title="Edit ticket" onclick="edit_ticket(' + item.id + ')" class="btn"><i class="icon-pencil"></i></button>';
				html = html + '<button title="Delete ticket" onclick="delete_ticket('+item.id+', false)" class="btn"><i class="icon-remove-sign"></i></button>';
				html = html + '</div></td></tr>';
				
			});
		}
		
		$('#ticket-list').html(html);
		$('#total_tickets').html(data.total_tickets);
		
		$('#modal-loading').modal('hide');
	
	});
	
}

function add_ticket() {
	
	$('#modal-add-ticket').modal();

}

function insert_ticket() {

	var title = $('input[name="ticket_title"]').val();
	var ticket_raised_by = $('select[name="ticket_raised_by"] :selected').val();
	var ticket_assigned_to = $('select[name="ticket_assigned_to"] :selected').val();
	var ticket_status = $('select[name="ticket_status"] :selected').val();
	var ticket_category = $('select[name="ticket_category"] :selected').val();
	var ticket_priority = $('select[name="ticket_priority"] :selected').val();
	var ticket_description = $('textarea[name="ticket_description"]').val();
	var ticket_received = $('input[name="ticket_received"]').val();
	var ticket_resolved = $('input[name="ticket_resolved"]').val();

	if(title.length < 5) {
		alert('Title must be >= 5 chars');
		return false;
	}
	
	
	// At this point we know the form data should be fine, so we can post it over to the users controller for submission.
	
	$.post('tickets/add', {
		ticket_title: title,
		ticket_raised_by: ticket_raised_by,
		ticket_assigned_to: ticket_assigned_to,
		ticket_status: ticket_status,
		ticket_category: ticket_category,
		ticket_priority: ticket_priority,
		ticket_description: ticket_description,
		ticket_received: ticket_received,
		ticket_resolved: ticket_resolved
		
	}, function() {
		$('#modal-add-ticket').modal('hide');
		
		// Empty the form item values
		$('input[name="ticket_title"]').val('');
		$("select[name='ticket_raised_by'] option:selected").removeAttr("selected");
		$("select[name='ticket_assigned_to'] option:selected").removeAttr("selected");
		$("select[name='ticket_status'] option:selected").removeAttr("selected");
		$("select[name='ticket_category'] option:selected").removeAttr("selected");
		$("select[name='ticket_priority'] option:selected").removeAttr("selected");
		$('textarea[name="ticket_description"]').val('');
		$('input[name="ticket_received"]').val('');
		$('input[name="ticket_resolved"]').val('');
		
		load_tickets('', '')
	});
	
}


function edit_ticket(id) {
	
	$('#modal-edit-ticket').modal();
	
	$.getJSON('api/get_ticket_info/' + id, function(data) {
		$('input[name="id"]').val(data[0].id);
		$('input[name="edit_ticket_title"]').val(data[0].title);
		$("select[name='edit_ticket_raised_by'] option[value="+data[0].user_id+"]").attr('selected', 'selected');
		$("select[name='edit_ticket_assigned_to'] option[value="+data[0].user_assigned+"]").attr('selected', 'selected');
		$("select[name='edit_ticket_status'] option[value="+data[0].status_id+"]").attr('selected', 'selected');
		$("select[name='edit_ticket_category'] option[value="+data[0].category+"]").attr('selected', 'selected');
		$("select[name='edit_ticket_priority'] option[value="+data[0].priority_id+"]").attr('selected', 'selected');
		$('textarea[name="edit_ticket_description"]').val(data[0].description);
		$('input[name="edit_ticket_received"]').val(data[0].date_received);
		$('input[name="edit_ticket_resolved"]').val(data[0].date_resolved);
	});
	
}



function update_ticket() {
	
	var id = $('input[name="id"]').val();
	var title = $('input[name="edit_ticket_title"]').val();
	var ticket_raised_by = $('select[name="edit_ticket_raised_by"] :selected').val();
	var ticket_assigned_to = $('select[name="edit_ticket_assigned_to"] :selected').val();
	var ticket_status = $('select[name="edit_ticket_status"] :selected').val();
	var ticket_category = $('select[name="edit_ticket_category"] :selected').val();
	var ticket_priority = $('select[name="edit_ticket_priority"] :selected').val();
	var ticket_description = $('textarea[name="edit_ticket_description"]').val();
	var ticket_received = $('input[name="edit_ticket_received"]').val();
	var ticket_resolved = $('input[name="edit_ticket_resolved"]').val();
	
	if(title.length < 5) {
		alert('Title must be >= 5 chars');
		return false;
	}

	$.post('tickets/edit', {
		id: id,
		ticket_title: title,
		ticket_raised_by: ticket_raised_by,
		ticket_assigned_to: ticket_assigned_to,
		ticket_status: ticket_status,
		ticket_category: ticket_category,
		ticket_priority: ticket_priority,
		ticket_description: ticket_description,
		ticket_received: ticket_received,
		ticket_resolved: ticket_resolved
		
	}, function() {
		$('#modal-edit-ticket').modal('hide');
		load_tickets('', '')
	});
		
}


function delete_ticket(id, confirmed) {
	
	if(confirmed == true) {
		var posturl = 'tickets/delete';
		$.post(posturl, {
			id: id
		},
		function() {
			load_tickets('', '');
		});
	}
	else {
		
		var answer = confirm ("Are you sure you want to delete the ticket? Comments and attachments will remain, but won't be accessible.")
		
		if(answer) {
			delete_ticket(id, true);
		}

	}
	
}

function view_ticket(url, id) {
	
	$('#modal-loading').modal();
	
	$.getJSON(url + id, function(data) {
		
		// Place the returned data into the relevant HTML elements
		$('#ticket_title').html(data[0].title);
		$('#raised_by').html(data[0].user_name);
		$('#assigned_to').html(data[0].user_assigned_name);
		$('#status').html(data[0].status);
		$('#category').html('<span style="padding: 5px; background:#'+data[0].category_colour+'"><img src="'+ data[0].category_icon+ '"> ' + data[0].category_name + '</span>');
		$('#priority').html(data[0].priority);
		$('#description').html(data[0].description_formatted);
		$('#received').html(data[0].date_received);
		$('#resolved').html(data[0].date_resolved);
		
		var html = '';
		
		if(data[0].comments.length >= 1) {
			
			$.each(data[0].comments, function(i,item) {
			
				html = html + '<div id="comment"><h4>'+item.name+'<span id="comment-meta">'+item.date+'</span></h4><p>'+item.comment+'</p>';
				
				html = html + '</div>';
				
			});
			
			$('#comments').html(html);
		}
		else {
			// No comments so put in a message saying no comments
			$('#comments').html('<p>No comments</p>');
			
		}
		
		
	});
	
	// Hide the modal dialog when finished loading
	$('#modal-loading').modal('hide');
}

function add_comment() {
	
	$('#modal-add-comment').modal();
	
}

function insert_comment(url, site_url) {
	
	var comment = $('textarea[name="comment"]').val();
	var ticket_id = $('input[name="ticket_id"]').val();
	var user_id = $('input[name="user_id"]').val();
	

	if(comment.length < 5) {
		alert('Comment must be >= 5 chars');
		return false;
	}
	
	// At this point we know the form data should be fine, so we can post it over to the users controller for submission.
	
	$.post(site_url + '/tickets/add_comment', {
		ticket_id: ticket_id,
		user_id: user_id,
		comment: comment

	}, function() {
		$('#modal-add-comment').modal('hide');
		
		// Empty the form item values
		$('textarea[name="comment"]').val('');

		view_ticket(url, ticket_id)
	});
	
}