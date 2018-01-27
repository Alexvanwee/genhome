<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

function insertUser($name,$LastName,$mail,$password,$status,$m_id)
{
  try
  {
      $pdo = connect_database();
      if(!$pdo){ return false; }
      $request ="INSERT INTO members (First_Name,Last_Name,Mail,Login,Password,isOwner,Referrer_ID) VALUES (:hid1,:hid2,:hid3,:hid4,:hid5,:hid6,:hid7)";
      $stmt = $pdo->prepare($request);
      // replace ":xxxx" with the corresponding data (member_id)
      $stmt->bindParam(":hid1", $name,PDO::PARAM_STR);
      $stmt->bindParam(":hid2", $LastName,PDO::PARAM_STR);
      $stmt->bindParam(":hid3", $mail,PDO::PARAM_STR);
      $stmt->bindParam(":hid4", $mail,PDO::PARAM_STR);
      $stmt->bindParam(":hid5", $password,PDO::PARAM_STR);
      $stmt->bindParam(":hid6", $status,PDO::PARAM_INT);
      $stmt->bindParam(":hid7", $m_id,PDO::PARAM_INT);
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
// $test=insertUser("pierre","mecchia","mecchia.pierre@gmail.com","aaa",0,15);
// echo($test);



 ?>
