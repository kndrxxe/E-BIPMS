<?php
session_start();

if (empty($_POST['companyname'])) {
  $_SESSION['joberror'] = 'Job adding failed!, Please try again';
  header('Location: adminevents.php');
} else {
    $companyname = $_POST['companyname'];
    $jobtitle = $_POST['jobtitle'];
    $jobdescription = $_POST['jobdescription'];
    $joblocation = $_POST['joblocation'];
    $jobrequirements = $_POST['jobrequirements'];
    $isFeatured = $_POST['isFeatured'];
  
  include 'conn.php';
  mysqli_query($conn, "INSERT INTO jobs(companyname, jobtitle, jobdescription, joblocation, jobrequirements, isFeatured)VALUES('$companyname', '$jobtitle', '$jobdescription', '$joblocation', '$jobrequirements', '$isFeatured')") or die('Query Error');
  $_SESSION['jobsuccess'] = 'Job added successfully!';
  header('Location: lgujobs.php');
}
?>