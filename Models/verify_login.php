<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_sold.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

function verify_login($login)
{
	global $servername, $username, $password, $database;
	try 
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL request
		$request = "SELECT Login FROM members WHERE Login = :login";
		$stmt = $pdo->prepare($request);
		// replace ":login" with the Login entered in the form
		$stmt->bindParam(":login", $login,PDO::PARAM_STR);
		// execute the SQL command
	    $stmt->execute();
	    // retrieve and store the result into the variable
	    $users = $stmt->fetchColumn();
	    // close the connection to the database
	    $pdo=null;

	    return $users;
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

?>