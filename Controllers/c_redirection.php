<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_all_favourites.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_sensors_in_room.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_primary_home.php';

global $where, $home_id;

$home_id = "";
$where = "";

check_session_home_id();

if(isset($_SESSION['where']))
{
	global $where;
	$where = $_SESSION['where'];
	if($where == "favourites")
	{
		global $home_id;
		// MODEL GET_FAVOURITES OF home_id
		$all_favourites = get_all_favourites($home_id);
		// GENERATE THE VIEW

		create_view($all_favourites); //##################### HERE ########################

	}
	else
	{
		global $where, $home_id;
		// GET ROOM SENSORS IN ROOM WITH home_id
		$sensors = get_sensors_in_room($where,$home_id);
	}
}
else
{
	global $home_id;
	$_SESSION['where'] = "favourites";
	header('Location: index.php');
}

//########################### CHECK FUNCTION ##########################

function check_session_home_id()
{
	if(isset($_SESSION['home_id']))
	{
		if($_SESSION['home_id'] !="" && $_SESSION['home_id'] != null)
		{
			global $home_id;
			$home_id = $_SESSION['home_id'];
		}
	}
	else
	{
		global $home_id;
		$home_id = get_primary_home($_SESSION['login']);
		$_SESSION['home_id'] = $home_id;
	}
}

//########################## FUNCTION TO GENERATE THE VIEW ??????  ###############################""

function create_view($fav)
{
	$part1 = '<p> ';
	$part2 = '</p>';

	for ($i=0; $i<sizeof($fav); $i++) 
	{ 
		echo($part1.$fav[$i].$part2);
	}
}

?>