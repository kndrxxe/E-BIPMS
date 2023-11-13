<?php
session_start();
if(isset($_POST['delete_id'])){

$id = $_POST['delete_id'];
 //connection
include 'conn.php';
 //delete query
$query = "DELETE FROM residents WHERE id = $id";
$query_run = mysqli_query($conn, $query);

if ($query_run) {
  $_SESSION['deletesuccess'] = "Data Deleted Successfully!";
  header('Location: adminresidents.php');
} else {
  $_SESSION['deleteerror'] = "Data Deletion Error";
  header('Location: adminresidents.php');
}
}
?>