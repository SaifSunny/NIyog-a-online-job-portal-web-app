<?php
include_once("./database/config.php");
date_default_timezone_set('Asia/Dhaka');
#starting session

session_start();

if (!isset($_SESSION['companyname'])) {
    header("Location: company_login.php");
}

$username = $_SESSION['companyname'];
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

$sql1 = "SELECT * FROM category WHERE category_id='$category_id'";
$result1 = mysqli_query($conn, $sql1);
$row1=mysqli_fetch_assoc($result1);
$category_name=$row1['category_name'];


if (isset($_POST['submit'])) {

    $category_id = $_POST['category'];
    $description = $_POST['description'];
    $job_title = $_POST['job_title'];
    $job_type = $_POST['job_type'];
    $salary = $_POST['salary'];
    $experience = $_POST['experience'];
    $qualification = $_POST['qualification'];
    $level = $_POST['level'];
    $deadline = $_POST['deadline'];
    $date = date("l jS \ F Y h:i A");

    $error = "";
    $cls="";

        // Update Record
        $query2 = "UPDATE jobs SET category_id='$category_id',description='$description',
        job_title='$job_title', job_type='$job_type', salary='$salary', experience='$experience',
        `qualification`='$qualification', level='$level', deadline='$deadline' WHERE job_id='$job_id'";
        $query_run2 = mysqli_query($conn, $query2);
        
        if ($query_run2) {
            $cls="success";
            $error = "Job Information Successfully Updated.";
        } 
        else {
            $cls="danger";
            $error =mysqli_error($conn);
        }

}

if (isset($_POST['submit_res'])) {

    $responsibility=$_POST['responsibility'];


    $error = "";
    $cls="";

        // Update Record
        $query2 = "INSERT INTO job_responsibility(job_id, responsibility)
                        VALUES ('$job_id', '$responsibility')";
        $query_run2 = mysqli_query($conn, $query2);
        
        if ($query_run2) {
            $cls="success";
            $error = "Responsibility Successfully Added.";
        } 
        else {
            $cls="danger";
            $error = mysqli_error($conn);
        }

}

if (isset($_POST['submit_req'])) {

    $requirements=$_POST['requirements'];


    $error = "";
    $cls="";

        // Update Record
        $query2 = "INSERT INTO job_requirement(job_id, requirement)
                        VALUES ('$job_id', '$requirements')";
        $query_run2 = mysqli_query($conn, $query2);
        
        if ($query_run2) {
            $cls="success";
            $error = "Requirements Successfully Added.";
        } 
        else {
            $cls="danger";
            $error = mysqli_error($conn);
        }

}

if (isset($_POST['submit_benifit'])) {

    $benifit = $_POST['benifit'];


    $error = "";
    $cls="";

        // Update Record
        $query2 = "INSERT INTO job_benifit(job_id, benifit)
                        VALUES ('$job_id', '$benifit')";
        $query_run2 = mysqli_query($conn, $query2);
        
        if ($query_run2) {
            $cls="success";
            $error = "Job Benifit Successfully Added.";
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
                    <!--== Start Team Details Area Wrapper ==-->
                    <section class="team-details-area">
                        <div class="container" style="padding:2%;margin-top:2%;padding-left:1%">
                            <div class="row">
                                <div class="col-12">
                                    <h2 style="font-weight:600">Job Details</h2>
                                    <p><a href="company_home.php">Home</a> / <a href="company_jobs.php">Job Posts</a> /
                                        Job Details</p>
                                </div>
                            </div>
                            <hr style="margin-bottom:40px">
                            <div class="row">
                                <div class="col-lg-7 col-xl-12" style="padding-left: 40px">
                                    <div class="team-details-item">
                                        <div class="content">
                                            <h4 class="title">Job Information</h4>
                                            <form action="" method="POST" enctype='multipart/form-data'>
                                                <div class="row ">
                                                    <div class="col-md-9">
                                                        <div class="alert alert-<?php echo $cls;?>">
                                                            <?php 
                                                                if (isset($_POST['submit']) || isset($_POST['submit_res'])||isset($_POST['submit_req'])||isset($_POST['submit_benifit'])){
                                                                    echo $error;
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row  col-md-9">

                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:18px">
                                                            <label style="padding-bottom:10px">Job Title</label>
                                                            <input type="text" class="form-control" name="job_title"
                                                                id="job_title" placeholder="Job Title"
                                                                value="<?php echo $job_title?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:10px">
                                                            <label style="padding-bottom:20px;">Category</label>
                                                            <select class="form-control" name="category" id="category"
                                                                required>
                                                                <option value="<?php echo $category_id?>">
                                                                    <?php echo $category_name?></option>
                                                                <?php
                                                                                $option = "SELECT * FROM category";
                                                                                $option_run = mysqli_query($conn, $option);

                                                                                if (mysqli_num_rows($option_run) > 0) {
                                                                                    foreach ($option_run as $row2) {
                                                                                ?>
                                                                <option value="<?php echo $row2['category_id']; ?>">
                                                                    <?php echo $row2['category_name'];?>
                                                                </option>
                                                                <?php
                                                                                    }
                                                                                }
                                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:18px">
                                                            <label style="padding-bottom:10px">Job Type</label>

                                                            <select name="job_type" id="job_type" class="form-control">
                                                                <option><?php echo $job_type?></option>
                                                                <option>Part Time</option>
                                                                <option>Full Time</option>
                                                                <option>Freelance</option>
                                                                <option>Seasonal</option>
                                                                <option>Temporary</option>
                                                                <option>Probation</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:18px">
                                                            <label style="padding-bottom:10px">Job Level</label>
                                                            <input type="text" class="form-control" name="level"
                                                                id="level" placeholder="Job Level"
                                                                value="<?php echo $level?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:18px">
                                                            <label style="padding-bottom:10px">Qualification</label>
                                                            <input type="text" class="form-control" name="qualification"
                                                                id="qualification" placeholder="Qualification"
                                                                value="<?php echo $qualification?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:18px">
                                                            <label style="padding-bottom:10px">Experience</label>
                                                            <input type="text" class="form-control" name="experience"
                                                                id="experience" placeholder="Experience"
                                                                value="<?php echo $experience?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:18px">
                                                            <label style="padding-bottom:10px">Job Salary</label>
                                                            <input type="text" class="form-control" name="salary"
                                                                id="salary" placeholder="Job Salary"
                                                                value="<?php echo $salary?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:18px">
                                                            <label style="padding-bottom:10px">Application
                                                                Deadline</label>
                                                            <input type="date" class="form-control" name="deadline"
                                                                id="deadline" placeholder="Application Deadline"
                                                                value="<?php echo $deadline?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group" style="padding:18px">
                                                            <label style="padding-bottom:10px">Job Description</label>

                                                            <textarea name="description" class="form-control" rows="8"
                                                                id="description"
                                                                placeholder="Job Description"><?php echo $description?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end" style="padding-top:30px;">
                                                        <div class="col-md-12">
                                                            <div class="form-group mb--0">
                                                                <button type="submit" name="submit"
                                                                    class="btn-theme d-block w-100" type="submit">Update
                                                                    Job Information</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="candidate-details-wrap">
                                            <h4 class="content-title">Job Responsibilities</h4>

                                            <div class="widget-contact-form">
                                                <ul class="team-details-list mb--0">
                                                    <?php 
                                                        $sql = "SELECT * FROM job_responsibility";
                                                        $result = mysqli_query($conn, $sql);
                                                        if($result){
                                                            while($row=mysqli_fetch_assoc($result)){
                                                            $res_id=$row['res_id'];

                                                            $responsibility=$row['responsibility'];
                                                        
                                                    ?>
                                                    <li>
                                                        <div class="d-flex justify-content-between">
                                                            <div style="margin-top:10px;">
                                                                <i class="icofont-check"></i><?php echo $responsibility?>
                                                            </div>
                                                            <div >
                                                                <a href="company_responsibility_delete.php?job_id=<?php echo $job_id?>&res_id=<?php echo $res_id?>" class="btn btn-danger" style="margin:5px;padding:10px 20px;font-size:12px;"><i  style="font-size:13px; padding:1px 0px 1px 1px;margin:0"
                                                                        class="fa fa-trash"></i></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php 
                                                        }
                                                    }
                                                ?>

                                                </ul>

                                            </div>
                                            <hr>
                                            <h5 class="title" style="padding:10px;">Add Responsibility</h5>
                                            <form action="" method="POST" enctype='multipart/form-data' class = " col-md-9">

                                                <div class="row" style="padding-top:10px">
                                                    <div class="col-md-12">
                                                        <div class="form-group" style="padding:10px">
                                                            <label style="padding-bottom:10px;">Responsibility</label>
                                                            <textarea class="form-control" name="responsibility"
                                                                id="responsibility" col="10"
                                                                placeholder="Responsibility" rows="4"
                                                                required></textarea>

                                                        </div>
                                                    </div>

                                                    <div class="d-flex justify-content-end" style="padding-top:30px;">
                                                        <div class="col-md-12">
                                                            <div class="form-group mb--0">
                                                                <button type="submit" name="submit_res"
                                                                    class="btn-theme d-block w-100" type="submit">Add
                                                                    Responsibility</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="candidate-details-wrap">
                                            <h4 class="content-title">Job Requirements</h4>
                                            <div class="widget-contact-form">
                                                <ul class="team-details-list mb--0">
                                                    <?php 
                                                        $sql = "SELECT * FROM job_requirement";
                                                        $result = mysqli_query($conn, $sql);
                                                        if($result){
                                                            while($row=mysqli_fetch_assoc($result)){
                                                            $req_id=$row['req_id'];

                                                            $requirement=$row['requirement'];
                                                        
                                                    ?>
                                                    <li>
                                                        <div class="d-flex justify-content-between">
                                                            <div  style="margin-top:10px;">
                                                                <i
                                                                    class="icofont-check"></i><?php echo $requirement?>
                                                            </div>
                                                            <div >
                                                                <a href="company_requirement_delete.php?job_id=<?php echo $job_id?>&req_id=<?php echo $req_id?>" class="btn btn-danger" style="margin:5px;padding:10px 20px;font-size:12px;"><i  style="font-size:13px; padding:1px 0px 1px 1px;margin:0"
                                                                        class="fa fa-trash"></i></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php 
                                                        }
                                                    }
                                                ?>

                                                </ul>

                                            </div>
                                            <hr>

                                            <h5 class="title" style="padding:20px;">Add Requirement</h5>
                                            <div class="widget-contact-form  col-md-9">
                                                <form action="" method="POST" enctype='multipart/form-data'>

                                                    <div class="row" style="padding-top:10px">

                                                        <div class="col-md-12">
                                                            <div class="form-group" style="padding:10px">
                                                                <label style="padding-bottom:10px;">Requirements</label>
                                                                <textarea class="form-control" name="requirements"
                                                                    id="requirements" placeholder="Requirements"
                                                                    rows="4" required></textarea>

                                                            </div>
                                                        </div>

                                                        <div class="d-flex justify-content-end"
                                                            style="padding-top:30px;">
                                                            <div class="col-md-12">
                                                                <div class="form-group mb--0">
                                                                    <button type="submit" name="submit_req"
                                                                        class="btn-theme d-block w-100"
                                                                        type="submit">Add
                                                                        Requirement</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="candidate-details-wrap">
                                            <h4 class="content-title">Job Benifits</h4>
                                            <div class="widget-contact-form">
                                                <ul class="team-details-list mb--0">
                                                    <?php 
                                                    $sql = "SELECT * FROM job_benifit";
                                                    $result = mysqli_query($conn, $sql);
                                                    if($result){
                                                        while($row=mysqli_fetch_assoc($result)){
                                                        $benifit_id=$row['benifit_id'];

                                                        $benifit=$row['benifit'];
                                                       
                                                ?>
                                                    <li>
                                                        <div class="d-flex justify-content-between">
                                                            <div  style="margin-top:10px;">
                                                                <i
                                                                    class="icofont-check"></i><?php echo $benifit?>
                                                            </div>
                                                            <div >
                                                                <a href="company_benifit_delete.php?job_id=<?php echo $job_id?>&benifit_id=<?php echo $benifit_id?>" class="btn btn-danger" style="margin:5px;padding:10px 20px;font-size:12px;"><i  style="font-size:13px; padding:1px 0px 1px 1px;margin:0"
                                                                        class="fa fa-trash"></i></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php 
                                                        }
                                                    }
                                                ?>

                                                </ul>

                                            </div>
                                            <hr>

                                            <h5 class="title" style="padding:20px;">Add Benifit</h5>
                                            <div class="widget-contact-form col-md-9">
                                                <form action="" method="POST" enctype='multipart/form-data'>

                                                    <div class="row" style="padding-top:10px">

                                                        <div class="col-md-12">
                                                            <div class="form-group" style="padding:10px">
                                                                <label style="padding-bottom:10px;">Job Benifits</label>
                                                                <textarea class="form-control" name="benifit"
                                                                    id="benifit" placeholder="Job Benifit"
                                                                    rows="4" required></textarea>

                                                            </div>
                                                        </div>

                                                        <div class="d-flex justify-content-end"
                                                            style="padding-top:30px;">
                                                            <div class="col-md-12">
                                                                <div class="form-group mb--0">
                                                                    <button type="submit" name="submit_benifit"
                                                                        class="btn-theme d-block w-100"
                                                                        type="submit">Add
                                                                        Benifit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
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