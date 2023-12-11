<?php
// Database connection
include 'conn.php';

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($conn, $user, $pass, $opt);

// Query to get data from the table
$sql = "SELECT firstname, middlename, lastname, purok FROM users";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Fetch all rows as an associative array
$rows = $stmt->fetchAll();

// Output data in JSON format
header('Content-Type: application/json');
echo json_encode($rows);
?>