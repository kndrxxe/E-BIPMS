<?php
    include 'conn.php';

    // Update the status column to '0' for all rows where status is '1'
    $reset_query = "UPDATE events SET status='0' WHERE status='1'";
    mysqli_query($conn, $reset_query);
?>