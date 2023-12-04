<?php
session_start();
include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    $query = "UPDATE officials SET picture='' WHERE id=$id";
    $query_run = mysqli_query($conn, $query);

    $_SESSION['officialpicturedeleted'] = "Picture deleted successfully!";
    header('Location: adminofficials.php');
}
?>