<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UTMCollege</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/UTM-LOGO.png" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Yummy
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>UTM<span>College</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="studenthome.php">Home</a></li>
                    <li>
                        <ul class="dropdown"><a href="#book-a-table"><span>Feature</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="adminCreateUser">Create User</a></li>
                                <li><a href="adminEditUser">Edit User</a></li>
                                <li><a href="adminDeleteUser">Delete User</a></li>
                                <li class="dropdown"><a href="#"><span>View</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                    <ul>
                                        <li><a href="studenthome.php">student</a></li>
                                        <li><a href="">manager</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </ul>
                    </li>
                </ul>
            </nav><!-- .navbar -->


            <!-- <a class="btn-book-a-table" href="#book-a-table">Log Out</a> -->

            <nav id="navbar" class="navbar">
                <ul class="dropdown"><a class="btn-book-a-table" href="#book-a-table"><span>Admin</span><i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href=""></a></li>
                        <li><a href="#">drop 2</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </ul>
            </nav>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->

    <!-- main -->
    <main id="main">
        <div align="center">
            <div class="breadcrumbs">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1>
                            Delete User Page<br>
                        </h1>
                    </div>
                </div>
            </div>
            <form action="adminHome.php">
                <br><br>
                <p>Please select type of user:</p>
                <div>
                    <input type="radio" id="stud" name="user_type" value="Student">
                    <label for="stud">Student</label>
                </div>
                <div>
                    <input type="radio" id="manager" name="user_type" value="Manager">
                    <label for="manager">Manager</label>
                </div>
                <div>
                    <label for="username">Name:</label>
                    <input type="text" id="username" name="name">
                </div>
                <div>
                    <label for="passuser">Password:</label>
                    <input type="password" id="passuser" name="password">
                </div>
                <div>
                    <input type="submit" value="Submit">
                </div>
            </form>

        </div>
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div>
                        <h4>Address</h4>
                        <p>
                            UTM Skudai <br>
                            Johor Bahru, 81300 - Malaysia<br>
                        </p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Inquiries</h4>
                        <p>
                            <strong>Phone:</strong> +60 165653191<br>
                            <strong>Email:</strong> taufiq02@graduate.utm.my<br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p>
                            <strong>Sun-Thu: 8AM</strong> - 5PM<br>
                            Friday: Closed
                            Saturday: Closed
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="https://twitter.com/Cristiano" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="https://www.facebook.com/Cristiano/" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/tauf.iqq/" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/taufiqjurimi/" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>UTM</span></strong>College All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->
</body>

</html>