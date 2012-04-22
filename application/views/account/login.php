<?php $CI =& get_instance(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login &#124; Site Title</title>
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
        <div class="container">
          <a class="brand" href="#">TRACTUS</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#help" onclick="$('#modal-help').modal()">Help</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <h1>Login</h1>
     


    </div> <!-- /container -->

	<div class="modal hide fade" id="modal-help">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">x</a>
    <h3>Help</h3>
  </div>
  <div class="modal-body">
  
    <p>Stuff</p>
    
    
    
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">Close</a>
  </div>
</div>


  </body>
</html>
