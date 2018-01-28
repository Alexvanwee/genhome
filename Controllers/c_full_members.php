<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Models/get_members_information.php';



global $members;
$members = get_members_information(/*$_SESSION["login"],$_SESSION["member_id"]*/);
if(!$members)
{
	exit();
}

$_SESSION["members"] = $members;
for ($i=0;$i<sizeof($members); $i++)
{

    if ($members[$i][3]=="1"){
      $members[$i][3]="Owner";
    }
    else {
      $members[$i][3]="User";
    }

	$str = '<tr hid='.$i.'>
    <td id="table_member_firstname">'.$members[$i][0].'</td>
    <td id="table_member_lastname">'.$members[$i][1].'</td>
		<input id="mid" type="hidden" value=' . $members[$i][4] . ' >
    <td id="table_mail">'.$members[$i][2].'</td>
		<form method="post" action="../Controllers/c_modify_statu.php?id='. $i . '">
    	<td id="change"><button class="change_statu" title="" type="submit" name="change">'.$members[$i][3].'</td>
		</form>
    <td id="delete"><button class="delete_button" title="Delete" type="button"/></td>
	</tr>';
	echo($str);
}



?>
