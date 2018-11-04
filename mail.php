<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
	$db=mysqli_connect("localhost","root","","ehr_healthcare");
		print_r($_POST);

	if($_POST['who']=='patient'){
	$q="SELECT * FROM patients WHERE uidai = '$_POST[user]'";
	$r=mysqli_query($db,$q);
	$list1=mysqli_fetch_assoc($r);
	$u=$list1['email_id'];
	print_r($u);
	}else if($_POST['who']=='doctor'){
		
	$q="SELECT * FROM doctor WHERE uidai = '$_POST[user]'";
	$r=mysqli_query($db,$q);
	$list1=mysqli_fetch_assoc($r);
	$u=$list1['email'];
	}else{
	$q="SELECT * FROM hospital WHERE uidai = '$_POST[user]'";
	$r=mysqli_query($db,$q);
	$list1=mysqli_fetch_assoc($r);
	$u=$list1['email'];
	print_r($u);
	}
		
	
	$activation=time();
	$time = time();
	$base_url="http://localhost:8080/ehr/";
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '';                 // SMTP username
    $mail->Password = '';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('', 'Mailer');
    $mail->addAddress($u);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
   // $mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'Hi, <br/> <br/> We need to make sure you are human. Please verify your email and get started using your Website account. <br/> <br/> <a href="'.$base_url.'resetpass.php?user='.$_POST["user"].'&who='.$_POST["who"].'&time='.$activation.'">'.$base_url.'resetpass'.'</a>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
header("home.php");
}