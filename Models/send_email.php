<?php


require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/phpmailer/PHPMailerAutoload.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/phpmailer/class.phpmailer.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/phpmailer/class.smtp.php';


function send_email($name,$LastName,$email,$password)
{
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
	$mail ->Body = 'Hi '.$name.' '.$LastName.' !<br/>This is your login for your fist connection:<br/><br/>E-Mail: '.$email.'<br/>Password: '.$password.'<br/><br/>Do not worry! You can change your password during the first connection!';
	
	$mail ->AddAddress($email);
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
