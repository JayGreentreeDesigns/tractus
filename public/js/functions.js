var glob_offset = 0;

function load_users(url, action) {
	
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
	
	
	var html = '';
	
	
	$.getJSON(url + '?offset=' + glob_offset, function(data) {
	
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
	}, function() {
		$('#modal-add-user').modal('hide');
		
		// Empty the form item values
		$('input[name="user_name"]').val('');
		$('input[name="user_email"]').val('');
		$("select[name='user_role'] option:selected").removeAttr("selected");
		$('textarea[name="user_summary"]').val('');
		$('input[name="user_password"]').val('');
		
		load_users('api/get_all_users', '')
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