<?php
session_start();

if (empty($_POST['firstname']) || empty($_POST['lastname'])) {
  $_SESSION['requesterror'] = "Request error, Please try again.";
  header('Location: userdocument.php');
} else {
  $userID = $_POST['userID'];
  $status = $_POST['status'];
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $birthday = $_POST['birthday'];
  $civilstatus = $_POST['civilstatus'];
  $sex = $_POST['sex'];
  $purok = $_POST['purok'];
  $purpose = $_POST['purpose'];
  $issue_date = $_POST['issue_date'];
  $isPaid = $_POST['isPaid'];

  include 'conn.php';
  $query = "SELECT * FROM documents WHERE status = 0";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    // A request is already pending
    $_SESSION['requesterror'] = "You already have a pending request. Please wait until it is processed before making another request.";
    header('Location: userdocument.php');
  } else {
    // No pending request, proceed with the current request
    $query = "SELECT * FROM documents WHERE userID = '$userID' AND firstname = '$firstname' AND lastname = '$lastname' AND email = '$email' AND purpose = '$purpose' AND issue_date = '$issue_date'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      // Record already exists
      $_SESSION['requesterror'] = "Duplicate record. Please try again.";
      header('Location: userdocument.php');
    } else {
      // Record does not exist, insert the data
      mysqli_query($conn, "INSERT INTO documents(userID, status, firstname, middlename, lastname, email, birthday, civilstatus, sex, purok, purpose, issue_date, isPaid, date_requested)VALUES('$userID','$status', '$firstname', '$middlename', '$lastname', '$email', '$birthday', '$civilstatus', '$sex', '$purok', '$purpose', '$issue_date', '$isPaid', CURDATE())") or die('Query Error');

      $_SESSION['requestsuccess'] = "Request successfully sent";
      header('Location: userdocument.php');
    }
  }
}
?>