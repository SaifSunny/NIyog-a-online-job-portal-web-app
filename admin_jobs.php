<?php
include_once("./database/config.php");
date_default_timezone_set('Asia/Dhaka');
session_start();

if (!isset($_SESSION['adminname'])) {
    header("Location: admin_login.php");
}

$username = $_SESSION['adminname'];

$sql = "SELECT * FROM `admin` WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$admin_img=$row['admin_img'];

$_SESSION['image'] = $admin_img;

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
                        <a href="admin_home.php"
                            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none"
                            style="padding:4px 20px">
                            <img class="logo-main" src="assets/img/logo-dark.png" alt="Logo" width="90%" />
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="admin_home.php" class="nav-link link-dark" aria-current="page">
                                    <i class="fa fa-home"></i>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="admin_category.php" class="nav-link link-dark">
                                    <i class="fa-solid fa-square-plus"></i>
                                    Manage Category
                                </a>
                            </li>
                            <li>
                                <a href="admin_users.php" class="nav-link link-dark">
                                    <i class="fa fa-users"></i>
                                    Manage Users
                                </a>
                            </li>
                            <li>
                                <a href="admin_company.php" class="nav-link link-dark">
                                    <i class="fa-solid fa-user-secret"></i>
                                    Manage Company
                                </a>
                            </li>
                            <li>
                                <a href="admin_jobs.php" class="nav-link active bg-success">
                                    <i class="fa-solid fa-list"></i>
                                    Manage Job Posts
                                </a>
                            </li>
                        </ul>
                        <hr>
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                                id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="assets/img/admin/<?php echo $admin_img?>" alt="" width="32" height="32"
                                    class="rounded-circle me-2">
                                <strong><?php echo $username?></strong>
                            </a>
                            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                                <li><a class="dropdown-item" href="admin_profile.php"><i class="fa-solid fa-user"></i>
                                        Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
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
                        <div class="container" style="padding:2%;margin-top:2%;padding-left:2%">
                            <div class="row">
                                <div class="col-10">
                                    <h2 style="font-weight:600">Manage Jobs</h2>
                                    <p><a href="admin_home.php">Home</a> /
                                        Manage Jobs</p>
                                </div>
                                <div class="col-md-2" style="margin-top:20px;">
                                    <a href="admin_job_add.php" class="btn btn-success"><i class='fa fa-plus'></i> Add
                                        Job</a>
                                </div>
                            </div>
                            <hr style="margin-bottom:40px">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table" style="font-size: 14px;padding: 20px;">
                                        <thead>
                                            <th>ID</th>
                                            <th>Job Position</th>
                                            <th>Category</th>
                                            <th>Company Name</th>
                                            <th>Post Date</th>
                                            <th>Salary</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </thead>

                                        <tbody style="font-size:16px;">
                                            <?php 
                                            $sql = "SELECT * FROM jobs order by job_id desc";
                                            $result = mysqli_query($conn, $sql);
                                            if($result){
                                                while($row=mysqli_fetch_assoc($result)){
                                                $id=$row['job_id'];

                                                $company_id=$row['company_id'];
                                                $category_id=$row['category_id'];
                                                $job_title=$row['job_title'];
                                                $post_date=$row['post_date'];
                                                $salary=$row['salary'];
                                                $finalize_id=$row['finalize_id'];

                                                $sql1 = "SELECT * FROM category where category_id = $category_id";
                                                $result1 = mysqli_query($conn, $sql1);
                                                $row1=mysqli_fetch_assoc($result1);
                                                $category_name=$row1['category_name'];

                                                $sql2 = "SELECT * FROM company where company_id =$company_id";
                                                $result2 = mysqli_query($conn, $sql2);
                                                $row2=mysqli_fetch_assoc($result2);
                                                $company_name=$row2['company_name'];

                                                if($finalize_id == 1){
                                                    $type = "success";
                                                    $msg = "Hired";
                                                }else{
                                                    $type = "danger";
                                                    $msg = "To be Hired";
                                                }

                                        ?>
                                            <tr style="margin-top:10px;vertical-align:middle">
                                                <td><?php echo $id ?></td>
                                                <td> <h5><?php echo $job_title?></h5>
                                                </td>
                                                <td><?php echo $category_name ?></td>
                                                <td><?php echo $company_name ?></td>
                                                <td><?php echo $post_date ?></td>
                                                <td><?php echo $salary ?></td>
                                                <td><button
                                                            style="border-radius: 40px; padding:5px 14px; font-size:10px; font-weight:600"
                                                            class="btn btn-<?php echo $type?>"><?php echo $msg?></button></td>

                                                <td><a href="admin_job_delete.php?id=<?php echo $id?>"
                                                        class="btn btn-danger" style="padding-right:3px;"><i
                                                            class="fa fa-trash"></i></a>
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