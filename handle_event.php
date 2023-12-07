<?php
session_start();

if (empty($_POST['eventname'])) {
  $_SESSION['eventerror'] = 'Event adding failed!, Please try again';
  header('Location: adminevents.php');
} else {
    $eventname = $_POST['eventname'];
    $eventdatestart = $_POST['eventdatestart'];
    $eventdateend = $_POST['eventdateend'];
    $eventtimestart = $_POST['eventtimestart'];
    $eventtimeend= $_POST['eventtimeend'];
    $eventlocation = $_POST['eventlocation'];
    $eventdescription = $_POST['eventdescription'];  
    $eventcolor = $_POST['eventcolor'];
    $status = $_POST['status'];
  
  include 'conn.php';
  mysqli_query($conn, "INSERT INTO events(eventname, eventdatestart, eventdateend, eventtimestart, eventtimeend, eventlocation, eventdescription, eventcolor, status)VALUES('$eventname', '$eventdatestart', '$eventdateend', '$eventtimestart', '$eventtimeend', '$eventlocation', '$eventdescription', '$eventcolor', '$status')") or die('Query Error');
  
  $_SESSION['eventsuccess'] = 'Event added successfully!';
  header('Location: adminevents.php');
}
?>