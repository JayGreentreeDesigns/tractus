
 <div class="modal hide fade" id="modal-edit-ticket">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">x</a>
    <h3>Edit ticket</h3>
  </div>
 
  <div class="modal-body">
	
	<div>
		
		<form class="well">
		
			<input type="hidden" name="id" id="id" value="" />
 			
 			<label>Title</label>
  			<input type="text" class="span3" name="edit_ticket_title" id="edit_ticket_title" placeholder="e.g. Browser not responding">
  			<span class="help-inline">Descriptive title</span>
 			
 			<label>Raised by</label>
  			<select name="edit_ticket_raised_by" id=edit_"ticket_raised_by" class="span3">
  				<?php foreach($users as $key => $value) : ?>
  				<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
  				<?php endforeach; ?>
  			</select>
  			<span class="help-inline">User who raised the ticket</span>
  			
  			
  			<label>Assigned to</label>
  			<select name="edit_ticket_assigned_to" id="edit_ticket_assigned_to" class="span3">
  				<?php foreach($users as $key => $value) : ?>
  				<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
  				<?php endforeach; ?>
  			</select>
  			<span class="help-inline">User responsible</span>
 			
 			<label>Status</label>
  			<select name="edit_ticket_status" id="edit_ticket_status" class="span3">
  				<?php foreach($statuses as $key => $value) : ?>
  				<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
  				<?php endforeach; ?>
  			</select>
  			<span class="help-inline">Status of the ticket</span>
 			
 			
 			<label>Category</label>
  			<select name="edit_ticket_category" id="edit_ticket_category" class="span3">
  				<?php foreach($categories as $key => $value) : ?>
  				<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
  				<?php endforeach; ?>
  			</select>
  			<span class="help-inline">Ticket category</span>
 			
 			
 			<label>Priority</label>
  			<select name="edit_ticket_priority" id="edit_ticket_priority" class="span3">
  				<?php foreach($priorities as $key => $value) : ?>
  				<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
  				<?php endforeach; ?>
  			</select>
  			<span class="help-inline">How important the ticket is</span>
 			
 			<label>Description</label>
  			<textarea rows="6" class="span3" name="edit_ticket_description" id="edit_ticket_description" placeholder=""></textarea>
  			<span class="help-inline">Description/details</span>
 			
 			
 			<label>Received</label>
  			<input type="text" class="span3 datetimepicker" name="edit_ticket_received" id="edit_ticket_received" placeholder="">
  			<span class="help-inline">When the ticket was recieved</span>
 			
 			
 			<label>Resolved</label>
  			<input type="text" class="span3 datetimepicker" name="edit_ticket_resolved" id="edit_ticket_resolved" placeholder="">
  			<span class="help-inline">When the ticket was resolved</span>
 			
 			
			
 		</form>

	</div>
  
  </div>
  
  <div class="modal-footer">
    <a href="#" data-dismiss="modal" class="btn">Close</a>
    <a href="#" onclick="update_ticket();" class="btn btn-primary">Save changes</a> 
  </div>

</div>