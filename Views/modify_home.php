<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Startup</title>
	<link rel="stylesheet" href="/Genhome/Styles/modify_home.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="/Genhome/Scripts/js_modify_home.js"></script>
</head>

<?php 
	include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Controllers/c_modify_home.php';
	global $value;
?>

<body class="container">
		<div class="logo">
			<img src="/Genhome/Images/logo.png" class="thelogo" alt="Logo">
		</div>
		<header class="genhome">Genhome</header>
		<div class="englobe">
		<div class="subheader">
			<div class="img_container">
				<img src="/Genhome/Images/room.png" class="room_img"/>
			</div>
			<div class="msg_container">
				<h1 class="message">Add a name for your home</h1>				
			</div>
			<div class="error">
				<span id="error"></span>
			</div>
		</div> 
		<div class="formdiv">
		<form action="" method="post" id="idForm">
			<div>
				<label for="address">Address</label>
				<input id="address" type="text" name="address" <?php echo($value) ?> >
			</div><br/>
			<div>
				<label for="home_name">Home name</label>
				<input id="home_name" type="text" name="home_name" required>
			</div><br/>
			<div class="buttons">
				<button class="logout" type="button" formnovalidate="formnovalidate" onclick="location.href='/Genhome/index.php?t=logout'">Logout</button>
				<input type="submit" value="Next"/>
			</div>
		</form>
		</div>
		</div>

</body>

</html>



