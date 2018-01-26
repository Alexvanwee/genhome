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

$str = '<ul>
   <li><img src="/genhome/Images/light.png" class="light" alt="light">  Light  <input type="text" id="light" name="Light" placeholder="6 max"></li>

    <li><img src="/genhome/Images/humidity.png" class="humidity" alt="humidity">  Humidity  <input type="text" id="humidity" name="Humidity" placeholder="6 max"></li>

    <li><img src="/genhome/Images/temperature.png" class="temperature" alt="temperature">  Temperature  <input type="text" id="temperature" name="Temperature" placeholder="6 max"></li>

    <li><img src="/genhome/Images/window.png" class="window" alt="window">  Window  <input type="text" id="window" name="Window" placeholder="6 max"></li>

    <li><img src="/genhome/Images/camera.png" class="camera" alt="camera">  Camera  <input type="text" id="camera" name="Camera" placeholder="6 max"></li>;'
?>

<li><h3><?php echo $donnees['Room_name']; ?></h3><img src="/genhome/Images/plusW.png" class= "plus" alt="plus">;




