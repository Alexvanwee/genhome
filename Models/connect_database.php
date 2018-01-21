<?php

global $servername, $username, $password, $database;
// set the server connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "app";

function connect_database()
{
	global $servername, $username, $password, $database;
	try 
	{
		// try to connect to the database
		$pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
		// set the PDO error mode to exception
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->query("SET NAMES UTF8");
		return $pdo;
	}
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