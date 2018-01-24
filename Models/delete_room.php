<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';


// function modify a user's step
function delete_room($room_id)
{
	try
	{
		// try to connect to the database with the defined parameters
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL request
		$request = "DELETE FROM room WHERE Room_ID=:rid";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data entered in the form
		$stmt->bindParam(":rid", $room_id,PDO::PARAM_INT);
		// execute the SQL command
	    $stmt->execute();
	    // close the connection to the database
	    $pdo=null;

	    return true;
	}
	// catch connection exception into a variable "$e"
	catch(PDOException $e)
	{
		// if an error occurs, display the error message
		echo("An error occured " . $e->getMessage());
		// if failure, return false
		return false;
	}
	if(isset($e))
	{
		return false;
	}
}



