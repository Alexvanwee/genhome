<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/modify_step.php';

$_SESSION["step"] = $_SESSION["step"] + 1;
modify_step($_SESSION["step"],$_SESSION["login"]);

header('Location: index.php');

?>
