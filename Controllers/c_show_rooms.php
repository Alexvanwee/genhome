<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/getRooms.php';


$home_id = $_SESSION['home_id'];

$reponse=getRooms($home_id);

while ($donnees= $reponse->fetch()){ ?>
	<form method="post">
		<div id="display">
			<img src="/genhome/Images/room.png" class="room" alt="room"><h3><?php echo $donnees['Room_name']; ?></h3>
  </div>
</form>

 <?php
}
$reponse->closeCursor();
?>
