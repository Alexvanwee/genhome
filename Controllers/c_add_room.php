<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/create_room.php';

global $roomtype,$roomname;

//$home_id = $_SESSION['home_id'];
$homeId = 25;
$roomtype = $_POST["selection"];
$roomname = $_POST["roomname"];
if(!isset($roomtype) || !isset($roomname))
{
    echo("0");
    exit();
}

if(isset($_POST['selection'])) echo $_POST['selection'];


createRoom($roomtype, $roomname, $homeId);

header("Location: /Genhome/Views/rooms.php");

?>