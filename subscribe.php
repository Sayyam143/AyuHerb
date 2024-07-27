<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer/Exception.php');
require('PHPMailer/PHPMailer.php');
require('PHPMailer/SMTP.php');
session_start();
$email=$_SESSION['email'];



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'bhimaniv20@gmail.com';                     //SMTP username
    $mail->Password   = 'vivek1445';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('bhimaniv20@gmail.com');
    $mail->addAddress($email);     //Add a recipient
    

    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $bodyContent = "<h1>Cake shop</h1>";
    $bodyContent .= "<h3>Thank you $email for subscribe our website</h3>";
    $bodyContent .= "<br>";
    $bodyContent .= "<p><b>Thanks,<b></p>";
    $bodyContent .= "<p>Cake shop</p>";xk,
   

    $mail->Subject = 'Email From Cake Shop';
    $mail->Body    = $bodyContent;


    if($mail->send())
    {
        header("location:index.php");
    }

    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}