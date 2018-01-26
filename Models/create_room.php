<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

function createRoom($Rtype,$Rname,$roomID,$homeID)
{
  try
  {
      $pdo = connect_database();
      if(!$pdo){ return false; }
      $request ="INSERT INTO room (Room_type,Room_name,Room_ID,Home_ID) VALUES (:hid1,:hid2,:hid3,:hid4)";
      $stmt = $pdo->prepare($request);
      // replace ":xxxx" with the corresponding data (member_id)
      $stmt->bindParam(":hid1", $Rtype,PDO::PARAM_STR);
      $stmt->bindParam(":hid2", $Rname,PDO::PARAM_STR);
      $stmt->bindParam(":hid3", $roomID,PDO::PARAM_STR);
      $stmt->bindParam(":hid4", $homeID,PDO::PARAM_STR);
      
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
$test=createRoom("Kitchen","Exemple","3","25");
echo($test);



 ?>
