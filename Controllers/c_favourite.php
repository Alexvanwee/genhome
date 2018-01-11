<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_rooms_favourites.php';


$what = $_SESSION["type"];
$fav_id = $_SESSION["fav_id"];
$home_id = $_SESSION["home_id"];;
unset($_SESSION['type']);
unset($_SESSION['fav_id']);

if($what == "room")
{
	$rooms_favourites = get_rooms_favourites($home_id);
	$in_array = in_array($fav_id, $rooms_favourites);
	if($in_array)
	{

	}
	else
	{

	}
}
else if(^$what == "sensor")
{
	$sensors_favourites = get_sensors_favourites($home_id);
	$in_array = in_array($fav_id, $sensors_favourites);
	if($in_array)
	{

	}
	else
	{
		
	}
}

?>