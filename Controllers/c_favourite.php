<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/switch_favourite.php';

$email = $_SESSION["login"];
$isfavourite = intval($_POST["isfavourite"]);
$home_name = process_string($_POST["home_name"]);
$room_name = process_string($_POST["room_name"]);
$sensor_name = process_string($_POST["sensor_name"]);
$sensor_id = intval(rtrim($_POST["sensor_id"],"/"));
$what = $_POST["what"];
// debug
// echo("isFavourite : ".$isfavourite." / home : ".$home_name." / room : ".$room_name." / sensor : ".$sensor_name." / id : ".$sensor_id);
if($what != "sensor" && $what != "room"){ echo 2; }
else if($isfavourite != 0 && $isfavourite != 1){ echo 2; }
else
{
	$switch = switch_favourite($email,$home_name,$room_name,$sensor_name,$sensor_id,$isfavourite,$what);
	$where = $_SESSION["where"];
	if($where == "favourites"){ $switch = $switch."/3"; }
	echo($switch);
}



function process_string($str)
{
	$str = explode(" -", $str);
	$str = $str[0];
	$str = ltrim($str);
	$str = rtrim($str);
	return $str;
}

?>