<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_user_name.php';

global $success_message, $error_message;
$success_message = "Thank you for your message !";
$error_message = "There was an error submitting your message, please try again later.";

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['msg']) && 1==2)
{
	$msg = $_POST['msg'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	if(isset($_SESSION['login']))
	{
		$email = $_SESSION['login'];
		$name = get_user_name($email);
		$name = $name[0]." ".$name[1];
	}
	
	//####################
	// do the email stuff 
	//###################
	echo("1/".$success_message);
}
else
{
	echo("0/".$error_message);
}



?>
