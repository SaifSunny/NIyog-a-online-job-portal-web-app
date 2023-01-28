<?php
include_once("./database/config.php");
date_default_timezone_set('Asia/Dhaka');
#starting session

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: user_login.php");
}

$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$user_id=$row['user_id'];
$user_img=$row['user_img'];
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$gender=$row['gender'];
$birthday=$row['birthday'];
$contact=$row['contact'];
$email=$row['email'];
$address=$row['address']." ".$row['city']."-".$row['zip'];

#setting session veriable
$_SESSION['image'] = $user_img;
$_SESSION['user_id'] = $row['user_id'];
$_SESSION['user_name'] = $row['firstname']." ".$row['lastname'];


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
                        <a href="user_home.php"
                            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none"
                            style="padding:4px 20px">
                            <img class="logo-main" src="assets/img/logo-dark.png" alt="Logo" width="90%" />
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="user_home.php" class="nav-link link-dark">
                                    <i class="fa fa-home"></i>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="user_jobs.php" class="nav-link active bg-success" aria-current="page">
                                    <i class="fa-solid fa-search"></i>
                                    Find Jobs
                                </a>
                            </li>
                            <li>
                                <a href="user_applications.php" class="nav-link link-dark">
                                    <i class="fa-solid fa-clipboard"></i>
                                    My Applications
                                </a>
                            </li>
                            <li>
                                <a href="user_appointments.php" class="nav-link link-dark">
                                    <i class="fa-solid fa-calendar-check"></i>
                                    My Appointments
                                </a>
                            </li>
                            <li>
                                <a href="user_cv.php" class="nav-link link-dark">
                                    <i class="fa-solid fa-address-card"></i>
                                    Build CV
                                </a>
                            </li>
                        </ul>
                        <hr>
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                                id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="assets/img/users/<?php echo $user_img?>" alt="" width="40" height="40"
                                    class="rounded-circle me-2">
                                <strong><?php echo $username?></strong>
                            </a>
                            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
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
                                    <h2 style="font-weight:600">Find Jobs</h2>
                                    <p><a href="user_home.php">Home</a> / Find Jobs</p>
                                </div>
                            </div>
                            <hr style="margin-bottom:40px">
                            <h4 style="font-weight:600;margin-bottom:30px">Job Categories</h4>
                            <div class="row">
                                <?php 
                                            $sql = "SELECT * FROM category";
                                            $result = mysqli_query($conn, $sql);
                                            if($result){
                                                while($row=mysqli_fetch_assoc($result)){
                                                $id=$row['category_id'];

                                                $category_name=$row['category_name'];
                                                $date=$row['creation_date'];
                                                $description=$row['description'];

                                                $sql1 = "SELECT * from jobs where hired=0  and category_id = $id";
                                                $result1 = mysqli_query($conn, $sql1);
                                                $row_cnt = $result1->num_rows;


                                            ?>
                                <div class="col-sm-6 col-lg-3">
                                    <!--== Start Job Category Item ==-->
                                    <div class="job-category-item">
                                        <div class="content">
                                            <h3 class="title"><a href="user_job_search.php?category_id=<?php echo $id?>"><?php echo $category_name?>
                                                    <span>(<?php echo $row_cnt?>)</span></a></h3>
                                        </div>
                                        <a class="overlay-link" href="user_job_search.php?category_id=<?php echo $id?>"></a>
                                    </div>
                                    <!--== End Job Category Item ==-->
                                </div>
                                <?php
                                              }
                                            }
                                            ?>
                            </div>
                            <hr style="margin-bottom:40px">
                            <div class="row">
                            <h4 style="font-weight:600;margin-bottom:30px">All Jobs</h4>


                                <?php 
                                                $sql = "SELECT * FROM jobs where hired =0 order by job_id desc";
                                                $result = mysqli_query($conn, $sql);
                                                if($result){
                                                    while($row=mysqli_fetch_assoc($result)){
                                                        $job_id=$row['job_id'];

                                                        $company_id=$row['company_id'];
                                                        $category_id=$row['category_id'];
                                                        $job_title=$row['job_title'];
                                                        $post_date=$row['post_date'];
                                                        $salary=$row['salary'];
                                                        $job_type=$row['job_type'];
                                                        $hired=$row['hired'];
                                                        $experience=$row['experience'];
                                                        $level=$row['level'];
        
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
                                    <div class="recent-job-item recent-job-style2-item" style="margin:0">
                                        <div class="company-info">
                                            <div class="logo">
                                                <a href="user_company_details.php?company_id=<?php echo $company_id?>"><img
                                                        src="assets/img/companies/<?php echo $company_img?>" width="75"
                                                        height="75" alt="Image-HasTech"></a>
                                            </div>
                                            <div class="content">
                                                <h4 class="name"><a
                                                        href="user_company_details.php?company_id=<?php echo $company_id?>"><?php echo $company_name?></a>
                                                </h4>
                                                <p class="address"><?php echo $city.", ".$zip?></p>
                                            </div>
                                        </div>
                                        <div class="main-content">
                                            <h3 class="title"><a
                                                    href="user_job_details.php?job_id=<?php echo $job_id?>"><?php echo $job_title?></a>
                                            </h3>
                                            <h5 class="work-type"><?php echo $job_type?></h5>
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
                                                $sql9 = "SELECT * FROM job_applicant WHERE job_id = '$job_id' AND user_id = '$user_id'";
                                                $result9 = mysqli_query($conn, $sql9);
                                            
                                                if ($result9->num_rows > 0) {
                                                ?>
                                            <a class="btn-orange" name="submit"> Allpied !</a>

                                            <?php
                                            }else{
                                            ?>
                                            <a href="user_job_details.php?job_id=<?php echo $job_id?>" type="button"
                                                class="btn-theme" name="submit">Apply Now</a>
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