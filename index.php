<?php

session_start();

global $targets, $paths;
$targets = array(0=>"login",1=>"registration",2=>"register",3=>"dashboard");
$paths = array("/Controllers/c_login.php","/Controllers/c_registration.php","/Views/register.php","/Views/dashboard.php");

if(!isset($_GET['t']) && !isset($_GET['e']))
{
	if(!isset($_SESSION["login"]))
	{
		include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Views/homepage.php';
	}
	else
	{
		//include $_SERVER['DOCUMENT_ROOT'].'/Genhome/Views/dashboard.php';
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
	
?>