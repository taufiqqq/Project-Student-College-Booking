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
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

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
        <ul class="dropdown"><a class="btn-book-a-table"><span>
              <?php echo $username; ?>
            </span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                  class="bi bi-chevron-down dropdown-indicator"></i></a>

            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="logout.php">Log Out</a></li>
          </ul>
        </ul>
      </nav>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Hostel Booking Application</h2>
          <ol>
            <li><a href="studenthome.php">Home</a></li>
            <li>Student's College Application Status</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->
    <section class="sample-page">
      <div class="container" data-aos="fade-up">

        <?php
        $idBooking = mysqli_query($conn, "SELECT id FROM Booking WHERE username = '" . $username . "'") != null;

        $usernameBookA = mysqli_query($conn, "SELECT username FROM Booking WHERE username = '" . $username . "' AND status = 'approved'");
        $idBookA = mysqli_query($conn, "SELECT id FROM Booking WHERE username = '" . $username . "' AND status = 'approved'");
        $dateBookA = mysqli_query($conn, "SELECT dateBook FROM Booking WHERE username = '" . $username . "' AND status = 'approved'");
        $collegeRoomBookA = mysqli_query($conn, "SELECT collegename, roomType FROM Booking WHERE username = '" . $username . "' AND status = 'approved'");
        $statusBookA = mysqli_query($conn, "SELECT status FROM Booking WHERE username = '" . $username . "' AND status = 'approved'");

        $usernameBookP = mysqli_query($conn, "SELECT username FROM Booking WHERE username = '" . $username . "' AND status = 'pending'");
        $idBookP = mysqli_query($conn, "SELECT id FROM Booking WHERE username = '" . $username . "' AND status = 'pending'");
        $dateBookP = mysqli_query($conn, "SELECT dateBook FROM Booking WHERE username = '" . $username . "' AND status = 'pending'");
        $collegeRoomBookP = mysqli_query($conn, "SELECT collegename, roomType FROM Booking WHERE username = '" . $username . "' AND status = 'pending'");
        $statusBookP = mysqli_query($conn, "SELECT status FROM Booking WHERE username = '" . $username . "' AND status = 'pending'");

        $usernameBookR = mysqli_query($conn, "SELECT username FROM Booking WHERE username = '" . $username . "' AND status = 'rejected'");
        $idBookR = mysqli_query($conn, "SELECT id FROM Booking WHERE username = '" . $username . "' AND status = 'rejected'");
        $dateBookR = mysqli_query($conn, "SELECT dateBook FROM Booking WHERE username = '" . $username . "' AND status = 'rejected'");
        $collegeRoomBookR = mysqli_query($conn, "SELECT collegename, roomType FROM Booking WHERE username = '" . $username . "' AND status = 'rejected'");
        $statusBookR = mysqli_query($conn, "SELECT status FROM Booking WHERE username = '" . $username . "' AND status = 'rejected'");

        // Check if any approved bookings found
        $hasApprovedBookings = mysqli_num_rows($usernameBookA) > 0;

        // Check if any pending bookings found
        $hasPendingBookings = mysqli_num_rows($usernameBookP) > 0;

        // Check if any rejected bookings found
        $hasRejectedBookings = mysqli_num_rows($usernameBookR) > 0;
        ?>
        <?php if ($idBooking) { ?>
          <?php if ($hasApprovedBookings) { ?>
            <h2>Approved Bookings</h2>
            <table style="margin: 20px; padding: 10px;">
              <tr>
                <th style="padding: 10px;">Application ID</th>
                <th style="padding: 10px;">Student Name</th>
                <th style="padding: 10px;">Booking Date</th>
                <th style="padding: 10px;">College and Room</th>
                <th style="padding: 10px;">Status</th>
              </tr>
              <?php while ($row = mysqli_fetch_assoc($usernameBookA)) { ?>
                <tr>
                  <td style="padding: 10px;">
                    <?php echo mysqli_fetch_assoc($idBookA)['id']; ?>
                  </td>
                  <td style="padding: 10px;">
                    <?php echo $row['username']; ?>
                  </td>
                  <td style="padding: 10px;">
                    <?php echo mysqli_fetch_assoc($dateBookA)['dateBook']; ?>
                  </td>
                  <td style="padding: 10px;">
                    <?php $row = mysqli_fetch_assoc($collegeRoomBookA); ?>
                    <span>
                      <?php echo $row['roomType']; ?>
                    </span>
                    <span>
                      <?php echo $row['collegename']; ?>
                    </span>
                  </td>
                  <td style="padding: 10px;">
                    <?php echo mysqli_fetch_assoc($statusBookA)['status']; ?>
                  </td>
                </tr>
              <?php } ?>
            </table>
          <?php } ?>

          <?php if ($hasPendingBookings) { ?>
            <h2>Pending Bookings</h2>
            <table style="margin: 20px; padding: 10px;">
              <tr>
                <th style="padding: 10px;">Application ID</th>
                <th style="padding: 10px;">Student Name</th>
                <th style="padding: 10px;">Booking Date</th>
                <th style="padding: 10px;">College and Room</th>
                <th style="padding: 10px;">Status</th>
              </tr>
              <?php while ($row = mysqli_fetch_assoc($usernameBookP)) { ?>
                <tr>
                  <td style="padding: 10px;">
                    <?php echo mysqli_fetch_assoc($idBookP)['id']; ?>
                  </td>
                  <td style="padding: 10px;">
                    <?php echo $row['username']; ?>
                  </td>
                  <td style="padding: 10px;">
                    <?php echo mysqli_fetch_assoc($dateBookP)['dateBook']; ?>
                  </td>
                  <td style="padding: 10px;">
                    <?php $row = mysqli_fetch_assoc($collegeRoomBookP); ?>
                    <span>
                      <?php echo $row['roomType']; ?>
                    </span>
                    <span>
                      <?php echo $row['collegename']; ?>
                    </span>
                  </td>
                  <td style="padding: 10px;">
                    <?php echo mysqli_fetch_assoc($statusBookP)['status']; ?>
                  </td>
                </tr>
              <?php } ?>
            </table>
          <?php } ?>

          <?php if ($hasRejectedBookings) { ?>
            <h2>Rejected Bookings</h2>
            <table style="margin: 20px; padding: 10px;">
              <tr>
                <th style="padding: 10px;">Application ID</th>
                <th style="padding: 10px;">Student Name</th>
                <th style="padding: 10px;">Booking Date</th>
                <th style="padding: 10px;">College and Room</th>
                <th style="padding: 10px;">Status</th>
              </tr>
              <?php while ($row = mysqli_fetch_assoc($usernameBookR)) { ?>
                <tr>
                  <td style="padding: 10px;">
                    <?php echo mysqli_fetch_assoc($idBookR)['id']; ?>
                  </td>
                  <td style="padding: 10px;">
                    <?php echo $row['username']; ?>
                  </td>
                  <td style="padding: 10px;">
                    <?php echo mysqli_fetch_assoc($dateBookR)['dateBook']; ?>
                  </td>
                  <td style="padding: 10px;">
                    <?php $row = mysqli_fetch_assoc($collegeRoomBookR); ?>
                    <span>
                      <?php echo $row['roomType']; ?>
                    </span>
                    <span>
                      <?php echo $row['collegename']; ?>
                    </span>
                  </td>
                  <td style="padding: 10px;">
                    <?php echo mysqli_fetch_assoc($statusBookR)['status']; ?>
                  </td>
                </tr>
              <?php } ?>
            </table>
          <?php } ?>

          <?php if (!$hasApprovedBookings && !$hasPendingBookings && !$hasRejectedBookings) { ?>
            <p>No hostel application found.</p>
          <?php } ?>

        <?php } else { ?>
          <p>No hostel application found.</p>
        <?php } ?>

      </div>
    </section>

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

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

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

</body>

</html>