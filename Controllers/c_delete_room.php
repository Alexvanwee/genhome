<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_ownership.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/delete_home.php';

if( !isset($_POST['home_index']) || !isset($_POST['home_name']) )
{
	exit("0");
}
$home_index = $_POST['home_index'];
$home_name = $_POST['home_name'];
$homes = $_SESSION['homes'];
if( $homes[$home_index][1] != $home_name )
{
	header('Location: index.php');
}
$email = $_SESSION['login'];
$isOwner = check_ownership($email);
if( !$isOwner )
{
	header('Location: index.php');
}
$home_id = $homes[$home_index][2];
$delete = delete_home($home_id);
if( !$delete )
{
	echo($home_id);
	exit();
}
echo(1);

?>
