<?php $this->load->view('_templates/header', array('title' => 'Tickets')); ?>
		<div class="span9">
        	<div class="page-header">
        	
        		<div class="pull-right">
        			
        			<div class="btn-group">
        			 	<button onclick="load_tickets('prev');" class="btn"><i class="icon-chevron-left"></i></button>
 						<button onclick="load_tickets('next');" class="btn"><i class="icon-chevron-right"></i></button>
 						<button class="btn" onclick="load_tickets('');"><i class="icon-refresh"></i> Refresh</button>
  						<button class="btn dropdown-toggle" data-toggle="dropdown">
    						<span class="caret"></span>
  						</button>
  						<ul class="dropdown-menu">
    						<li><a href="#" onclick="add_ticket();"><i class="icon-plus"></i> Add Ticket</a></li>
 						</ul>
  
					</div>
				</div>
        	
				<h1>Tickets <span class="header-smaller">[<span id="total_tickets"></span>]</span></h1>
			</div>

			<table class="table">
				<thead>
					<tr>
      					<th><a href="#" onclick="load_tickets('', 'id');">ID</a></th>
      					<th><a href="#" onclick="load_tickets('', 'title');">Title</a></th>
      					<th><a href="#" onclick="load_tickets('', 'user_name');">Raised by</a></th>
      					<th><a href="#" onclick="load_tickets('', 'user_assigned_name');">Assigned to</a></th>
      					<th><a href="#" onclick="load_tickets('', 'status');">Status</a></th>
      					<th><a href="#" onclick="load_tickets('', 'category');">Category</a></th>
      					<th><a href="#" onclick="load_tickets('', 'priority');">Priority</a></th>
      					<th><a href="#" onclick="load_tickets('', 'date_received');">Received</a></th>
      					<th><a href="#" onclick="load_tickets('', 'date_resolved');">Resolved</a></th>
     					<th>Actions</th>
    				</tr>
  				</thead>
  				<tbody id="ticket-list">
    
  				</tbody>
				</table>
				
				
				<!-- below are the hidden forms for viewing/adding/editing users -->
			
			<?php $this->load->view('_partials/add_ticket_form.php', array('categories' => $categories, 'priorities' => $priorities, 'statuses' => $statuses, 'users' => $users)); ?>
			<?php $this->load->view('_partials/edit_ticket_form.php', array('categories' => $categories, 'priorities' => $priorities, 'statuses' => $statuses, 'users' => $users)); ?>
			
				
				 <script>
	$(document).ready(function() {
		load_tickets('', '');
	});
	</script>
          
        </div><!--/span-->
<?php $this->load->view('_templates/footer'); ?>