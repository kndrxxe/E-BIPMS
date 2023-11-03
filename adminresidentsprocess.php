<?php
session_start();

if (empty($_POST['firstname']) || empty($_POST['middlename']) || empty($_POST['lastname'])) {
  $_SESSION['erroraddresident'] = "Unable to add resident, Please try again.";
  header('Location: adminresidents.php');
} else {
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $lastname = $_POST['lastname'];
  $birthday = $_POST['birthday'];
  $house_no = $_POST['house_no'];
  $purok = $_POST['purok'];
  $civilstatus = $_POST['civilstatus'];
  $occupation = $_POST['occupation'];  
  
  include 'conn.php';
  mysqli_query($conn, "INSERT INTO residents(firstname, middlename, lastname, birthday, house_no, purok, civilstatus, occupation)VALUES('$firstname', '$middlename', '$lastname', '$birthday', '$house_no', '$purok', '$civilstatus', '$occupation')") or die('Query Error');

  $_SESSION['successaddresident'] = "Resident added Successfully";
  header('Location: adminresidents.php');
}
?>
