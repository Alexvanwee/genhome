<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_sold.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

// function to retrieve the id of a member from his email address (int return)
function get_member_id($email)
{
	try
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
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
	if(isset($e))
	{
		return false;
	}
}

?>