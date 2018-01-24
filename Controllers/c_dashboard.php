<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_ownership.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/check_admin.php';


$isOwner = check_ownership($_SESSION["login"]);
$isAdmin = check_admin($_SESSION["login"]);

if($isAdmin == 1)
{
	// redirect to the back-office
	include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Views/back_office.php';
}
else if($isOwner == 1 && $isAdmin == 0)
{
	//$_SESSION['isOwner'] = $isOwner;
	// require owner view
	include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Views/dashboard.php';
}
else if($isOwner == 0 && $isAdmin == 0)
{
	//$_SESSION['isOwner'] = $isOwner;
	// require standard view
	include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Views/dashboard.php';
}
else
{
	// error page ?
}

?>