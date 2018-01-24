<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/member_id.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_referrer_id.php';

// function to get the names of the user's homes (return array[values])
function get_homes_names($email)
{
	// retrieve the member id
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
		// prepare the SQL statement
		$request="SELECT Home_name FROM home WHERE Member_ID=:mid";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (member_id)
		$stmt->bindParam(":mid", $member_id,PDO::PARAM_INT);
		//execute
		$stmt->execute();
		//fetch
		$homes = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
		// close connection
		$pdo=null;
		//return result
		return $homes;
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

// $homes = get_homes_names("alexandrevanwesel@gmail.com");
// print_r($homes);
// for ($i=0; $i<sizeof($homes); $i++) 
// { 
// 	for ($j=0; $j<sizeof($homes[$i])-1; $j++) 
// 	{ 
// 		echo($homes[$i][$j]);
// 	}
// }


?>