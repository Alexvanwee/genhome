<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Homepage</title>
	<link rel="stylesheet" href="/Genhome/Styles/homepage.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="/Genhome/Scripts/js_homepage.js"></script>
	<script>
		window.onload = function() 
		{
		  	if (window.location.href.indexOf("php?e=") > 0) 
			{
		    	var div = document.getElementById('error');
				div.innerHTML += 'Login failed, please try again...';
			}
			else if (window.location.href.indexOf("php?s=") > 0) 
			/*var oldURL = document.referrer;
			if(oldURL == "http://localhost:8080/Genhome/index.php?t=registration")*/
			{
				var div = document.getElementById('error');
				div.innerHTML += 'Registration complete, you can now log in...';
			}
		}
	</script>
</head>

<body class="container">
		<div class="logo">
			<img src="/Genhome/Images/logo.png" class="thelogo" alt="Logo">
		</div>
		<header class="genhome">Genhome</header>
		<form action="index.php?t=login" method="post" id="idForm">
			<div class="t2">
				<h2 id="error"></h2>
			</div>
			<div>
				<label for="login">Login</label>
				<input id="login" type="text" name="login" required>
			</div><br/>
			<div>
				<label for="password">Password</label>
				<input id="password" type="password" name="pwd" required>
			</div><br/>
			<div class="buttons">
				<button class="register" type="button" formnovalidate="formnovalidate" onclick="location.href='/Genhome/index.php?t=register'">Register</button> 
				<input type="submit" value="Submit"/>
				<button class="forgot_password" title="Forgot Password ?" type="button"/>
			</div>
		</form>
		<div class="rights">
			© 2017. All rights reserved.
		</div>
		<div class="info">
			<a class="about" href="#">About us </a>✕
			<a class="contact" href="index.php?t=contact">Contact us</a>
		</div>
</body>

</html>



