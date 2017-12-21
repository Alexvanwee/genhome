<?php
// set some variables to global to be available to use inside statements
global $servername, $username, $password, $database;
// set values for the variables (server connection parameters)
$servername = "localhost";
$username = "root";
$password = "";
$database = "app";

// function to retrieve the id of a member from his email address (int return)
function get_member_id($email)
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
		$request = "SELECT Member_ID FROM members WHERE Mail = :email";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (email address)
		$stmt->bindParam(":email", $email,PDO::PARAM_STR);
		// execute the SQL command
		$stmt->execute();
		// read and store the response into a convenient variable
		$member_id = $stmt->fetchColumn();
		// close the connection to the database
		$pdo=null;

		if($member_id==null || $member_id=="")
		{
			return false;
		}
		else
		{
			// return the convenient variable
			return $member_id;
		}
	}
	// catch connection exception into a variable "$e"
	catch(PDOException $e)
	{
		// if an error occurs, display the error message
		error_log("An error occured " . $e->getMessage());
		return false;
	}
}

?>