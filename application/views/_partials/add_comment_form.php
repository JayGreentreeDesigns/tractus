
 <div class="modal hide fade" id="modal-add-comment">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">x</a>
    <h3>Add comment</h3>
  </div>
 
  <div class="modal-body">
	
	<div>
		<?php $CI =& get_instance(); ?>
		<form class="well">
 			
 			<input type="hidden" name="ticket_id" value="<?php echo $this->uri->segment(3); ?>" />
 			<input type="hidden" name="user_id" value="<?php echo $CI->session->userdata('tractus_user_id'); ?>" />
 			
 			<label>Comment</label>
  			<textarea rows="6" class="span3" name="comment" id="comment" placeholder="e.g. This is now resolved..."></textarea>
  			<span class="help-inline">Your comment</span>
 			
 			
			
 		</form>

	</div>
  
  </div>
  
  <div class="modal-footer">
    <a href="#" data-dismiss="modal" class="btn">Close</a>
    <a href="#" onclick="insert_comment('<?php echo site_url(); ?>/api/get_ticket_info/', '<?php echo site_url(); ?>');" class="btn btn-primary">Save changes</a> 
  </div>

</div>