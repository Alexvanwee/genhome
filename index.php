<?php

session_start();

global $targets, $paths;
$targets = array("login","registration","register","dashboard","contact","logout","about","addUser","favourite","message","first_connection","next_step","test","test2","new_home","delete","testing");
$paths = array("/Controllers/c_login.php","/Controllers/c_registration.php","/Views/register.php","/Views/dashboard.php","/Views/contact.php","/Controllers/c_logout.php","/Views/about.php","/Controllers/c_add_user.php","/Controllers/c_favourite.php","/Controllers/c_contact_message.php","/Controllers/c_first_connection.php","/Controllers/c_next_step.php","/Views/changePassword.php","/Controllers/c_newpassword.php","/Controllers/c_new_home.php","/Controllers/c_delete_home.php","/Models/testing.php");

if(!isset($_GET['t']) && !isset($_GET['e']) && !isset($_GET['w']) && !isset($_GET['h']) && !isset($_GET['f']))
{
	if(!isset($_SESSION["login"]))
	{
		include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Views/homepage.php';
	}
	else if($_SESSION['where']	== "first_connection") 
	{
		include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Controllers/c_first_connection.php';
	}
	else
	{
		include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Controllers/c_dashboard.php';
	}
}
else if(isset($_GET['t']))
{
	global $targets, $paths, $in_array;
	$in_array = array_search($_GET['t'], $targets);
	if(isset($in_array))
	{
		include_once $_SERVER['DOCUMENT_ROOT']."/Genhome".$paths[$in_array];
	}
}
else if(isset($_GET['e']))
{
	if($_GET['e'] == "register")
	{
		include_once $_SERVER['DOCUMENT_ROOT']."/Genhome/Views/register.php";
	}
	else if($_GET['e'] == "login")
	{
		include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Views/homepage.php';
	}
}
else if(isset($_GET['w'])) 
{
	$_SESSION['where'] = $_GET['w'];
	header('Location: index.php');
}
else if(isset($_GET['h'])) 
{
	$_SESSION['home_name'] = $_GET['h'];
	include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Controllers/c_change_home.php';
}

	
?>