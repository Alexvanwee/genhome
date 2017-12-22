<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_sold.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';


function check_serial($serial)
{
	try
	{		
		$pdo = connect_database();
		if(!$pdo){ return false; }
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