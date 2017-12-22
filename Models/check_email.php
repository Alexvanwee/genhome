<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_sold.php';

// function to verify if the email address is already used in the database
function check_email($email)
{
	try
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL request
		$request = "SELECT Mail FROM members WHERE Mail = :mail";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (email address)
		$stmt->bindParam(":mail", $email,PDO::PARAM_STR);
		// execute the SQL command
	    $stmt->execute();
	    // retrieve and store the result into a convenient variable
	    $mail = $stmt->fetchColumn();
	    // close the connection to the database
	    $pdo=null;

	    // if the convenient variable contains no result (no match in the database)
	    if($mail==null || $mail=="")
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
	if(isset($e))
	{
		return false;
	}
	
}


?>