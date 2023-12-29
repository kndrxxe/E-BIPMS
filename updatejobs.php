<?php
session_start();

include 'conn.php';
if (isset($_POST['updateevent'])) {
    $id = $_POST['update_id'];
    $jobtitle = $_POST['jobtitle'];
    $companyname = $_POST['companyname'];
    $applicants = $_POST['applicants'];
    $isFeatured = $_POST['isFeatured'];
    $status = $_POST['status'];
    if (!empty($id)) {
        $query = "UPDATE jobs SET jobtitle='$jobtitle', companyname='$companyname', applicants='$applicants', isFeatured='$isFeatured', status='$status' WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $_SESSION['updatesuccess'] = "Job Updated Successfully";
            header('Location: lgujobs.php');
        } else {
            $_SESSION['updateerror'] = "Update Error";
            header('Location: lgujobs.php');
        }
    }
}
?>