<?php

// set some variables to global to be available to use inside statements
global $servername, $username, $password, $database;
// set values for the variables (server connection parameters)
$servername = "localhost";
$username = "root";
$password = "";
$database = "app";

function check_sold($serial)
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
		$request = "SELECT Serial_ID FROM sold WHERE (Serial_ID = :ser AND isRegistered = :isr)";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (product serial)
		$isr = false;
		$stmt->bindParam(":ser", $serial,PDO::PARAM_STR);
		$stmt->bindParam(":isr", $isr,PDO::PARAM_INT);
		// execute the SQL command
	    $stmt->execute();
	    // retrieve and store the result into a convenient variable
	    $item = $stmt->fetchColumn();
	    // close the connection to the database
	    $pdo=null;

	    // if the convenient variable contains no result (no match in the database)
	    if(isset($item))
	    {
	    	// return false
			return true;
		}
		// if the convenient variable contains a result (match in the database)
		else
		{
			// return true
			return false;
		}
	}
	// catch connection exception into a variable "$e"
	catch(PDOException $e)
	{
		// if an error occurs, display the error message
		error_log("An error occurred " . $e->getMessage());
		return false;
	}
	
}



?>