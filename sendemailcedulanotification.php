<?php
session_start();
error_reporting(0);

include 'conn.php';
if (isset($_SESSION['user'])) {
} else {
  header('location: login.php');
}

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

ob_start(); // Turn on output buffering
session_start();
error_reporting(0);

include 'conn.php';
$id = $_GET['id'];
$query = "SELECT * FROM cedula WHERE id='$id'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
if ($result) {
  $row = mysqli_fetch_assoc($result);

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
  $mail->addReplyTo($row['email'], $row['firstname'] . ' ' . $row['lastname']);
  //Set who the message is to be sent to
  $mail->addAddress($row['email'], $row['firstname'] . ' ' . $row['lastname']);
  //Set the subject line
  $mail->Subject = 'Your cedula request has been approved!';

  $name = $row['firstname'];
  $cid = $mail->addEmbeddedImage('kanlurangbukal.png', 'image_cid');
  $mail->Body = '
<html>
  <head> </head>
  <body>
    <header style="background-color: #ffc107; padding: 10px">
      <a style="font-size: 20px; color: black; font-family: Arial, Helvetica, sans-serif; display: flex; flex-direction: row; align-items: center; text-decoration: none; /* Remove underline */">
      <img src="cid:image_cid" width="50" style="margin-right: 10px;"/>
      <b>E-BIPMS KANLURANG BUKAL</b>
      </a>
    </header>
    <h1 style="margin: 10px 0; font-size: 18px">
      <p style="font-family: Arial, Helvetica, sans-serif">Dear ' . $name . ',</p>
    </h1>
    <p style="font-family: Arial, Helvetica, sans-serif">
      We are pleased to inform you that your Cedula is now ready for
      pick up. Please visit the Barangay Hall at your earliest convenience to
      collect it.
    </p>
    <p style="font-family: Arial, Helvetica, sans-serif">
    Please bring your valid ID for verification purposes. If you are acting as a representative, kindly bring your valid ID and the valid ID of the person making the request.
   
    </p>
    <p style="font-family: Arial, Helvetica, sans-serif">
      Thank you for your patience and understanding.
    </p>
    <h1 style="font-family: Arial, Helvetica, sans-serif; margin: 10px 0; font-size: 18px">Best regards,</h1>
    <h1 style="font-family: Arial, Helvetica, sans-serif; margin: 10px 0; font-size: 18px">
      Brgy. Kanlurang Bukal
    </h1>
  </body>
</html>';
  $mail->isHTML(true);
  $mail->AltBody = "Dear Resident,\n\nWe are pleased to inform you that your Cedula is now ready for pick up. Please visit the Barangay Hall at your earliest convenience to collect it.\n\nPlease bring your valid ID for verification purposes. If you are acting as a representative, kindly bring your valid ID and the valid ID of the person making the request.
  \n\nThank you for your patience and understanding.\n\nBest regards,\nBrgy. Kanlurang Bukal";

  //send the message, check for errors
  if (!$mail->send()) {
    $_SESSION['emailerror'] = "Email not sent. Please try again.";
    header('Location: admincedula.php');
  } else {
    $_SESSION['emailsent'] = "Email sent successfully!";
    header('Location: admincedula.php');
  }
}
ob_end_flush();
?>