<?php
session_start();
include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $query = "UPDATE users SET profile_picture='' WHERE id=$id";
    $query_run = mysqli_query($conn, $query);

    header('Location: edituserprofile.php');
}
?>