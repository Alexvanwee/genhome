<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_members_information.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/modify_statu.php';



global $members;
$members = get_members_information();
if(!$members)
{
	exit();
}

if (isset($_GET["id"]) && $members[$_GET["id"]][3]==1){
  modify_statu(0,$members[$_GET["id"]][4]);
}
elseif (isset($_GET["id"]) && $members[$_GET["id"]][3]==0) {
  modify_statu(1,$members[$_GET["id"]][4]);
}

echo "<script>window.location.href = '../Views/dashboard_test.php';</script>";
