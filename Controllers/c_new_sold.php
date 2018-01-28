<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/new_sold.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_sold.php';


global $serial;
$serial = $_POST["serialID"];


if(!isset(valid_serial($serial)))
{
    echo("0");
    exit();
}

new_sold($serial);



function valid_serial($serial)
{
	// if the serial starts with "H" and finishes with "X" and
	// contains only digits between these two letters
	if( substr($serial,0,1)=="H" && substr($serial, -1)=="X" && ctype_digit(substr($serial,1,6)) )
	{
		$not_exist = check_serial($serial);
		return $not_exist;
	}
	// if the serial does not have a good typography
	else
	{
		// return false
		return false;
	}
}
?>
