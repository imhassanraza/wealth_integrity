<?php
session_start();
error_reporting(0);
include('db.php');
// print_r($_SESSION['admin_id']);
// exit();
if (empty($_SESSION['admin_id'])) {
    header('location:logout.php');
} else { ?>
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
                                            <a href="dashboard.php" class="sticky-logo-none"><img src="../images/logo_b_sm.png" alt="Logo"></a>
                                            <a href="dashboard.php" class="sticky-logo-active"><img src="../images/logo_sm.png" alt="Logo"></a>
                                        </div>
                                        <div class="navbar-wrap main-menu d-none d-lg-flex">
                                            <ul class="navigation">
                                                <li class=""><a href="logout.php">Logout</a></li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                                <div class="mobile-menu">
                                    <div class="menu-backdrop"></div>
                                    <div class="close-btn"><i class="fas fa-times"></i></div>
                                    <nav class="menu-box">
                                        <div class="nav-logo">
                                            <a href="dashboard.php"><img src="../images/logo_b_sm.png" alt="" title=""></a>
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
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <?php
                                $id = $_GET['id'];
                                $user_res = mysqli_query($conn, "Select * from users Where id = ".$id."");
                                if (($user_res->num_rows) > 0) { ?>
                                    <div class="contact-form-wrap">
                                        <div class="login-wrap" style="background-color: #fff;">
                                            <?php while ($user=mysqli_fetch_array($user_res)) { ?>
                                                <h3 class="text-center">User Detail</h3>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="container">
                                                            <div class="row">

                                                                <div class="col-sm-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3"><strong class="card-title">Name :</strong></label>
                                                                        <div class="col-sm-9">
                                                                            <span class="card-text"><?php echo $user['name']; ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3"><strong class="card-title">Phone No :</strong></label>
                                                                        <div class="col-sm-9">
                                                                            <span class="card-text"><?php echo $user['phone']; ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3"><strong class="card-title">Education :</strong></label>
                                                                        <div class="col-sm-9">
                                                                            <span>
                                                                                <?php if ($user['education'] == "1") { ?>
                                                                                    <span class="badge badge-primary">Middle School</span>
                                                                                <?php } elseif ($user['education'] == "2") { ?>
                                                                                    <span class="badge badge-primary">High School</span>
                                                                                <?php } elseif ($user['education'] == "3") { ?>
                                                                                    <span class="badge badge-primary">Technical School</span>
                                                                                <?php } else { ?>
                                                                                    <span class="badge badge-primary">College</span>
                                                                                <?php } ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3"><strong class="card-title">Graduate :</strong></label>
                                                                        <div class="col-sm-9">
                                                                            <span>
                                                                                <?php if ($user['graduate'] == "1") { ?>
                                                                                    <span class="badge badge-primary">Graduate</span>
                                                                                <?php } else { ?>
                                                                                    <span class="badge badge-primary">Not Graduate</span>
                                                                                <?php } ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3"><strong class="card-title">School :</strong></label>
                                                                        <div class="col-sm-9">
                                                                            <span class="card-text"><?php echo $user['school']; ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3"><strong class="card-title">School Location :</strong></label>
                                                                        <div class="col-sm-9">
                                                                            <span class="card-text"><?php echo $user['school_location']; ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3"><strong class="card-title">Sale Experience :</strong></label>
                                                                        <div class="col-sm-9">
                                                                            <span>
                                                                                <?php if ($user['sale_experience'] == "1") { ?>
                                                                                    <span class="badge badge-primary">Yes</span>
                                                                                <?php } else { ?>
                                                                                    <span class="badge badge-primary">No</span>
                                                                                <?php } ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3"><strong class="card-title">Sold Cold Calls :</strong></label>
                                                                        <div class="col-sm-9">
                                                                            <span>
                                                                                <?php if ($user['sold_cold_calls'] == "1") { ?>
                                                                                    <span class="badge badge-primary">Yes</span>
                                                                                <?php } else { ?>
                                                                                    <span class="badge badge-primary">No</span>
                                                                                <?php } ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-12">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-1"><strong class="card-title">Address :</strong></label>
                                                                        <div class="col-sm-10">
                                                                            <div style="margin-left: 55px;">
                                                                                <span class="card-text"><?php echo $user['address']; ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-1"><strong class="card-title">Question :</strong></label>
                                                                        <div class="col-sm-10">
                                                                            <div style="margin-left: 55px;">
                                                                                <span class="card-text"><?php echo $user['question']; ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <br />
                                            <?php
                                            $results = mysqli_query($conn, "Select * from user_jobs Where user_id = ".$id."");
                                            $i = 1;
                                            ?>
                                            <h3 class="text-center">Job Detail</h3>
                                            <table id="example" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Company Name</th>
                                                        <th scope="col">Locaion</th>
                                                        <th scope="col">Job Title</th>
                                                        <th scope="col">Duties</th>
                                                        <th scope="col">Start Date</th>
                                                        <th scope="col">End Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($row = mysqli_fetch_array($results)) { ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $row['company_name']; ?></td>
                                                            <td><?php echo $row['location']; ?></td>
                                                            <td><?php echo $row['job_title']; ?></td>
                                                            <td><?php echo $row['duties']; ?></td>
                                                            <td><?php echo $row['start_date']; ?></td>
                                                            <td><?php echo $row['end_date']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="alert alert-danger text-center" role="alert"> Data Not Found!.</div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            <footer class="footer-bg" data-background="../images/footer_bg.jpeg">
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
        <?php } ?>