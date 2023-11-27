<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPDebug = 2;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'ebipmskanlurangbukal@gmail.com';
$mail->Password = 'kanlurangbukal';
//Set who the message is to be sent from
$mail->setFrom('ebipmskanlurangbukal@gmail.com', 'First Last');
//Set an alternative reply-to address
$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('iamkendrixxe05@gmail.com', 'John Doe');
//Set the subject line
$mail->Subject = 'PHPMailer sendmail test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->Body = 'This is the body of the email';
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}
