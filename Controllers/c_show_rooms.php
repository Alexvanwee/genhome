<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/getRooms.php';


//$home_id = $_SESSION['home_id'];
$home_id = 25;

$reponse=getRooms($home_id);

while ($donnees= $reponse->fetch()){
 echo"
    <div style='display:inline-block;vertical-align:top'>
      <img src='/Genhome/Images/room.png'><br/>
      " . $donnees['Room_name'] . "
    </div>";
  }
$reponse->closeCursor();
?>
