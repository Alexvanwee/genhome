<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_room_name.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/new_sensor.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_room_id_from_name.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_all_sensors.php';

if( !isset($_POST["sensor_type"]) || !isset($_POST["room_name"]) )
{
	exit("Form not completely filled in...");
}
$room_name = $_POST["room_name"];
$not_exists = check_room_name($room_name,$_SESSION["home_id"],$_SESSION["member_id"]);
if($not_exists)
{
	exit("Room doesn't exist...");
}
$room_name = ucfirst($room_name);
$types = array("temperature","humidity","camera","smoke","window","door");
$sensor_type = $_POST["sensor_type"];
$in_array = array_search($sensor_type, $types);
if(!isset($in_array))
{
	exit("Invalid sensor type...");
}
$sensor_type = ucfirst($sensor_type);
$room_id = get_room_id_from_name($room_name,$_SESSION['home_id']);
$new_sensor = new_sensor($sensor_type,$room_id,$_SESSION['home_id']);
if(!$new_sensor)
{
	exit("An error occurred, please try again later...");
}
$sensors = get_all_sensors($_SESSION['home_id']);
$_SESSION['sensors'] = $sensors;
echo("1");

?>
