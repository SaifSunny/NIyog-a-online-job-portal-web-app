<?php
include_once("./database/config.php");
?>

<!DOCTYPE html>
<html lang="en">

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

        <!--== Start Header Wrapper ==-->
        <?php include_once("./templates/header.php");?>
        <!--== End Header Wrapper ==-->

        <main class="main-content">
            <!--== Start Hero Area Wrapper ==-->
            <section class="home-slider-area" id="home">
                <div class="home-slider-container default-slider-container">
                    <div class="home-slider-wrapper slider-default">
                        <div class="slider-content-area" data-bg-img="assets/img/slider/slider-bg.png">
                            <div class="container pt--0 pb--0">
                                <div class="slider-container">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-12 col-lg-8">
                                            <div class="slider-content">
                                                <h1 class="title" style="font-size:70px;">Over <span class="counter"
                                                        data-counterup-delay="80">2000</span> job available <br>
                                                    choose your dream job</h1>
                                                <p class="desc" style="font-size:20px;">Find great job for build your
                                                    bright career. Have many
                                                    job in this plactform.</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!--== End Hero Area Wrapper ==-->

            <!--== Start Funfact Area Wrapper ==-->
            <section class="funfact-area bg-color-gray">
                <div class="container">
                    <div class="row no-gutter">
                        <div class="col-12">
                            <div class="funfact-content-wrap">
                                <div class="funfact-col">
                                    <!--== Start Funfact Item ==-->
                                    <div class="funfact-item" data-aos="fade-down">
                                        <?php
                                                    $sql = "SELECT * from jobs";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row_cnt = $result->num_rows;
                                                ?>
                                        <h2 class="counter-number"><span class="counter"
                                                data-counterup-delay="50"><?php echo $row_cnt?></span></h2>
                                        <h6 class="counter-title">Total Jobs</h6>
                                    </div>
                                    <!--== End Funfact Item ==-->
                                </div>
                                <div class="funfact-col">
                                    <!--== Start Funfact Item ==-->
                                    <div class="funfact-item" data-aos="fade-down" data-aos-duration="1500">
                                        <?php
                                                    $sql = "SELECT * from users";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row_cnt = $result->num_rows;
                                                ?>
                                        <h2 class="counter-number"><span class="counter"
                                                data-counterup-delay="50"><?php echo $row_cnt?></span></h2>
                                        <h6 class="counter-title">Candidates</h6>
                                    </div>
                                    <!--== End Funfact Item ==-->
                                </div>
                                <div class="funfact-col">
                                    <!--== Start Funfact Item ==-->
                                    <div class="funfact-item" data-aos="fade-down" data-aos-duration="1700">
                                        <?php
                                                    $sql = "SELECT * from job_applicant";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row_cnt = $result->num_rows;
                                                ?>
                                        <h2 class="counter-number"><span class="counter"
                                                data-counterup-delay="50"><?php echo $row_cnt?></span></h2>
                                        <h6 class="counter-title">Resume</h6>
                                    </div>
                                    <!--== End Funfact Item ==-->
                                </div>
                                <div class="funfact-col">
                                    <!--== Start Funfact Item ==-->
                                    <div class="funfact-item" data-aos="fade-down" data-aos-duration="1900">
                                        <?php
                                                    $sql = "SELECT * from company";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row_cnt = $result->num_rows;
                                                ?>
                                        <h2 class="counter-number"><span class="counter"
                                                data-counterup-delay="50"><?php echo $row_cnt?></span></h2>
                                        <h6 class="counter-title">Compnay’s</h6>
                                    </div>
                                    <!--== End Funfact Item ==-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Funfact Area Wrapper ==-->

            <!--== Start Work Process Area Wrapper ==-->
            <section class="work-process-area" id="about">
                <div class="container" data-aos="fade-down">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title text-center">
                                <h3 class="title">How It Work?</h3>
                                <div class="desc">
                                    <p>Many desktop publishing packages and web page editors</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="working-process-content-wrap">
                                <div class="working-col">
                                    <!--== Start Work Process ==-->
                                    <div class="working-process-item">
                                        <div class="icon-box">
                                            <div class="inner">
                                                <img class="icon-img" src="assets/img/icons/w1.png" alt="Image-HasTech">
                                                <img class="icon-hover" src="assets/img/icons/w1-hover.png"
                                                    alt="Image-HasTech">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">Create an Account</h4>
                                            <p class="desc">It is long established fact reader distracted readable
                                                content</p>
                                        </div>
                                        <div class="shape-arrow-icon">
                                            <img class="shape-icon" src="assets/img/icons/right-arrow.png"
                                                alt="Image-HasTech">
                                            <img class="shape-icon-hover" src="assets/img/icons/right-arrow2.png"
                                                alt="Image-HasTech">
                                        </div>
                                    </div>
                                    <!--== End Work Process ==-->
                                </div>
                                <div class="working-col">
                                    <!--== Start Work Process ==-->
                                    <div class="working-process-item">
                                        <div class="icon-box">
                                            <div class="inner">
                                                <img class="icon-img" src="assets/img/icons/w2.png" alt="Image-HasTech">
                                                <img class="icon-hover" src="assets/img/icons/w2-hover.png"
                                                    alt="Image-HasTech">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">CV/Resume</h4>
                                            <p class="desc">It is long established fact reader distracted readable
                                                content</p>
                                        </div>
                                        <div class="shape-arrow-icon">
                                            <img class="shape-icon" src="assets/img/icons/right-arrow.png"
                                                alt="Image-HasTech">
                                            <img class="shape-icon-hover" src="assets/img/icons/right-arrow2.png"
                                                alt="Image-HasTech">
                                        </div>
                                    </div>
                                    <!--== End Work Process ==-->
                                </div>
                                <div class="working-col">
                                    <!--== Start Work Process ==-->
                                    <div class="working-process-item">
                                        <div class="icon-box">
                                            <div class="inner">
                                                <img class="icon-img" src="assets/img/icons/w3.png" alt="Image-HasTech">
                                                <img class="icon-hover" src="assets/img/icons/w3-hover.png"
                                                    alt="Image-HasTech">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">Find Your Job</h4>
                                            <p class="desc">It is long established fact reader distracted readable
                                                content</p>
                                        </div>
                                        <div class="shape-arrow-icon">
                                            <img class="shape-icon" src="assets/img/icons/right-arrow.png"
                                                alt="Image-HasTech">
                                            <img class="shape-icon-hover" src="assets/img/icons/right-arrow2.png"
                                                alt="Image-HasTech">
                                        </div>
                                    </div>
                                    <!--== End Work Process ==-->
                                </div>
                                <div class="working-col">
                                    <!--== Start Work Process ==-->
                                    <div class="working-process-item">
                                        <div class="icon-box">
                                            <div class="inner">
                                                <img class="icon-img" src="assets/img/icons/w4.png" alt="Image-HasTech">
                                                <img class="icon-hover" src="assets/img/icons/w4-hover.png"
                                                    alt="Image-HasTech">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">Save & Apply</h4>
                                            <p class="desc">It is long established fact reader distracted readable
                                                content</p>
                                        </div>
                                        <div class="shape-arrow-icon d-none">
                                            <img class="shape-icon" src="assets/img/icons/right-arrow.png"
                                                alt="Image-HasTech">
                                            <img class="shape-icon-hover" src="assets/img/icons/right-arrow2.png"
                                                alt="Image-HasTech">
                                        </div>
                                    </div>
                                    <!--== End Work Process ==-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Work Process Area Wrapper ==-->

            <!--== Start Recent Job Area Wrapper ==-->
            <section class="recent-job-area bg-color-gray" id="jobs">
                <div class="container" data-aos="fade-down">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title text-center">
                                <h3 class="title">Recent Job Circulars</h3>
                                <div class="desc">
                                    <p>Many desktop publishing packages and web page editors</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <?php 
                                                $sql = "SELECT * FROM jobs order by job_id desc";
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
                            <div class="recent-job-item">
                                <div class="company-info">
                                    <div class="logo">
                                        <a href="user_login.php"><img
                                                src="assets/img/companies/<?php echo $company_img?>" width="75"
                                                height="75" alt="Image-HasTech"></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="name"><a href="user_login.php"><?php echo $company_name?></a></h4>
                                        <p class="address"><?php echo $city?></p>
                                    </div>
                                </div>
                                <div class="main-content">
                                    <h3 class="title"><a href=""><?php echo $job_title?></a></h3>
                                    <h5 class="work-type" data-text-color="#ff7e00"><?php echo $job_type?></h5>
                                    <p class="desc">Category: <?php echo $category_name?> | Experience:
                                        <?php echo $experience?></p>
                                </div>
                                <div class="recent-job-info">
                                    <div class="salary">
                                        <h4>Tk. <?php echo $salary?></h4>
                                        <p>/monthly</p>
                                    </div>
                                    <a class="btn-theme btn-sm" href="">Apply Now</a>
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
            <!--== End Recent Job Area Wrapper ==-->


            <!--== Start Job Category Area Wrapper ==-->
            <section class="job-category-area" id="category">
                <div class="container" data-aos="fade-down">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title text-center">
                                <h3 class="title">Popular Category</h3>
                                <div class="desc">
                                    <p>Many desktop publishing packages and web page editors</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-gutter-20">
                        <?php 
                                          $sql = "SELECT * FROM category";
                                          $result = mysqli_query($conn, $sql);
                                          if($result){
                                              while($row=mysqli_fetch_assoc($result)){
                                              $id=$row['category_id'];

                                              $category_name=$row['category_name'];
                                              $date=$row['creation_date'];
                                              $description=$row['description'];

                                              $sql1 = "SELECT * from jobs where category_id = $id";
                                              $result1 = mysqli_query($conn, $sql1);
                                              $row_cnt = $result1->num_rows;


                                        ?>
                        <div class="col-sm-6 col-lg-3">
                            <!--== Start Job Category Item ==-->
                            <div class="job-category-item">
                                <div class="content">
                                    <h3 class="title"><a href="user_login.php"><?php echo $category_name?>
                                            <span>(<?php echo $row_cnt?>)</span></a></h3>
                                </div>
                                <a class="overlay-link" href="user_login.php"></a>
                            </div>
                            <!--== End Job Category Item ==-->
                        </div>
                        <?php
                                              }
                                            }
                        ?>
                    </div>
                </div>
            </section>
            <!--== End Job Category Area Wrapper ==-->


            <!--== Start Testimonial Area Wrapper ==-->
            <section class="testimonial-area bg-color-gray" id="testimonial">
                <div class="container" data-aos="fade-down">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title text-center">
                                <h3 class="title">Our Happy Clients</h3>
                                <div class="desc">
                                    <p>Many desktop publishing packages and web page editors</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="swiper testi-slider-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <!--== Start Testimonial Item ==-->
                                        <div class="testimonial-item">
                                            <div class="testi-inner-content">
                                                <div class="testi-author">
                                                    <div class="testi-thumb">
                                                        <img src="assets/img/testimonial/1.png" width="75" height="75"
                                                            alt="Image-HasTech">
                                                    </div>
                                                    <div class="testi-info">
                                                        <h4 class="name">Sadia A.</h4>
                                                        <span class="designation">Hiring Manager</span>
                                                    </div>
                                                </div>
                                                <div class="testi-content">
                                                    <p class="desc">Niyog is an amazing job posting and finding website!
                                                        I've used it to find a ton of great jobs, and it's always been
                                                        super easy to use. Definitely worth checking out!</p>
                                                    <div class="rating-box">
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                    </div>
                                                    <div class="testi-quote"><img src="assets/img/icons/quote1.png"
                                                            alt="Image-HasTech"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--== End Testimonial Item ==-->
                                    </div>
                                    <div class="swiper-slide">
                                        <!--== Start Testimonial Item ==-->
                                        <div class="testimonial-item">
                                            <div class="testi-inner-content">
                                                <div class="testi-author">
                                                    <div class="testi-thumb">
                                                        <img src="assets/img/testimonial/2.png" width="75" height="75"
                                                            alt="Image-HasTech">
                                                    </div>
                                                    <div class="testi-info">
                                                        <h4 class="name">Sultana M.</h4>
                                                        <span class="designation">Hiring Manager</span>
                                                    </div>
                                                </div>
                                                <div class="testi-content">
                                                    <p class="desc">I've used a lot of different job posting and finding
                                                        websites, and Niyog is by far the best. It's so easy to use and
                                                        I've always had great luck finding great jobs. Definitely give
                                                        it a try!</p>
                                                    <div class="rating-box">
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                    </div>
                                                    <div class="testi-quote"><img src="assets/img/icons/quote1.png"
                                                            alt="Image-HasTech"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--== End Testimonial Item ==-->
                                    </div>
                                    <div class="swiper-slide">
                                        <!--== Start Testimonial Item ==-->
                                        <div class="testimonial-item">
                                            <div class="testi-inner-content">
                                                <div class="testi-author">
                                                    <div class="testi-thumb">
                                                        <img src="assets/img/testimonial/3.png" width="75" height="75"
                                                            alt="Image-HasTech">
                                                    </div>
                                                    <div class="testi-info">
                                                        <h4 class="name">Rakib A.</h4>
                                                        <span class="designation">Hiring Manager</span>
                                                    </div>
                                                </div>
                                                <div class="testi-content">
                                                    <p class="desc">I was a little hesitant to try out Niyog, but I'm so
                                                        glad I did! It's helped me find a ton of great jobs, and it's
                                                        super easy to use. I would definitely recommend it to anyone
                                                        looking for a new job.</p>
                                                    <div class="rating-box">
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                    </div>
                                                    <div class="testi-quote"><img src="assets/img/icons/quote1.png"
                                                            alt="Image-HasTech"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--== End Testimonial Item ==-->
                                    </div>
                                    <div class="swiper-slide">
                                        <!--== Start Testimonial Item ==-->
                                        <div class="testimonial-item">
                                            <div class="testi-inner-content">
                                                <div class="testi-author">
                                                    <div class="testi-thumb">
                                                        <img src="assets/img/testimonial/4.png" width="75" height="75"
                                                            alt="Image-HasTech">
                                                    </div>
                                                    <div class="testi-info">
                                                        <h4 class="name">sumaya S.</h4>
                                                        <span class="designation">Hiring Manager</span>
                                                    </div>
                                                </div>
                                                <div class="testi-content">
                                                    <p class="desc">I've been using Niyog for a while now, and it's by
                                                        far the best job posting and finding website I've ever used.
                                                        I've found so many great jobs, and it's super easy to use.
                                                        Definitely check it out!</p>
                                                    <div class="rating-box">
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                    </div>
                                                    <div class="testi-quote"><img src="assets/img/icons/quote1.png"
                                                            alt="Image-HasTech"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--== End Testimonial Item ==-->
                                    </div>
                                    <div class="swiper-slide">
                                        <!--== Start Testimonial Item ==-->
                                        <div class="testimonial-item">
                                            <div class="testi-inner-content">
                                                <div class="testi-author">
                                                    <div class="testi-thumb">
                                                        <img src="assets/img/testimonial/5.png" width="75" height="75"
                                                            alt="Image-HasTech">
                                                    </div>
                                                    <div class="testi-info">
                                                        <h4 class="name">Jenifer S.</h4>
                                                        <span class="designation">Hiring Manager</span>
                                                    </div>
                                                </div>
                                                <div class="testi-content">
                                                    <p class="desc">Niyog is an incredible job posting and finding
                                                        website! I found my current job through Niyog, and it's been an
                                                        amazing experience. The site is super easy to use, and I would
                                                        definitely recommend it to anyone looking for a new job.</p>
                                                    <div class="rating-box">
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                    </div>
                                                    <div class="testi-quote"><img src="assets/img/icons/quote1.png"
                                                            alt="Image-HasTech"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--== End Testimonial Item ==-->
                                    </div>
                                </div>

                                <!--== Add Swiper Pagination ==-->
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Testimonial Area Wrapper ==-->


            <!--== Start Contact Area Wrapper ==-->
            <section class="contact-area contact-page-area" id="contact">
                <div class="container">
                    <div class="row contact-page-wrapper">
                        <div class="col-lg-12">
                            <div class="contact-info-wrap">
                                <div class="info-item">
                                    <div class="icon">
                                        <img src="assets/img/icons/c1.png" alt="Image" width="42" height="42">
                                    </div>
                                    <div class="info">
                                        <h5 class="title">Call Us:</h5>
                                        <p>
                                            <a href="tel://+880-1312345765">+880-1312345765</a><br>
                                        </p>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="icon">
                                        <img src="assets/img/icons/c2.png" alt="Image" width="43" height="73">
                                    </div>
                                    <div class="info">
                                        <h5 class="title">Email:</h5>
                                        <p>
                                            <a href="mailto://niyog.support@gmail.com">niyog.support@gmail.com</a><br>
                                        </p>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="icon">
                                        <img src="assets/img/icons/c3.png" alt="Image" width="36" height="46">
                                    </div>
                                    <div class="info">
                                        <h5 class="title">Address:</h5>
                                        <p>
                                            Bosila, Mohammadpur, <br> Dhaka 1207
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!--== Start Contact Form ==-->
                            <div class="contact-form">
                                <h4 class="contact-form-title">Get in Touch</h4>
                                <form id="contact-form" action="" method="POST">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="con_name"
                                                    placeholder="Name:">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" type="email" name="con_email"
                                                    placeholder="Email:">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Subject:">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="con_message"
                                                    placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb--0">
                                                <button class="btn-theme d-block w-100" type="submit">Send
                                                    Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--== End Contact Form ==-->

                            <!--== Message Notification ==-->
                            <div class="form-message"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="map-area">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.7905005221824!2d90.35646717506565!3d23.754849078667345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf5c4574b361%3A0x533620153224ff37!2sBosila%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1669532219987!5m2!1sen!2sbd"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
            </section>
            <!--== End Contact Area Wrapper ==-->

        </main>

        <!--== Start Footer Area Wrapper ==-->
        <footer class="footer-area">

            <!--== Start Footer Main ==-->
            <?php include_once("./templates/footer.php");?>
            <!--== End Footer Main ==-->

        </footer>
        <!--== End Footer Area Wrapper ==-->

        <!--== Scroll Top Button ==-->
        <div id="scroll-to-top" class="scroll-to-top"><span class="icofont-rounded-up"></span></div>

        <!--== Start Aside Menu ==-->
        <?php include_once("./templates/aside-menu.php");?>
        <!--== End Aside Menu ==-->
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