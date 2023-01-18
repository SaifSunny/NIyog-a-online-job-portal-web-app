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
                                <a href="company_home.php" class="nav-link  active bg-success" aria-current="page">
                                    <i class="fa fa-home"></i>
                                    Home
                                </a>
                            </li>

                            <li>
                                <a href="company_jobs.php" class="nav-link link-dark">
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
                    <!--== Start Team Details Area Wrapper ==-->
                    <section class="team-details-area">
                        <div class="container" style="padding:2%;margin-top:2%;padding-left:1%">
                            <div class="row">
                                <div class="col-12">
                                    <h2 style="font-weight:600">Company Home</h2>
                                    <p>Home</p>
                                </div>
                            </div>
                            <hr style="margin-bottom:40px">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card mx-auto"
                                        style="text-align:center;padding-top:30px;padding-bottom:10px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                                        <h4 class="card-title">Job Posted</h4>
                                        <div class="card-body text-center">
                                            <?php
                                                $sql = "SELECT * from jobs where company_id = $company_id";
                                                $result = mysqli_query($conn, $sql);
                                                $row_cnt = $result->num_rows;
                                            ?>
                                            <h1><?php echo $row_cnt?></h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card mx-auto"
                                        style="text-align:center;padding-top:30px;padding-bottom:10px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                                        <h4 class="card-title">Total Applicants</h4>
                                        <div class="card-body text-center">
                                            <?php
                                                $sql1 = "SELECT * from job_applicant where `company_id` = $company_id";
                                                $result1 = mysqli_query($conn, $sql1);
                                                $row_cnt = $result1->num_rows;
                                            ?>
                                            <h1><?php echo $row_cnt?></h>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card mx-auto"
                                        style="text-align:center;padding-top:30px;padding-bottom:10px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                                        <h4 class="card-title">Short Listed</h4>
                                        <div class="card-body text-center">
                                            <?php
                                                $sql = "SELECT * from job_applicant where `company_id` = $company_id and shortlisted = 1";
                                                $result = mysqli_query($conn, $sql);
                                                $row_cnt = $result->num_rows;
                                            ?>
                                            <h1><?php echo $row_cnt?></h>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card mx-auto"
                                        style="text-align:center;padding-top:30px;padding-bottom:10px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                                        <h4 class="card-title">Hired</h4>
                                        <div class="card-body text-center">
                                            <?php
                                                $sql = "SELECT * from jobs where hired =1";
                                                $result = mysqli_query($conn, $sql);
                                                $row_cnt = $result->num_rows;
                                            ?>
                                            <h1><?php echo $row_cnt?></h>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                                                <div class="card-header" style="padding: 20px;">
                                                    <strong class="card-title">My Appointments</strong>
                                                </div>
                                                <div class="card-body" style="">
                                                <table class="table text-center" style="font-size: 14px;padding: 20px;">
                                        <thead>
                                            <th>Applicant Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Meeting Date</th>
                                            <th>Meeting Platform</th>
                                            <th>Join Meeting</th>
                                        </thead>

                                        <tbody style="font-size:16px;">
                                            <?php 
                                                $sql = "SELECT * FROM job_meeting where company_id =$company_id AND ustatus=0 and cstatus=0 order by job_id";
                                                $result = mysqli_query($conn, $sql);
                                                if($result){
                                                    while($row=mysqli_fetch_assoc($result)){
                                                        $meeting_id=$row['meeting_id'];
                                                        $job_id=$row['job_id'];
                                                        $user_id=$row['user_id'];
                                                        $date=$row['date'];
                                                        $ustatus=$row['ustatus'];
                                                        $cstatus=$row['cstatus'];
                                                        $platform=$row['platform'];
                                                        $meeting_link=$row['meeting_link'];

                                                        $sql5 = "SELECT * FROM users where user_id = $user_id";
                                                        $result5 = mysqli_query($conn, $sql5);
                                                        $row5=mysqli_fetch_assoc($result5);
                                                        $user_img=$row5['user_img'];
                                                        $firstname=$row5['firstname'];
                                                        $lastname=$row5['lastname'];
                                                        $email=$row5['email'];
                                                        $contact=$row5['contact'];
                                                ?>


                                            <tr style="margin-top:10px;vertical-align:middle">
                                                <td class="d-flex">

                                                    <img src="assets/img/users/<?php echo $user_img?>" width="60"
                                                        height="60" alt="Image">

                                                    <h5 style="margin-left:20px;margin-top:16px;">
                                                       <a href="company_applicant_details.php?user_id=<?php echo $user_id?>&job_id=<?php echo $job_id?>"><?php echo $firstname. " ".$lastname?></a></h5>


                                                </td>
                                                <td><?php echo $email ?></td>
                                                <td><?php echo $contact ?></td>
                                                </td>
                                                <?php
                                                    	$sql9 = "SELECT * FROM job_meeting WHERE user_id='$user_id' AND company_id='$company_id'AND job_id='$job_id'";
                                                        $result9 = mysqli_query($conn, $sql9);
                                                        if ($result9->num_rows > 0) {
                                                            $row9=mysqli_fetch_assoc($result9);
                                                            $meeting_id=$row9['meeting_id'];
                                                            $platform=$row9['platform'];
                                                            $meeting_link=$row9['meeting_link'];
                                                            $date=$row9['date'];
                                                            
                                                ?>
                                                <td><?php echo $date?>

                                                <td>
                                                    <?php echo $platform?>
                                                </td>
                                                <td>
                                                <a href="company_meeting.php?meeting_id=<?php echo $meeting_id?>&link=<?php echo $meeting_link?>" class="btn btn-success" style="padding-right:3px;"><i class="fa fa-video-camera"></i></a>
                                                </td>
                                                <?php
                                                    }else{
                                                ?>
                                                <td>
                                                    Not Scheduled
                                                </td>
                                                <td>
                                                    Not Set
                                                </td>
                                                <td>
                                                    <a href="company_schedule_meeting.php?job_id=<?php echo $job_id?>&user_id=<?php echo $user_id?>"
                                                        class="btn btn-warning">Schedule Meeting</a>
                                                </td>
                                                <?php
                                                    }
                                                ?>

                                            </tr>
                                            <?php 
                                                }
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--== End Team Details Area Wrapper ==-->
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