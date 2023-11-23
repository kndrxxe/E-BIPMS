<?php
session_start();

if (empty($_POST['eventName'])) {
  $_SESSION['eventError'] = 'Event adding failed!, Please try again';
  header('Location: adminevents.php');
} else {
    $eventName = $_POST['eventName'];
    $eventDateStart = $_POST['eventDateStart'];
    $eventDateEnd = $_POST['eventDateEnd'];
    $eventTimeStart = $_POST['eventTimeStart'];
    $eventTimeEnd= $_POST['eventTimeEnd'];
    $eventLocation = $_POST['eventLocation'];
    $eventDescription = $_POST['eventDescription'];  
    $eventColor = $_POST['eventColor'];
  
  include 'conn.php';
  mysqli_query($conn, "INSERT INTO events(eventName, eventDateStart, eventDateEnd, eventTimeStart, eventTimeEnd, eventLocation, eventDescription, eventColor)VALUES('$eventName', '$eventDateStart', '$eventDateEnd', '$eventTimeStart', '$eventTimeEnd', '$eventLocation', '$eventDescription', '$eventColor')") or die('Query Error');
  
  $_SESSION['eventSuccess'] = 'Event added successfully!';
  header('Location: adminevents.php');
}
?>