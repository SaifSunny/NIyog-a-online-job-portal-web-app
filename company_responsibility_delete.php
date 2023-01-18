<?php
include './database/config.php';

$id = $_GET['res_id'];
$job_id = $_GET['job_id'];

$query = "DELETE FROM job_responsibility WHERE res_id='$id'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Job Responsibility has been Deleted.');
      window.location.href='company_job_details.php?job_id=$job_id';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Delete Job');
      window.location.href='company_job_details.php?job_id=$job_id';
      </script>";
    }
?>
