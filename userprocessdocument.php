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
  $nature = $_POST['nature'];
  $date_applied = $_POST['date_applied'];

  include 'conn.php';
  mysqli_query($conn, "INSERT INTO documents(userID, status, firstname, middlename, lastname, nature, date_applied)VALUES('$userID','$status', '$firstname', '$middlename', '$lastname', '$nature', '$date_applied')") or die('Query Error');
  
  $_SESSION['requestsuccess'] = "Request successfully sent";
  header('Location: userdocument.php');
}
?>