<?php

// set some variables to global to be available to use inside statements
global $servername, $username, $password, $database;
// set values for the variables (server connection parameters)
$servername = "localhost";
$username = "root";
$password = "";
$database = "app";

// function to create a new user
function create_user($first_name,$last_name,$email,$pwd,$serial)
{
	// retrieve the variables set at the beginning of the page
	global $servername, $username, $password, $database;

	try
	{
		// try to connect to the database with the defined parameters
		$pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		// set the PDO error mode to exception
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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