<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/member_id.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/encrypt_decrypt.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/fetch_password.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/verify_login.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_primary_home.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_all_sensors.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_first_connection.php';

// if all form variables are well defined
if (isset($_POST["login"]) && $_POST["login"]!="" && isset($_POST['pwd']) && $_POST['pwd']!="") 
{
	// create a token that will change if user exists in the database
	$token = 0;
	$exists = verify_login($_POST["login"]);
	// if the user is found in the database
	if(isset($exists) && $exists!="" && !!($exists))
	{
		// change the token value
		$token=1;
	}
 	// if token is changed
	if($token===1)
	{
		// define an empty variable to further store the password retrieed from the DB
		$pwd_valide = "";
		$pwd_valide = fetch_password($_POST['login']);
		$pwd_input = encrypt_decrypt("encrypt", $_POST['pwd']);
		$member_id = get_member_id($_POST['login']);

		// compare the password entered with the stored password
		if (isset($pwd_valide) && !!($pwd_valide) && $pwd_valide == $pwd_input && isset($member_id)) 
		{
			// save the parameters of the visitor as session variables (login and password)
			$_SESSION['login'] = $_POST['login'];
			// set where (favourites) 
			$_SESSION['where']	= "favourites";
			//check if first connection
			$isFirst = check_first_connection($_SESSION['login']);
			if($isFirst)
			{
				$_SESSION['where']	= "first_connection";
			}
			// set primary home id 
			$primary_home = get_primary_home($_SESSION['login']);
			$_SESSION['home_id'] = $primary_home;
			$sensors = "";		
			if(!$isFirst)
			{
				// set sensors  
				$sensors = get_all_sensors($primary_home);
			}
			$_SESSION['sensors'] = $sensors;
			// set member_id 
			$_SESSION['member_id'] = $member_id;
			// redirect to the homepage
			header("Location: /Genhome/index.php");
		}
		else 
		{
			// redirect to the homepage with error signal
			header('Location: index.php?e=login');
		}
	}
	// if the user is not in the database
	else
	{
		// redirect to the homepage with error signal
		header('Location: index.php?e=login');
	}
}

// if form variables are not filled/defined
else 
{
	// display an error message
	header('Location: index2.php?e=login');
}

?>