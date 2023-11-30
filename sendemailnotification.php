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
        <img src="https://lh3.googleusercontent.com/pw/ADCreHfTWI6ilCZ7fRVgpcsKBAYVWUH4XZ4LY2qAyTH-pLF_48VVAvIb-8zfB6SrU1G7GREabpCKF88T7aRbL2npFbblyNIHMZya4qMrkcM8Q6eiPdKl6hfX8AiPn30z7lfOm_Hma0VKW9jujK5cdyE0-W6yFfVeiJqwItW1DUdkpdn5Jg-D8WUsz1Ce9Kz7SeZ6FEBqSZoM4IKnkT02MxMBy9QgVy6KnKkg8sI9dWU9URYJWdtD5y7oSwvpuBafTsqDlGTjHgU04oXx86bz0UpljEYg0eINb5j4O1WcF0viVIZIsGHqX2iV__USepHR4lurOsnUoWj8zOPGqhX3JhPT8XGPZsmoTmeMUZzqza9IIsHGWT1jhqg_kVhNF3zDOyOHGVMnJB5ypBinnpKnl3JWeD6K8E9_qj_6pVJvUJXXj9ijtx5vdgr1HHXz1J_2XzeFAIiGOKPcYg6_XDazp22yfa2VAj0SwV8v_ewiZtjc2F4DRr8n1kMF_Lz11HlhluJBeZGe_IBCvR99x91oZgOJBfnBnQHvCGHDWNioztIVdw_P4jaPi9t_RCVjHALlnuimaS3_TnRfd7KWG3mNVyPr7RcauZxMQI6YSzhanhp-C--byUnp3cfSYvO29pmnvRdzaDA_9CMRH899cnyctf_Dl2VGsV1AfIVngJll1sABlqXKtTpmAjhdf9cIBQdhLyR2XDOiqn9jfkt-DBmDt1nsDSd0595KrHthe2fkU6s9YAapK9DQu3X4tWPKMh6P1tSxLSxTAFD9Gwj1TgcUiAPWex3I7ZJgBNrQFvLeyL48OPWmukq0OhcU6NDgIcUwoPoiSCtAEKuo66Ly5cDHHegm27msxDwYDKfztchWkcb6NSXbY18g52PHM3AEp4Wu-a4FBKj_=w924-h924-s-no-gm?authuser=0" width="50"/>
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