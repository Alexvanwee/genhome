<html>

<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Add Rooms</title>
	<link rel="stylesheet" href="/Genhome/Styles/addRooms.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body class="grid">
	<div class="logo">
		<img src="/Genhome/Images/logo.png" class="thelogo" alt="Logo">
	</div>
	
	<header class="genhome">Genhome</header>

	<header class="manage">Add rooms</header>
	
	<form title="add" id="add" method="post">
		<div class="type">
			<label for="RoomType">Room type</label>
			<select class="selection">
  				<option value="kitchen">Kitchen</option>
  				<option value="bathroom">Bathroom</option>
  				<option value="bedroom">Bedroom</option>
  				<option value="dining">Dining Room</option>
  				<option value="living">Living Room</option>
  				<option value="laundry">Laundry Room</option>
  				<option value="office">Office</option>
  				<option value="other">Other type of room</option>
			</select>
		</div>
		<div class="name">
			<label for="RoomName">Room name</label>
			<input id="last_name" type="text" name="last_name" minlength="2" maxlength="30" placeholder="min. 2 characters" required>
		</div>
		<div class="back">
			<button class="return" type="button" onclick="location.href='rooms.php'" formnovalidate="formnovalidate">Back</button>
		</div>
		<div class="buttons">
			<input type="submit" id="submit" value="Add"/>
		</div>
	</form>
	<div class="rights">
		© 2017. All rights reserved.
	</div>
	<div class="info">
		<a class="about" href="about.php">About us </a>✕
		<a class="contact" href="contact.php">Contact us</a>
	</div>
</body>

</html>
