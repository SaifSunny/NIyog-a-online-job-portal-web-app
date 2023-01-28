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

$user_id = $_GET['user_id']; 
$job_id = $_GET['job_id']; 


$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$user_img=$row['user_img'];
$user_id=$row['user_id'];
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$gender=$row['gender'];
$birthday=$row['birthday'];
$contact=$row['contact'];
$email=$row['email'];
$address=$row['address'];
$city=$row['city'];
$zip=$row['zip'];
$about=$row['about'];

$sql2 = "SELECT * FROM job_applicant where job_id = $job_id and user_id=$user_id";
$result2 = mysqli_query($conn, $sql2);
$row2=mysqli_fetch_assoc($result2);
$shortlisted=$row2['shortlisted'];
echo $applicant_id=$row2['sl'];



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
                                    <h2 style="font-weight:600">Applicant Details</h2>
                                    <p><a href="company_home.php">Home</a> / <a href="company_jobs.php">Job Posts</a> /
                                        Applicant Details</p>
                                </div>
                            </div>
                            <hr style="margin-bottom:40px">
                            <div class="row">
                                <div class="col-12">
                                    <div class="team-details-wrap">
                                        <div class="team-details-info">
                                            <div class="thumb">
                                                <img src="assets/img/users/<?php echo $user_img?>" width="130"
                                                    height="130" alt="Image-HasTech">
                                            </div>
                                            <div class="content">
                                                <h4 class="title"><?php echo $firstname." ".$lastname?></h4>
                                                <ul class="info-list">
                                                    <li><i class="icofont-location-pin"></i> <?php echo $city?></li>
                                                    <li><i class="icofont-phone"></i> <?php echo $contact?></li>
                                                    <li><i class="icofont-email"></i> <?php echo $email?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="team-details-btn">

                                            <?php
                                                if($shortlisted==1){
                                            ?>
                                            <a class="btn-warning btn-sm"
                                                style="padding: 8% 25%;font-weight:600;">Shortlisted</a>

                                            <?php
                                                }else{
                                            ?>
                                            <a class="btn-theme btn-sm"
                                                href="company_applicant_shortlist.php?id=<?php echo $applicant_id?>&job_id=<?php echo $job_id?>">Shortlist</a>
                                            <?php
                                                }
                                            ?>
                                            <a href="company_applicant_reject.php?id=<?php echo $applicant_id?>&job_id=<?php echo $job_id?>"
                                                class="btn-danger btn-sm" style="padding:5% 24%; margin-top:17%">Reject CV</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7 col-xl-8">
                                    <div class="team-details-item">
                                        <div class="content">
                                            <h4 class="title">About Candidate</h4>
                                            <p class="desc"><?php echo $about?></p>

                                        </div>
                                        <div class="candidate-details-wrap">
                                            <h4 class="content-title">Education</h4>
                                            <div class="candidate-details-content">
                                                <?php 
                                                    $sql = "SELECT * FROM user_education  WHERE user_id='$user_id'";
                                                    $result = mysqli_query($conn, $sql);
                                                    if($result){
                                                        while($row=mysqli_fetch_assoc($result)){
                                                        $id=$row['edu_id'];

                                                        $title=$row['title'];
                                                        $org=$row['org'];
                                                        $date=$row['date'];
                                                        $about=$row['about'];
                                                ?>
                                                <div class="content-item">
                                                    <h4 class="title"><?php echo $title?> <span>//</span>
                                                        <span><?php echo $date?></span></h4>
                                                    <h5 class="sub-title"><?php echo $org?></h5>
                                                    <p class="desc"><?php echo $about?></p>
                                                </div>
                                                <?php 
                                                        }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="candidate-details-wrap">
                                            <h4 class="content-title">Work & Experience</h4>
                                            <div class="candidate-details-content">
                                                <?php 
                                                    $sql = "SELECT * FROM user_experience  WHERE user_id='$user_id'";
                                                    $result = mysqli_query($conn, $sql);
                                                    if($result){
                                                        while($row=mysqli_fetch_assoc($result)){
                                                        $id=$row['exp_id'];

                                                        $title1=$row['title'];
                                                        $org1=$row['org'];
                                                        $date1=$row['date'];
                                                        $about1=$row['about'];
                                                ?>
                                                <div class="content-item">
                                                    <h4 class="title"><?php echo $title1?> <span>//</span>
                                                        <span><?php echo $date1?></span></h4>
                                                    <h5 class="sub-title"><?php echo $org1?></h5>
                                                    <p class="desc"><?php echo $about1?></p>
                                                </div>
                                                <?php 
                                                        }
                                                    }
                                                ?>

                                            </div>
                                        </div>
                                        <div class="content-list-wrap">
                                            <div class="content mb--0">
                                                <h4 class="title"></h4>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-xl-4">
                                    <div class="team-sidebar">
                                        <div class="widget-item">
                                            <div class="widget-title">
                                                <h3 class="title">Information</h3>
                                            </div>
                                            <div class="summery-info">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-name">Full Name</td>
                                                            <td class="dotted">:</td>
                                                            <td><?php echo $firstname." ".$lastname?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-name">Gender</td>
                                                            <td class="dotted">:</td>
                                                            <td><?php echo $gender?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-name">Birthday</td>
                                                            <td class="dotted">:</td>
                                                            <td><?php echo $birthday?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-name">Address</td>
                                                            <td class="dotted">:</td>
                                                            <td><?php echo $address." ".$city."-".$zip?></td>
                                                        </tr>

                                                        <tr>
                                                            <td class="table-name">Contact</td>
                                                            <td class="dotted">:</td>
                                                            <td><?php echo $contact?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-name">Email</td>
                                                            <td class="dotted">:</td>
                                                            <td><?php echo $email?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="widget-item widget-contact">
                                            <div class="widget-title">
                                                <h3 class="title">Professional Skills</h3>
                                            </div>
                                            <div class="widget-contact-form">
                                                <ul class="team-details-list mb--0">
                                                    <?php 
                                                    $sql = "SELECT * FROM user_skills  WHERE user_id='$user_id'";
                                                    $result = mysqli_query($conn, $sql);
                                                    if($result){
                                                        while($row=mysqli_fetch_assoc($result)){
                                                        $id=$row['skill_id'];

                                                        $skill=$row['title'];
                                                       
                                                ?>
                                                    <li><i class="icofont-check"></i> <?php echo $skill?></li>
                                                    <?php 
                                                        }
                                                    }
                                                ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
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