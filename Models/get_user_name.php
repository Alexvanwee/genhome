<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

// function to get of a user from email (return array[ fname , lname ])
function get_user_name($email)
{
	try 
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL statement
		$request="SELECT First_Name,Last_Name FROM members WHERE Login = :email";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (member_id)
		$stmt->bindParam(":email", $email,PDO::PARAM_STR);
		//execute
		$stmt->execute();
		//fetch
		$name = $stmt->fetchAll();
		// close connection
		$pdo=null;
		$name = array($name[0][0],$name[0][1]);
		//return result
		return $name;
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

// $name = get_user_name("alexandrevanwesel@gmail.com");
// print_r($name);

?>