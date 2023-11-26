<?php
session_start();

include 'conn.php';
if (isset($_POST['updateevent'])) {
    $id = $_POST['update_id'];
    $eventname = $_POST['eventname'];
    $eventdatestart = $_POST['eventdatestart'];
    $eventdateend = $_POST['eventdateend'];
    $eventtimestart = $_POST['eventtimestart'];
    $eventtimeend = $_POST['eventtimeend'];
    $eventlocation = $_POST['eventlocation'];
    $eventdescription = $_POST['eventdescription'];
    $eventcolor = $_POST['eventcolor'];
    if (!empty($id)) {
        $query = "UPDATE events SET eventname='$eventname', eventdatestart='$eventdatestart', eventdateend='$eventdateend', eventtimestart='$eventtimestart', eventtimeend='$eventtimeend', eventlocation='$eventlocation', eventdescription='$eventdescription', eventcolor='$eventcolor' WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $_SESSION['updatesuccess'] = "Event Updated Successfully";
            header('Location: adminevents.php');
        } else {
            $_SESSION['updateerror'] = "Update Error";
            header('Location: adminevents.php');
        }
    }
}
?>