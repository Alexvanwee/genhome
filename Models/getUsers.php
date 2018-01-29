<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/connect_database.php';

function getUsers($home_id)
{
	$pdo = connect_database();
	//$reponse = $pdo->query('SELECT First_Name FROM members WHERE Home_ID=$home_id, Member_ID!=$member_id');
	$reponse = "SELECT First_Name FROM members WHERE Referrer_ID = (SELECT Member_ID FROM home WHERE Home_ID = :hid)";
	$stmt = $pdo->prepare($reponse);
	$stmt->bindParam(":hid", $home_id,PDO::PARAM_INT);
	$stmt->execute();
	$pdo = null;
	return $stmt;
}

?>
