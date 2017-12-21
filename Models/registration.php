<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/member_id.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_email.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_serial.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_sold.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/create_home.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/create_user.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/create_user_and_home.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/link_home_user.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/set_as_registered.php';

// set some variables to global to be available to use inside statements
global $servername, $username, $password, $database;
// set values for the variables (server connection parameters)
$servername = "localhost";
$username = "root";
$password = "";
$database = "app";


?>