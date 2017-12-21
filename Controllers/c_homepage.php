<?php

function homepage()
{
	require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Views/homepage.php';
	get_error();
}

function get_error()
{ 
	$reasons = array("password" => "wrong_password", "login" => "wrong_login"); 
	if(isset($_GET["loginFailed"]))
	{
		if($reasons[$_GET["reason"]]=="wrong_password")
		{
			echo '<body onLoad="alert(\'Password is incorrect...\')">';
			echo '<meta http-equiv="refresh" content="0;URL=homepage.php">';
		}
		else if($reasons[$_GET["reason"]]=="wrong_login")
		{
			echo '<body onLoad="alert(\'Login is incorrect...\')">';
			echo '<meta http-equiv="refresh" content="0;URL=homepage.php">';
		}
	} 
}

?>