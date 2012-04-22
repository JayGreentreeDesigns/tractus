<?php $this->load->view('_templates/header', array('title' => 'System Information')); ?>
		<div class="span9">
        	<div class="page-header">
				<h1>System Information</h1>
			</div>

			<div>
			
				<p>Tractus is a helpdesk system for all purposes.</p>
				
				<hr>
			
				<h3>Base URL</h3>
				<p><?php echo base_url(); ?></p>
				
				<h3>Site URL</h3>
				<p><?php echo site_url(); ?></p>
				
			
				<hr>
			
				<h3>Version</h3>
				<p>0.1.0</p>
				
				<h3>Developer</h3>
				<p>Andrew Hook</p>
			
			</div>
          
        </div><!--/span-->
<?php $this->load->view('_templates/footer'); ?>