<html>

  <head>
		<link rel="stylesheet" type="text/css" href="/Genhome/Styles/sensors.css"/>
		<title>Sensors</title>
  </head>

  <body>
    <div class="container">

        <div class="logo"><img src="/Genhome/Images/logo.png" class= "logo2" alt="Logo"></div>

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
    
            <div id="menu-deroulant">

                <li><h3><?php echo $donnees['Room_name']; ?></h3><img src="/genhome/Images/plusW.png" class= "plus" alt="plus">;

                    <ul>
                        <li><img src="/genhome/Images/light.png" class="light" alt="light">  Light  <input type="text" id="light" name="Light" placeholder="6 max"></li>

                        <li><img src="/genhome/Images/humidity.png" class="humidity" alt="humidity">  Humidity  <input type="text" id="humidity" name="Humidity" placeholder="6 max"></li>

                        <li><img src="/genhome/Images/temperature.png" class="temperature" alt="temperature">  Temperature  <input type="text" id="temperature" name="Temperature" placeholder="6 max"></li>

                        <li><img src="/genhome/Images/window.png" class="window" alt="window">  Window  <input type="text" id="window" name="Window" placeholder="6 max"></li>

                        <li><img src="/genhome/Images/camera.png" class="camera" alt="camera">  Camera  <input type="text" id="camera" name="Camera" placeholder="6 max"></li>
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