<?php
include './database/config.php';

$id = $_GET['id'];
$job_id = $_GET['job_id'];

$query = "UPDATE job_applicant SET shortlisted = 2 WHERE sl='$id'";
$query_run = mysqli_query($conn, $query);

    
    if ($query_run) {
      echo "<script> 
      alert('Applicant has been Rejected.');
      window.location.href='company_job_applicants.php?job_id=$job_id';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Reject Applicant');
      window.location.href='company_job_applicants.php?job_id=$job_id';
      </script>";
    }
?>
