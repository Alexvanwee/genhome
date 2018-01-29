<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/getUsers.php';


$home_id = $_SESSION['home_id'];

$reponse=getUsers($home_id);

while ($donnees= $reponse->fetch()){
 echo"
    <div style='display:inline-block;vertical-align:top'>
      <img src='/Genhome/Images/member.png'><br/>
      " . $donnees['First_Name'] . "
    </div>";
  }
$reponse->closeCursor();
?>
