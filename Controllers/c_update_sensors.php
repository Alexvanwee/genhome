<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';


function saveSensors() {
    $pdo = connect_database();
    $query = "SELECT * FROM room WHERE Room_name = :roomname";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":roomname", $_POST['rommName']);
    $stmt->execute();

    $room = $stmt->fetchAll();
    //$home_id = $_SESSION['home_id'];
    $homeId = 25;

    $query = "INSERT INTO sensors(Type_of_sensor, Room_ID, Home_ID, isFavourite) VALUES('Light', :roomId, :homeId, false)";
    for ($it = 0; $it < $_POST["Light"]; $it++) {
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":roomId", $room[0]['Room_ID']);
        $stmt->bindParam(":homeId", $homeId);
        $stmt->execute();
    }

    $query = "INSERT INTO sensors(Type_of_sensor, Room_ID, Home_ID, isFavourite) VALUES('Humidity', :roomId, :homeId, false)";
     for ($it = 0; $it < $_POST["Humidity"]; $it++) {
         $stmt = $pdo->prepare($query);

         $stmt->bindParam(":roomId", $room[0]['Room_ID']);
         $stmt->bindParam(":homeId", $homeId);
         $stmt->execute();
     }

     $query = "INSERT INTO sensors(Type_of_sensor, Room_ID, Home_ID, isFavourite) VALUES('Temperature', :roomId, :homeId, false)";
     for ($it = 0; $it < $_POST["Temperature"]; $it++) {
         $stmt = $pdo->prepare($query);

         $stmt->bindParam(":roomId", $room[0]['Room_ID']);
         $stmt->bindParam(":homeId", $homeId);
         $stmt->execute();
     }

     $query = "INSERT INTO sensors(Type_of_sensor, Room_ID, Home_ID, isFavourite) VALUES('Window', :roomId, :homeId, false)";
     for ($it = 0; $it < $_POST["Window"]; $it++) {
         $stmt = $pdo->prepare($query);

          $stmt->bindParam(":roomId", $room[0]['Room_ID']);
         $stmt->bindParam(":homeId", $homeId);
         $stmt->execute();
     }

     $query = "INSERT INTO sensors(Type_of_sensor, Room_ID, Home_ID, isFavourite) VALUES('Camera', :roomId, :homeId, false)";
     for ($it = 0; $it < $_POST["Camera"]; $it++) {
         $stmt = $pdo->prepare($query);

         $stmt->bindParam(":roomId", $room[0]['Room_ID']);
         $stmt->bindParam(":homeId", $homeId);
         $stmt->execute();
     }
}

saveSensors();

header("Location: /Genhome/Views/sensors.php");

//die($_POST['Light'] . " lights in the " . $_POST['rommName']);

?>