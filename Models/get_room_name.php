<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

// function to get of a user from email (return array[values])
function get_room_name($room_id)
{
	try 
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL statement
		$request="SELECT Room_name FROM room WHERE Room_ID = :rid";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (member_id)
		$stmt->bindParam(":rid", $room_id,PDO::PARAM_INT);
		//execute
		$stmt->execute();
		//fetch
		$name = $stmt->fetchColumn();
		// close connection
		$pdo=null;
		//return result
		return $name;
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

// $name = get_room_name(1);
// print_r($name);

?>