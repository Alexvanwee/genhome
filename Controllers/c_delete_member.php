<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_members_information.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/delete_member.php';

if( !isset($_POST['member_index']) || !isset($_POST['member_name']) )
{
	exit("0");
}

$member_index = $_POST['member_index'];
$member_name = $_POST['member_name'];
$members = get_members_information();

$delete = delete_member($member_index);

if( !$delete )
{
	exit("0");
}


?>
