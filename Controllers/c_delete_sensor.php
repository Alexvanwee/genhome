<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_ownership.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/delete_sensor.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_all_sensors.php';

if( !isset($_POST['sensor_index']) || !isset($_POST['sensor_name']) )
{
	exit("0");
}
$sensor_index = $_POST['sensor_index'];
$sensor_name = $_POST['sensor_name'];
$sensors = $_SESSION['sensors'];
if( $sensors[0][$sensor_index] != $sensor_name )
{
	header('Location: index.php');
}
$email = $_SESSION['login'];
$isOwner = check_ownership($email);
if( !$isOwner )
{
	header('Location: index.php');
}
$sensor_id = $sensors[1][$sensor_index];
$delete = delete_sensor($sensor_id);
if( !$delete )
{
	exit("0");
}
$sensors = get_all_sensors($_SESSION['home_id']);
$_SESSION['sensors'] = $sensors;
echo("1");

?>
