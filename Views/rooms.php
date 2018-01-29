<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />    
    <title>My Rooms</title>
    <link rel="stylesheet" type="text/css" href="/Genhome/Styles/rooms.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
  

<body class="grid">

    <div class="logo">
        <img src="/Genhome/Images/logo.png" class="thelogo" alt="Logo">
    </div>
    
    <header class="genhome">Genhome</header>

    <header class="manage">Add rooms</header>

	
    <div class="content">
        <div class="buttons">
            <button class="plus" type="button" formnovalidate="formnovalidate" onclick="location.href='index.php?t=addRooms'"><img src="/Genhome/Images/plusW.png" alt="add" /></button> 
        </div>
        <p class="room">
            <?php include_once  $_SERVER['DOCUMENT_ROOT'].'/Genhome/Controllers/c_show_rooms.php';?>
        </p>
 	</div>
    
    <input type="submit" onclick="location.href='index.php?t=next_step'" value="Submit"/>
</body>


</html>

