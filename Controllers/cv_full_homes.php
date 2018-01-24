<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_homes.php';

if(!isset($_SESSION['login']))
{
	header('Location: ../index.php?t=logout');
}
global $homes;
$homes = get_homes($_SESSION["login"]);
if(!$homes)
{
	exit();
}
$_SESSION["homes"] = $homes;

for ($i=0;$i<sizeof($homes); $i++) 
{ 
	$str = '<tr hid='.$i.'>
    <td>'.$homes[$i][0].'</td>
    <td id="table_home_name">'.$homes[$i][1].'</td> 
    <td id="delete"><button class="delete_button" title="Delete" type="button"/></td>
	</tr>';
	echo($str);
}



?>