<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_home_name.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/new_home.php';

if( !isset($_POST["address"]) || !isset($_POST["home_name"]) )
{
	exit("Form not completely filled in...");
}
$home_name = $_POST["home_name"];
$not_exists = check_home_name($home_name,$_SESSION["member_id"]);
if(!$not_exists)
{
	exit("Home name already used, please change it...");
}
$address = $_POST["address"];
$new_home = new_home($_SESSION["login"],$address,$home_name);
if(!$new_home)
{
	exit("An error occurred, please try again later...");
}
echo(1);

?>