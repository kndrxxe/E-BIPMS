<?php
session_start();

if (empty($_POST['firstname']) || empty($_POST['middlename']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['phonenumber']) || empty($_POST['purok']) || empty($_POST['issue_date'])) {
  $_SESSION['requesterror'] = "Request error, Please try again.";
  header('Location: userresidency.php');
} else {
  $userID = $_POST['userID'];
  $status = $_POST['status'];
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $phonenumber = $_POST['phonenumber'];
  $purok = $_POST['purok'];
  $issue_date = $_POST['issue_date'];

  include 'conn.php';
  $uid = $_SESSION['userID']; // Assuming the user_id is stored in session
  $query = "SELECT * FROM residency WHERE status = 0 AND userID = '$uid'";

  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    // A request is already pending
    $_SESSION['requesterror'] = "You already have a pending request. Please wait until it is processed before making another request.";
    header('Location: userresidency.php');
  } else {
    // No pending request, proceed with the current request
    $query = "SELECT * FROM residency WHERE userID = '$userID' AND status = 0";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      // Record already exists
      $_SESSION['requesterror'] = "You already have a pending request. Please wait until it is processed before making another request.";
      header('Location: userresidency.php');
    } else {
      // Record does not exist, insert the data
      mysqli_query($conn, "INSERT INTO residency (userID, status, firstname, middlename, lastname, email, phonenumber, purok, issue_date, date_requested) VALUES ('$userID','$status', '$firstname', '$middlename', '$lastname', '$email', '$phonenumber', '$purok', '$issue_date', CURDATE())") or die('Query Error');

      $_SESSION['requestsuccess'] = "Request successfully sent";
      header('Location: userresidency.php');
    }
  }
}
?>