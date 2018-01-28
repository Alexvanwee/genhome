<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_sensor_validity.php';

$home_id = $_SESSION['home_id'];
$member_id = $_SESSION["member_id"];
$room_name = process_string($_POST["room_name"]);
$sensor_name = process_string($_POST["sensor_name"]);
$sensor_id = intval(rtrim($_POST["sensor_id"],"/"));
$what = $_POST["what"];
// debug
// echo("isFavourite : ".$isfavourite." / home : ".$home_name." / room : ".$room_name." / sensor : ".$sensor_name." / id : ".$sensor_id);
if($what != "sensor"){ exit("2"); }
$check = check_sensor_validity($sensor_name,$sensor_id,$home_id,$member_id,$room_name);
if(!$check){ exit("2"); }
if($sensor_name!=$check[1] || $sensor_id!=$check[0] || $home_id!=$check[3] ){ exit("2"); }

if($sensor_name == "Temperature" || $sensor_name == "Humidity")
{
	$num = random_sensor_value($sensor_name);
	echo($num);
}
else if($sensor_name == "Light")
{
	// here make the action and return result of the action
}
else
{
	exit("3");
}


function process_string($str)
{
	$str = explode(" -", $str);
	$str = $str[0];
	$str = ltrim($str);
	$str = rtrim($str);
	return $str;
}

function random_sensor_value($name)
{
	if($name == "Temperature")
	{
		$num = mt_rand(19,20);
		$dec = mt_rand(0,9);
		$value = $num.".".$dec;
		return $value;
	}
	else if($name == "Humidity")
	{
		$num = mt_rand(70,90);
		$dec = mt_rand(0,5);
		$dec = ($dec == 1 ? 5 : 0);
		$value = $num.".".$dec;
		return $value;
	}
}

?>