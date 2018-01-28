<?php

session_start();

global $targets, $paths;
$targets = array("login","registration","register","dashboard","contact","logout","about","addUser","favourite","message"/*# 10 #*/,"first_connection","next_step","changePassword","newpassword","new_home","delete_home","modify_home","new_room","delete_room","testing"/*# 20 #*/,"forgetPassword","reset_password","addRooms","add_room","rooms","sensor_action","new_sensor","delete_sensor","test");

$paths = array("/Controllers/c_login.php","/Controllers/c_registration.php","/Views/register.php","/Views/dashboard.php","/Views/contact.php","/Controllers/c_logout.php","/Views/about.php","/Controllers/c_add_user.php","/Controllers/c_favourite.php","/Controllers/c_contact_message.php"/*# 10 #*/,"/Controllers/c_first_connection.php","/Controllers/c_next_step.php","/Views/changePassword.php","/Controllers/c_newpassword.php","/Controllers/c_new_home.php","/Controllers/c_delete_home.php","/Views/modify_home.php","/Controllers/c_new_room.php","/Controllers/c_delete_room.php","/Views/dashboard_test.php"/*# 20 #*/,"/Controllers/c_delete_room.php","/Views/resetpassword.php","/Views/addRooms.php","/Controllers/c_add_room.php","/Views/rooms.php","/Controllers/c_sensor_action.php","/Controllers/c_new_sensor.php","/Controllers/c_delete_sensor.php","/Models/testing.php");

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