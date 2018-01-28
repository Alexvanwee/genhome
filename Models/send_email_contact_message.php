<?php


require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/phpmailer/PHPMailerAutoload.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/phpmailer/class.phpmailer.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/phpmailer/class.smtp.php';


function send_email_contact_message($name,$email,$message,$member_id)
{
	if($member_id == ""){ $member_id = "Not member"; }
	$mail = new PHPMailer();
	$mail ->isSMTP();
	$mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

	$mail->Timeout = 10;
	$mail ->SMTPAuth = true;
	$mail ->SMTPSecure = 'ssl';
	$mail ->Host = 'smtp.gmaiL.com';
	$mail ->Port = 465;
	$mail ->IsHTML(true);
	$mail ->Username = 'web.genhome@gmail.com';
	$mail ->Password = 'Teamgenhome';
	$mail ->SetFrom('web.genhome@gmail.com');
	$mail ->Subject = 'Genhome account';
	$mail ->Body = 'Message from :'.$name.'<br/>Email: '.$email.'<br/>'.'Member ID : '.$member_id.'<br/><br/>'.$message;
	
	$mail ->AddAddress('web.genhome@gmail.com');
	//######## debug #########
	// $mail ->SMTPDebug = 4;
	//#######################
	$mail_sent = $mail ->Send();
	if($mail_sent){
	 return true;
	}
	else{
	  return false;
	}
}

// $email = send_email("Alex","VW","mecchia.pierre@gmail.com",668);
// echo("Email sent : ".$email);

?>
