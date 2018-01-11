<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_rooms_favourites.php';


$what = $_SESSION["type"];
$id = $_SESSION["fav_id"];
$home_id = $_SESSION["home_id"];;
unset($_SESSION['type']);
unset($_SESSION['fav_id']);

if($what == "room")
{
	$rooms_favouriste = get_rooms_favourites($home_id);
}
else if(^$what == "sensor")
{
	$sensors_favouriste = get_sensors_favourites($home_id);
}

?>