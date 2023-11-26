<?php
session_start();

if (empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password'])) {
  $_SESSION['registrationerror'] = "User registration error, Please try again.";
  header('Location: userregister.php');
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
  $phonenumber= $_POST['phonenumber'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);  
  
  include 'conn.php';
  mysqli_query($conn, "INSERT INTO users(userID, firstname, middlename, lastname, sex, birthday, age, house_no, purok, civilstatus, voter, specialgroup, members, housingstatus, phonenumber, email, username, password)VALUES('$uid', '$firstname', '$middlename', '$lastname', '$sex', '$birthday', '$age', '$house_no', '$purok', '$civilstatus', '$voter', '$specialgroup', '$members', '$housingstatus', '$phonenumber', '$email', '$username', '$password')") or die('Query Error');

  header('Location: userlogin.php');
}
?>