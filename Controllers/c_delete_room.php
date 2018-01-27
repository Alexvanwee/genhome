<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_ownership.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/delete_room.php';

if( !isset($_POST['room_index']) || !isset($_POST['room_name']) )
{
	exit("0");
}
$room_index = $_POST['room_index'];
$room_name = $_POST['room_name'];
$rooms = $_SESSION['rooms'];
if( $rooms[$room_index][1] != $room_name )
{
	header('Location: index.php');
}
$email = $_SESSION['login'];
$isOwner = check_ownership($email);
if( !$isOwner )
{
	header('Location: index.php');
}
$room_id = $rooms[$room_index][2];
$delete = delete_room($room_id);
if( !$delete )
{
	exit("0");
}
echo("1");

?>
