
  <div class="modal hide fade" id="modal-edit-user">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">x</a>
    <h3>Edit user</h3>
  </div>
 
  <div class="modal-body">
	
	<form class="well">
 			
 			<input type="hidden" name="id" id="id" value="" />
 			
 			<label>Name</label>
  			<input type="text" class="span3" name="name" id="name" placeholder="e.g. Joe Bloggs">
  			<span class="help-inline">User's full name</span>
 					
 			<label>Email</label>
  			<input type="text" class="span3" name="email" id="email" placeholder="e.g. test@example.com">
  			<span class="help-inline">User's email address</span>
 			
 			
 			<label>Role</label>
  			<select name="roles" id="roles" class="span3">
  				<?php foreach($roles as $key => $value) : ?>
  				<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
  				<?php endforeach; ?>
  			</select>
  			<span class="help-inline">User's role</span>
 			
 			<label>Summary</label>
  			<textarea class="span3" name="summary" id="summary" placeholder="e.g. This user is a support tech"></textarea>
  			<span class="help-inline">Summary of the user</span>
 			
 			
 			<label>Password</label>
  			<input type="password" class="span3" id="password" name="password">
  			<span class="help-inline">Leave this field blank if you don't want to update it</span>
 			
			
 		</form>
   
  </div>
  <div class="modal-footer">
    <a href="#" data-dismiss="modal" class="btn">Close</a>
    <a href="#" onclick="update_user();" class="btn btn-primary">Save changes</a> 
  </div>

</div>

