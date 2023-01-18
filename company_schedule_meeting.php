<?php
include_once("./database/config.php");
date_default_timezone_set('Asia/Dhaka');
#starting session

session_start();

if (!isset($_SESSION['companyname'])) {
    header("Location: company_login.php");
}

$username = $_SESSION['companyname'];

$sql = "SELECT * FROM company WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$company_id=$row['company_id'];
$company_img=$row['company_img'];
$company_name=$row['company_name'];
$website=$row['website'];
$established=$row['established'];
$contact=$row['contact'];
$email=$row['email'];
$address=$row['address']." ".$row['city']."-".$row['zip'];

#setting session veriable
$_SESSION['company_img'] = $company_img;
$_SESSION['company_id'] = $row['company_id'];
$_SESSION['company_name'] = $row['company_name'];

$job_id = $_GET['job_id']; 
$user_id = $_GET['user_id']; 


$sql1 = "SELECT * FROM users WHERE user_id='$user_id'";
$result1 = mysqli_query($conn, $sql1);
$row1=mysqli_fetch_assoc($result1);

$user_name=$row1['firstname']." ".$row1['lastname'];

$sql2 = "SELECT * FROM jobs WHERE job_id='$job_id'";
$result2 = mysqli_query($conn, $sql2);
$row2=mysqli_fetch_assoc($result2);

$category_id=$row2['category_id'];
$job_title=$row2['job_title'];

$sql3 = "SELECT * FROM category WHERE category_id='$category_id'";
$result3 = mysqli_query($conn, $sql3);
$row3=mysqli_fetch_assoc($result3);

$category_name=$row3['category_name'];


if(isset($_POST['submit'])){

    $meeting_date = $_POST['meeting_date']." ".$_POST['meeting_time'];
    $meeting_link = $_POST['meeting_link'];
    $platform = $_POST['platform'];

$old_date_timestamp = strtotime($meeting_date);
$new_date = date('d F Y h:i A', $old_date_timestamp); 

    $error = "";
    $cls="";

            // Insert record

            $query2 = "INSERT INTO job_meeting(company_id,`job_id`, `user_id`, `date`, `platform`, `meeting_link`)
            VALUES ('$company_id', '$job_id', '$user_id', '$new_date', '$platform', '$meeting_link')";
            $query_run2 = mysqli_query($conn, $query2);
            
            if ($query_run2) {
                echo "<script>alert('Meeting Successfully Scheduled');
                window.location.href='company_job_shortlist.php?job_id=$job_id';
                </script>";
            } 
            else {
                $cls="danger";
                $error = mysqli_error($conn);
            }


}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Niyog - Job Finding Web Application</title>

    <!--== Google Fonts ==-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--== Bootstrap CSS ==-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--== Icofont Icon CSS ==-->
    <link href="assets/fonts/icofont/icofont.min.css" rel="stylesheet" />
    <!--== Swiper CSS ==-->
    <link href="assets/css/swiper.min.css" rel="stylesheet" />
    <!--== Fancybox Min CSS ==-->
    <link href="assets/css/fancybox.min.css" rel="stylesheet" />
    <!--== Aos Min CSS ==-->
    <link href="assets/css/aos.min.css" rel="stylesheet" />

    <!--== Main Style CSS ==-->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>


<body>

    <!--wrapper start-->
    <div class="wrapper">


        <main class="main-content">
            <div class="row">
                <div class="col-md-2">
                    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light"
                        style="height:100vh;position:fixed;width:17%">
                        <a href="company_home.php"
                            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none"
                            style="padding:4px 20px">
                            <img class="logo-main" src="assets/img/logo-dark.png" alt="Logo" width="90%" />
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="company_home.php" class="nav-link link-dark">
                                    <i class="fa fa-home"></i>
                                    Home
                                </a>
                            </li>

                            <li>
                                <a href="company_jobs.php" class="nav-link active bg-success" aria-current="page">
                                    <i class="fa-solid fa-clipboard"></i>
                                    Job Posts
                                </a>
                            </li>
                            <li>
                                <a href="company_appointments.php" class="nav-link link-dark">
                                    <i class="fa-solid fa-calendar-check"></i>
                                    Job Shortlist
                                </a>
                            </li>
                            <li>
                                <a href="company_hire_history.php" class="nav-link link-dark">
                                    <i class="fa-solid fa-address-card"></i>
                                    Hiring History
                                </a>
                            </li>
                        </ul>
                        <hr>
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                                id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="assets/img/companies/<?php echo $company_img?>" alt="" width="40" height="40"
                                    class="rounded-circle me-2">
                                <strong><?php echo $username?></strong>
                            </a>
                            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">

                                <li><a class="dropdown-item" href="company_profile.php"><i class="fa-solid fa-user"></i>
                                        Profile</a></li>
                                <hr>
                                <li><a class="dropdown-item" href="logout.php"><i
                                            class="fa-solid fa-right-from-bracket"></i>
                                        Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <!--== Start Team Area Wrapper ==-->
                    <section class="team-area team-inner2-area">
                        <div class="container" style="padding:2%;margin-top:2%;padding-left:1%">
                            <div class="row">
                                <div class="col-10">
                                    <h2 style="font-weight:600">Job Applicants</h2>
                                    <p><a href="company_home.php">Home</a> / <a href="company_jobs.php">Job Posts</a> /
                                        Applicants</p>
                                </div>
                            </div>

                            <hr style="margin-bottom:10px">

                            <div class="row">
                                <div class="col-md-12">
                                <form action="" method="POST" enctype='multipart/form-data' style="padding:0 40px">
                                        <div class="row" style="color:#222;">
                                            <div class="col-md-12">

                                                <div class="alert alert-<?php echo $cls;?>">
                                                    <?php 
                                                                if (isset($_POST['submit'])){
                                                                    echo $error;
                                                                }
                                                            ?>
                                                </div>
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group" style="padding:18px">
                                                            <label style="padding-bottom:10px">Job Title</label>
                                                            <input type="text" class="form-control" name="job_title"
                                                                id="job_title" placeholder="Job Title" value="<?php echo $job_title?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:18px">
                                                            <label style="padding-bottom:10px">Meeting Platform</label>
                                                                <select class="form-control" name="platform"
                                                                id="platform" required>
                                                                <option value="Google Meet">Google Meet</option>
                                                                <option value="Zoom">Zoom</option>
                                                                <option value="Skype">Skype</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:18px">
                                                            <label style="padding-bottom:10px">Meeting Link</label>
                                                            <input type="text" class="form-control" name="meeting_link"
                                                                id="meeting_link" placeholder="Meeting Link" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:10px">
                                                            <label style="padding-bottom:20px;">Category</label>
                                                            <input type="text" class="form-control" name="category" id="category"
                                                                readonly value="<?php echo $category_name;?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:10px">
                                                            <label style="padding-bottom:20px;">Candidate Name</label>
                                                            <input type="text" class="form-control" name="user_name" id="user_name"
                                                                readonly value="<?php echo $user_name?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:18px">
                                                            <label style="padding-bottom:10px">Meeting Date</label>
                                                            <input type="date" class="form-control" name="meeting_date"
                                                                id="meeting_date" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:18px">
                                                            <label style="padding-bottom:10px">Meeting Time</label>
                                                            <input type="time" class="form-control" name="meeting_time"
                                                                id="meeting_time" required>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end" style="padding-top:20px;">
                                                        <button type="submit" name="submit" class="btn btn-success"
                                                            style="margin-right:20px;">Schedule Meeting</button>
                                                    </div>
                                                </div>


                                            </div>

                                    </form>
                                </div>
                            </div>

                        </div>
                    </section>
                    <!--== End Team Area Wrapper ==-->
                </div>
            </div>



        </main>

    </div>

    <!--=======================Javascript============================-->

    <!--=== jQuery Modernizr Min Js ===-->
    <script src="assets/js/modernizr.js"></script>
    <!--=== jQuery Min Js ===-->
    <script src="assets/js/jquery-main.js"></script>
    <!--=== jQuery Migration Min Js ===-->
    <script src="assets/js/jquery-migrate.js"></script>
    <!--=== jQuery Popper Min Js ===-->
    <script src="assets/js/popper.min.js"></script>
    <!--=== jQuery Bootstrap Min Js ===-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--=== jQuery Swiper Min Js ===-->
    <script src="assets/js/swiper.min.js"></script>
    <!--=== jQuery Fancybox Min Js ===-->
    <script src="assets/js/fancybox.min.js"></script>
    <!--=== jQuery Aos Min Js ===-->
    <script src="assets/js/aos.min.js"></script>
    <!--=== jQuery Counterup Min Js ===-->
    <script src="assets/js/counterup.js"></script>
    <!--=== jQuery Waypoint Js ===-->
    <script src="assets/js/waypoint.js"></script>

    <!--=== jQuery Custom Js ===-->
    <script src="assets/js/custom.js"></script>

</body>

</html>