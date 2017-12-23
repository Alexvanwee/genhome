<html>

<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Register</title>
	<link rel="stylesheet" href="/Genhome/Styles/register.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="/Genhome/Scripts/js_register.js"></script>
	<script>
		window.onload = function() 
		{
		  	if (window.location.href.indexOf("php?e=") > 0) 
			{
		    	var div = document.getElementById('error');
				div.innerHTML += 'Registration failed, please try again...';
			}
		}
	</script>
</head>

<body class="container">
	<div class="logo">
		<img src="/Genhome/Images/logo.png" class="thelogo" alt="Logo">
	</div>
	<header class="genhome">Genhome</header>
	<form title="Register" action="index.php?t=registration" id="idForm" method="post">
		<div class="t2">
			<h2 id="error"></h2>
		</div>
		<div class="fn">
			<label for="first_name">First Name</label>
			<input id="first_name" type="text" name="first_name" minlength="2" maxlength="30" placeholder="min. 2 characters" required>
		</div>
		<div class="ln">
			<label for="last_name">Last Name</label>
			<input id="last_name" type="text" name="last_name" minlength="2" maxlength="30" placeholder="min. 2 characters" required>
		</div>
		<div class="em">
			<label for="email">E-mail</label>
			<input id="email" type="email" name="email" required>
		</div>
		<div class="ad">
			<label for="address">Address</label>
			<input id="address" type="text" name="address" required>
		</div>
		<div class="se">
			<label for="serial">Product Serial N°</label>
			<input id="serial" type="text" name="serial" minlength="8" maxlength="8" placeholder="8 characters code on the back of the box" required>
		</div>
		<div class="pw">
			<label for="password">Password</label>
			<input id="password" type="password" name="pwd" minlength="6" maxlength="30" placeholder="min. 6 characters" required>
		</div>
		<div class="pw2">
			<label for="password2">Confirm Password</label>
			<input id="password2" type="password" name="pwd2" minlength="6" maxlength="30" required>
		</div>
		<div class="back">
			<button class="return" type="button" onclick="location.href='/Genhome/index.php'" formnovalidate="formnovalidate">Back</button>
		</div>
		<div class="buttons">
			<input type="submit" id="submit" value="Submit"/>
		</div>
	</form>
	<div class="rights">
		© 2017. All rights reserved.
	</div>
	<div class="info">
		<a class="about" href="#">About us </a>✕
		<a class="contact" href="#">Contact us</a>
	</div>
</body>

</html>

