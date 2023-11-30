<?php
session_start();
error_reporting(0);

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
  $purpose = $_POST['purpose']; 
  $issue_date = $_POST['issue_date'];
  $isPaid = $_POST['isPaid'];

  include 'conn.php';
  mysqli_query($conn, "INSERT INTO documents(userID, status, firstname, middlename, lastname, email, purpose, issue_date, isPaid, date_requested)VALUES('$userID','$status', '$firstname', '$middlename', '$lastname', '$email', '$purpose', '$issue_date', '$isPaid', CURDATE())") or die('Query Error');
  
  $_SESSION['requestsuccess'] = "Request successfully sent";
  header('Location: userdocument.php');
}
?>