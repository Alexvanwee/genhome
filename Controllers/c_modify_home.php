<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_home_address.php';

global $value;
$value = "";
// $email = $_SESSION['login'];
$email = "alexandrevanwesel@gmail.com";
// $home_id = $_SESSION['home_id'];
$home_id = 25;
$address = get_home_address($email,$home_id);
$value = " readonly ".'value="'.$address.'"';

?>
