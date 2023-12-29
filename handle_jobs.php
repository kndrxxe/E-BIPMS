<?php
session_start();

if (empty($_POST['companyname'])) {
  $_SESSION['joberror'] = 'Job adding failed!, Please try again';
  header('Location: adminevents.php');
} else {
  $hash_id = md5(uniqid(rand()));
  $jobtitle = $_POST['jobtitle'];
  $companyname = $_POST['companyname'];
  $region = $_POST['region_text'];
  $province = $_POST['province_text'];
  $city = $_POST['city_text'];
  $jobdescription = $_POST['jobdescription'];
  $jobrequirements = $_POST['jobrequirements'];
  $joblink = $_POST['joblink'];
  $date_posted = date("Y-m-d H:i:s");
  $isFeatured = $_POST['isFeatured'];
  $status = $_POST['status'];

  include 'conn.php';
  
  $stmt = $conn->prepare("INSERT INTO jobs (hash_id, jobtitle, companyname, region, province, city, jobdescription, jobrequirements, joblink, date_posted, isFeatured) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssssssss", $hash_id, $jobtitle, $companyname, $region, $province, $city, $jobdescription, $jobrequirements, $joblink, $date_posted, $isFeatured, $status);

  $stmt->execute();

  $_SESSION['jobsuccess'] = 'Job added successfully!';
  header('Location: lgujobs.php');
}
?>