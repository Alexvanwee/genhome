<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/encrypt_decrypt.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/create_user_and_home.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_email.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_serial.php';

if(valid_email($_POST["email"]) && valid_password($_POST["pwd"],$_POST["pwd2"]) && valid_serial($_POST["serial"]) )
{
	$pass = $_POST["pwd"];
	$pass = encrypt_decrypt("encrypt", $pass);
	try
	{
		$creation = create_user_and_home($_POST["first_name"],$_POST["last_name"],$_POST["email"],$pass,$_POST["serial"],$_POST["address"]);
	}
	catch(PDOException $e)
	{
		// if an error occurs, display the error message
		error_log("An error occured " . $e->getMessage());
		header('Location: index.php?e=register');
	}

	if($creation)
	{
		header('Location: index.php');
	}
	else
	{
		header('Location: index.php?e=register');
	}
}
// if email, password or serial is not valid
else
{
	header('Location: index.php?e=register');
}


//#########################################################################################
//#########################################################################################
//#########################################################################################


// function to verify if the serial is correct and was not used already (boolean return)
function valid_serial($serial)
{
	// if the serial starts with "H" and finishes with "X" and
	// contains only digits between these two letters
	if( substr($serial,0,1)=="H" && substr($serial, -1)=="X" && ctype_digit(substr($serial,1,6)) )
	{
		$not_exist = check_serial($serial);
		return $not_exist;
	}
	// if the serial does not have a good typography
	else
	{
		// return false
		return false;
	}
}

// function to verify email address (boolean return)
function valid_email($email) 
{
	// verify if the email address is written correctly
    if(!!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
    	// check if the email is already used in the database
    	$not_used = check_email($email);
    	// return the result of the checking
    	return $not_used;
    }
    // if email written not correctly
    else
    {
    	// return false
    	return false;
    }
}

// function to verify if 2 passwords entered are the same (boolean return)
function valid_password($password1,$password2)
{
	// if the comparison of the 2 strings (the passwords)
	// results in 0 difference
	if(strcmp($password1,$password2)==0)
	{
		// if the password has a length of at least 6 characters
		if(strlen($password1)>=6)
		{
			// then return true
			return true;
		}
		// if length lower than 6
		else
		{
			// return false
			return false;
		}
	}
	// if 2 passwords are different
	else
	{
		// return false
		return false;
	}
}

/*
function valid_name($first_name,$last_name)
{
	if(strlen($first_name)>=2 && strlen($last_name)>=2)
	{
		return true;
	}
	else
	{
		return false;
	}
}
*/

?>