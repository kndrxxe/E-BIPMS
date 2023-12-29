<?php
session_start();

include 'conn.php';
if (isset($_POST['updateuserstatus'])) {
    $id = $_POST['updatestatus_id'];
    $status = $_POST['status'];
    if (!empty($id)) {
        $query = "UPDATE users SET status = '$status' WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $_SESSION['updatesuccess'] = "Status Updated Successfully";
            header('Location: adminusers.php');
        } else {
            $_SESSION['updateerror'] = "Status Update Error";
            header('Location: adminusers.php');
        }
    }
}
?>