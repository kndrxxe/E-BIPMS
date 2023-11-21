<?php
session_start();
include 'conn.php';

$id = $_POST['id'];
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
$is_special_group = isset($_POST['is_special_group']) ? '1' : '0';
$specialgroup = $is_special_group == '1' ? $_POST['specialgroup'] : NULL;
$members = $_POST['members'];
$housingstatus = $_POST['housingstatus'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = md5($_POST['password']);


$query = "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', sex='$sex', birthday='$birthday', age='$age', house_no='$house_no', purok='$purok', civilstatus='$civilstatus', voter='$voter', is_special_group='$is_special_group' ,specialgroup='$specialgroup', members='$members', housingstatus='$housingstatus', phonenumber='$phonenumber', email='$email', username='$username', password='$password' WHERE id=$id";
$query_run = mysqli_query($conn, $query);

if ($query_run) {
  $_SESSION['saveupdate'] = "Resident Information Updated Successfully";
  header('Location: adminresidents.php');
} else {
  $_SESSION['errorupdate'] = "Data Update Error";
  header('Location: adminresidents.php');
}
?>