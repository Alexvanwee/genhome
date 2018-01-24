
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//cdn.muicss.com/mui-latest/css/mui.min.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-latest/js/mui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/Genhome/Scripts/js_dashboard.js"></script>
    <link href="/Genhome/Styles/dashboard.css" rel="stylesheet" type="text/css" />
    <title>Genhome - Dashboard</title>
  </head>

  <?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Controllers/c_location.php'; 
    global $first_name; 
  ?>
  
  <body>
  	<!-- ######################################## -->
  	<!-- ############# Sidedrawer ############## -->
  	<!-- ####################################### -->
    <div id="sidedrawer" class="mui--no-user-select">
      <div id="sidedrawer-brand" class="mui--appbar-line-height">
        <img src="/Genhome/Images/logo.png" class="thelogo" alt="Logo">
      </div>
      <div class="mui-divider"></div>
      <div class="name">
        <span id="first_name"> <?php print_first_name(); ?> </span>
      </div>
      <div class="mui-divider"></div>
      <ul>
      		<li>
	          <strong><a class="favourites" href="index.php?w=favourites">Favourites</a></strong>
	        </li>

	        <li id="multiple2">
	          <strong>Rooms<span class="triangle">◂</span></strong>
	          <ul>
	          	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Controllers/c_rooms.php'; ?>
	            <li>
	            	<a href="index.php?w=new_room">New Room<span class="add">+</span></a>
	            </li>
	          </ul>
	        </li>

	        <li id="multiple">
	          <strong>Change House<span class="triangle">◂</span></strong>
	          <ul>
	          	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Controllers/c_homes.php'; ?>
	          	<!-- SET WHERE -->
	            <li>
	            	<a href="index.php?w=new_home">New House<span class="add">+</span></a>
	            </li>
	          </ul>
	        </li>

	        <li>
	          <strong><a class="settings" href="#">Settings</a></strong>
	        </li>
	        <li>
	          <strong><a class="contact" href="/Genhome/index.php?t=contact">Contact us</a></strong>
	        </li>

	        <li>
	          <strong><a href="index.php?t=about" class="about" href="#">About us</a></strong>
	        </li>

	        <li>
	          <strong><a class="disconnect" href="/Genhome/index.php?t=logout">Disconnect</a></strong>
	        </li>
      </ul>
    </div>
    <!-- ##################################### -->
    <!-- ############## Header ############## -->
    <!-- ##################################### -->
    <header id="header">
        <div class="mui-appbar mui--appbar-line-height">
          
            <div class="mui-container-fluid">

                <a class="sidedrawer-toggle mui--visible-xs-inline-block mui--visible-sm-inline-block js-show-sidedrawer">☰</a>
                <a class="sidedrawer-toggle mui--hidden-xs mui--hidden-sm js-hide-sidedrawer">☰</a>

                <span class="website_name">Genhome</span>
            </div>
            <div class="location">
            	   <span class="where" id="where_location">
            		<?php print_location(); ?>
            	</span>
            </div>
          <!-- <span class="website_name">Genhome</span> -->
        </div>
    </header>
    <!-- main -->
    <div id="content-wrapper">
    	<!-- ################# Some space for the header ############## -->
     	<div class="mui--appbar-height"></div>
    	<!-- ########################################################## -->
     	<!-- ###################### Page content ###################### -->
      
     	<!-- ICI RECUPERER VARIABLES SESSIONS ET APPELER CONTROLEUR -->
     	

      	<div >
        	
        	<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/Genhome/Controllers/c_redirection.php';?>
      	</div>

    <!-- ######## end ########"-->
    </div>
    
  </body>
</html>