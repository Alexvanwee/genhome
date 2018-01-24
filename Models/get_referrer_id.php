<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

// function to get of a user from email (return array[values])
function get_referrer_id($member_id)
{
	try 
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL statement
		$request="SELECT Referrer_ID FROM members WHERE Member_ID = :mid";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (member_id)
		$stmt->bindParam(":mid", $member_id,PDO::PARAM_INT);
		//execute
		$stmt->execute();
		//fetch
		$referrer_id = $stmt->fetchColumn();
		// close connection
		$pdo=null;
		if($referrer_id == null)
		{
			return -1;
		}
		//return result
		return $referrer_id;
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

// $id = get_referrer_id(12);
// echo($id);

?>