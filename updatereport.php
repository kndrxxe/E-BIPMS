<?php
session_start();

include 'conn.php';
if (isset($_POST['updatedata'])) {
    $id = $_POST['update_id'];
    $incident = $_POST['incident'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $person = $_POST['person'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    if (!empty($id)) {
        $query = "UPDATE incidentreport SET incident='$incident', date='$date', time='$time', location='$location', person='$person', description='$description', status='$status' WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $_SESSION['saveupdate'] = "Incident Report Updated Successfully";
            header('Location: adminincidentreport.php');
        } else {
            $_SESSION['errorupdate'] = "Update Error";
            header('Location: adminincidentreport.php');
        }
    }
}
?>