<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

// function to get the rooms of a user home (return array[values])
function get_rooms_names($home_id)
{
	try 
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL statement
		// $request="SELECT Room_name FROM room WHERE Home_ID = (SELECT Home_ID FROM home WHERE Member_ID = :mid)";
		$request="SELECT Room_name FROM room WHERE Home_ID = :hid";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (member_id)
		$stmt->bindParam(":hid", $home_id,PDO::PARAM_INT);
		//execute
		$stmt->execute();
		//fetch
		$rooms = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
		// close connection
		$pdo=null;
		//return result
		return $rooms;
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

// $rooms = get_rooms_names(13);
// print_r($rooms);
// for ($i=0; $i<sizeof($rooms); $i++) 
// { 
// 	echo($rooms[$i][0]." / ");
// }


?>