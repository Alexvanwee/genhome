<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_referrer_id.php';

// function to get the names of the user's homes (return array[values])
function get_rooms($member_id,$home_id)
{
	$referrer_id = get_referrer_id($member_id);
    if(!$member_id || !$referrer_id)
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
		// prepare the SQL statement
		$request="SELECT Room_type,Room_name,Room_ID FROM room WHERE Home_ID = :hid";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (member_id)
		$stmt->bindParam(":hid", $home_id,PDO::PARAM_INT);
		//execute
		$stmt->execute();
		//fetch
		$result = $stmt->fetchAll();
		// close connection
		$pdo=null;
		$rooms = array();
		for ($i=0; $i<sizeof($result); $i++) 
		{ 
			$room = array();
			array_push($room, $result[$i][0]);
			array_push($room, $result[$i][1]);
			array_push($room, $result[$i][2]);
			array_push($rooms, $home);
		}
		//return result
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

// $homes = get_homes("alexandrevanwesel@gmail.com");
// print_r($homes);


?>