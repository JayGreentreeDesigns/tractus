
 <div class="modal hide fade" id="modal-add-ticket">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">x</a>
    <h3>Add ticket</h3>
  </div>
 
  <div class="modal-body">
	
	<div>
		
		<form class="well">
 			
 			<label>Title</label>
  			<input type="text" class="span3" name="ticket_title" id="ticket_title" placeholder="e.g. Browser not responding">
  			<span class="help-inline">Descriptive title</span>
 			
 			<label>Raised by</label>
  			<select name="ticket_raised_by" id="ticket_raised_by" class="span3">
  				<?php foreach($users as $key => $value) : ?>
  				<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
  				<?php endforeach; ?>
  			</select>
  			<span class="help-inline">User who raised the ticket</span>
  			
  			
  			<label>Assigned to</label>
  			<select name="ticket_assigned_to" id="ticket_assigned_to" class="span3">
  				<?php foreach($users as $key => $value) : ?>
  				<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
  				<?php endforeach; ?>
  			</select>
  			<span class="help-inline">User responsible</span>
 			
 			<label>Status</label>
  			<select name="ticket_status" id="ticket_status" class="span3">
  				<?php foreach($statuses as $key => $value) : ?>
  				<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
  				<?php endforeach; ?>
  			</select>
  			<span class="help-inline">Status of the ticket</span>
 			
 			
 			<label>Category</label>
  			<select name="ticket_category" id="ticket_category" class="span3">
  				<?php foreach($categories as $key => $value) : ?>
  				<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
  				<?php endforeach; ?>
  			</select>
  			<span class="help-inline">Ticket category</span>
 			
 			
 			<label>Priority</label>
  			<select name="ticket_priority" id="ticket_priority" class="span3">
  				<?php foreach($priorities as $key => $value) : ?>
  				<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
  				<?php endforeach; ?>
  			</select>
  			<span class="help-inline">How important the ticket is</span>
 			
 			<label>Description</label>
  			<textarea rows="6" class="span3" name="ticket_description" id="ticket_description" placeholder=""></textarea>
  			<span class="help-inline">Description/details</span>
 			
 			
 			<label>Received</label>
  			<input type="text" class="span3" name="ticket_received" id="ticket_received" placeholder="">
  			<span class="help-inline">When the ticket was recieved</span>
 			
 			
 			<label>Resolved</label>
  			<input type="text" class="span3" name="ticket_resolved" id="ticket_resolved" placeholder="">
  			<span class="help-inline">When the ticket was resolved</span>
 			
 			
			
 		</form>

	</div>
  
  </div>
  
  <div class="modal-footer">
    <a href="#" data-dismiss="modal" class="btn">Close</a>
    <a href="#" onclick="insert_ticket();" class="btn btn-primary">Save changes</a> 
  </div>

</div>