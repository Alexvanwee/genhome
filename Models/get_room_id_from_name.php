<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

// function to get the id from a home name (value)
function get_room_id_from_name($room_name,$home_id)
{
	try 
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL statement
		$request="SELECT Room_ID FROM room WHERE Home_ID=:hid AND Room_name=:rnm";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (member_id)
		$stmt->bindParam(":hid", $home_id,PDO::PARAM_INT);
		$stmt->bindParam(":rnm", $room_name,PDO::PARAM_STR);
		//execute
		$stmt->execute();
		//fetch
		$room_id = $stmt->fetchColumn();
		// close connection
		$pdo=null;
		//return result
		if($room_id != "" || $room_id != null)
		{
			return $room_id[0];
		}
		else
		{
			return false;
		}
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

// $room_id = get_room_id_from_name("Bedroom",25);
// print_r($room_id);


?>