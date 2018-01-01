<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_all_favourites.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_sensors_in_room.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_primary_home.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_home_name.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/in_which_room_sensor.php';

global $where, $home_id;

$home_id = "";
$where = "";

global $part1, $part2, $types, $category, $images, $units, $display_card, $alert_card;

$types = array("Temperature","Humidity","Smoke","Door","Window","Camera");
$category = array("display","display","alert","alert","alert","live");
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

$display_card = '<article class="card">
					    <div class="thumbnail">
					        <button class="%favourite%" ></button>
					        <button class="card_button" ></button>
					        <div class="img_container">
					        	<img class="card_img" src="/Genhome/Images/dashboard/%image%">
					        </div>
					        <span class="data">%value%<span class="units">%units%</span></span>
					    </div>
					    <div class="card-content">
					        <h2>%name%</h2>
					        <p>%where%</p>
					    </div>
				</article>';

$alert_card = '<article class="card">
				        <div class="thumbnail">
				            <button class="%favourite%" ></button>
				            <button class="card_button" ></button>
				            <div class="img_container_no_data">
				                <img class="card_img_no_data" src="/Genhome/Images/dashboard/%image%">
				            </div>
				        </div>
				        <div class="card-content">
				            <h2>%name%</h2>
				            <p>%where%</p>
				        </div>
				</article>';

check_session_home_id();

if(isset($_SESSION['where']))
{
	global $where;
	$where = $_SESSION['where'];
	if($where == "favourites")
	{
		global $home_id;
		// MODEL GET_FAVOURITES OF home_id
		$all_favourites = get_all_favourites($home_id);
		// GENERATE THE VIEW
		create_view("favourites",$all_favourites,$home_id); //##################### HERE ########################
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

//########################################################################################
//################################## CHECK FUNCTION ######################################
//########################################################################################

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

//########################################################################################
//########################## FUNCTIONS TO GENERATE THE VIEW ###############################
//########################################################################################


function create_view($what,$data,$where)
{
	global $part1, $part2;
	echo($part1);
	//################################

	if($what == "sensors")
	{
		for ($i=0; $i<sizeof($data); $i++) 
		{ 
			$output = new_card("sensor",$data[$i],$where);
			$output = str_replace("%favourite%", "card_not_favourite", $output);
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
			$room_name = in_which_room_sensor($sensors_ids[$j]);
			// $where = $home_name." - ".$room_name;
			$output = new_card("sensor",$sensors[$j],$room_name);
			$output = str_replace("%favourite%", "card_favourite", $output);
			echo($output);
		}
	}

	//#########################
	echo($part2);
}



function new_card($what,$name,$where)
{
	global $types, $category, $images, $units, $display_card, $alert_card;

	if($what == "sensor")
	{
		$index = array_search($name,$types);
		$cat = $category[$index];
		if($cat == "display")
		{
			$to_replace = array("%image%","%value%","%units%","%name%","%where%");
			$output = $display_card;
			$value = 20.5;
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
		else if($cat == "live")
		{

		}
	}
	else if($what == "room")
	{

	}

}





?>
