<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Formulaire User</title>
	<link rel="stylesheet" href="/Genhome/Styles/user_style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="/Genhome/Scripts/js_adduser.js"></script>
	<?php 
		include_once  $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_user_name.php';
		$user_name = get_user_name($_SESSION["login"]);
		$user_name = $user_name[0];
	?>
</head>

<body>
	<main>
		<section class="name">
			<h1 class="genhome">Genhome</h1>
		</section>
		<header>
			<img class="logo" src="/Genhome/Images/logo.png" alt"logo">
		</header>
		<section class="content_flag">
		</section>
		<section class="question">
			<h1>Do you want to add users ?</h1>
		</section>
		<section class="icon" id="icon">
		   <div class="admin">
    			<a><img class="admin_logo" src="/Genhome/Images/admin.png" alt"admin_logo"><br /><span><?php echo($user_name) ?></span></a>
    			<a class="add" id="buttonadd" href="#"><img id="buttonadd" class="plus" src="/Genhome/Images/add.png" alt="add"><br /><span>New user</span></a><br />
    		
    			<p id="member">
			<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/Genhome/Controllers/c_show_users.php';?>
          </p>
		   </div>
		</section>
		<section class="next_page">
			<form id="next" action="index.php?t=next_step">
			<button class="next" type="submit">Next/Skip</button>
		</form>
		</section>
	</main>
	<div id="modal">
			<form id="form1"  method="post" action="">
				<span id="errormsg"></span>
				<label  class="modal_label" for="name">First Name</label>
				<input id="name" type="text" name="firstname" required><br>
				<label  class="modal_label" for="lastname">Last Name</label>
				<input id="name" type="text" name="lastname" required><br>
				<label  class="modal_label" id="mail" for="email">E-mail</label>
				<input id="email" type="text" name="email" required><br>
				<p class="checkbox">
				<input  class="checkbox_user" type="radio" name="status" value="Admin" > Owner
				<input class="checkbox_user" type="radio" name="status" value="User" checked> User</p>
				<input id="submit" type="submit"  class="validate" value="Add">
			</form>
	</div>
</body>

</html>
