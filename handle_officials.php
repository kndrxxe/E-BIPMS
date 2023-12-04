<?php
session_start();
$termStartYear = $_POST['termStartYear'];
$termEndYear = $_POST['termEndYear'];

if (strlen((string) $termStartYear) > 4 || strlen((string) $termEndYear) > 4) {
    $_SESSION['officialserror'] = "The term start year or term end year is too long.";
    header('Location: adminofficials.php');
    exit();
} else {
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $position = $_POST['position'];
    $committee = $_POST['committee'];
    $termStartYear = $_POST['termStartYear'];
    $termEndYear = $_POST['termEndYear'];
    $type = $_POST['type'];

    include 'conn.php';
    mysqli_query($conn, "INSERT INTO officials (firstName, middleName, lastName, position, committee, termStartYear, termEndYear, type) VALUES ('$firstName', '$middleName', '$lastName', '$position', '$committee', '$termStartYear', '$termEndYear', '$type')");
    $_SESSION['officialssuccess'] = 'New official added successfully!';
    header('Location: adminofficials.php');
}
?>