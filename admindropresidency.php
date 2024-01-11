<?php
session_start();
if (isset($_POST['delete_id'])) {

    $id = $_POST['delete_id'];
    //connection
    include 'conn.php';
    //delete query
    $query = "DELETE FROM residency WHERE id = $id";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['deletesuccess'] = "Request Deleted Successfully!";
        header('Location: adminresidency.php');
    } else {
        $_SESSION['deleteerror'] = "Request Deletion Error";
        header('Location: adminresidency.php');
    }
}
?>