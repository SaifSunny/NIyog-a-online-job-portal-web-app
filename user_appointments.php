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
                                <a href="user_jobs.php" class="nav-link link-dark">
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
                                <a href="user_appointments.php" class="nav-link active bg-success" aria-current="page">
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
                                    <h2 style="font-weight:600">My Applications</h2>
                                    <p><a href="user_home.php">Home</a> / My Applications</p>
                                </div>
                            </div>
                            <hr style="margin-bottom:40px">
                            <div class="row">
                                <table class="table" style="font-size: 14px;padding: 20px;">
                                    <thead>
                                        <th>Job Position</th>
                                        <th>Category</th>
                                        <th>Salary</th>
                                        <th>Meeting Date</th>
                                        <th>Meeting Platform</th>
                                        <th>Join Meeting</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </thead>

                                    <tbody style="font-size:16px;">
                                        <?php 
                                            $sql5 = "SELECT * FROM job_meeting where user_id =$user_id";
                                            $result5 = mysqli_query($conn, $sql5);
                                            if($result5){
                                                while($row=mysqli_fetch_assoc($result5)){
                                                $job_id=$row['job_id'];
                                                $date=$row['date'];
                                                $ustatus=$row['ustatus'];
                                                $cstatus=$row['cstatus'];
                                                $platform=$row['platform'];
                                                $meeting_link=$row['meeting_link'];

                                                $sql = "SELECT * FROM jobs where job_id =$job_id";
                                                $result = mysqli_query($conn, $sql);
                                                $row=mysqli_fetch_assoc($result);


                                                $company_id=$row['company_id'];
                                                $category_id=$row['category_id'];
                                                $job_title=$row['job_title'];
                                                $post_date=$row['post_date'];
                                                $salary=$row['salary'];
                                                $hired=$row['hired'];

                                                $sql1 = "SELECT * FROM category where category_id = $category_id";
                                                $result1 = mysqli_query($conn, $sql1);
                                                $row1=mysqli_fetch_assoc($result1);
                                                $category_name=$row1['category_name'];

                                                $sql2 = "SELECT * FROM company where company_id =$company_id";
                                                $result2 = mysqli_query($conn, $sql2);
                                                $row2=mysqli_fetch_assoc($result2);
                                                $company_name=$row2['company_name'];
                                                $company_img=$row2['company_img'];
                                               
                                                if($ustatus == 1 && $cstatus == 1){
                                                    $type = "danger";
                                                    $msg = "Completed";
                                                }else{
                                                    $type = "success";
                                                    $msg = "Pending";
                                                }

                                        ?>
                                        <tr style="margin-top:10px;vertical-align:middle">
                                            <td>
                                                <div class="d-flex">
                                                    <div>
                                                        <img src="assets/img/companies/<?php echo $company_img?>"
                                                            width="75" height="75" alt="Image-HasTech">
                                                    </div>
                                                    <div style="margin-left:20px;vertical-align:middle">
                                                        <h5><a
                                                                href="user_job_details.php?job_id=<?php echo $job_id?>"><?php echo $job_title?></a>
                                                        </h5>
                                                        <p><?php echo $company_name ?></p>
                                                    </div>
                                                </div>

                                            </td>
                                            <td><?php echo $category_name ?></td>
                                            <td>Tk. <?php echo $salary ?></td>
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
                                                    <a href="user_meeting.php?meeting_id=<?php echo $meeting_id?>&link=<?php echo $meeting_link?>" class="btn btn-success" style="padding-right:3px;"><i class="fa fa-video-camera"></i></a>
                                                </td>
                                                <?php
                                                    }
                                                ?>
                                            <td><button
                                                    style="border-radius: 40px; padding:5px 14px; font-size:12px; font-weight:600"
                                                    class="btn btn-<?php echo $type?>"><?php echo $msg?></button></td>
                                            <td><a href="user_application_delete.php?job_id=<?php echo $job_id?>&user_id=<?php echo $user_id?>"
                                                    class="btn btn-danger"
                                                    style="padding: 10% 20%;margin-bottom:10%">Cancel</a>
                                            </td>

                                        </tr>
                                        <?php 
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
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