<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_room_name.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_rooms_names.php';

if(!isset($_SESSION['login']))
{
	header('Location: index.php?t=logout');
}
global $sensors,$room_names;
$sensors = $_SESSION['sensors'];
$rooms_names = get_rooms_names($_SESSION['home_id']);



function rooms_names()
{
	global $rooms_names;
	for ($i=0; $i<sizeof($rooms_names); $i++) 
	{ 
		echo('<option value="'.$rooms_names[$i].'">'.$rooms_names[$i].'</option>');
	}
}



function sensors_table()
{
	global $sensors;
	for ($i=0;$i<sizeof($sensors[0]); $i++) 
	{ 
		$room_name = get_room_name($sensors[2][$i]);
		$str = '<tr sid='.$i.'>
	    <td id="table_sensor_type">'.$sensors[0][$i].'</td>
	    <td id="table_room_name">'.$room_name.'</td> 
	    <td id="delete"><button class="delete_button" title="Delete" type="button"/></td>
		</tr>';
		echo($str);
	}
}


?>