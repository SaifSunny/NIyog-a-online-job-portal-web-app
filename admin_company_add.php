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


if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $company_name = $_POST['company_name'];
    $category_id = $_POST['category'];
    $established = $_POST['established'];
    $website = $_POST['website'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];

    $date = date("Y-m-d");

    $p = $_POST['password'];
    $error = "";
    $cls="";
 
    $name = $_FILES['file']['name'];
    $target_dir = "assets/img/companies/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    if (strlen($p) > 5) {
    
        $query = "SELECT * FROM company WHERE username = '$username'";
        $query_run = mysqli_query($conn, $query);
        if (!$query_run->num_rows > 0) {

            $query = "SELECT * FROM company WHERE username = '$username' AND email = '$email'";
            $query_run = mysqli_query($conn, $query);
            if(!$query_run->num_rows > 0){

                // Check extension
                if( in_array($imageFileType,$extensions_arr) ){

                    // Upload file
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){

                        // Convert to base64 
                        $image_base64 = base64_encode(file_get_contents('assets/img/companies/'.$name));
                        $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

                        // Insert record

                        $query2 = "INSERT INTO company(username,email,`password`,company_name,category_id,contact,established, company_img, `address`, city, zip,website)
                        VALUES ('$username', '$email', '$password', '$company_name', '$category_id', '$contact', '$established','$name', '$address', '$city', '$zip', '$website')";
                        $query_run2 = mysqli_query($conn, $query2);
            
                        if ($query_run2) {
                            $cls="success";
                            $error = "Company Successfully Added.";
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
            else{
                $cls="danger";
                $error = "User Already Exists";
            }
            
        }else{
            $cls="danger";
            $error = "Username Already Exists";
        }
    }else{
        $cls="danger";
        $error = 'Password has to be minimum of 6 charecters.';
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
                                <a href="admin_company.php" class="nav-link active bg-success">
                                    <i class="fa-solid fa-user-secret"></i>
                                    Manage Company
                                </a>
                            </li>
                            <li>
                                <a href="admin_jobs.php" class="nav-link link-dark">
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
                                    <h2 style="font-weight:600">Add Company</h2>
                                    <p><a href="admin_home.php">Home</a> / <a href="admin_company.php">Manage
                                            Companies</a> /
                                        Add Company</p>
                                </div>
                                <div class="col-md-2" style="margin-top:20px;">
                                    <a href="admin_company_add.php" class="btn btn-success"><i class='fa fa-plus'></i>
                                        Add
                                        Company</a>
                                </div>
                            </div>
                            <hr style="margin-bottom:40px">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <form action="" method="POST" enctype='multipart/form-data'
                                                style="padding:0 40px">
                                                <div class="row" style="color:#222;">
                                                    <div class="col-md-12">

                                                        <div class="alert alert-<?php echo $cls;?>">
                                                            <?php 
                                                                if (isset($_POST['submit'])){
                                                                    echo $error;
                                                                }
                                                            ?>
                                                        </div>
                                                        <div class="row" class="d-flex justify-content-between">
                                                            <div class="col-md-9">
                                                                <div class="form-group" style="padding:10px">
                                                                    <label style="padding-bottom:20px;">Company
                                                                        Logo</label>
                                                                    <input type="file" name="file" id="file"
                                                                        class="form-control">
                                                                </div>

                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="col-md-12"
                                                                    style="width: 150px; height: 150px;">
                                                                    <img src="./assets/img/users/user.png" width="100%"
                                                                        height="100%"
                                                                        style="text-align:center; margin-left:30px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group" style="padding:10px">
                                                                    <label style="padding-bottom:20px;">Company
                                                                        Name</label>
                                                                    <input type="text" class="form-control"
                                                                        name="company_name" id="company_name"
                                                                        placeholder="Company Name">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group" style="padding:10px">
                                                                    <label style="padding-bottom:20px;">Establish
                                                                        Date</label>
                                                                    <input type="date" class="form-control"
                                                                        name="established" id="established"
                                                                        placeholder="Establish Date">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group" style="padding:10px">
                                                                    <label style="padding-bottom:20px;">Category</label>
                                                                    <select class="form-control" name="category"
                                                                        id="category" required>
                                                                        <option>-- Select Category --</option>
                                                                        <?php
                                                                                $option = "SELECT * FROM category";
                                                                                $option_run = mysqli_query($conn, $option);

                                                                                if (mysqli_num_rows($option_run) > 0) {
                                                                                    foreach ($option_run as $row2) {
                                                                                ?>
                                                                        <option
                                                                            value="<?php echo $row2['category_id']; ?>">
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
                                                                <div class="form-group" style="padding:10px">
                                                                    <label style="padding-bottom:20px;">Website
                                                                        Address</label>
                                                                    <input type="text" class="form-control"
                                                                        name="website" id="website"
                                                                        placeholder="Website Address" required>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group" style="padding:10px">
                                                                    <label style="padding-bottom:20px;">Email</label>
                                                                    <input type="text" class="form-control" name="email"
                                                                        id="email" placeholder="Email">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group" style="padding:10px">
                                                                    <label style="padding-bottom:20px;">Contact</label>
                                                                    <input type="text" class="form-control"
                                                                        name="contact" id="contact"
                                                                        placeholder="Contact">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group" style="padding:10px">
                                                                    <label style="padding-bottom:20px;">Username</label>
                                                                    <input type="text" class="form-control"
                                                                        name="username" id="username"
                                                                        placeholder="Username">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group" style="padding:10px">
                                                                    <label style="padding-bottom:20px;">Password</label>
                                                                    <input type="text" class="form-control"
                                                                        name="password" id="password"
                                                                        placeholder="Password">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group" style="padding:10px">
                                                                    <label style="padding-bottom:20px;">Address</label>
                                                                    <input type="text" class="form-control"
                                                                        name="address" id="address"
                                                                        placeholder="Address">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group" style="padding:10px">
                                                                    <label style="padding-bottom:20px;">City</label>
                                                                    <input type="text" class="form-control" name="city"
                                                                        id="city" placeholder="City">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group" style="padding:10px">
                                                                    <label style="padding-bottom:20px;">Zip</label>
                                                                    <input type="text" class="form-control" name="zip"
                                                                        id="zip" placeholder="Zip">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex justify-content-end"
                                                            style="padding-top:20px;">
                                                            <button type="submit" name="submit" class="btn btn-success"
                                                                style="margin-right:10px;">&nbsp;&nbsp;Add
                                                                User</button>
                                                        </div>


                                                    </div>


                                                </div>

                                            </form>
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