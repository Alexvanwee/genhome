<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/create_room.php';

global $roomtype,$roomname;
$roomtype = $_POST["selection"];
$roomname = $_POST["roomname"]

if(!isset($roomtype) || !isset($roomname))
{
    echo("0");
    exit();
}

if(isset("selection")) echo $_POST['selection'];

createRoom($roomtype, $roomname);

?>