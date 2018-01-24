<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/modify_home_name.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_ownership.php';

if(!isset($_POST["home_name"]))
{
	echo("0");
	exit();
}
$email = $_SESSION["email"];
$isOwner = check_ownership($email);
if(!$isOwner)
{
	header('Location: index.php');
}
$home_name = $_POST["home_name"];
modify_home_name($home_name,$email);
if(!$modify_home_name)
{
	echo("0");
	exit();
}
else
{
	header("Location: index.php?t=next_step");
}

?>
