<?php

global $servername, $username, $password, $database;
// set the server connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "app";


function fetch_password($login)
{
	global $servername, $username, $password, $database;
	try 
		{
			// try to connect to the database
			$pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
			// set the PDO error mode to exception
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
}


function verify_login($login)
{
	global $servername, $username, $password, $database;
	try 
	{
		// try to connect to the database with the defined parameters
		$pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		// set the PDO error mode to exception
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// prepare the SQL request
		$request = "SELECT Login FROM members WHERE Login = :login";
		$stmt = $pdo->prepare($request);
		// replace ":login" with the Login entered in the form
		$stmt->bindParam(":login", $login,PDO::PARAM_STR);
		// execute the SQL command
	    $stmt->execute();
	    // retrieve and store the result into the variable
	    $users = $stmt->fetchColumn();
	    // close the connection to the database
	    $pdo=null;

	    return $users;
	}
	// catch connection exception into a variable "$e"
	catch(PDOException $e)
	{
		// if an error occurs, display the error message
		echo "An error occured " . $e->getMessage();

		return false;
	}
}


?>