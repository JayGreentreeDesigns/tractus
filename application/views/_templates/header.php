<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="public/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


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
          <a class="brand" href="#">TRACTUS</a>
        
        
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="#"><i class="icon-home icon-white"></i> Dashboard</a></li>

            </ul>
            <ul class="nav pull-right">
             <li class="dropdown">
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

              <li><?php echo anchor('tickets', '<i class="icon-tags"></i> Tickets', ''); ?></li>

              <li class="nav-header">Team</li>
              <li><?php echo anchor('team', '<i class="icon-user"></i> Manage', ''); ?></li>

              
             
              <li class="nav-header">Users</li>
              <li><?php echo anchor('users', '<i class="icon-user"></i> Manage', ''); ?></li>

              
              <li class="nav-header">Settings</li>
			<li><?php echo anchor('settings', '<i class="icon-cog"></i> Change Settings', ''); ?></li>

              
              
              <li class="nav-header">Reports</li>
			<li><?php echo anchor('reports', '<i class="icon-book"></i> View Reports', ''); ?></li>

              
              <!--<li><a href="#"><i class="icon-plus"></i> Report Builder</a></li>-->
               
              
              


            </ul>
          </div><!--/.well -->
        </div><!--/span-->