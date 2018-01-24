<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

function fetch_password($login)
{
	try 
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL statement
		$text="SELECT Password FROM members WHERE Login='";
		$text= $text.$login;
		$text= $text."'"; 
		// retrieve and store the password value into the variable
		$pwd_valide = $pdo->query($text)->fetchObject()->Password;
		// close connection
		$pdo=null;

		return $pwd_valide;
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