<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_home_id_from_name.php';

if(!isset($_SESSION['login']))
{
	header('Location: index.php?t=logout');
}
if(!isset($_SESSION['home_name']))
{
	header('Location: index.php');
}
$home_id = get_home_id_from_name($_SESSION['login'],$_SESSION['home_name']);
if(!$home_id)
{
	unset($_SESSION['home_name']);
	header('Location: index.php');
}
else
{
	$_SESSION['home_id'] = $home_id;
	$_SESSION['where'] = "favourites";
	header('Location: index.php');
}


?>