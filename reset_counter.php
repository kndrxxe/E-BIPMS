<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include 'conn.php';

    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    }

    // Update the status column to '0' for all rows where status is '1'
    $reset_query = "UPDATE events SET status='0' WHERE status='1'";
    if (!mysqli_query($conn, $reset_query)) {
        die('Error: ' . mysqli_error($conn));
    }

    mysqli_close($conn);
?>