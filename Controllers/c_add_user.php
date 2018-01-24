<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/member_id.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/insert_user.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/encrypt_decrypt.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_email.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/send_email.php';
//$m_id=get_member_id($_SESSION["login"]);

global $name,$lastname,$email,$status,$password;
$name = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$status = $_POST["status"];
$user_password = "";

if(!isset($name) || !isset($lastname) || !isset($email) || !isset($status))
{
    echo("0");
    exit();
}
elseif(!valid_email($email)) 
{
    echo("0");
    exit();
}
$status = ($status == "User" ? 0 : 1);
$member_id = 16;
$user_password = random_password();
$new_user = insertUser($name,$lastname,$email,$user_password,$status,$member_id);
//$new_user = insertUser("pierre","mecchia","mecchia.pierre@gmail.com","aaa",0,15);
if($new_user)
{
    //$email_sent = true;
    $email_sent = send_email($name,$lastname,$email,$user_password);
    if(!$email_sent)
    {
        echo("1/".$user_password);
    }
    else if($email_sent)
    {
        echo("1");
    }
}
else
{
    echo("0");
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

function random_password()
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!&*_-=+:.?";
    $password = substr( str_shuffle( $chars ), 0, 8);
    return $password;
}

?>
