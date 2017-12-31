<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/member_id.php';

function check_admin($email)
{
	// retrieve the member id with his email address
    $member_id = get_member_id($email);

    try
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL request
		$request = "SELECT isAdmin FROM members WHERE Member_ID=:mid";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (address and member_id)
		$stmt->bindParam(":mid",$member_id,PDO::PARAM_INT);
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

// $admin = check_admin("alexandre.vanwesel@gmail.com");
// print_r($admin);

?>