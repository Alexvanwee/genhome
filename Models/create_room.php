<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

function createRoom($roomtype,$roomname,$homeID)
{

  try
  {
      $pdo = connect_database();
      if(!$pdo){ return false; }
      $request ="INSERT INTO room (Room_type,Room_name,Home_ID) VALUES (:roomtype,:roomname,:homeID)";
      $stmt = $pdo->prepare($request);
      // replace ":xxxx" with the corresponding data (member_id)
      $stmt->bindParam("roomtype", $roomtype,PDO::PARAM_STR);
      $stmt->bindParam("roomname", $roomname,PDO::PARAM_STR);
      $stmt->bindParam("homeID", $homeID,PDO::PARAM_STR);
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
