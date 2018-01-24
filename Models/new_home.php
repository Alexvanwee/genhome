<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/member_id.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_referrer_id.php';

// function to create a new home
function new_home($email, $address, $home_name)
{
	// retrieve the member id with his email address
    $member_id = get_member_id($email);
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
		// prepare the SQL request
		$request = "INSERT INTO home (Address,Member_ID,Home_name) VALUES (:ad,:mid,:hnm)";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (address and member_id)
		$stmt->bindParam(":ad", $address,PDO::PARAM_STR);
		$stmt->bindParam(":mid", $member_id,PDO::PARAM_INT);
		$stmt->bindParam(":hnm", $home_name,PDO::PARAM_STR);
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