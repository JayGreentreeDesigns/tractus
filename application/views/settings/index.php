<?php $this->load->view('_templates/header', array('title' => 'Settings')); ?>
		<div class="span9">
        	<div class="page-header">
				<h1>Settings</h1>
			</div>

			<div>
				<form class="well">
 					<label>Site Title</label>
  					<input type="text" class="span3" name="site_title" placeholder="The title of the helpdesk site">
  					<span class="help-inline">Appears in various locations throughout the site</span>
 					
 					<label>Contact details</label>
  					<textarea id="textarea" name="contact_details" class="input-xlarge" rows="6" class="span3" placeholder="Your contact details for users"></textarea>
  					<span class="help-inline">Provide some alternate contact details for your users</span>
 
 
  <label class="checkbox">
    <input type="checkbox" name="allow_user_registration"> Allow user registration
  </label>
  
    <label class="checkbox">
    <input type="checkbox" name="allow_referral_user_registration"> Allow referral user registration
  </label>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
			</div>
          
        </div><!--/span-->
<?php $this->load->view('_templates/footer'); ?>