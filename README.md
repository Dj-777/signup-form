# signup-form
Please first Install Composer to Use PHPMailer service.
To install composer:- https://getcomposer.org/download/

If you get fatal error("smtp error: could not authenticate”) in PHPMailer

please  change 

on forgetdetails.php and registration.php

$mail->Username = 'Enter Your Email';                 
$mail->Password = 'Enter Your Password'; 
