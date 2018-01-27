<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/encrypt_decrypt.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/NewPassword.php';

if(valid_password($_POST["N_password"],$_POST["C_password"]))
{
	$New_Password=$_POST["N_password"];
	$New_Password = encrypt_decrypt("encrypt", $New_Password);

    $modify_password = Modify_Password($New_Password);
    if(!$modify_password)
	{
		exit("0");
	}
	header('Location: index.php?t=next_step');
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
?>