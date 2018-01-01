<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_rooms_names.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_primary_home.php';

$home_id = get_primary_home($_SESSION['login']);
$rooms = get_rooms_names($home_id);
$part1 = '<li><a href="index.php?w=';
$part2 = '</a></li>';

for ($i=0; $i<sizeof($rooms); $i++) 
{

	echo($part1.$rooms[$i].'">'.$rooms[$i].$part2);
}

?>