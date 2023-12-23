<?php
session_start();
if(isset($_POST['delete_id'])){

$id = $_POST['delete_id'];
 //connection
include 'conn.php';
 //delete query
$query = "DELETE FROM incidentreport WHERE id = $id";
$query_run = mysqli_query($conn, $query);

if ($query_run) {
  $_SESSION['deletesuccess'] = "Report Deleted Successfully!";
  header('Location: reportincident.php');
} else {
  $_SESSION['deleteerror'] = "Report Deletion Error";
  header('Location: reportincident.php');
}
}
?>