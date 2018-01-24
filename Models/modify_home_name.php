<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';


// function modify a user's step
function modify_home_name($home_name,$email)
{
	try
	{
		// try to connect to the database with the defined parameters
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL request
		$request = "UPDATE home SET Home_name=:hnm WHERE Member_ID=(SELECT Member_ID FROM members WHERE Mail=:email)";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data entered in the form
		$stmt->bindParam(":hnm", $home_name,PDO::PARAM_STR);
		$stmt->bindParam(":email", $email,PDO::PARAM_STR);
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



