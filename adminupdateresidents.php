<?php
session_start();
include 'conn.php';

$id = $_POST['id'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$birthday = $_POST['birthday'];
$house_no = $_POST['house_no'];
$purok = $_POST['purok'];
$civilstatus = $_POST['civilstatus'];
$occupation = $_POST['occupation']; 
$sex = $POST['sex']; 


$query = "UPDATE residents SET firstname='$firstname', middlename='$middlename', lastname='$lastname', birthday='$birthday', house_no='$house_no', purok='$purok', civilstatus='$civilstatus', occupation='$occupation', sex='$sex' WHERE id=$id";
$query_run = mysqli_query($conn, $query);

if ($query_run) {
  $_SESSION['saveupdate'] = "Resident Information Updated Successfully";
  header('Location: adminresidents.php');
} else {
  $_SESSION['errorupdate'] = "Data Update Error";
  header('Location: adminresidents.php');
}
?>