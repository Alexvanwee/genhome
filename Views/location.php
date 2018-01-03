<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_home_name.php';

$home_id = $_SESSION['home_id'];
$home_name = get_home_name($home_id);
$where = $_SESSION['where'];
$where = ucfirst($where);

echo($home_name." - ".$where);


?>