<?php
// Database connection
include 'conn.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the id from the AJAX request
$id = $_GET['id'];

// Fetch the official from the database
$sql = "SELECT * FROM officials WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo json_encode($row);
    }
} else {
    echo "0 results";
}
$conn->close();
?>