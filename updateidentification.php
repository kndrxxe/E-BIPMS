<?php
session_start();

include 'conn.php';
if (isset($_POST['updatedata'])) {
  $id = $_POST['update_id'];
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $lastname = $_POST['lastname'];
  $status = $_POST['status'];

  if (!empty($id)) {
    $query = "UPDATE identification SET firstname='$firstname', middlename='$middlename', lastname='$lastname', status='$status' WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
      $_SESSION['saveupdate'] = "Identification Request Updated Successfully";
      header('Location: adminidentification.php');
    } else {
      $_SESSION['errorupdate'] = "Update Error";
      header('Location: adminidentification.php');
    }
  }
}
?>