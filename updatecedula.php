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
    $query = "UPDATE cedula SET firstname='$firstname', middlename='$middlename', lastname='$lastname', status='$status' WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
      $_SESSION['saveupdate'] = "Cedula Request Updated Successfully";
      header('Location: admincedula.php');
    } else {
      $_SESSION['errorupdate'] = "Update Error";
      header('Location: admincedula.php');
    }
  }
}
?>