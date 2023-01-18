<?php
include './database/config.php';
date_default_timezone_set('Asia/Dhaka');

$job_id = $_GET['job_id'];
$user_id = $_GET['user_id'];
$date=date('d F Y h:i A');

$sql = "SELECT * FROM jobs where job_id = $job_id";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
$company_id = $row['company_id'];




$query = "INSERT INTO job_applicant(job_id,`user_id`,`company_id`, `date`)
VALUES ('$job_id', '$user_id', '$company_id', '$date')";
$query_run = mysqli_query($conn, $query);

    if ($query_run) {
      echo "<script> 
      alert('Application Submitted.');
      window.location.href='user_jobs.php';
      </script>";
      
    } else {
      echo mysqli_error($conn);
    }
?>
