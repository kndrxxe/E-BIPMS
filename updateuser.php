<?php
session_start();

include 'conn.php';
if (isset($_POST['updateusername'])) {
    $id = $_POST['update_id'];
    $username = $_POST['username'];
    if (!empty($id)) {
        $query = "UPDATE users SET username = '$username' WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $_SESSION['updatesuccess'] = "Username Updated Successfully";
            header('Location: adminusers.php');
        } else {
            $_SESSION['updateerror'] = "Username Update Error";
            header('Location: adminusers.php');
        }
    }
}
?>