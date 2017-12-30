<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

// function to create a new user
function create_user($first_name,$last_name,$email,$pwd,$serial)
{
	try
	{
		// try to connect to the database with the defined parameters
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL request
		$request = "INSERT INTO members (First_Name,Last_Name,Mail,Login,Password,isOwner,Product_ID) VALUES (:fn,:ln,:mail,:log,:pass,1,:pid)";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data entered in the form
		$stmt->bindParam(":fn", $first_name,PDO::PARAM_STR);
		$stmt->bindParam(":ln", $last_name,PDO::PARAM_STR);
		$stmt->bindParam(":mail", $email,PDO::PARAM_STR);
		$stmt->bindParam(":log", $email,PDO::PARAM_STR);
		$stmt->bindParam(":pass", $pwd,PDO::PARAM_STR);
		//$stmt->bindParam(":isowner", 1,PDO::PARAM_INT);
		$stmt->bindParam(":pid", $serial,PDO::PARAM_STR);
		// execute the SQL command
	    $stmt->execute();
	    // close the connection to the database
	    $pdo=null;

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


?>