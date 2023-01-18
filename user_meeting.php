<?php
include './database/config.php';

$meeting_id = $_GET['meeting_id'];
$link = $_GET['link'];

$query = "UPDATE job_meeting SET `ustatus`= `ustatus` + 1 WHERE meeting_id='$meeting_id'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
        header("location: $link");
    }
?>
