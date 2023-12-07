<?php
session_start();
require 'conn.php'; // replace with your database connection file

$id = $_GET['id'];

$sql = "UPDATE users SET profile_picture = '' WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $_SESSION['message'] = "Profile picture deleted successfully";
} else {
    $_SESSION['message'] = "Error deleting profile picture: ";
}

header('Location: admineditresidents.php?id=' . $id);
exit();
?>