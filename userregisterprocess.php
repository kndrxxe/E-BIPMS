<?php
session_start();
ob_start(); // Turn on output buffering
error_reporting(0);
include 'conn.php';
use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["register"])) {
  $uid = md5(uniqid(rand()));
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $lastname = $_POST['lastname'];
  $sex = $_POST['sex'];
  $birthday = $_POST['birthday'];
  $age = $_POST['age'];
  $house_no = $_POST['house_no'];
  $purok = $_POST['purok'];
  $civilstatus = $_POST['civilstatus'];
  $voter = $_POST['voter'];
  $specialgroup = isset($_POST['specialgroup']) ? $_POST['specialgroup'] : '';
  $members = $_POST['members'];
  $housingstatus = $_POST['housingstatus'];
  $employmentstatus = $_POST['employmentstatus'];
  $phonenumber = $_POST['phonenumber'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $status = $_POST['status'];

  $check_query = mysqli_query($conn, "SELECT * FROM users where email ='$email'");
  $rowCount = mysqli_num_rows($check_query);

  if (!empty($email) && !empty($password)) {
    if ($rowCount > 0) {
      $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
      $row = mysqli_fetch_assoc($query);
      if ($email == $row['email']) {
        $_SESSION['registerstatus'] = "Email already exists.";
      }
    } else {
      $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
      $row = mysqli_fetch_assoc($query);
      if ($username == $row['username']) {
        $_SESSION['registerstatus'] = "Username already exists.";
      }
    }
    $result = mysqli_query($conn, "INSERT INTO users(userID, firstname, middlename, lastname, sex, birthday, age, house_no, purok, civilstatus, voter, specialgroup, members, housingstatus, employmentstatus, phonenumber, email, username, password, status)VALUES('$uid', '$firstname', '$middlename', '$lastname', '$sex', '$birthday', '$age', '$house_no', '$purok', '$civilstatus', '$voter', '$specialgroup', '$members', '$housingstatus', '$employmentstatus', '$phonenumber', '$email', '$username', '$password', '$status')");

    if ($result) {
      $otp = rand(100000, 999999);
      $_SESSION['otp'] = $otp;
      $_SESSION['email'] = $email;

      require 'vendor/autoload.php';
      require 'vendor/phpmailer/phpmailer/src/Exception.php';
      require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
      require 'vendor/phpmailer/phpmailer/src/SMTP.php';
      $mail = new PHPMailer;
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 587;
      $mail->SMTPDebug = 2;
      $mail->SMTPSecure = 'tls';
      $mail->SMTPAuth = true;
      $mail->Username = 'ebipmskanlurangbukal@gmail.com';
      $mail->Password = 'siuc vmrq comb wdtf';
      $mail->setFrom('ebipmskanlurangbukal@gmail.com', 'EBIPMS Kanlurang Bukal');
      $mail->addAddress($email, $firstname . ' ' . $lastname);
      $mail->Subject = 'Email Verification';
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
      <p style="font-family: Arial, Helvetica, sans-serif">Dear ' . $firstname . ',</p>
    </h1>
    <p style="font-family: Arial, Helvetica, sans-serif">
      Your OTP is ' . $otp . '.
    </p>
    <h1 style="font-family: Arial, Helvetica, sans-serif; margin: 10px 0; font-size: 18px">Best regards,</h1>
    <h1 style="font-family: Arial, Helvetica, sans-serif; margin: 10px 0; font-size: 18px">
      Brgy. Kanlurang Bukal
    </h1>
  </body>
</html>';
      $mail->isHTML(true);
      if (!$mail->send()) {
        $_SESSION['registererror'] = "Email not sent. ";
        header('Location: userregister.php');
        exit();
      } else {
        $_SESSION['registerstatus'] = "Please check your email for verification. <strong>" . $email . "</strong>";
        header('Location: verification.php');
        exit();
      }
    }
  }
}
ob_end_flush();
?>