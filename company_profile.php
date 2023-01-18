<?php
include_once("./database/config.php");
date_default_timezone_set('Asia/Dhaka');
session_start();

if (!isset($_SESSION['companyname'])) {
    header("Location: company_login.php");
}

$username = $_SESSION['companyname'];

$sql = "SELECT * FROM `company` WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$company_img=$row['company_img'];
$company_name=$row['company_name'];
$established=$row['established'];
$website=$row['website'];
$contact=$row['contact'];
$email=$row['email'];
$address=$row['address'];
$city=$row['city'];
$zip=$row['zip'];

if (isset($_POST['submit_img'])) {

    $error = "";
    $cls="";
 
    $name = $_FILES['file']['name'];
    $target_dir = "assets/img/companies/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){

        // Upload file
        if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){

            // Convert to base64 
            $image_base64 = base64_encode(file_get_contents('assets/img/companies/'.$name));
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

            // Update Record
            $query2 = "UPDATE company SET `company_img`='$name' WHERE username='$username'";
            $query_run2 = mysqli_query($conn, $query2);

            if ($query_run2) {
                echo "<script> alert('Profile Image Successfully Updated.');
                window.location.href='user_home.php';</script>";
            } 
            else {
                $cls="danger";
                $error = mysqli_error($conn);
            }

        }else{
            $cls="danger";
            $error = 'Unknown Error Occurred.';
        }
    }else{
        $cls="danger";
        $error = 'Invalid File Type';
    }   
}

if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender=$_POST['gender'];
    $birthday=$_POST['birthday'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $zip=$_POST['zip'];

    $error = "";
    $cls="";

        // Update Record
        $query2 = "UPDATE company SET firstname='$firstname',lastname='$lastname',
        birthday='$birthday', gender='$gender', contact='$contact',email='$email',
        `address`='$address', city='$city', zip='$zip' WHERE username='$username'";
        $query_run2 = mysqli_query($conn, $query2);
        
        if ($query_run2) {
            $cls="success";
            $error = "Profile Successfully Updated.";
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
                <div class="col-md-10" style="margin-bottom:50px;">
                    <!--== Start Team Details Area Wrapper ==-->
                    <section class="team-details-area">
                        <div class="container" style="padding:2%;margin-top:2%;padding-left:2%">
                            <div class="row">
                                <div class="col-10">
                                    <h2 style="font-weight:600">My Profile</h2>
                                    <p><a href="company_home.php">Home</a> /
                                        My Profile</p>
                                </div>
                            </div>
                            <hr style="margin-bottom:20px">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-<?php echo $cls;?>">
                                                <?php 
                                                    if (isset($_POST['submit']) || isset($_POST['submit_img'])){
                                                        echo $error;
                                                }?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">Company Name</label>
                                                <input type="text" class="form-control" name="company_name"
                                                    id="company_name" value="<?php echo $company_name?>"
                                                    placeholder="Company Name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">Established</label>
                                                <input type="date" class="form-control" name="established"
                                                    id="established" value="<?php echo $established?>"
                                                    placeholder="Established" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">Website</label>
                                                <input type="text" class="form-control" name="website" id="website"
                                                    value="<?php echo $website?>" placeholder="Website" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">Contact</label>
                                                <input type="text" class="form-control" name="contact" id="contact"
                                                    value="<?php echo $contact?>" placeholder="Contact" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">Email</label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    value="<?php echo $email?>" placeholder="Email Address" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">Address</label>
                                                <input type="text" class="form-control" name="address" id="address"
                                                    value="<?php echo $address?>" placeholder="Address" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">City</label>
                                                <input type="text" class="form-control" name="city" id="city"
                                                    value="<?php echo $city?>" placeholder="City" required>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" style="padding:10px">
                                                <label style="padding-bottom:10px;">Zip</label>
                                                <input type="text" class="form-control" name="zip" id="zip"
                                                    value="<?php echo $zip?>" placeholder="Zip" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end" style="padding-top:10px;">
                                        <button type="submit" name="submit" class="btn btn-success"
                                            style="margin-right:10px;color:white;"><i class="fa fa-edit"></i>
                                            Update</button>
                                    </div>
                                </div>
                                <div class="col-md-4" style="margin-top:50px">
                                    <div class="col-md-12">
                                        <div class="col-md-12" style="width: 250px; height: 250px;">
                                            <img src="./assets/img/companies/<?php echo $company_img;?>" width="100%"
                                                height="100%"
                                                style="text-align:center; margin-left:60px;border-radius:50%; border: 5px solid #5c85c;">
                                        </div>
                                        <div class="col-md-12" style="padding-top:20px;color:#222;font-weight:500;">
                                            <div class="text-center" style="padding-top:10px;">
                                                <label for="file" class="form-label">Company Logo</label>

                                                <input type="file" name="file" id="file" style="padding-left:80px">

                                            </div>

                                            <div class="d-flex justify-content-center" style="padding-top:10px;">
                                                <button type="submit" name="submit_img" class="btn btn-success"
                                                    style="margin-top:10px;color:white;"><i class="fa fa-edit"></i>
                                                    Update
                                                    Logo</button>
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