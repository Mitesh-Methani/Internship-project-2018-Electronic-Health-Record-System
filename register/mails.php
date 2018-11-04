<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
	function sendOTP($email,$pin)
	{
		$message_body = "One Time Password for Electronic Health Record System is:<br/><br/>" . $pin;
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

	
	$activation=$email.time();
	$time = time();
	$base_url="http://localhost/health/HeathCare/";
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'electronichealthrecordshelp@gmail.com';                 // SMTP username
    $mail->Password = 'healthrecords';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients

      // Add a 
   $mail->SetFrom("electronichealthrecordshelp@gmail.com");
		$mail->AddAddress($email);
		$mail->Subject = "OTP to Login";
		$mail->MsgHTML($message_body);
		$mail->IsHTML(true);		
		if($mail->Send())
		{
			$result=true;
		}
		else
		{
			$result=false;
		}
		return $result;
	
	}
?>