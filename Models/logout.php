<?php
// start the session
session_start ();
// destroy the variables of the session
session_unset ();

$_SESSION = array();
if (isset($_COOKIE[session_name()])) 
{
    setcookie(session_name(), '', time()-42000, '/');
}
// destroy the session
session_destroy ();
// redirect user to the login page
header ('location: /Genhome/index.php');

?>