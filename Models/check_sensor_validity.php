<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_referrer_id.php';

// function to verify if the room name is already used in the user's home
function check_sensor_validity($sensor_name,$sensor_id,$home_id,$member_id,$room_name)
{
    $referrer_id = get_referrer_id($member_id);
    if(!$referrer_id)
    {
    	return false;
    }
    if($referrer_id > 0)
    {
    	$member_id = $referrer_id;
    }
	try
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL request
		$request = "SELECT * FROM sensors WHERE Sensor_ID = :sid AND Type_of_sensor = :snm AND Home_ID = :hid AND Room_ID = (SELECT Room_ID FROM room WHERE Home_ID = :hid2 AND Room_name = :rnm)";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (email address)
		$stmt->bindParam(":sid", $sensor_id,PDO::PARAM_INT);
		$stmt->bindParam(":snm", $sensor_name,PDO::PARAM_STR);
		$stmt->bindParam(":hid", $home_id,PDO::PARAM_INT);
		$stmt->bindParam(":hid2", $home_id,PDO::PARAM_INT);
		$stmt->bindParam(":rnm", $room_name,PDO::PARAM_STR);
		// execute the SQL command
	    $stmt->execute();
	    // retrieve and store the result into a convenient variable
	    $sensor = $stmt->fetchAll();
	    // close the connection to the database
	    $pdo=null;
	    // if the convenient variable contains no result (no match in the database)
	    if($sensor==null || $sensor=="")
	    {
	    	// return true
			return false;
		}
		// if the convenient variable contains a result (match in the database)
		else
		{
			$sensor = $sensor[0];
			$response = array();
			for ($i=0; $i<sizeof($sensor)/2; $i++) 
			{ 
				array_push($response, $sensor[$i]);
			}
			// return false
			return $response;
		}
	}
	// catch connection exception into a variable "$e"
	catch(PDOException $e)
	{
		// if an error occurs, display the error message
		echo("An error occurred " . $e->getMessage());

		return false;
	}
	if(isset($e))
	{
		return false;
	}
	
}

// $exists = check_sensor_validity("Humidity",2,25,16,"Bedroom");
// print_r($exists);

?>