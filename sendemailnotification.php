<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPDebug = 2;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'ebipmskanlurangbukal@gmail.com';
$mail->Password = 'siuc vmrq comb wdtf';
//Set who the message is to be sent from
$mail->setFrom('ebipmskanlurangbukal@gmail.com', 'EBIPMS Kanlurang Bukal');
//Set an alternative reply-to address
$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('brosaskndrx05@gmail.com', 'John Doe');
//Set the subject line
$mail->Subject = 'PHPMailer sendmail test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->Body = '
<html>
<head>
</head>
<body style="background-color: #f0f0f0;">
    <header style="background-color: #ffc107; padding: 10px;">
        <a style="font-size: 20px; color: #333;">
            <img src="https://drive.google.com/file/d/1eJdi4aydd7j2VQjwN19Ztd6P7h7U8_-7/view" width="40" />
            <b>E-BIPMS KANLURANG BUKAL</b>
        </a>
    </header>
</body>
</html>
';
$mail->isHTML(true);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ';
} else {
    echo 'Message sent!';
}
?>