<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_referrer_id.php';

// function to verify if the email address is already used in the database
function check_home_name($home_name,$member_id)
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
		$request = "SELECT Home_name FROM home WHERE Home_name = :hnm AND Member_ID = :mid";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (email address)
		$stmt->bindParam(":hnm", $home_name,PDO::PARAM_STR);
		$stmt->bindParam(":mid", $member_id,PDO::PARAM_INT);
		// execute the SQL command
	    $stmt->execute();
	    // retrieve and store the result into a convenient variable
	    $home_name = $stmt->fetchColumn();
	    // close the connection to the database
	    $pdo=null;

	    // if the convenient variable contains no result (no match in the database)
	    if($home_name==null || $home_name=="")
	    {
	    	// return true
			return 1;
		}
		// if the convenient variable contains a result (match in the database)
		else
		{
			// return false
			return 0;
		}
	}
	// catch connection exception into a variable "$e"
	catch(PDOException $e)
	{
		// if an error occurs, display the error message
		error_log("An error occurred " . $e->getMessage());

		return false;
	}
	if(isset($e))
	{
		return false;
	}
	
}

// $exists = check_home_name("Maison Michel",60);
// echo($exists);

?>