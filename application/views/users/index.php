<?php $this->load->view('_templates/header', array('title' => 'Users')); ?>
		<div class="span9">
        	<div class="page-header">
        		<div class="pull-right">
        			
        			<div class="btn-group">
        			 	<button onclick="load_users('<?php echo site_url(); ?>/api/get_all_users', 'prev');" class="btn"><i class="icon-chevron-left"></i></button>
 						<button onclick="load_users('<?php echo site_url(); ?>/api/get_all_users', 'next');" class="btn"><i class="icon-chevron-right"></i></button>
 						<button class="btn" onclick="load_users('<?php echo site_url(); ?>/api/get_all_users', '');"><i class="icon-refresh"></i> Refresh</button>
  						<button class="btn dropdown-toggle" data-toggle="dropdown">
    						<span class="caret"></span>
  						</button>
  						<ul class="dropdown-menu">
    						<li><a href="#" onclick="add_user();"><i class="icon-plus"></i> Add User</a></li>
 						</ul>
  
					</div>
				</div>
        		
        		<h1>Users <span class="header-smaller">[<span id="total_users"></span>]</span></h1>
			</div>

			<table class="table">
				<thead>
					<tr>
      					<th><a href="#" onclick="load_users('<?php echo site_url(); ?>/api/get_all_users', 'prev', 'id');">ID</a></th>
      					<th><a href="#" onclick="load_users('<?php echo site_url(); ?>/api/get_all_users', 'prev', 'name');">Name</a></th>
      					<th><a href="#" onclick="load_users('<?php echo site_url(); ?>/api/get_all_users', 'prev', 'email');">Email</a></th>
      					<th><a href="#" onclick="load_users('<?php echo site_url(); ?>/api/get_all_users', 'prev', 'role');">Role</a></th>
      					<th><a href="#" onclick="load_users('<?php echo site_url(); ?>/api/get_all_users', 'prev', 'user_open_tickets');">Open tickets</a></th>
      					<th><a href="#" onclick="load_users('<?php echo site_url(); ?>/api/get_all_users', 'prev', 'user_closed_tickets');">Closed tickets</a></th>
      					<th><a href="#" onclick="load_users('<?php echo site_url(); ?>/api/get_all_users', 'prev', 'user_ongoing_tickets');">Ongoing tickets</a></th>
     					<th>Actions</th>
    				</tr>
  				</thead>
  				<tbody id="user-list">
    
  				</tbody>
				</table>
			
			
			<!-- below are the hidden forms for viewing/adding/editing users -->
			
			<?php $this->load->view('_partials/add_user_form.php', array('roles' => $roles)); ?>
			<?php $this->load->view('_partials/edit_user_form.php'); ?>
			<?php $this->load->view('_partials/view_user_info.php'); ?>
			
			
          <script>
	$(document).ready(function() {
		load_users('<?php echo site_url(); ?>/api/get_all_users', '');
	});
	</script>
        </div><!--/span-->
<?php $this->load->view('_templates/footer'); ?>