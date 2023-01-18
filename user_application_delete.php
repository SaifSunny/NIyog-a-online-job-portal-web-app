<?php
include './database/config.php';

$job_id = $_GET['job_id'];
$user_id = $_GET['user_id'];

$query = "DELETE FROM job_applicant WHERE job_id='$job_id' AND user_id = $user_id";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Application has been Cancelled.');
      window.location.href='user_applications.php';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Delete Application');
      window.location.href='user_applications.php';
      </script>";
    }
?>
