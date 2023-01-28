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

if (isset($_POST['submit_img'])) {

    $error = "";
    $cls="";
 
    $name = $_FILES['file']['name'];
    $target_dir = "assets/img/users/";
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
            $image_base64 = base64_encode(file_get_contents('assets/img/users/'.$name));
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

            // Update Record
            $query2 = "UPDATE users SET user_img='$name' WHERE username='$username'";
            $query_run2 = mysqli_query($conn, $query2);

            if ($query_run2) {
                echo "<script> alert('Profile Image Successfully Updated.');
                window.location.href='user_cv.php';</script>";
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
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $zip=$_POST['zip'];
    $about=$_POST['about'];

    $error = "";
    $cls="";

        // Update Record
        $query2 = "UPDATE users SET firstname='$firstname',lastname='$lastname',
        birthday='$birthday', email='$email', gender='$gender', contact='$contact',
        `address`='$address', city='$city', zip='$zip', about='$about' WHERE username='$username'";
        $query_run2 = mysqli_query($conn, $query2);
        
        if ($query_run2) {
            $cls="success";
            $error = "Profile Successfully Updated.";
        } 
        else {
            $cls="danger";
            $error = "Cannot Update Profile";
        }

}

if (isset($_POST['submit_edu'])) {

    $title_edu = $_POST['title_edu'];
    $org_edu = $_POST['org_edu'];
    $date=$_POST['date'];
    $about_edu=$_POST['about_edu'];


    $error = "";
    $cls="";

        // Update Record
        $query2 = "INSERT INTO user_education(user_id, title, org, `date`, about)
                        VALUES ('$user_id', '$title_edu','$org_edu', '$date', '$about_edu')";
        $query_run2 = mysqli_query($conn, $query2);
        
        if ($query_run2) {
            $cls="success";
            $error = "Education Successfully Added.";
        } 
        else {
            $cls="danger";
            $error = mysqli_error($conn);
        }

}

if (isset($_POST['submit_exp'])) {

    $title_exp = $_POST['title_exp'];
    $org_exp = $_POST['org_exp'];
    $date=$_POST['date'];
    $about_exp=$_POST['about_exp'];


    $error = "";
    $cls="";

        // Update Record
        $query2 = "INSERT INTO user_experience(user_id, title, org, `date`, about)
                        VALUES ('$user_id', '$title_exp','$org_exp', '$date', '$about_exp')";
        $query_run2 = mysqli_query($conn, $query2);
        
        if ($query_run2) {
            $cls="success";
            $error = "Experience Successfully Added.";
        } 
        else {
            $cls="danger";
            $error = mysqli_error($conn);
        }

}

if (isset($_POST['submit_skill'])) {

    $skill = $_POST['skill'];


    $error = "";
    $cls="";

        // Update Record
        $query2 = "INSERT INTO user_skills(user_id, title)
                        VALUES ('$user_id', '$skill')";
        $query_run2 = mysqli_query($conn, $query2);
        
        if ($query_run2) {
            $cls="success";
            $error = "Skill Successfully Added.";
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
                                <a href="user_appointments.php" class="nav-link link-dark">
                                    <i class="fa-solid fa-calendar-check"></i>
                                    My Appointments
                                </a>
                            </li>
                            <li>
                                <a href="user_cv.php" class="nav-link active bg-success" aria-current="page">
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
                                    <h2 style="font-weight:600">CV Builder</h2>
                                    <p><a href="user_home.php">Home</a> / CV Builder</p>
                                </div>
                            </div>
                            <hr style="margin-bottom:40px">
                            <div class="row">
                                <div class="col-lg-7 col-xl-8" style="padding-left: 40px">
                                    <div class="team-details-item">
                                        <div class="content">
                                            <h4 class="title">Personal Information</h4>
                                            <form action="" method="POST" enctype='multipart/form-data'>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="alert alert-<?php echo $cls;?>">
                                                            <?php 
                                                                if (isset($_POST['submit']) || isset($_POST['submit_img'])||isset($_POST['submit_edu'])||isset($_POST['submit_exp'])||isset($_POST['submit_skill'])){
                                                                    echo $error;
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" style="padding-top:10px">
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:10px">
                                                            <label style="padding-bottom:10px;">First Name</label>
                                                            <input type="text" class="form-control" name="firstname"
                                                                id="firstname" value="<?php echo $firstname?>"
                                                                placeholder="First Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:10px">
                                                            <label style="padding-bottom:10px;">Last Name</label>
                                                            <input type="text" class="form-control" name="lastname"
                                                                id="lastname" value="<?php echo $lastname?>"
                                                                placeholder="Last Name" required>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:10px">
                                                            <label style="padding-bottom:10px;">Gender</label>
                                                            <input type="text" class="form-control" name="gender"
                                                                id="gender" value="<?php echo $gender?>"
                                                                placeholder="Gender" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:10px">
                                                            <label style="padding-bottom:10px;">Birthday</label>
                                                            <input type="date" class="form-control" name="birthday"
                                                                id="birthday" value="<?php echo $birthday?>"
                                                                placeholder="Birthday" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:10px">
                                                            <label style="padding-bottom:10px;">Email</label>
                                                            <input type="email" class="form-control" name="email"
                                                                id="email" value="<?php echo $email?>"
                                                                placeholder="Email Address" required>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:10px">
                                                            <label style="padding-bottom:10px;">Contact</label>
                                                            <input type="text" class="form-control" name="contact"
                                                                id="contact" value="<?php echo $contact?>"
                                                                placeholder="Contact" required>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group" style="padding:10px">
                                                            <label style="padding-bottom:10px;">Address</label>
                                                            <input type="text" class="form-control" name="address"
                                                                id="address" value="<?php echo $address?>"
                                                                placeholder="Address" required>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:10px">
                                                            <label style="padding-bottom:10px;">City</label>
                                                            <input type="text" class="form-control" name="city"
                                                                id="city" value="<?php echo $city?>" placeholder="City"
                                                                required>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:10px">
                                                            <label style="padding-bottom:10px;">Zip</label>
                                                            <input type="text" class="form-control" name="zip" id="zip"
                                                                value="<?php echo $zip?>" placeholder="Zip" required>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group" style="padding:10px">
                                                            <label style="padding-bottom:10px;">About Me</label>
                                                            <textarea class="form-control" name="about" id="about"
                                                                col="10" placeholder="About Me" rows="6"
                                                                required> <?php echo $about?> </textarea>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end" style="padding-top:30px;">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb--0">
                                                            <button type="submit" name="submit"
                                                                class="btn-theme d-block w-100" type="submit">Update
                                                                Profile</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="candidate-details-wrap">
                                            <h4 class="content-title">Education</h4>


                                            <div class="candidate-details-content">
                                                <?php 
                                                    $sql = "SELECT * FROM user_education where user_id=$user_id";
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
                                                    <h4 class="title"><?php echo $title?><span>//</span>
                                                        <span><?php echo $date?></span></h4>
                                                    <h5 class="sub-title"><?php echo $org?></h5>
                                                    <p class="desc"><?php echo $about?></p>
                                                </div>
                                                <?php 
                                                        }
                                                    }
                                                ?>
                                                <hr>

                                            </div>
                                            <h5 class="title" style="padding:20px;">Add Education</h5>
                                            <form action="" method="POST" enctype='multipart/form-data'>

                                                <div class="row" style="padding-top:10px">
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:10px">
                                                            <label style="padding-bottom:10px;">Degree
                                                                Title</label>
                                                            <input type="text" class="form-control" name="title_edu"
                                                                id="title_edu" placeholder="Degree Title" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="padding:10px">
                                                            <label style="padding-bottom:10px;">Year</label>
                                                            <input type="text" class="form-control" name="date"
                                                                id="date" placeholder="Year" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group" style="padding:10px">
                                                            <label style="padding-bottom:10px;">Organization</label>
                                                            <input type="text" class="form-control" name="org_edu"
                                                                id="org_edu" placeholder="Organization" required>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group" style="padding:10px">
                                                            <label style="padding-bottom:10px;">About Me</label>
                                                            <textarea class="form-control" name="about_edu"
                                                                id="about_edu" col="10" placeholder="About Me" rows="6"
                                                                required></textarea>

                                                        </div>
                                                    </div>

                                                    <div class="d-flex justify-content-end" style="padding-top:30px;">
                                                        <div class="col-md-12">
                                                            <div class="form-group mb--0">
                                                                <button type="submit" name="submit_edu"
                                                                    class="btn-theme d-block w-100" type="submit">Add
                                                                    Education</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="candidate-details-wrap">
                                            <h4 class="content-title">Work & Experience</h4>
                                            <div class="candidate-details-content">
                                                <?php 
                                                    $sql = "SELECT * FROM user_experience where user_id=$user_id";
                                                    $result = mysqli_query($conn, $sql);
                                                    if($result){
                                                        while($row=mysqli_fetch_assoc($result)){
                                                        $id=$row['exp_id'];

                                                        $title=$row['title'];
                                                        $org=$row['org'];
                                                        $date=$row['date'];
                                                        $about=$row['about'];
                                                ?>
                                                <div class="content-item">
                                                    <h4 class="title"><?php echo $title?><span>//</span>
                                                        <span><?php echo $date?></span></h4>
                                                    <h5 class="sub-title"><?php echo $org?></h5>
                                                    <p class="desc"><?php echo $about?></p>
                                                </div>
                                                <?php 
                                                        }
                                                    }
                                                ?>

                                            </div>
                                            <hr>

                                            <h5 class="title" style="padding:20px;">Add Experience</h5>
                                            <div class="widget-contact-form">
                                                <form action="" method="POST" enctype='multipart/form-data'>

                                                    <div class="row" style="padding-top:10px">
                                                        <div class="col-md-6">
                                                            <div class="form-group" style="padding:10px">
                                                                <label style="padding-bottom:10px;">Work
                                                                    Title</label>
                                                                <input type="text" class="form-control" name="title_exp"
                                                                    id="title_exp" placeholder="Work Title" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group" style="padding:10px">
                                                                <label style="padding-bottom:10px;">Year</label>
                                                                <input type="text" class="form-control" name="date"
                                                                    id="date" placeholder="Year" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group" style="padding:10px">
                                                                <label style="padding-bottom:10px;">Organization</label>
                                                                <input type="text" class="form-control" name="org_exp"
                                                                    id="org_exp" placeholder="Organization" required>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group" style="padding:10px">
                                                                <label style="padding-bottom:10px;">About Me</label>
                                                                <textarea class="form-control" name="about_exp"
                                                                    id="about_exp" col="10" placeholder="About Me"
                                                                    rows="6" required></textarea>

                                                            </div>
                                                        </div>

                                                        <div class="d-flex justify-content-end"
                                                            style="padding-top:30px;">
                                                            <div class="col-md-12">
                                                                <div class="form-group mb--0">
                                                                    <button type="submit" name="submit_exp"
                                                                        class="btn-theme d-block w-100"
                                                                        type="submit">Add
                                                                        Experience</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-5 col-xl-4">
                                    <div class="team-sidebar">
                                        <div class="widget-item">
                                            <div class="widget-title">
                                                <h3 class="title">Profile Image</h3>
                                            </div>
                                            <div class="summery-info">
                                                <form action="" method="POST" enctype='multipart/form-data'>
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="col-md-12" style="width: 200px; height: 200px;">
                                                            <img src="./assets/img/users/<?php echo $user_img?>"
                                                                width="100%" height="100%">
                                                        </div>
                                                        <div class="col-md-12" style="padding-top:20px;">
                                                            <label for="file" class="form-label">Profile Image</label>
                                                            <input class="form-control" type="file" name="file"
                                                                id="file">
                                                            <div class="d-flex justify-content-center"
                                                                style="padding-top:40px;">

                                                                <div class="col-md-12">
                                                                    <div class="form-group mb--0">
                                                                        <button type="submit_img" name="submit_img"
                                                                            class="btn-theme d-block w-100"
                                                                            type="submit">Update Image</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="widget-item widget-contact">
                                            <div class="widget-title">
                                                <h3 class="title">Skills</h3>
                                            </div>
                                            <div class="widget-contact-form">
                                                <ul class="team-details-list mb--0">
                                                    <?php 
                                                    $sql = "SELECT * FROM user_skills where user_id=$user_id";
                                                    $result = mysqli_query($conn, $sql);
                                                    if($result){
                                                        while($row=mysqli_fetch_assoc($result)){
                                                        $id=$row['skill_id'];

                                                        $skill=$row['title'];
                                                       
                                                ?>
                                                    <li><i class="icofont-check"></i><?php echo $skill?></li>
                                                    <?php 
                                                        }
                                                    }
                                                ?>

                                                </ul>
                                                <hr>
                                                <h5 class="title" style="padding:20px;">Add Skill</h5>

                                                <form action="" method="POST">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input class="form-control" type="text" name="skill"
                                                                    placeholder="Skill Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group mb--0">
                                                                <button type="submit_img" name="submit_skill"
                                                                    class="btn-theme d-block w-100" type="submit"
                                                                    style="margin-top:30px;">Add
                                                                    Skill</button>
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