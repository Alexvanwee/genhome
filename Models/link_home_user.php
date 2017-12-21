<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/member_id.php';

// set some variables to global to be available to use inside statements
global $servername, $username, $password, $database;
// set values for the variables (server connection parameters)
$servername = "localhost";
$username = "root";
$password = "";
$database = "app";

// function to link the home and user created (Home_ID)
function link_home_user($email)
{
	// retrieve the variables set at the beginning of the page
	global $servername, $username, $password, $database;
	// retrieve the member id
	$member_id = get_member_id($email);
	
	try
	{
	    // try to connect to the database with the defined parameters
	    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		// set the PDO error mode to exception
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// prepare the SQL request
		$request = "UPDATE members SET Home_ID=(SELECT Home_ID FROM home WHERE Member_ID=:mid AND isOwner=1) WHERE (Member_ID=:mid2)";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (address and member_id)
		//$stmt->bindParam(":ad", $address,PDO::PARAM_STR);
		$stmt->bindParam(":mid", $member_id,PDO::PARAM_INT);
		$stmt->bindParam(":mid2", $member_id,PDO::PARAM_INT);
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

}


?>