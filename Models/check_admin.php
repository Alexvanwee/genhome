<?php


require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_sold.php';

function check_admin()
{
	// retrieve the variables set at the beginning of the page
	global $servername, $username, $password, $database;

    try
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL request
		$request = "SELECT isAdmin FROM members WHERE Member_ID=:mid";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (address and member_id)
		$stmt->bindParam(":mid", $_SESSION["member_id"],PDO::PARAM_INT);
		// execute the SQL command
		$stmt->execute();
		// read and store the response into a convenient variable
		$isAdmin = $stmt->fetchColumn();
		// close the connection to the database
	    $pdo=null;

	    if($isAdmin)
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
	if(isset($e))
	{
		return false;
	}
}


?>