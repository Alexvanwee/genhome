<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/create_user.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/create_home.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/link_home_user.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/set_as_registered.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';


// function to create a new user with a new home
function create_user_and_home($first_name,$last_name,$email,$pwd,$serial,$address)
{
	try
	{
		// call the function to create user with the wanted parameters
		$user = create_user($first_name,$last_name,$email,$pwd,$serial);
		// call the function to create home with the wanted parameters
    	$home = create_home($email, $address);

    	$link = link_home_user($email);

    	$registered = set_as_registered($serial);

	}
	catch(PDOException $e)
	{
		// if an error occurs, display the error message
		error_log("An error occured " . $e->getMessage());
		return false;
	}

	if($user && $home && $link && $registered)
    {
    	// if success, return true
    	return true;
    }
    else
    {
    	return false;
    }
    
}


?>