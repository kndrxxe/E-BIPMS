<?php
session_start();

if (empty($_POST['incident'])) {
    $_SESSION['requesterror'] = "Request error, Please try again.";
    header('Location: reportincident.php');
} else {
    $userID = $_POST['userID'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $incident = $_POST['incident'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $person = $_POST['person'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $date_reported = $_POST['date_reported'];

    include 'conn.php';
    $uid = $_SESSION['userID']; // Assuming the user_id is stored in session
    $query = "SELECT * FROM incidentreport WHERE status = 0 AND userID = '$uid'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // A request is already pending
        $_SESSION['requesterror'] = "You already have a pending report. Please wait until it is processed before making another request.";
        header('Location: reportincident.php');
    } else {
        // No pending request, proceed with the current request
        $query = "SELECT * FROM incidentreport WHERE userID = '$userID' AND status = 0";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Record already exists
            $_SESSION['requesterror'] = "You already have a pending report. Please wait until it is processed before making another request.";
            header('Location: reportincident.php');
        } else {
            // Record does not exist, insert the data
            mysqli_query($conn, "INSERT INTO incidentreport(userID, contact, email, incident, date, time, location, person, description, status, date_reported)VALUES('$userID', '$contact', '$email', '$incident', '$date', '$time', '$location', '$person', '$description', '$status', CURDATE())") or die('Query Error');
            $_SESSION['requestsuccess'] = "Report successfully sent, please wait for the response. Thank you!";
            header('Location: reportincident.php');
        }
    }
}
?>