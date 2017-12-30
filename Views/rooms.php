<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_rooms_names.php';

$rooms = get_rooms_names(13);
$part1 = '<li><a href="#">';
$part2 = '</a></li>';

for ($i=0; $i<sizeof($rooms); $i++) 
{ 
	echo($part1.$rooms[$i].$part2);
}

?>