<?php
include_once("./database/config.php");
date_default_timezone_set('Asia/Dhaka');
#starting session

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: user_login.php");
}

$username = $_SESSION['username'];

$sql2 = "SELECT * FROM users WHERE username='$username'";
$result2 = mysqli_query($conn, $sql2);
$row2=mysqli_fetch_assoc($result2);

$user_id=$row2['user_id'];
$user_img=$row2['user_img'];
$firstname=$row2['firstname'];
$lastname=$row2['lastname'];
$gender=$row2['gender'];
$birthday=$row2['birthday'];
$contact=$row2['contact'];
$email=$row2['email'];
$address=$row2['address']." ".$row2['city']."-".$row2['zip'];

$job_id = $_GET['job_id'];

$sql = "SELECT * FROM jobs WHERE job_id='$job_id'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$category_id=$row['category_id'];
$company_id=$row['company_id'];
$description=$row['description'];
$job_title=$row['job_title'];
$job_type=$row['job_type'];
$salary=$row['salary'];
$experience=$row['experience'];
$qualification=$row['qualification'];
$level=$row['level'];
$deadline=$row['deadline'];
$post_date=$row['post_date'];

$sql1 = "SELECT * FROM category WHERE category_id='$category_id'";
$result1 = mysqli_query($conn, $sql1);
$row1=mysqli_fetch_assoc($result1);
$category_name=$row1['category_name'];

$sql3 = "SELECT * FROM company WHERE company_id='$company_id'";
$result3 = mysqli_query($conn, $sql3);
$row3=mysqli_fetch_assoc($result3);
$company_name=$row3['company_name'];
$company_img=$row3['company_img'];
$caddress=$row3['address']." ".$row3['city']."-".$row3['zip'];
$ccontact=$row3['contact'];
$cemail=$row3['email'];


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
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap"
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
          <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="height:100vh;position:fixed;width:17%">
            <a href="user_home.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none"
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
                <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>
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
                  <h2 style="font-weight:600">Job Details</h2>
                  <p><a href="user_home.php">Home</a> / <a href="user_jobs.php">Find Jobs</a> / Job Details</p>
                </div>
              </div>
              <hr style="margin-bottom:40px">
              <div class="row">

                <div class="col-12">
                  <div class="job-details-wrap">
                    <div class="job-details-info">
                      <div class="thumb">
                        <img src="assets/img/companies/<?php echo $company_img?>" width="130" height="130" alt="Image-HasTech">
                      </div>
                      <div class="content">
                        <h4 class="title"><?php echo $job_title?></h4>
                        <h5 class="sub-title"><?php echo $company_name?></h5>
                        <ul class="info-list">
                          <li><i class="icofont-location-pin"></i> <?php echo $caddress?></li>
                          <li><i class="icofont-email"></i> <?php echo $cemail?></li>
                          <li><i class="icofont-phone"></i> <?php echo $ccontact?></li>
                        </ul>
                      </div>
                    </div>
                    <div class="job-details-price">
                      <h4 class="title">Tk. <?php echo $salary?> <span>/monthly</span></h4>
                      <?php
                            $sql = "SELECT * FROM job_applicant WHERE job_id = '$job_id' AND user_id = '$user_id'";
                            $result = mysqli_query($conn, $sql);
                        
                            if ($result->num_rows > 0) {
                              ?>
                      <a class="btn-theme" name="submit">Already Allpied</a>

                              <?php
                            }else{
                      ?>
                      <a href="user_job_apply.php?job_id=<?php echo $job_id?>&user_id=<?php echo $user_id?>" type="button" class="btn-theme" name="submit">Apply Now</a>
                      <?php
                            }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-7 col-xl-8">
                  <div class="job-details-item">
                    <div class="content">
                      <h4 class="title">Description</h4>
                      <p class="desc"><?php echo $description?></p>

                    </div>
                    <div class="content">
                      <h4 class="title">Responsibilities</h4>
                      <ul class="job-details-list">
                      <?php 
                                                        $sql = "SELECT * FROM job_responsibility";
                                                        $result = mysqli_query($conn, $sql);
                                                        if($result){
                                                            while($row=mysqli_fetch_assoc($result)){
                                                            $res_id=$row['res_id'];

                                                            $responsibility=$row['responsibility'];
                                                        
                                                    ?>
                        <li><i class="icofont-check"></i> <?php echo $responsibility?></li>
                          <?php 
                                                        }
                                                    }
                                                ?>
                      </ul>
                    </div>
                    <div class="content">
                      <h4 class="title">Requirements</h4>
                      <ul class="job-details-list">
                      <?php 
                                                        $sql = "SELECT * FROM job_requirement";
                                                        $result = mysqli_query($conn, $sql);
                                                        if($result){
                                                            while($row=mysqli_fetch_assoc($result)){
                                                            $req_id=$row['req_id'];

                                                            $requirement=$row['requirement'];
                                                        
                                                    ?>
                        <li><i class="icofont-check"></i> <?php echo $requirement?></li>
                          <?php 
                                                        }
                                                    }
                                                ?>
                      </ul>
                    </div>
                    <div class="content">
                      <h4 class="title">Educational Requirements</h4>
                      <p class="desc"><?php echo $qualification?></p>
                    </div>

                    <div class="content">
                      <h4 class="title">Benefits</h4>
                      <ul class="job-details-list">
                      <?php 
                                                    $sql = "SELECT * FROM job_benifit";
                                                    $result = mysqli_query($conn, $sql);
                                                    if($result){
                                                        while($row=mysqli_fetch_assoc($result)){
                                                        $benifit_id=$row['benifit_id'];

                                                        $benifit=$row['benifit'];
                                                       
                                                ?>
                        <li><i class="icofont-check"></i> <?php echo $benifit?>
                        </li>
                        <?php 
                                                        }
                                                    }
                                                ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-5 col-xl-4">
                  <div class="job-sidebar">
                    <div class="widget-item">
                      <div class="widget-title">
                        <h3 class="title">Summery</h3>
                      </div>
                      <div class="summery-info">
                        <table class="table">
                          <tbody>
                            <tr>
                              <td class="table-name">Job Type</td>
                              <td class="dotted">:</td>
                              <td data-text-color="#03a84e"><?php echo $job_type?></td>
                            </tr>
                            <tr>
                              <td class="table-name">Category</td>
                              <td class="dotted">:</td>
                              <td><?php echo $category_name?></td>
                            </tr>
                            <tr>
                              <td class="table-name">Posted</td>
                              <td class="dotted">:</td>
                              <td><?php echo $post_date?></td>
                            </tr>
                            <tr>
                              <td class="table-name">Salary</td>
                              <td class="dotted">:</td>
                              <td>Tk. <?php echo $salary?> / Monthly</td>
                            </tr>
                            <tr>
                              <td class="table-name">Experience</td>
                              <td class="dotted">:</td>
                              <td><?php echo $experience?></td>
                            </tr>

                            <tr>
                              <td class="table-name">Level</td>
                              <td class="dotted">:</td>
                              <td><?php echo $level?></td>
                            </tr>
                            <tr>
                              <td class="table-name">Applied</td>
                              <td class="dotted">:</td>
                              <td>26 Applicant</td>
                            </tr>
                            <tr>
                              <td class="table-name">Application End</td>
                              <td class="dotted">:</td>
                              <td data-text-color="#ff6000"><?php echo $deadline?></td>
                            </tr>
                          </tbody>
                        </table>
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