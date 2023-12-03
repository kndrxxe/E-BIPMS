<?php
session_start();

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
$query = "SELECT * FROM documents WHERE id='$id'";
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
    $mail->Subject = 'Your barangay clearance request has been approved!';

    $name = $row['firstname'];
    $mail->Body = '
<html>
  <head> </head>
  <body>
    <header style="background-color: #ffc107; padding: 10px">
      <a style="font-size: 20px; color: black; font-family: Arial, Helvetica, sans-serif; display: flex; flex-direction: column; align-items: center;">
        <img src="https://previews.dropbox.com/p/thumb/ACGuII26Bp-Xxdz0LP4khNeu7xffZLmmNhpj2iYZyLokBK9ir2oNaDrWNo06kBldZMEIDfbfXoKCG0hiAvwIC4-7AzaWHHB0ygHzQFAIj6mUbZcvejHmAn53EF3jvLc8-skuCf-IQaW5C_2wcXmj7mIaob4JBRFSVM04wL-uETHRZ9F4UOxerrsKY4KlYpWIjeR6GngoUxax-gT4JW94NbIlMHw1TevSDdFAQJY3l2Q-af93IG32L2A_EoXoLxlYn1zm1DHLHP5vum_y5UJA2jzvYDySszmSay3jNODiWfEG-FBkKGVK350FtHWjXboleDydSvZMp11CbvZi9JXJjO0C/p.png" width="50"/>
        <b>E-BIPMS KANLURANG BUKAL</b>
      </a>
    </header>
    <h1 style="margin: 10px 0; font-size: 18px">
      <p style="font-family: Arial, Helvetica, sans-serif">Dear '.$name.',</p>
    </h1>
    <p style="font-family: Arial, Helvetica, sans-serif">
      We are pleased to inform you that your Barangay Clearance is now ready for
      pick up. Please visit the Barangay Hall at your earliest convenience to
      collect it.
    </p>
    <p style="font-family: Arial, Helvetica, sans-serif">
      Bring your valid ID for verification purposes.
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
    $mail->AltBody = "Dear Resident,\n\nWe are pleased to inform you that your Barangay Clearance is now ready for pick up. Please visit the Barangay Hall at your earliest convenience to collect it.\n\nDon't forget to bring a valid ID for verification purposes.\n\nThank you for your patience and understanding.\n\nBest regards,\nBrgy. Kanlurang Bukal";

    //send the message, check for errors
    if (!$mail->send()) {
        $_SESSION['emailerror'] = "Email not sent. Please try again.";
        header('Location: admindocument.php');
    } else {
        $_SESSION['emailsent'] = "Email sent successfully!";
        header('Location: admindocument.php');
    }
}
ob_end_flush();
?>