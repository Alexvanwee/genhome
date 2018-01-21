<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/member_id.php';


function switch_favourite($email,$home_name,$room_name,$sensor_name,$sensor_id,$isfavourite,$what)
{
	// retrieve the member id with his email address
    $member_id = get_member_id($email);
    $new_favourite = ($isfavourite == 1 ? 0 : 1);

    try
	{
	    $pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL request
		$request_sensor = "UPDATE sensors SET isFavourite = :val WHERE Home_ID = (SELECT Home_ID FROM home WHERE Member_ID = :mid AND Home_name = :hnm) AND Room_ID = (SELECT Room_ID FROM room WHERE Room_name = :rnm) AND Sensor_ID = :sid AND Type_of_sensor = :snm";
		$request_room = "UPDATE room SET isFavourite = :val WHERE Home_ID = (SELECT Home_ID FROM home WHERE Member_ID = :mid AND Home_name = :hnm) AND Room_ID = (SELECT Room_ID FROM room WHERE Room_name = :rnm) ";

		$request = ($what == "sensor" ? $request_sensor : $request_room);
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (address and member_id)
		$stmt->bindParam(":val", $new_favourite,PDO::PARAM_INT);
		$stmt->bindParam(":mid", $member_id,PDO::PARAM_INT);
		$stmt->bindParam(":hnm", $home_name,PDO::PARAM_STR);
		$stmt->bindParam(":rnm", $room_name,PDO::PARAM_STR);
		if($what == "sensor")
		{
			$stmt->bindParam(":sid", $sensor_id,PDO::PARAM_INT);
			$stmt->bindParam(":snm", $sensor_name,PDO::PARAM_STR);
		}
		// execute the SQL command
		$stmt->execute();
		// close the connection to the database
	    $pdo=null;
	    // return new favourite state
	    return $new_favourite;
	}
	// catch connection exception into a variable "$e"
	catch(PDOException $e)
	{
		// if an error occurs, display the error message
		echo("An error occured ".$e->getMessage());
		// if failure, return 2
		return 2;
	}
	if(isset($e))
	{
		return 2;
	}
}

// $switch = switch_favourite("alexandrevanwesel@gmail.com","22 avenue de Brétigny","Bedroom","Humidity",2,0,"sensor");
// echo($switch);


?>