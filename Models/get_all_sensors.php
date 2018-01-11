<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

// function to get the favourites sensors of a user's home (return array[values])
function get_all_sensors($home_id)
{
	try 
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL statement
		$request="SELECT Type_of_sensor,Sensor_ID,Room_ID FROM sensors WHERE Home_ID=:hid";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (member_id)
		$stmt->bindParam(":hid", $home_id,PDO::PARAM_INT);
		//execute
		$stmt->execute();
		//fetch
		$sensors = $stmt->fetchAll();
		// close connection
		$pdo=null;
		$names = array();
		$ids = array();
		for ($i=0; $i < sizeof($sensors); $i++) 
		{ 
			$names[$i] = $sensors[$i][0];
		}
		for ($i=0; $i < sizeof($sensors); $i++) 
		{ 
			$ids[$i] = $sensors[$i][1];
		}
		for ($i=0; $i < sizeof($sensors); $i++) 
		{ 
			$room_ids[$i] = $sensors[$i][2];
		}
		$sensors = array($names,$ids,$room_ids);
		//return result
		return $sensors;
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

// $sensors = get_sensors_favourites(25);
// print_r($sensors);

?>