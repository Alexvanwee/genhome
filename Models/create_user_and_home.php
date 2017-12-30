<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/create_user.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/create_home.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/link_home_user.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/set_as_registered.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/set_primary_home.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_homes_ids.php';

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
    	echo("user: ".$user."<br/>"."home :".$home."<br/>"."link: ".$link."<br/>"."registered: ".$registered);
	}
	catch(PDOException $e)
	{
		// if an error occurs, display the error message
		echo("An error occured " . $e->getMessage());
		return false;
	}
	if(isset($e))
	{
		return false;
	}
	if(!$user || !$home || !$link || !$registered)
    {
    	return false;
    }
	try
	{
		$home_id = get_homes_ids($email);
		echo "<br/>";
		print_r($home_id);
		echo "<br/>";
    	$set = set_primary_home($email,$home_id[0]);
    	echo("set: ".$set);
    	return true;
	}
	catch(PDOException $e)
	{
		// if an error occurs, display the error message
		echo("An error occured " . $e->getMessage());
		return false;
	}
	if(isset($e))
	{
		return false;
	}
    
}

// $create = create_user_and_home("Alexandre","vw","avw@gmail.com","aaaaaaa","H517833X","10 av lol");
// echo($create);

?>