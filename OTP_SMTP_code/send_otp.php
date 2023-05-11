<?php


session_start();

// Get the email entered by the user
$email = $_POST['email'];

// require 'vendor/autoload.php';
// require_once __DIR__ . '/vendor/autoload.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 



// Generate a random 6-digit OTP
$otp = rand(100000, 999999);

// Store the OTP in the session variable
$_SESSION['otp'] = $otp;

// Compose the email message
$message = "Your OTP to Register : $otp";

// Include the PHPMailer library
require_once ("PHPMailer/PHPMailer.php");
require_once ("PHPMailer/SMTP.php");
require_once ("PHPMailer/Exception.php");

// Create a new PHPMailer instance


$mail = new PHPMailer(true);


// Set SMTP settings

try {
    $mail->SMTPDebug = 0;                                      
    $mail->isSMTP();
    $mail->Debugoutput = 'html';                                           
    $mail->Host       = 'smtp.gmail.com';                   
    $mail->SMTPAuth   = true;                            
    $mail->Username   = 'rajk*******@gmail.com';  //Enter your mail Here              
    $mail->Password   = 'cmdukeavzmkoe***';    //Enter your two Factor Passcode to forward this mail....
    $mail->SMTPAutoTLS = false;                   
    $mail->SMTPSecure = 'tls';                             
    $mail->Port       = 587; 
 
    $mail->setFrom('rajk8458390@gmail.com', 'Rajkumar');          
    $mail->addAddress($email);
    // $mail->addAddress('$email', 'Eniyan');
      
    $mail->isHTML(true);                                 
    $mail->Subject = 'TestBench - OTP Verification';
    $mail->Body    = $message;
    $mail->AltBody = 'OTP vanthurucha da';
    $mail->send();
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


//if email not send check this first in your device


// To troubleshoot the issue, you can try the following steps:

// Check if there is any firewall or antivirus software installed on your computer that could be blocking the connection. Temporarily disable the firewall or antivirus software and try to connect to the SMTP server again.

// Try to connect to the SMTP server from a different network or computer to see if the issue is specific to your current network or computer.

// Contact your network administrator or internet service provider to see if there are any network issues or restrictions that could be causing the problem.

// Check if the SMTP server settings are correct, including the host name, port number, and encryption settings. Make sure that you can connect to the SMTP server using the same settings from a different email client or webmail service.

// If the issue persists, contact the SMTP server administrator or email service provider for further assistance.