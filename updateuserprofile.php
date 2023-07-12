<?php
session_start();
include 'conn.php';

$id = $_POST['id'];
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


$query = "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname',  house_no='$house_no', purok='$purok', sex='$sex', birthday='$birthday', email='$email', username='$username', password='$password' WHERE id=$id";
$query_run = mysqli_query($conn, $query);

if ($query_run) {
  $_SESSION['saveuserupdate'] = "Data Updated Successfully";
  header('Location: userhome.php');
} else {
  $_SESSION['erroruserupdate'] = "Data Update Error";
  header('Location: userhome.php');
}
?>