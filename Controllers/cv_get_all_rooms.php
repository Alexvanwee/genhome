<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_all_rooms.php';

if(!isset($_SESSION['home_id']))
{
	header('Location: ../index.php?t=logout');
}
$home_id = $_SESSION['home_id'];
$rooms = get_all_rooms($home_id);
$part1 = '<li><a href="index.php?w=';
$part2 = '</a></li>';

for ($i=0; $i<sizeof($rooms); $i++) 
{

	echo($part1.$rooms[$i].'">'.$rooms[$i].$part2);
}

?>