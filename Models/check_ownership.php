<?php

// set some variables to global to be available to use inside statements
global $servername, $username, $password, $database;
// set values for the variables (server connection parameters)
$servername = "localhost";
$username = "root";
$password = "";
$database = "app";

function check_ownership()
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
		$request = "SELECT isOwner FROM members WHERE Member_ID=:mid";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (address and member_id)
		$stmt->bindParam(":mid", $_SESSION["member_id"],PDO::PARAM_INT);
		// execute the SQL command
		$stmt->execute();
		// read and store the response into a convenient variable
		$isOwner = $stmt->fetchColumn();
		// close the connection to the database
	    $pdo=null;

	    if($isOwner)
	    {
	    	return 1;
	    }
	    else
	    {
	    	return 0;
	    }
	}
	// catch connection exception into a variable "$e"
	catch(PDOException $e)
	{
		// if an error occurs, display the error message
		error_log("An error occured " . $e->getMessage());
		// if failure, return false
		return false;
	}
}


?>