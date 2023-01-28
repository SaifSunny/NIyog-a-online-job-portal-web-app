<?php
include './database/config.php';

$job_id = $_GET['job_id'];

$query = "DELETE FROM jobs WHERE job_id='$job_id'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Job has been Deleted.');
      window.location.href='company_jobs.php';
    
      </script>";
      
    } else {
      echo "<script>alert('Cannot Delete Job');
      window.location.href='company_jobs.php';
      </script>";
    }
?>
