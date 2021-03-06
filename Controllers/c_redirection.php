<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_all_favourites.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_sensors_in_room.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_primary_home.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_home_name.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/in_which_room_sensor.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_all_sensors.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_ownership.php';

global $where, $home_id, $isOwner;

$home_id = "";
$where = "";
$isOwner = check_ownership($_SESSION["login"]);

//#############################################
// FOR GENERATION OF SENSORS IN DASHBOARD
//############################################

global $part1, $part2, $types, $category, $images, $units, $display_card, $alert_card, $action_card;

$types = array("Temperature","Humidity","Smoke","Door","Window","Camera","Light");
$category = array("display","display","alert","alert","alert","live","action");
$images = array("temperature.png","humidity.png","smoke_detector.png","door_closed.png","window_closed.png","camera.png");
$units = array("°C","%");

$part1 = '<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/Genhome/Styles/cards.css" rel="stylesheet" type="text/css" />
</head>

<body class="cards_body">
    <div class="outer-wrap">
      
      <div class="content">
        
        <main class="main-area">
          <section class="cards">';

$part2 = '</section>
        </main>
      </div>
    </div>
</body>

</html>';

$display_card = '<article class="card" what="sensor">
					<input type="hidden" id="sid" sid=%sensor_id%/>
					    <div class="thumbnail">
					        <button class="%favourite%" id="favourite"></button>
					        <button class="card_button" ></button>
					        <div class="img_container">
					        	<img class="card_img" src="/Genhome/Images/dashboard/%image%">
					        </div>
					        <span class="data"><span id="value">%value%</span><span class="units">%units%</span></span>
					    </div>
					    <div class="card-content">
					        <h2 id="sensor_name">%name%</h2>
					        <p id="room_name">%where%</p>
					    </div>
				</article>';

$alert_card = '<article class="card" what="sensor">
					<input type="hidden" id="sid" sid=%sensor_id%/>
				        <div class="thumbnail">
				            <button class="%favourite%" id="favourite"></button>
				            <button class="card_button" ></button>
				            <div class="img_container_no_data">
				                <img class="card_img_no_data" src="/Genhome/Images/dashboard/%image%">
				            </div>
				        </div>
				        <div class="card-content">
				            <h2 id="sensor_name">%name%</h2>
				            <p id="room_name">%where%</p>
				        </div>
				</article>';

$action_card = '<article class="card" what="sensor">
					<input type="hidden" id="sid" sid=%sensor_id%/>
				        <div class="thumbnail">
				            <button class="%favourite%" id="favourite"></button>
				            <button class="card_button" id="action"></button>
				            <div class="img_container_no_data">
				                <img class="card_img_no_data" src="/Genhome/Images/dashboard/%image%">
				            </div>
				        </div>
				        <div class="card-content">
				            <h2 id="sensor_name">%name%</h2>
				            <p id="room_name">%where%</p>
				        </div>
				</article>';

//############## VERIFY HOME ID ########################
check_session_home_id();

//##################################################
//######## CHECK WHAT VIEW THE USER WANTS ##########
//##################################################

if(isset($_SESSION['where']))
{
	global $where, $isOwner;
	$where = $_SESSION['where'];
	if($where == "first_connection")
	{
		header('Location: index.php');
	}

	if($where == "favourites")
	{
		global $home_id;
		// MODEL GET_FAVOURITES OF home_id
		$all_favourites = get_all_favourites($home_id);
		// GENERATE THE VIEW
		create_view("favourites",$all_favourites,$home_id); //##################### HERE ########################
	}
	else if($where == "new_home")
	{
		if(!$isOwner)
		{
			$_SESSION["where"] = "favourites";
			header('Location: index.php');
		}
		include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Views/new_home.php';
	}
	else if($where == "new_room")
	{
		if(!$isOwner)
		{
			$_SESSION["where"] = "favourites";
			header('Location: index.php');
		}
		include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Views/new_room.php';
	}
	else if($where == "new_sensor")
	{
		if(!$isOwner)
		{
			$_SESSION["where"] = "favourites";
			header('Location: index.php');
		}
		include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Views/new_sensor.php';
	}
	// If goes to a room
	else
	{
		global $where, $home_id;
		$sensors = get_sensors_in_room($where,$home_id);
		// $home_name = get_home_name($home_id);
		// $where = $home_name." - ".$where;
		create_view("sensors",$sensors,$where); //##################### HERE ########################
	}
}
else
{
	global $home_id;
	$_SESSION['where'] = "favourites";
	header('Location: index.php');
}

//############################################################################
//######################### CHECK HOME ID FUNCTION ###########################
//###########################################################################

function check_session_home_id()
{
	if(isset($_SESSION['home_id']))
	{
		if($_SESSION['home_id'] !="" && $_SESSION['home_id'] != null)
		{
			global $home_id;
			$home_id = $_SESSION['home_id'];
		}
	}
	else
	{
		global $home_id;
		$home_id = get_primary_home($_SESSION['login']);
		$_SESSION['home_id'] = $home_id;
	}
}

//#############################################################################
//################ FUNCTIONS TO GENERATE THE VIEW OF SENSORS ##################
//############################################################################


function create_view($what,$data,$where)
{
	global $part1, $part2;
	echo($part1);
	//################################

	if($what == "sensors")
	{
		global $home_id;

		$sensors = $data[0];
		$sensors_ids = $data[1];
		$all_favourites = get_all_favourites($home_id);
		$sensors_ids_favourites = $all_favourites[2];
		for ($i=0; $i<sizeof($sensors); $i++) 
		{ 
			$replace = "card_not_favourite";
			$output = new_card("sensor",$sensors[$i],$where);
			if(in_array($sensors_ids[$i], $sensors_ids_favourites))
			{
				$replace = "card_favourite";
			}
			$output = str_replace("%favourite%", $replace, $output);
			$output = str_replace("%sensor_id%", $sensors_ids[$i], $output);
			echo($output);
		}
	}
	else if($what == "favourites")
	{
		$rooms = $data[0];
		$sensors = $data[1];
		$sensors_ids = $data[2];
		$home_name = get_home_name($where);
 
		for ($i=0; $i<sizeof($rooms); $i++) 
		{
			$output = new_card("room",$rooms[$i],"");
			$output = str_replace("%favourite%", "card_favourite", $output);
			echo($output);
		}
		for ($j=0; $j<sizeof($sensors); $j++) 
		{ 
			$sensor_id = $sensors_ids[$j];
			$room_name = in_which_room_sensor($sensor_id);
			// $where = $home_name." - ".$room_name;
			$output = new_card("sensor",$sensors[$j],$room_name);
			$output = str_replace("%favourite%", "card_favourite", $output);
			$output = str_replace("%sensor_id%", $sensor_id, $output);
			echo($output);
		}
	}

	//#########################
	echo($part2);
}



function new_card($what,$name,$where)
{
	global $types, $category, $images, $units, $display_card, $alert_card, $action_card;

	if($what == "sensor")
	{
		$index = array_search($name,$types);

		$cat = $category[$index];
		if($cat == "display")
		{
			$to_replace = array("%image%","%value%","%units%","%name%","%where%");
			$output = $display_card;
			$value = random_sensor_value($name);
			$replace = array($images[$index],$value,$units[$index],$name,$where);
			$output = str_replace($to_replace, $replace, $output);
			return $output;
		}
		else if($cat == "alert")
		{
			$to_replace = array("%image%","%name%","%where%");
			$output = $alert_card;
			$replace = array($images[$index],$name,$where);
			$output = str_replace($to_replace, $replace, $output);
			return $output;
		}
		else if($cat == "action")
		{

		}
	}
	else if($what == "room")
	{

	}

}


function random_sensor_value($name)
{
	if($name == "Temperature")
	{
		$num = mt_rand(19,20);
		$dec = mt_rand(0,9);
		$value = $num.".".$dec;
		return $value;
	}
	else if($name == "Humidity")
	{
		$num = mt_rand(70,90);
		$dec = mt_rand(0,5);
		$dec = ($dec == 1 ? 5 : 0);
		$value = $num.".".$dec;
		return $value;
	}
}


?>
