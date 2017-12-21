<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_sold.php';

// set some variables to global to be available to use inside statements
global $servername, $username, $password, $database;
// set values for the variables (server connection parameters)
$servername = "localhost";
$username = "root";
$password = "";
$database = "app";

function check_serial($serial)
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
		$request = "SELECT Product_ID FROM members WHERE Product_ID = :pro";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (product serial)
		$stmt->bindParam(":pro", $serial,PDO::PARAM_STR);
		// execute the SQL command
	    $stmt->execute();
	    // retrieve and store the result into a convenient variable
	    $id = $stmt->fetchColumn();

	    $issold = check_sold($serial);

	    // close the connection to the database
	    $pdo=null;

	    // if the convenient variable contains no result (no match in the database)
	    if(($id==null || $id=="") && $issold==true)
	    {
	    	// return true
			return true;
		}
		// if the convenient variable contains a result (match in the database)
		else
		{
			// return false
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