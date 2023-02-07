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
            <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
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
                <section class="contact-area contact-table-area pt-120" id="contact-us" style="margin-top: 50px;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="contact-form-wrap">
                                    <div class="login-wrap" style="background-color: #fff;">
                                        <h3 class="text-center">Dashboard</h3>
                                        <?php
                                        $results = mysqli_query($conn, "Select * from users ORDER BY id DESC");
                                        $i = 1;
                                        ?>
                                        <div class="responsive_table_cls">
                                        <table id="example" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">School</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = mysqli_fetch_array($results)) { ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['phone']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['address']; ?></td>
                                                        <td><?php echo $row['school']; ?></td>
                                                        <td><a class="btn btn-primary btn-sm" href="detail.php?id=<?php echo $row['id']; ?>">View Detail</a></td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            <div class="footer_bottom">
                <footer class="footer-bg w-100" data-background="../images/footer_bg.jpeg">
                    <div class="copyright-area">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <div class="copyright-text">
                                        <p>Copyright © <?php echo date('Y'); ?>. Wealth Integrity™ | <a href="privacy-policy.html">Privacy Policy</a> | Developed by <a href="https://explorelogics.com/" target="_blank">Explore Logics</a> </p>
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
            </div>    
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
            <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#example').DataTable( {
                        "pageLength": 25,
                        "paging":   true,
                        "ordering": true,
                        "info":     true
                    } );
                } );
            </script>
        </body>
        </html>
        <?php } ?>