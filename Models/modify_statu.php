<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

// function to create a new user
function modify_statu($New_Statu, $id_User)
{
	try
	{
		// try to connect to the database with the defined parameters
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL request
		$request = "UPDATE members SET isOwner=:New_Statu WHERE Member_ID=:id_User";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data entered in the form
		$stmt->bindParam(":New_Statu", $New_Statu);
		$stmt->bindParam(":id_User", $id_User);
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
?>
