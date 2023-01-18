<?php
include './database/config.php';

$job_id = $_GET['job_id'];
$user_id = $_GET['user_id'];

$query = "UPDATE jobs SET hired = 1, user_id = '$user_id' WHERE job_id='$job_id'";
$query_run = mysqli_query($conn, $query);

    
  if ($query_run) {

    $query = "UPDATE job_applicant SET shortlisted = 2 WHERE user_id <> $user_id AND job_id = $job_id";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
      echo "<script> 
      alert('Congratulation on Successfull Hiring.');
      window.location.href='company_home.php';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Confirm Hiring');
      window.location.href='company_home.php';
      </script>";
    }
  }
?>
