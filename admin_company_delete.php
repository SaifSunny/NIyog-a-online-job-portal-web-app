<?php
include './database/config.php';

$did = $_GET['id'];

$query = "DELETE FROM company WHERE user_id='$did'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Company has been Deleted.');
      window.location.href='admin_company.php';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Delete Company');
      window.location.href='admin_company.php';
      </script>";
    }
?>
