<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_homes_names.php';

global $homes;
$homes = get_homes_names($_SESSION["login"]);
if(!!$homes)
{
	$part1 = '<li><a href="index.php?h=';
	$part2 = '</a></li>';

	for ($i=0; $i<sizeof($homes); $i++) 
	{ 
		echo($part1.$homes[$i].'">'.$homes[$i].$part2);
	}
}


?>