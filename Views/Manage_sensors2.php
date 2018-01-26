<html>

  <head>
		<link rel="stylesheet" type="text/css" href="/Manage_sensors/Manage_sensors2.css">
		<title>Manage the sensors location</title>
  </head>

  <body>
    <div class="container">
        <!-- <div class="buttons"><img id="buttons" src="/Manage_sensors/next.png" alt"buttons"></div> -->
        <div class="logo"><img id="logo" src="/Manage_sensors/logo_orange_effect.png" alt"logo"></div>
        <div class="genhome"><h2>Genhome</h2></div>
        <div class="HD"></div>
        <div class="buttons"><input type="submit" id="submit" value="Submit"/></div>
        <div class="manage">
            <h1>Manage the sensors location</h1>

            <?php
            try
            {
            $bdd = new PDO('mysql:host=localhost;dbname=genhome;charset=utf8', 'root', '');
            }
            catch(Exception $e)
            {
            die('Erreur : '.$e->getMessage());
            }

            $reponse = $bdd->query('SELECT * FROM room');

            while ($donnees = $reponse->fetch())
            {
            ?>
            <!-- <form method="post" action="Manage_sensors2.php"> -->
            <div id="menu-deroulant">
                <li><a href="#"><h3><br><?php echo $donnees['Room_name']; ?></br></h3><img id="plus" src="/Manage_sensors/add.png" alt="plus"></a>
                    <ul>

                        <li><a href="#"><img src="/Manage_sensors/light.png" height="30px" width ="30px" alt="light">  Light  <input type="text" id="light" name="Light" placeholder="Number"></a></li>

                        <li><a href="#"><img src="/Manage_sensors/humidity.png" height="30px" width ="30px" alt="humidity">  Humidity  <input type="text" id="humidity" name="Humidity" placeholder="Number"></a></li>
                        <li><a href="#"><img src="/Manage_sensors/temperature.png" height="30px" width ="30px" alt="temperature">  Temperature  <input type="text" id="temperature" name="Temperature" placeholder="Number"></a></li>
                        <li><a href="#"><img src="/Manage_sensors/window.png" height="30px" width ="30px" alt="window">  Window  <input type="text" id="window" name="Window" placeholder="Number"></a></li>
                        <li><a href="#"><img src="/Manage_sensors/camera.png" height="30px" width ="30px" alt="camera">  Camera  <input type="text" id="camera" name="Camera" placeholder="Number"></a></li>
                       <!--  <?php
                            $req = $bdd->prepare('UPDATE sensors SET value = ');
                            $req->execute(array(':Number' => $_POST['Number']));

                            echo 'Nombre enregistré !';
                        ?> -->
                    </ul>
                </li>
            </div>
        <!-- </form> -->
        <?php
        }

            $reponse->closeCursor();
        ?>
    </div>

  </body>

</html>