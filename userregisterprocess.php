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
  $house_no = $_POST['house_no'];
  $purok = $_POST['purok'];
  $sex = $_POST['sex'];
  $birthday = $_POST['birthday'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);  
  
  include 'conn.php';
  mysqli_query($conn, "INSERT INTO users(userID, firstname, middlename, lastname, house_no, purok, sex, birthday, email, username, password)VALUES('$uid','$firstname', '$middlename', '$lastname', '$house_no', '$purok', '$sex' , '$birthday', '$email', '$username', '$password')") or die('Query Error');

  header('Location: userlogin.php');
}
?>