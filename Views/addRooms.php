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
	
	<form action='index.php?t=add_room' title="add" id="add" method="post">
		<div class="type">
			<label for="RoomType">Room type</label>
			<select name="selection" class="selection">
  				<option value="Kitchen">Kitchen</option>
  				<option value="Bathroom">Bathroom</option>
  				<option value="Bedroom">Bedroom</option>
  				<option value="Dining">Dining Room</option>
  				<option value="Living">Living Room</option>
  				<option value="Laundry">Laundry Room</option>
  				<option value="Office">Office</option>
  				<option value="Other">Other type of room</option>
			</select>
		</div>
		<div class="name">
			<label for="RoomName">Room name</label>
			<input id="room_name" type="text" name="roomname" minlength="1" maxlength="20" placeholder="max. 20 characters" required>
		</div>
		<div class="back">
			<button class="return" type="button" onclick="location.href='index.php?t=rooms'" formnovalidate="formnovalidate">Back</button>
		</div>
		<div class="buttons">
			<input type="submit" id="submit" value="Add"/>
		</div>
	</form>
</body>

</html>
