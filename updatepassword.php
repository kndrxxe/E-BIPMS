<?php
session_start();

include 'conn.php';
if (isset($_POST['updatepassword'])) {
    $id = $_POST['updatepassword_id'];
    $password = md5($_POST['password']);
    if (!empty($id)) {
        $query = "UPDATE users SET password = '$password' WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $_SESSION['updatesuccess'] = "Password Updated Successfully";
            header('Location: adminusers.php');
        } else {
            $_SESSION['updateerror'] = "Password Update Error";
            header('Location: adminusers.php');
        }
    }
}
?>