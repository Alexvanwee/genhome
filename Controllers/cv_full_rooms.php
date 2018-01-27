<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_rooms.php';

if(!isset($_SESSION['login']))
{
	header('Location: ../index.php?t=logout');
}
global $rooms;
$rooms = get_rooms($_SESSION["login"]);
if(!$rooms)
{
	exit();
}
$_SESSION["rooms"] = $rooms;

for ($i=0;$i<sizeof($rooms); $i++) 
{ 
	$str = '<tr hid='.$i.'>
    <td>'.$rooms[$i][0].'</td>
    <td id="table_home_name">'.$rooms[$i][1].'</td> 
    <td id="delete"><button class="delete_button" title="Delete" type="button"/></td>
	</tr>';
	echo($str);
}



?>