<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_user_name.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/encrypt_decrypt.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_email.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/send_email.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/modify_password.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/modify_first_connection.php';


global $email;
$email = $_POST["email"];


if(!isset($email))
{
    echo("0");
    exit();
}
/*elseif(!valid_email($email))
{
    echo("0");
    exit();
}*/

$name=get_user_name($email);
$first_name=$name[0];
$last_name=$name[1];

$user_password = random_password();
$crypted_password = encrypt_decrypt("encrypt",$user_password);

$email_sent = send_email($first_name,$last_name,$email,$user_password);
if(!$email_sent)
{
    echo("1/".$user_password);
}
else if($email_sent)
{
    modify_password($crypted_password,$email);
    modify_first_connection(1,$email);
    echo("1");
}



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

function random_password()
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!&*_-=+:.?";
    $password = substr( str_shuffle( $chars ), 0, 8);
    return $password;
}


?>
