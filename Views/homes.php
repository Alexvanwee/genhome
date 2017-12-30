<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_homes_names.php';

$homes = get_homes_names($_SESSION["login"]);
$part1 = '<li><a href="#">';
$part2 = '</a></li>';

for ($i=0; $i<sizeof($homes); $i++) 
{ 
	echo($part1.$homes[$i].$part2);
}

?>