<?php
// $password = password_hash("123456", PASSWORD_DEFAULT);
// echo $password;
// exit();

session_start();
error_reporting(0);
include('db.php');

if (!empty($_SESSION['admin_id'])) {
    header('location:dashboard.php');
}

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "select * from admin_users where email = '$email' && status = '1' ");

    $ret = mysqli_fetch_array($query);
    if($ret > 0){
        if (password_verify($password, $ret['password'])) {
            $_SESSION['admin_id'] = $ret['id'];
            header('location:dashboard.php');
        } else {
            $msg="Invalid Credentials.";
        }
    } else{
        $msg="Invalid Credentials.";
    }
}
?>


<!doctype html>
    <html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Wealth Integrity | Admin Panel </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/animate.min.css">
        <link rel="stylesheet" href="../css/magnific-popup.css">
        <link rel="stylesheet" href="../css/fontawesome-all.min.css">
        <link rel="stylesheet" href="../css/owl.carousel.min.css">
        <link rel="stylesheet" href="../css/jquery-ui.min.css">
        <link rel="stylesheet" href="../css/flaticon.css">
        <link rel="stylesheet" href="../css/jarallax.css">
        <link rel="stylesheet" href="../css/nice-select.css">
        <link rel="stylesheet" href="../css/odometer.css">
        <link rel="stylesheet" href="../css/aos.css">
        <link rel="stylesheet" href="../css/slick.css">
        <link rel="stylesheet" href="../css/default.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/responsive.css">
    </head>

    <body>
        <div class="preloader">
            <div class="meter">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="subline"></div>
                <div class="subline"></div>
                <div class="subline"></div>
                <div class="subline"></div>
                <div class="subline"></div>
                <div class="loader-circle-1">
                    <div class="loader-circle-2"></div>
                </div>
                <span class="loadtext">Loading</span>
            </div>
        </div>
        <header class="transparent-header" id="home">
            <div id="sticky-header" class="main-header menu-area">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                            <div class="menu-wrap">
                                <nav class="menu-nav show">
                                    <div class="logo">
                                        <a href="index.php" class="sticky-logo-none"><img src="../images/logo_b_sm.png" alt="Logo"></a>
                                        <a href="index.php" class="sticky-logo-active"><img src="../images/logo_sm.png" alt="Logo"></a>
                                    </div>
                                    <div class="navbar-wrap main-menu d-none d-lg-flex">
                                        <ul class="navigation">
                                            <li class=""><a href="index.php">Login</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="mobile-menu">
                                <div class="menu-backdrop"></div>
                                <div class="close-btn"><i class="fas fa-times"></i></div>
                                <nav class="menu-box">
                                    <div class="nav-logo">
                                        <a href="index.php"><img src="../images/logo_b_sm.png" alt="" title=""></a>
                                    </div>
                                    <div class="menu-outer">
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <section class="contact-area pt-120" id="contact-us" style="margin-top: 50px;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6"></div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="contact-form-wrap">
                                <div class="login-wrap" data-background="../images/form-bg.jpg">
                                    <h3 class="widget-title text-white">Login Form</h3>
                                    <form action="#" method="post" id="login_form" class="login-form">
                                        <div class="form-grp">
                                            <label for="email">Email <span>*</span></label>
                                            <input type="email" name="email" id="email" placeholder="Enter Email" required>
                                        </div>
                                        <div class="form-grp">
                                            <label for="password">Password <span>*</span></label>
                                            <input type="password" name="password" id="password" placeholder="Enter Password" required>
                                        </div>
                                        <button class="btn" name="login" type="submit" id="btn_login">Submit</button>
                                    </form>
                                    <br />
                                    <p style="font-size:16px; color:red" align="center">
                                        <?php if(@$msg){ echo @$msg; } ?>
                                    </p>
                                    <div class="alert alert-danger" id="error_message" role="alert" style="display: none;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer class="footer-bg" data-background="../images/footer_bg.jpeg" style="margin-top: 200px;">
            <div class="copyright-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="copyright-text">
                                <p>Copyright © 2021. Wealth Integrity™ | <a href="privacy-policy.html">Privacy Policy</a> | Developed by <a href="https://explorelogics.com/" target="_blank">Explore Logics</a> </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="scroll-top scroll-to-target" data-target="html">
                                <i class="fas fa-angle-up"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="../js/vendor/jquery-3.5.0.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/isotope.pkgd.min.js"></script>
        <script src="../js/imagesloaded.pkgd.min.js"></script>
        <script src="../js/jquery.magnific-popup.min.js"></script>
        <script src="../js/jquery.nice-select.min.js"></script>
        <script src="../js/owl.carousel.min.js"></script>
        <script src="../js/jquery.odometer.min.js"></script>
        <script src="../js/jquery.accrue.min.js"></script>
        <script src="../js/jquery.appear.js"></script>
        <script src="../js/jarallax.min.js"></script>
        <script src="../js/slick.min.js"></script>
        <script src="../js/ajax-form.js"></script>
        <script src="../js/wow.min.js"></script>
        <script src="../js/aos.js"></script>
        <script src="../js/plugins.js"></script>
        <script src="../js/main.js"></script>
    </body>
    </html>