<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_room_name.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/new_room.php';


if( !isset($_POST["room_type"]) || !isset($_POST["room_name"]) )
{
	exit("Form not completely filled in...");
}
$room_name = $_POST["room_name"];
$not_exists = check_room_name($room_name,$_SESSION["home_id"],$_SESSION["member_id"]);
if(!$not_exists)
{
	exit("Room name already used, please change it...");
}
$room_type = $_POST["room_type"];
$new_room = new_room($_SESSION["member_id"],$room_type,$room_name,$_SESSION['home_id']);
if(!$new_room)
{
	exit("An error occurred, please try again later...");
}
echo("1");

?>