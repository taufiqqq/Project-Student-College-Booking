<?php
// include("adminEditStud.php");
include("connection.php");
session_start();
include("adminauthentication.php");
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
                    <li>
                        <ul class="dropdown"><a href="#book-a-table"><span>Feature</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="adminCreateUser">Create User</a></li>
                                <li><a href="adminEditUser">Edit User</a></li>
                                <li><a href="adminDeleteUser">Delete User</a></li>
                                <li class="dropdown"><a href="#"><span>View</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                    <ul>
                                        <li><a href="studenthome.php">student</a></li>
                                        <li><a href="managerhome.php">manager</a></li>
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
                            Update Student Page<br>
                        </h1>
                    </div>
                </div>
            </div>
            <form id="submitUser" method="POST" onsubmit="return validateForm()">
                <br><br>
                <p>Please Fill In Those Information:</p>
                <table>
                    <tr>
                        <td><label for="emailuser">Email:</label></td>
                        <td><input type="text" id="emailuser" name="email"></td>
                    </tr>
                    <tr>
                        <td><label for="name">Name:</label></td>
                        <td><input type="text" id="name" name="name"></td>
                    </tr>
                    <tr>
                        <td>
                            <p>Gender:</p>
                        </td>
                        <td>
                            <input type="radio" id="male" name="gender" value="Male">
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="gender" value="Female">
                            <label for="female">Female</label>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="matric">Matric Number:</label></td>
                        <td><input type="text" id="matric" name="matric_number"></td>
                    </tr>
                    <tr>
                        <td><label for="nofon">No. Phone:</label></td>
                        <td><input type="number" id="nofon" name="phone_number"></td>
                    </tr>
                </table>
                <div>
                    <input type="submit" value="Submit" name="submit">
                </div>
            </form>
            <?php
            // Retrieve form input values
            $studentUsername = $_GET['selected_username'];
            
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
                $email = $_POST['email'];
                $name = $_POST['name'];
                $gender = $_POST['gender'];
                $matric = $_POST['matric_number'];
                $nofon = $_POST['phone_number'];

                // Sanitize and validate input (e.g., using filter_var, regex, etc.)
                // Prepare and execute the SQL query
                $stmt = $conn->prepare('UPDATE student SET email = ?, name = ?, matricnum = ?, gender = ?, phone = ? WHERE username = ?');
                $stmt->bind_param('ssssss', $email, $name, $matric, $gender, $nofon, $studentUsername);

                $stmt->execute();

                // Check if the query was successful
                if ($stmt->affected_rows > 0) {
                    echo 'Data inserted successfully.';
                } else {
                    echo 'Error inserting data.';
                }

                // Close the database connection
                $stmt->close();
            }
            ?>

            <!--stud = username, pass, email, nama, matric, gender, no fon
manager = username, pass, email, nama, gender, stafnum, fon, kolej(radio)-->
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
    <script>
        function validateForm() {
            // Retrieve the selected username
            var selectedUsername = <?php $selectedUsername ?>;

            if (!selectedUsername) {
                // If no username is selected, display an error message and prevent form submission
                alert("Please select a username.");
                return false;
            }

            // If the validation is successful, allow form submission
            return true;
        }
    </script>
</body>

</html>