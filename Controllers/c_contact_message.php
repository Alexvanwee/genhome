<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_user_name.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/send_email_contact_message.php';

global $success_message, $error_message;
$success_message = "Thank you for your message !";
$error_message = "There was an error submitting your message, please try again later.";

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['msg']))
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
	$member_id = "";
	if(isset($_SESSION["member_id"])){ $member_id = $_SESSION["member_id"]; }
	$mail_sent = send_email_contact_message($name,$email,$msg,$member_id);
	if(!$mail_sent){ exit("0/".$error_message); }
	echo("1/".$success_message);
}
else
{
	echo("0/".$error_message);
}



?>
