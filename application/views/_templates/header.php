<?php $CI =& get_instance(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo (!empty($title) ? $title : ''); ?> &#124; Site Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url(); ?>public/css/system.css<?php echo $CI->config->item('css_javascript_version_query_string'); ?>" rel="stylesheet">
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


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
 <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap.js<?php echo $CI->config->item('css_javascript_version_query_string'); ?>"></script>
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
          <a class="brand" href="<?php echo site_url(); ?>">TRACTUS</a>
        
        
          <div class="nav-collapse">
            <ul class="nav">
              <li class="<?php if($CI->router->fetch_class() == 'dashboard') { echo 'active';} ?>"><a href="<?php echo site_url(); ?>"><i class="icon-home icon-white"></i> Dashboard</a></li>

            </ul>
            <ul class="nav pull-right">
             <li class="<?php if($CI->router->fetch_class() == 'account') { echo 'active';} ?> dropdown">
    <a class="dropdown-toggle"
       data-toggle="dropdown"
       href="#">
        Andrew Hook
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