<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_all_favourites.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_sensors_in_room.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_primary_home.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_home_name.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/in_which_room_sensor.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_all_sensors.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_user_name.php';

global $input_name,$input_email;

if(isset($_SESSION['login']))
{
	$email = $_SESSION['login'];
	$name = get_user_name($email);
	$name = $name[0]." ".$name[1];

	$input_name = " readonly ".'value = "'.$name.'" ';
	$input_email = " readonly ".'value = "'.$email.'" ';
}
else
{
	$input_name = " required ";
	$input_email = " required ";
}

?>
