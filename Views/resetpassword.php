<html>

<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Forgot Password</title>
	<link rel="stylesheet" href="/Genhome/Styles/register.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="/Genhome/Scripts/js_register.js"></script>
</head>

<body class="container">
	<div class="logo">
		<img src="/Genhome/Images/logo.png" class="thelogo" alt="Logo">
	</div>
	<header class="genhome">Genhome</header>
	<form title="Reset Password" id="idForm" method="post">
		<div class="t2">
			<h2 id="error"></h2>
		</div>
		
		<div class="em">
			<label for="email">E-mail</label>
			<input id="email" type="email" name="email" required>
		</div>
		<div class="back">
			<button class="return" type="button" onclick="location.href='/Genhome/index.php'" formnovalidate="formnovalidate">Back</button>
		</div>
		<div class="buttons">
			<input type="submit" id="submit" value="Submit"/>
		</div>
	</form>
</body>

</html>

