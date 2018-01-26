<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

function createRoom($roomtype,$roomname)
{
  try
  {
      $pdo = connect_database();
      if(!$pdo){ return false; }
      $request ="INSERT INTO room (Room_type,Room_name) VALUES (:hid1,:hid2)";
      $stmt = $pdo->prepare($request);
      // replace ":xxxx" with the corresponding data (member_id)
      $stmt->bindParam(":hid1", $roomtype,PDO::PARAM_STR);
      $stmt->bindParam(":hid2", $roomname,PDO::PARAM_STR);
      $stmt->execute();

      // close the connection to the database
      $pdo=null;
     // if success, return true
      return true;
  }
    // catch connection exception into a variable "$e"
    catch(PDOException $e)
    {
      // if an error occurs, display the error message
      echo("An error occured " . $e->getMessage());
      // if failure, return false
      return false;
    }
    if(isset($e))
    {
      return false;
    }
}
// $test=createRoom("Kitchen","Exemple");
// echo($test);



 ?>
