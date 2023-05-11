<?php
require_once('PHPMailer/PHPMailer.php');

session_start();

// Get the OTP entered by the user
$otp = $_POST['otp'];

// Get the OTP stored in the session variable
$stored_otp = $_SESSION['otp'];

if ($otp == $stored_otp) {
    // OTP is correct
    echo "Email verification successful!";
} else {
    // OTP is incorrect
    echo "Incorrect OTP. Please try again.";
}
?>
