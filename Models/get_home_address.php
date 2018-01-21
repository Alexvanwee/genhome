<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/member_id.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

// function to get the address of the user's home (return value)
function get_home_address($email,$home_id)
{
	try 
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL statement
		$request="SELECT Address FROM home WHERE Home_ID=:hid AND Member_ID=(SELECT Member_ID FROM members WHERE Login=:email)";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (member_id)
		$stmt->bindParam(":hid", $home_id,PDO::PARAM_INT);
		$stmt->bindParam(":email", $email,PDO::PARAM_STR);
		//execute
		$stmt->execute();
		//fetch
		$home_address = $stmt->fetchColumn();
		// close connection
		$pdo=null;
		//return result
		return $home_address;
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