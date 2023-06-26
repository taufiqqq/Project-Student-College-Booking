<?php
include("connection.php");
session_start();
include("studentauthentication.php");
?>

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
                    <li><a href="studentroom.php">Book Room</a></li>
                    <li><a href="studentapplication.php">My Application</a></li>
                </ul>
            </nav><!-- .navbar -->


            <!-- <a class="btn-book-a-table" href="#book-a-table">Log Out</a> -->

            <nav id="navbar" class="navbar">
                <ul class="dropdown"><a class="btn-book-a-table"><span><span>
                                <?php echo $username; ?>
                            </span><i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="#">Profile</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </ul>
            </nav>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->

    <body>

        <main id="main">
            <div class="breadcrumbs">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2>Secure Your Exquisite Accommodation</h2>
                        <ol>
                            <li><a href="studenthome.php">Home</a></li>
                            <li>Book Room</li>
                        </ol>
                    </div>
                </div>
            </div>

            <section class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-3">
                    <div class="sidebar">
                        <h2>Choose College </h2>
                        <br>
                        <form action="submitApplication.php" method="POST">
                            <label>
                                <input type="radio" onClick="changePic() " name="college" value="KTDI" required>
                                Kolej Tun Dr Ismail
                            </label>
                            <br><br>
                            <label>
                                <input type="radio" onClick="changePic() " name="college" value="KTHO" required>
                                Kolej Tun Hussien Onn
                            </label>
                            <br><br>
                            <label>
                                <input type="radio" onClick="changePic() " name="college" value="KTF" required>
                                Kolej Tun Fatimah
                            </label>
                            <br><br>
                            <label>
                                <input type="radio" onClick="changePic() " name="college" value="KTR" required>
                                Kolej Tun Razak
                            </label>
                            <br><br>
                            <label>
                                <input type="radio" onClick="changePic() " name="college" value="KTC" required>
                                Kolej Tun Canselor
                            </label>
                            <br><br>
                            <label>
                                <input type="radio" onClick="changePic() " name="college" value="KRP" required>
                                Kolej Rahman Putra
                            </label>
                            <br><br>
                            <label>
                                <input type="radio" onClick="changePic() " name="college" value="KDOJ" required>
                                Kolej Data Onn Jaafar
                            </label>
                            <br><br>
                            <label>
                                <input type="radio" onClick="changePic() " name="college" value="KP" required>
                                Kolej Perdana
                            </label>
                            <br><br>
                            <label>
                                <input type="radio" onClick="changePic() " name="college" value="KDSE" required>
                                Kolej Datin Seri Endon
                            </label>
                            <br><br>
                            <label>
                                <input type="radio" onClick="changePic() " name="college" value="K9K10" required>
                                Kolej 09 & 10
                            </label>
                            <br>

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="content">
                        <h2>Choose Your Room</h2>

                        <div class="containerflexbox">
                            <div class="row">
                                <div class="column">
                                    <img id="room-img" src="assets/img/UTM-skyview.jpg" alt="Hotel Image 1" width="350" height="300">
                                </div>
                                <div class="column">
                                    <h2>Single Room With Bathroom</h2><br>
                                    <p><strong>Price per day:</strong> RM8</p>
                                    <p><strong>Rating:</strong> 5.0/5</p>
                                    <p><strong id="singleB"></strong></p>
                                    <input type="radio" name="room" value="onePersonBathroom" required>
                                    Choose Single Bath Room
                                </div>
                            </div>

                            <div class="row">
                                <div class="column">
                                    <img id="room-img2" src="assets/img/UTM-skyview.jpg" alt="Hotel Image 1" width="350" height="300">
                                </div>
                                <div class="column">
                                    <h2>Single Room </h2><br>
                                    <p><strong>Price per day:</strong> RM6</p>
                                    <p><strong>Rating:</strong> 4.0/5</p>
                                    <p><strong></strong><strong id="single"></strong></p>

                                    <input type="radio" name="room" value="onePerson" required>
                                    Choose Single Room
                                </div>
                            </div>

                            <div class="row">
                                <div class="column">
                                    <img id="room-img3" src="assets/img/UTM-skyview.jpg" alt="Hotel Image 1" width="350" height="300">
                                </div>
                                <div class="column">
                                    <h2>Double Room</h2>
                                    <p><strong>Price per day:</strong> RM4</p>
                                    <p><strong>Rating:</strong> 3.0/5</p>
                                    <p><strong id="double">
                                        </strong></p>
                                    <input type="radio" name="room" value="twoPerson" required>
                                    Choose Double Room
                                </div>
                            </div>
                            <input type="submit" value="Submit"><br><br>

                        </div>
                    </div>
                </div>

                </form>
                </section>
        </main>



        <footer id="footer" class="footer">
            <!-- Footer content goes here -->
        </footer>

        <!-- Scripts -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="assets/js/main.js"></script>
    </body>

    </main><!-- End #main -->

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

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
        window.onload = function() {
            var doubleroom = document.getElementById("double");
            var singleroom = document.getElementById("single");
            var singleroombathroom = document.getElementById("singleB");

            singleroom.textContent = "Pick a College First";
            doubleroom.textContent = "Pick a College First";
            singleroombathroom.textContent = "Pick a College First";
        };

        function handleSubmit() {}
        function changePic() {
            var doubleroom = document.getElementById("double");
            var singleroom = document.getElementById("single");
            var singleroombathroom = document.getElementById("singleB");

            // Get the radio button and the picture element
            const radio = document.querySelector('input[name="college"]:checked');
            const img = document.getElementById("room-img");
            const img2 = document.getElementById("room-img2");
            const img3 = document.getElementById("room-img3");

            // Get the value of the selected radio button
            const value = radio.value;

            // Change the picture source based on the selected radio button
            if (value === "KTDI") {
                img.src = "assets/img/KTDI-SingleB.png";
                img2.src = "assets/img/KTDI-Single.jpg";
                img3.src = "assets/img/KTDI-Double.jpg";
                singleroom.textContent = "Vacancy: <?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KTDI" AND roomType = "onePerson" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";
                doubleroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KTDI" AND roomType = "twoPerson" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";
                singleroombathroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KTDI" AND roomType = "onePersonBathroom" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";

            } else if (value === "KTR") {
                img.src = "assets/img/KTR-SingleB.jpg";
                img2.src = "assets/img/KTR-Single.jpg";
                img3.src = "assets/img/KTR-Double.jpg";

                singleroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KTR" AND roomType = "onePerson" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";
                doubleroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KTR" AND roomType = "twoPerson" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";
                singleroombathroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KTR" AND roomType = "onePersonBathroom" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";

            } else if (value === "KTHO") {
                img.src = "assets/img/KTHO-SingleB.jpg";
                img2.src = "assets/img/KTHO-Single.jpg";
                img3.src = "assets/img/KTHO-Double.jpg";

                singleroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KTHO" AND roomType = "onePerson" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";
                doubleroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KTHO" AND roomType = "twoPerson" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";
                singleroombathroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KTHO" AND roomType = "onePersonBathroom" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";


            } else if (value === "KTC") {
                img.src = "assets/img/KTC-SingleB.jpg";
                img2.src = "assets/img/KTC-Single.jpg";
                img3.src = "assets/img/KTC-Double.jpg";

                singleroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KTC" AND roomType = "onePerson" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";
                doubleroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KTC" AND roomType = "twoPerson" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";
                singleroombathroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KTC" AND roomType = "onePersonBathroom" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";

            } else if (value === "K9K10") {
                img.src = "assets/img/K9K10-SingleB.jpg";
                img2.src = "assets/img/K9K10-Single.jpg";
                img3.src = "assets/img/K9K10-Double.jpg";

                singleroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "K9K10" AND roomType = "onePerson" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";
                doubleroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "K9K10" AND roomType = "twoPerson" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";
                singleroombathroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "K9K10" AND roomType = "onePersonBathroom" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";

            } else if (value === "KRP") {
                img.src = "assets/img/KRP-SingleB.jpg";
                img2.src = "assets/img/KRP-Single.jpg";
                img3.src = "assets/img/KRP-Double.jpg";

                singleroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KRP" AND roomType = "onePerson" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";
                doubleroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KRP" AND roomType = "twoPerson" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";
                singleroombathroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KRP" AND roomType = "onePersonBathroom" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";

            } else if (value === "KDSE") {
                img.src = "assets/img/KDSE-SingleB.jpg";
                img2.src = "assets/img/KDSE-Single.jpg";
                img3.src = "assets/img/KDSE-Double.jpg";

                singleroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KDSE" AND roomType = "onePerson" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";
                doubleroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KDSE" AND roomType = "twoPerson" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";
                singleroombathroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KDSE" AND roomType = "onePersonBathroom" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";

            } else if (value === "KDOJ") {
                img.src = "assets/img/KDOJ-SingleB.jpg";
                img2.src = "assets/img/KDOJ-Single.jpg";
                img3.src = "assets/img/KDOJ-Double.jpg";

                singleroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KDOJ" AND roomType = "onePerson" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";
                doubleroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KDOJ" AND roomType = "twoPerson" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";
                singleroombathroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KDOJ" AND roomType = "onePersonBathroom" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";

            } else if (value === "KP") {
                img.src = "assets/img/KP-Single.jpg";
                img2.src = "assets/img/KP-SingleB.jpg";
                img3.src = "assets/img/KP-Double.jpg";

                singleroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KP" AND roomType = "onePerson" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";
                doubleroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KP" AND roomType = "twoPerson" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";
                singleroombathroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KP" AND roomType = "onePersonBathroom" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";

            } else if (value === "KTF") {
                img.src = "assets/img/KTF-SingleB.jpg";
                img2.src = "assets/img/KTF-Single.jpg";
                img3.src = "assets/img/KTF-Double.jpg";

                singleroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KTF" AND roomType = "onePerson" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";
                doubleroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KTF" AND roomType = "twoPerson" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";
                singleroombathroom.textContent = "Vacancy: " + "<?php echo mysqli_query($conn, 'SELECT availability FROM Room WHERE collegename = "KTF" AND roomType = "onePersonBathroom" AND gender="' . $gender . '"')->fetch_assoc()['availability']; ?>";

            } else {}
        }
    </script>

</body>

</html>