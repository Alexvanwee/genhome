<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

// function to retrieve step from database (return value)
function fetch_step($login)
{
	try 
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL statement
		$text="SELECT Step FROM members WHERE Login='".$login."'";
		// retrieve and store the password value into the variable
		$step = $pdo->query($text)->fetchObject()->Step;
		// close connection
		$pdo=null;

		return $step;
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

// $test = fetch_step("alexandre.vanwesel@gmail.com");
// echo($test);

?>