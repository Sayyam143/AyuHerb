<?php
//require 'PHPMailer/PHPMailerAutoload.php';

session_start();

$email = $_SESSION['email'];
dd($email);
$otp = rand(100000,999999);
$_SESSION['otp'] = $otp;


$mail = new PHPMailer;
$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'chandan.bhalala@gmail.com';          // SMTP username
$mail->Password = 'Chandan@2699'; 						   // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to
$mail->setFrom($email, 'admin');
$mail->addReplyTo($email, 'admin');
$mail->addAddress($email);   
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent .= "<p>OTP is <b>$otp</b></p>";
$bodyContent .= "<br>";
$bodyContent .= "<p><b>Thanks,<b></p>";

$mail->Subject = 'Email From test';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header("location:otp.php");
    // echo "sent";
 
}
?>