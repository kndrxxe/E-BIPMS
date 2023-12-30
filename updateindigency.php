<?php
session_start();

include 'conn.php';
if (isset($_POST['updatedata'])) {
    $id = $_POST['update_id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $purpose = $_POST['purpose'];
    $status = $_POST['status'];

    if (!empty($id)) {
        $query = "UPDATE indigency SET firstname='$firstname', middlename='$middlename', lastname='$lastname', purpose='$purpose', status='$status' WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $_SESSION['saveupdate'] = "Indigency Request Updated Successfully";
            header('Location: adminindigency.php');
        } else {
            $_SESSION['errorupdate'] = "Update Error";
            header('Location: adminindigency.php');
        }
    }
}
?>