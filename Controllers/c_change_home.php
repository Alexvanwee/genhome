<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_home_id_from_name.php';

$home_id = get_home_id_from_name($_SESSION['login'],$_SESSION['home_id']);
if(!$home_id)
{
	unset($_SESSION['home_id']);
	header('Location: index.php');
}
else
{
	$_SESSION['home_id'] = $home_id;
	header('Location: index.php');
}


?>