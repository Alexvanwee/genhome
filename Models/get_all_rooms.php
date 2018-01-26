<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

// function to get the favourites sensors of a user's home (return array[values])
function get_all_rooms($home_id)
{
	try 
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL statement
		$request="SELECT Room_type, Room_name, Room_ID FROM room WHERE Home_ID=:hid";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (member_id)
		$stmt->bindParam(":hid", $home_id,PDO::PARAM_INT);
		//execute
		$stmt->execute();
		//fetch
		$rooms = $stmt->fetchAll();
		// close connection
		$pdo=null;
		$types = array();
		$names = array();
		for ($i=0; $i < sizeof($rooms); $i++) 
		{ 
			$names[$i] = $rooms[$i][1];
		}
		for ($i=0; $i < sizeof($rooms); $i++) 
		{ 
			$types[$i] = $rooms[$i][0];
		}
		for ($i=0; $i < sizeof($rooms); $i++) 
		{ 
			$room_ids[$i] = $rooms[$i][2];
		}
		$rooms = array($types,$names,$room_ids);
		// return result
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

$rooms = get_all_rooms(25);
print_r($rooms);

?>