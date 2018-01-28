<?php


require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';


// function to get the names of the user's homes (return array[values])
function get_members_information()
{

	try
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL statement
		$request="SELECT First_Name,Last_Name,Mail,isOwner,Member_ID FROM members ";
		$stmt = $pdo->prepare($request);
		//execute
		$stmt->execute();
		//fetch
		$result = $stmt->fetchAll();
		// close connection
		$pdo=null;
		$infos = array();
		for ($i=0; $i<sizeof($result); $i++)
		{

			$info = array();
			array_push($info, $result[$i][0]);
			array_push($info, $result[$i][1]);
			array_push($info, $result[$i][2]);
      array_push($info, $result[$i][3]);
			array_push($info, $result[$i][4]);

			array_push($infos, $info);
		}
		//return result
		return $infos;
	}
	// catch connection exception into a variable "$e"
	catch(PDOException $e)
	{
		// if an error occurs, display the error message
		echo "An error occured " . $e->getMessage();

		return false;
	}
	if(isset($e))
	{
		return false;
	}
}




?>
