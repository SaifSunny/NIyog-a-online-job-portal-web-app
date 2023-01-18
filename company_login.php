<?php

include './database/config.php';
error_reporting(0);

session_start();

if (isset($_SESSION['companyname'])) {
    header("Location: company_home.php");
}

if (isset($_POST['submit'])) {

    $error = "";
    $cls="danger";

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM company WHERE username='$username'";
	$result = mysqli_query($conn, $sql);

	if ($result->num_rows > 0) {

        $sql = "SELECT * FROM company WHERE `password`='$password'";
        $result = mysqli_query($conn, $sql);
    
        if ($result->num_rows > 0) {
            $sql = "SELECT * FROM company WHERE username='$username' AND password='$password'";
            $result = mysqli_query($conn, $sql);
        
            if ($result->num_rows > 0) {
                $_SESSION['companyname'] = $_POST['username'];

                header("Location: company_home.php");
                
            } else {
                $error="Woops! Someting Went Wrong.";
            }
    
        } else {
            $error= "Woops! Password is Incorrect.";
        }

	} else {
		$error= "Woops! Username is Incorrect.";
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

            <!--== Start Login Area Wrapper ==-->
            <section class="account-login-area">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-7 col-xl-6">
                            <div class="login-register-form-wrap">
                                <div class="login-register-form">
                                    <div class="form-title">
                                        <h4 class="title">Sign In</h4>
                                    </div>
                                    <form action="" method="post">
                                        <div class="alert alert-<?php echo $cls;?>">
                                            <?php 
                                            if (isset($_POST['submit'])){
                                                echo $error;
                                            }?>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="username"
                                                        placeholder="Username">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="password" name="password"
                                                        placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="remember-forgot-info">
                                                        <div class="remember">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">Remember
                                                                me</label>
                                                        </div>
                                                        <div class="forgot-password">
                                                            <a href="#">Forgot Password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button type="submit" name="submit" class="btn-theme">Sign
                                                        In</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="login-register-form-info">
                                        <p>Don't you have an account? <a href="user_signup.php">Register</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Login Area Wrapper ==-->
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