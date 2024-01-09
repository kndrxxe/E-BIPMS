<?php
session_start();

include 'conn.php';
if (isset($_POST['updatedata'])) {
    $id = $_POST['update_id'];
    $jobtitle = $_POST['jobtitle'];
    $applicants = $_POST['applicants'];
    $companyname = $_POST['companyname'];
    $isFeatured = $_POST['isFeatured'];
    $status = $_POST['status'];

    if (!empty($id)) {
        $query = "UPDATE jobs SET jobtitle='$jobtitle', applicants='$applicants', companyname='$companyname', isFeatured='$isFeatured', status='$status' WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $_SESSION['saveupdate'] = "Job Updated Successfully";
            header('Location: lgujobs.php');
        } else {
            $_SESSION['errorupdate'] = "Update Error";
            header('Location: lgujobs.php');
        }
    }
}
?>