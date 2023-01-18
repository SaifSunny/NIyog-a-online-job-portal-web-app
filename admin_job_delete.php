<?php
include './database/config.php';

$did = $_GET['id'];

$query = "DELETE FROM jobs WHERE job_id='$did'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Job has been Deleted.');
      window.location.href='admin_jobs.php';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Delete Job');
      window.location.href='admin_jobs.php';
      </script>";
    }
?>
