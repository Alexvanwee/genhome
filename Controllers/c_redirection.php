<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_rooms_favourites.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_sensors_favourites.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_sensors_in_room.php';

$where = $_SESSION['where'];
$home_id = $_SESSION['Home_ID'];


if($where == "favourites")
{
	// MODEL GET_FAVOURITES OF HOME_ID
	$rooms_favourites = get_rooms_favourites();
	$sensors_favourites = get_sensors_favourites();
	// GENERATE THE VIEW
}
else
{
	// GET ROOM SENSORS IN ROOM WITH HOME_ID
	$sensors = get_sensors_in_room($where,$home_id);
}

?>