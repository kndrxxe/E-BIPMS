<?php
session_start();

if (empty($_POST['firstname']) || empty($_POST['middlename']) || empty($_POST['lastname'])) {
  $_SESSION['erroraddresident'] = "Unable to add resident, Please try again.";
  header('Location: lguresidents.php');
} else {
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
  $phonenumber = $_POST['phonenumber'];
  $email = $_POST['email'];

  include 'conn.php';
  mysqli_query($conn, "INSERT INTO users(userID, firstname, middlename, lastname, sex, birthday, age, house_no, purok, civilstatus, voter, specialgroup, members, housingstatus, phonenumber ,email)VALUES('$uid','$firstname', '$middlename', '$lastname', '$sex', '$birthday', '$age', '$house_no', '$purok', '$civilstatus', '$voter', '$specialgroup', '$members', '$housingstatus', '$phonenumber', '$email')") or die('Query Error');

  $_SESSION['successaddresident'] = "Resident added Successfully";
  header('Location: lguresidents.php');
}
?>
