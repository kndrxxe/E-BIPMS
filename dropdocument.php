<?php
session_start();

$id = $_GET['id'];
 //connection
include 'conn.php';
 //delete query
$query = "DELETE FROM documents WHERE id = $id";
$query_run = mysqli_query($conn, $query);

if ($query_run) {
  $_SESSION['deletesuccess'] = "Data Deleted Successfully!";
  header('Location: userdocument.php');
} else {
  $_SESSION['deleteerror'] = "Data Deletion Error";
  header('Location: userdocument.php');
}
?>