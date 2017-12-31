<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_rooms_favourites.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_sensors_favourites.php';

// function to get the favourites rooms of a user's home (return array[values])
function get_all_favourites($home_id)
{
	try 
	{
		$rooms = get_rooms_favourites($home_id);
		$sensors = get_sensors_favourites($home_id);
		$all_favourites = array_merge($rooms,$sensors);
		//return result
		return $all_favourites;
	}
	// catch connection exception into a variable "$e"
	catch(PDOException $e)
	{
		// if an error occurs, display the error message
		echo "An error occured " . $e->getMessage();

		return false;
	}
	if(isset($e))
	{
		return false;
	}
}

// $fav = get_all_favourites(25);
// print_r($fav);

?>