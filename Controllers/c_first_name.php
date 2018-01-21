<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_home_name.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_user_name.php';

if (!isset($_SESSION['home_id']) || !isset($_SESSION['login'])) 
{
	header('Location: ../index.php?t=logout');
}
if(!isset($_SESSION['where']))
{
	$_SESSION['where'] = "favourites";
	header('Location: ../index.php');
}

global $first_name;

$first_name = get_user_name($_SESSION['login']);
$first_name = $first_name[0];
$home_id = $_SESSION['home_id'];
$home_name = get_home_name($home_id);
$where = $_SESSION['where'];
$where = ucfirst($where);

echo($home_name." - ".$where);


?>