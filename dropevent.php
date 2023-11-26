<?php
session_start();
if (isset($_POST['delete_id'])) {

  $id = $_POST['delete_id'];
  //connection
  include 'conn.php';
  //delete query
  $query = "DELETE FROM events WHERE id = $id";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {
    $_SESSION['deletesuccess'] = "Event Deleted Successfully!";
    header('Location: adminevents.php');
  } else {
    $_SESSION['deleteerror'] = "Event Deletion Error";
    header('Location: adminevents.php');
  }
}
?>