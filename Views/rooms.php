<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />    
    <title>My Rooms</title>
    <link rel="stylesheet" type="text/css" href="/Genhome/Styles/rooms.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <?php 
        include_once  $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_user_name.php';
        $user_name = get_user_name($_SESSION["login"]);
        $user_name = $user_name[0];
    ?>
</head>
  

<body class="grid">
    
    <div class="logo">
        <img src="/Genhome/Images/logo.png" class="thelogo" alt="Logo">
    </div>
    
    <header class="genhome">Genhome</header>

    <header class="manage">Manage your rooms</header>

	
    <div class="content">
  		<div class="buttons">
            <button class="plus" type="button" formnovalidate="formnovalidate" onclick="location.href='addRooms.php'"><img src="/Genhome/Images/plus.png" alt="add" /></button> 
        </div>
        <p id="member">
            <?php include_once  $_SERVER['DOCUMENT_ROOT'].'/Genhome/Controllers/c_show_rooms.php';?>
          </p>
 	</div>
    
    <input type="submit" value="Submit"/>

    <div class="rights">
        © 2017. All rights reserved.
    </div>
  	
    <div class="info">
        <a class="about" href="about.php">About us </a>✕
        <a class="contact" href="contact.php">Contact us</a>
    </div>
</body>


</html>

