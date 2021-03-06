<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

// function to get the favourites sensors of a user's home (return array[values])
function get_sensors_favourites($home_id)
{
	try 
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL statement
		$request="SELECT Type_of_sensor,Sensor_ID FROM sensors WHERE isFavourite=1 AND Home_ID = :hid";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (member_id)
		$stmt->bindParam(":hid", $home_id,PDO::PARAM_INT);
		//execute
		$stmt->execute();
		//fetch
		$sensors_favourites = $stmt->fetchAll();
		// close connection
		$pdo=null;
		$names = array();
		$ids = array();
		for ($i=0; $i < sizeof($sensors_favourites); $i++) 
		{ 
			$names[$i] = $sensors_favourites[$i][0];
		}
		for ($i=0; $i < sizeof($sensors_favourites); $i++) 
		{ 
			$ids[$i] = $sensors_favourites[$i][1];
		}
		$sensors_favourites = array($names,$ids);
		//return result
		return $sensors_favourites;
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