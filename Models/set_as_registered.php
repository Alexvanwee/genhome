<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_sold.php';

function set_as_registered($serial)
{
	try
	{
	    $pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL request
		$request = "UPDATE sold SET isRegistered = :val WHERE Serial_ID = :ser";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (address and member_id)
		$val = true;
		$stmt->bindParam(":val",$val,PDO::PARAM_INT);
		$stmt->bindParam(":ser",$serial,PDO::PARAM_STR);
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
		error_log("An error occured " . $e->getMessage());
		// if failure, return false
		return false;
	}
	if(isset($e))
	{
		return false;
	}
}



?>