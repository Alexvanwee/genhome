<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/fetch_step.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/modify_step.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/modify_first_connection.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_ownership.php';

// retrieve STEP from database
$_SESSION["step"] = fetch_step($_SESSION["login"]);
// check if the user is owner
$isOwner = check_ownership($_SESSION["login"]);

if($_SESSION["step"] == 1)
{
	if($isOwner == 0)
	{
		include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Controllers/c_next_step.php';
	}
	else
	{
		include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Views/modify_home.php';
	}
}
else if($_SESSION["step"] == 2)
{
	if($isOwner == 1)
	{
		include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Controllers/c_next_step.php';
	}
	else
	{
		include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Views/changePassword.php';
	}
}
else if($_SESSION["step"] == 3)
{
	if($isOwner == 0)
	{
		include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Controllers/c_next_step.php';
	}
	else
	{
	 	include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Views/addUser.php';
	}
}
else if($_SESSION["step"] == 4)
{
	if($isOwner == 0)
	{
		include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Controllers/c_next_step.php';
	}
	else
	{
	 	include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Views/addRooms.php';
	}
}
else if($_SESSION["step"] == 5)
{
	if($isOwner == 0)
	{
		include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Controllers/c_next_step.php';
	}
	else
	{
	 	//include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Views/addUser.php';
	}
}
else if($_SESSION["step"] == 6)
{
	unset($_SESSION["step"]);
	modify_step(0,$_SESSION["login"]);
	modify_first_connection(0,$_SESSION["login"]);
	$_SESSION["where"] = "favourites";
	header('Location: index.php');
}

?>