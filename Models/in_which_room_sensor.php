<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/member_id.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

// function to get the room name where a sensor is from sensor id (return value)
function in_which_room_sensor($sensor_id)
{
	try 
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL statement
		$request="SELECT (Room_name) FROM room WHERE Room_ID=(SELECT Room_ID from sensors WHERE Sensor_ID=:sid)";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (member_id)
		$stmt->bindParam(":sid", $sensor_id,PDO::PARAM_INT);
		//execute
		$stmt->execute();
		//fetch
		$room_name = $stmt->fetchColumn();
		// close connection
		$pdo=null;
		//return result
		return $room_name;
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

// $sensor = in_which_room_sensor(1);
// print_r($sensor);
// for ($i=0; $i<sizeof($homes); $i++) 
// { 
// 	for ($j=0; $j<sizeof($homes[$i])-1; $j++) 
// 	{ 
// 		echo($homes[$i][$j]);
// 	}
// }


?>