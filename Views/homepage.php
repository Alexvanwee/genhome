<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Homepage</title>
	<link rel="stylesheet" href="/Genhome/Styles/homepage.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		window.onload = function() 
		{
		  	if (window.location.href.indexOf("php?e=") > 0) 
			{
		    	var div = document.getElementById('error');
				div.innerHTML += 'Login failed, please try again...';
			}
			var oldURL = document.referrer;
			if(oldURL == "http://localhost:8080/Genhome/index.php?t=register")
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
	<form action="index.php?t=login" method="post">
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
</body>

</html>



