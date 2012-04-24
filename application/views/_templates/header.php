<?php $CI =& get_instance(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo (!empty($title) ? $title : ''); ?> &#124; <?php echo $CI->config->item('site_title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url(); ?>public/css/system.css<?php echo $CI->config->item('css_javascript_version_query_string'); ?>" rel="stylesheet">
   	<link href="<?php echo base_url(); ?>public/css/lib/jquery.fileupload-ui.css<?php echo $CI->config->item('css_javascript_version_query_string'); ?>" rel="stylesheet" />
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="<?php echo base_url(); ?>public/css/bootstrap-responsive.css" rel="stylesheet">
	 <link href="<?php echo base_url(); ?>public/css/flick/jquery-ui-1.8.19.custom.css" rel="stylesheet">


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/jquery-ui-1.8.19.custom.min.js<?php echo $CI->config->item('css_javascript_version_query_string'); ?>"></script>
   	
    <script src="<?php echo base_url(); ?>public/js/bootstrap.js<?php echo $CI->config->item('css_javascript_version_query_string'); ?>"></script>
   	 <script src="<?php echo base_url(); ?>public/js/jquery-ui-timepicker-addon.js<?php echo $CI->config->item('css_javascript_version_query_string'); ?>"></script>
   
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="http://blueimp.github.com/JavaScript-Templates/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="http://blueimp.github.com/JavaScript-Canvas-to-Blob/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS and Bootstrap Image Gallery are not required, but included for the demo -->
<script src="http://blueimp.github.com/Bootstrap-Image-Gallery/js/bootstrap-image-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo base_url(); ?>public/js/lib/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo base_url(); ?>public/js/lib/jquery.fileupload.js"></script>
<!-- The File Upload file processing plugin -->
<script src="<?php echo base_url(); ?>public/js/lib/jquery.fileupload-fp.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo base_url(); ?>public/js/lib/jquery.fileupload-ui.js"></script>
<!-- The localization script -->
<script src="<?php echo base_url(); ?>public/js/lib/locale.js"></script>
<!-- The main application script -->
<script src="<?php echo base_url(); ?>public/js/lib/main.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
<!--[if gte IE 8]><script src="js/cors/jquery.xdr-transport.js"></script><![endif]-->
 <script src="<?php echo base_url(); ?>public/js/functions.js<?php echo $CI->config->item('css_javascript_version_query_string'); ?>"></script>
   
  </head>

  <body> 
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo site_url(); ?>"><?php echo $CI->config->item('site_title'); ?></a>
        
        
          <div class="nav-collapse">
            <ul class="nav">
              <li class="<?php if($CI->router->fetch_class() == 'dashboard') { echo 'active';} ?>"><a href="<?php echo site_url(); ?>"><i class="icon-home icon-white"></i> Dashboard</a></li>

            </ul>
            <ul class="nav pull-right">
             <li class="<?php if($CI->router->fetch_class() == 'account') { echo 'active';} ?> dropdown">
    <a class="dropdown-toggle"
       data-toggle="dropdown"
       href="#">
        <?php echo $CI->session->userdata('tractus_user_name'); ?>
        <b class="caret"></b>
      </a>
    <ul class="dropdown-menu">
   
   <li><?php echo anchor('account', '<i class="icon-user"></i> Account', ''); ?></li>

      
      <li><?php echo anchor('account/logout', '<i class="icon-off"></i> Logout', ''); ?></li>
   
   
   
    </ul>
  </li>

            </ul>
          </div><!--/.nav-collapse -->
     
     
        </div>
      </div>
    </div>
    
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
            
              <li class="nav-header">Tickets</li>
              <li class="<?php if($CI->router->fetch_class() == 'tickets') { echo 'active';} ?>"><?php echo anchor('tickets', '<i class="icon-tags"></i> Tickets', ''); ?></li>

              
             
              <li class="nav-header">Users</li>
              <li class="<?php if($CI->router->fetch_class() == 'users') { echo 'active';} ?>"><?php echo anchor('users', '<i class="icon-user"></i> Users', ''); ?></li>

              
              <li class="nav-header">Settings</li>
			
			 <li class="<?php if($CI->router->fetch_class() == 'settings' && $CI->router->fetch_method() == 'index') { echo 'active';} ?>"><?php echo anchor('settings', '<i class="icon-cog"></i> Settings', ''); ?></li>
			
			 <li class="<?php if($CI->router->fetch_class() == 'settings' && $CI->router->fetch_method() == 'info') { echo 'active';} ?>"><?php echo anchor('settings/info', '<i class="icon-info-sign"></i> System Information', ''); ?></li>

			 <li class="<?php if($CI->router->fetch_class() == 'settings' && $CI->router->fetch_method() == 'help') { echo 'active';} ?>"><?php echo anchor('settings/help', '<i class="icon-info-sign"></i> Help', ''); ?></li>

              
              
              <li class="nav-header">Reports</li>
			  <li class="<?php if($CI->router->fetch_class() == 'reports') { echo 'active';} ?>"><?php echo anchor('reports', '<i class="icon-book"></i> Reports', ''); ?></li>

              
              <!--<li><a href="#"><i class="icon-plus"></i> Report Builder</a></li>-->
               
              
              


            </ul>
          </div><!--/.well -->
        </div><!--/span-->