<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_sold.php';

// function to create a new home
function new_sold($serial)
{
    try
	{
		$pdo = connect_database();
		if(!$pdo){ return false; }
		// prepare the SQL request
		$request = "INSERT INTO sold (Serial_ID) VALUES (:val)";
		$stmt = $pdo->prepare($request);
		// replace ":xxxx" with the corresponding data (address and member_id)
		$stmt->bindParam(":val", $serial,PDO::PARAM_STR);
		// execute the SQL command
		$stmt->execute();
		// close the connection to the database
	    $pdo=null;

	    echo("OK");
	}
	// catch connection exception into a variable "$e"
	catch(PDOException $e)
	{
		// if an error occurs, display the error message
		echo("An error occured " . $e->getMessage());
	}
	if(isset($e))
	{
		return false;
	}
}

/*
$values = array("H517833X", "H271713X", "H182680X", "H454635X", "H169522X", "H908134X", "H265087X", "H751289X", "H854942X", "H860708X", "H356569X", "H460501X", "H877927X", "H270611X", "H629702X", "H508662X", "H425450X", "H289570X", "H100048X", "H204149X", "H496481X", "H644232X", "H633701X", "H283337X", "H344118X", "H271022X", "H779548X", "H259530X", "H915086X", "H733084X", "H574759X", "H452657X", "H194690X", "H681809X", "H418681X", "H277059X", "H315486X", "H517027X", "H993356X", "H507384X", "H118524X", "H971975X", "H931891X", "H626195X", "H185857X", "H753338X", "H438965X", "H923518X", "H220809X", "H281059X", "H208131X", "H532679X", "H369977X", "H812502X", "H623508X", "H268403X", "H243491X", "H162801X", "H308592X", "H901699X", "H205472X", "H503895X", "H995168X", "H562583X", "H860287X", "H786836X", "H348790X", "H536252X", "H343958X", "H830489X", "H420049X", "H234617X", "H517740X", "H401861X", "H682624X", "H423322X", "H341209X", "H756479X", "H888151X", "H768921X", "H211137X", "H327659X", "H587413X", "H918851X", "H978112X", "H947070X", "H394647X", "H668002X", "H435640X", "H567288X", "H393016X", "H994909X", "H637214X", "H422272X", "H268267X", "H739374X", "H550657X", "H545474X", "H188908X", "H106903X");

for ($i = 0; $i < count($values); $i++) 
{
    new_sold($values[$i]);
}
*/

?>