<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/modify_home_name.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_ownership.php';

if(!isset($_POST["home_name"]))
{
	exit("0");
}
$email = $_SESSION["login"];
$isOwner = check_ownership($email);
if(!$isOwner)
{
	echo("probleeeeeeme");
	// header('Location: index.php?t=logout');
}
$home_name = $_POST["home_name"];
$modify_home_name = modify_home_name($home_name,$email);
if(!$modify_home_name)
{
	exit("probleme");
}
else
{
	echo("1");
}

?>
