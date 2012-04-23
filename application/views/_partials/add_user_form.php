
 <div class="modal hide fade" id="modal-add-user">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">x</a>
    <h3>Add user</h3>
  </div>
 
  <div class="modal-body">
	
	<div>
		
		<form class="well">
 			
 			<label>Name</label>
  			<input type="text" class="span3" name="user_name" id="user_name" placeholder="e.g. Joe Bloggs">
  			<span class="help-inline">User's full name</span>
 					
 			<label>Email</label>
  			<input type="text" class="span3" name="user_email" id="user_email" placeholder="e.g. test@example.com">
  			<span class="help-inline">User's email address</span>
 			
 			
 			<label>Role</label>
  			<select name="user_role" id="user_role" class="span3">
  				<?php foreach($roles as $key => $value) : ?>
  				<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
  				<?php endforeach; ?>
  			</select>
  			<span class="help-inline">User's role</span>
 			
 			<label>Summary</label>
  			<textarea class="span3" name="user_summary" id="user_summary" placeholder="e.g. This user is a support tech"></textarea>
  			<span class="help-inline">Summary of the user</span>
 			
 			
 			<label>Password</label>
  			<input type="password" class="span3" id="user_password" name="user_password">
  			<span class="help-inline">Users' password</span>
 			
			
 		</form>

	</div>
  
  </div>
  
  <div class="modal-footer">
    <a href="#" data-dismiss="modal" class="btn">Close</a>
    <a href="#" onclick="insert_user('<?php echo site_url(); ?>/users/add');" class="btn btn-primary">Save changes</a> 
  </div>

</div>