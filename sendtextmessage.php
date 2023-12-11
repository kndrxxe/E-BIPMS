<?php
session_start();
require 'vendor/autoload.php'; // Path to the Guzzle library

$client = new GuzzleHttp\Client();

$apiKey = "6elWozFhBHVEI_ULQTLxSCuBsFmNNzwYZ0swbZ9cRY-cQPBS-HYCgETS1xQfsNyv";

// Database connection
include 'conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch data
$id = $_GET['id'];
$query = "SELECT * FROM documents WHERE id = '$id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Fetch data
    $row = $result->fetch_assoc();
    $name = $row['firstname'];
    $to = $row['phonenumber'];

    $res = $client->request('POST', 'https://api.httpsms.com/v1/messages/send', [
        'headers' => [
            'x-api-key' => $apiKey,
        ],
        'json' => [
            'content' => "Dear $name,\n\nWe are pleased to inform you that your Barangay Clearance is now ready for pick up. \n\nPlease visit the Barangay Hall at your earliest convenience to collect it.\n\nBest regards,\nBrgy. Kanlurang Bukal",
            'from' => '+639664179718',
            'to' => $to
        ]
    ]);

    if ($res->getStatusCode() == 200) {
        // If the SMS was sent successfully
        $_SESSION['sendsms'] = "SMS sent successfully";
        header('Location: admindocument.php');
    } else {
        // If the SMS was not sent successfully
        $_SESSION['sendsmserror'] = "SMS not sent";
        header('Location: admindocument.php');
    }
}
$conn->close();
?>