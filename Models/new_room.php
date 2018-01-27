<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_referrer_id.php';

// function to create a new room
function new_room($member_id,$room_type, $room_name, $home_id)
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
		$request = "INSERT INTO room (Room_type,Room_name,Home_ID) VALUES (:rty,:rnm,:hid)";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (address and member_id)
		$stmt->bindParam(":rty", $room_type,PDO::PARAM_STR);
		$stmt->bindParam(":rnm", $room_name,PDO::PARAM_STR);
		$stmt->bindParam(":hid", $home_id,PDO::PARAM_INT);
		// execute the SQL command
		$stmt->execute();
		// close the connection to the database
	    $pdo=null;
	    // if success, return true
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

// $new = new_home("michel@gmail.com","11 rue Michel","Maison Michel");
// echo($new);

?>