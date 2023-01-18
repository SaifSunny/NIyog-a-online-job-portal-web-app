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
                    <!--== Start Team Details Area Wrapper ==-->
                    <section class="team-details-area">
                        <div class="container" style="padding:2%;margin-top:2%;padding-left:1%">
                            <div class="row">
                                <div class="col-10">
                                    <h2 style="font-weight:600">Job Posts</h2>
                                    <p><a href="company_home.php">Home</a> / Job Posts</p>
                                </div>
                                <div class="col-md-2">
                                    <a href="company_job_add.php" class="btn btn-success">Add Post</a>
                                </div>
                            </div>
                            <hr style="margin-bottom:40px">
                            <div class="row">
                                <div class="row justify-content-center align-items-center">

                                    <div class="col-12" style="margin-bottom:4%">
                                        <?php 
                                                $sql = "SELECT * FROM jobs where company_id = $company_id";
                                                $result = mysqli_query($conn, $sql);
                                                if($result){
                                                    while($row=mysqli_fetch_assoc($result)){
                                                        $job_id=$row['job_id'];

    
                                                        $category_id=$row['category_id'];
                                                        $job_title=$row['job_title'];
                                                        $post_date=$row['post_date'];
                                                        $salary=$row['salary'];
                                                        $job_type=$row['job_type'];
                                                        $hired=$row['hired'];
                                                        $experience=$row['experience'];
                                                        $level=$row['level'];
                                                        $user_id=$row['user_id'];
        
                                                        $sql1 = "SELECT * FROM category where category_id = $category_id";
                                                        $result1 = mysqli_query($conn, $sql1);
                                                        $row1=mysqli_fetch_assoc($result1);
                                                        $category_name=$row1['category_name'];

        
                                                        $sql2 = "SELECT * FROM company where company_id =$company_id";
                                                        $result2 = mysqli_query($conn, $sql2);
                                                        $row2=mysqli_fetch_assoc($result2);
                                                        $company_img=$row2['company_img'];
                                                        $company_name=$row2['company_name'];
                                                        $city=$row2['city'];
                                                        $zip=$row2['zip'];

                                                        

                                            ?>
                                        <div class="col-md-6 col-lg-4">
                                            <!--== Start Recent Job Item ==-->
                                            <div class="recent-job-item recent-job-style2-item">
                                                <div class="main-content" style="margin:0">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h3 class="title"><a
                                                                    href="company_job_details.php?job_id=<?php echo $job_id?>"><?php echo $job_title?></a>
                                                            </h3>
                                                        </div>
                                                        <div>
                                                            <a href="company_job_delete.php?job_id=<?php echo $job_id?>"
                                                                class="btn btn-danger"
                                                                style="padding-right:7px; padding-left:15px;"><i
                                                                    style="font-size:12px;" class="fa fa-trash"></i></a>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    if($hired == 0){
                                                    ?>
                                                    <h5 class="work-type"><?php echo $job_type?></h5>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <h5 class="work-type">HIRED</h5>
                                                    <?php
                                                    }
                                                    ?>
                                                    <p class="desc">Job Level: <?php echo $level?> | Experience:
                                                        <?php echo $experience?></p>
                                                    <p class="desc"></p>

                                                </div>
                                                <div class="recent-job-info">
                                                    <div class="salary">
                                                        <h4><?php echo $salary?></h4>
                                                        <p>/monthly</p>
                                                    </div>
                                                    <?php
                                                    if($hired == 0){
                                                    ?>
                                                    <div>
                                                        <a href="company_job_applicants.php?job_id=<?php echo $job_id?>"
                                                            class="btn btn-success">View Applicants</a>
                                                    </div>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <div>
                                                        <a href="company_job_hired.php?user_id=<?php echo $user_id?>&job_id=<?php echo $job_id?>"
                                                            class="btn btn-success">View Hiring</a>
                                                    </div>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                            <!--== End Recent Job Item ==-->
                                        </div>


                                        <?php 
                                                }
                                            }
                                        ?>
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