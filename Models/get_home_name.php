<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/member_id.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

// function to get the names od the user's homes (return array[values])
function get_home_name($home_id)
{
	try 
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL statement
		$request="SELECT (Home_name) FROM home WHERE Home_ID=:hid";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (member_id)
		$stmt->bindParam(":hid", $home_id,PDO::PARAM_INT);
		//execute
		$stmt->execute();
		//fetch
		$home_name = $stmt->fetchColumn();
		// close connection
		$pdo=null;
		//return result
		return $home_name;
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

// $home = get_home_name(25);
// print_r($home);
// for ($i=0; $i<sizeof($homes); $i++) 
// { 
// 	for ($j=0; $j<sizeof($homes[$i])-1; $j++) 
// 	{ 
// 		echo($homes[$i][$j]);
// 	}
// }


?>