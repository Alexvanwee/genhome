<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/getRooms.php';


//$home_id = $_SESSION['home_id'];
$home_id = 25;

$reponse=getRooms($home_id);

while ($donnees= $reponse->fetch()){ ?>
 <div id="menu-deroulant">

                <li><h3><?php echo $donnees['Room_name']; ?></h3><img src="/genhome/Images/plusW.png" class= "plus" alt="plus">

                    <ul>
                        <li><img src="/genhome/Images/light.png" class="light" alt="light">  Light  <input type="text" id="light" name="Light" placeholder="6 max"></li>

                        <li><img src="/genhome/Images/humidity.png" class="humidity" alt="humidity">  Humidity  <input type="text" id="humidity" name="Humidity" placeholder="6 max"></li>

                        <li><img src="/genhome/Images/temperature.png" class="temperature" alt="temperature">  Temperature  <input type="text" id="temperature" name="Temperature" placeholder="6 max"></li>

                        <li><img src="/genhome/Images/window.png" class="window" alt="window">  Window  <input type="text" id="window" name="Window" placeholder="6 max"></li>

                        <li><img src="/genhome/Images/camera.png" class="camera" alt="camera">  Camera  <input type="text" id="camera" name="Camera" placeholder="6 max"></li>
                    </ul>
                </li>
            </div>
<?php
  }
$reponse->closeCursor();
?>