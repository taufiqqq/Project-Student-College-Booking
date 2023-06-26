<?php
session_start();

// Check if the user is already logged in and redirect to the respective home page
if (isset($_SESSION['username'])) {
  $userRole = $_SESSION['userRole'];

  if ($userRole === 'student') {
    header('Location: studenthome.php');
    exit();
  } elseif ($userRole === 'manager') {
    header('Location: managerhome.php');
    exit();
  } elseif ($userRole === 'admin') {
    header('Location: adminhome.php');
    exit();
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UTM College</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="assets/css/login.css" />
  
  <link href="assets/img/UTM-LOGO.png" rel="icon">
</head>

<body style="display: flex; align-items: center; justify-content: center;    background-image: url(
  assets/img/UTM-skyview.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;">


  <div class="login-page">

    <div class="form">
      <img src="assets/img/utmcollege.png" alt="utm" height="100" width="100">
      <form class="register-form" method="POST">
        <h2><i class="fas fa-lock"></i> Register</h2>
        <input type="text" id="name" name="name" placeholder="Full Name *" required />
        <input type="text" id="username" name="username" placeholder="Username *" required />
        <input type="text" id="emailuser" name="email" placeholder="Email *" required />
        <input type="password" id="passuser" name="password" placeholder="Password *" required /><br> 
        <div style="display: flex; align-items:center;">
          <input type="radio" id="male" name="gender" value="Male">
          <label for="male" style="margin-right: 10px;">Male</label>
          <input type="radio" id="female" name="gender" value="Female">
          <label for="female" style="margin-right: 10px;">Female</label>
        </div>
        <br>
        <input type="text" id="matric" name="matric_number" placeholder="Matric Number *" required />
        <input type="number" id="nofon" name="phone_number" placeholder="Phone Number *" required />
        <button type="submit" name="submit">create</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>

      </form>

      <?php
      // Retrieve form input values
      include("connection.php");
      if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $matric = $_POST['matric_number'];
        $nofon = $_POST['phone_number'];

        // Sanitize and validate input (e.g., using filter_var, regex, etc.)

        // Prepare and execute the SQL query
        $stmt = $conn->prepare('INSERT INTO Student (username, password, email, name, matricnum, gender, phone) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('sssssss', $username, $password, $email, $name, $matric, $gender, $nofon);

        $stmt->execute();

        // Close the database connection
        $stmt->close();
      }
      ?>

      <form class="login-form" method="post" action="authentication.php">
        <h2><i class="fas fa-lock"></i> Login</h2>
        <input type="text" name="username" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit" name="submit">login</button>
        <p class="message">
          Not registered? <a href="#">Create an account</a>
        </p>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="assets/js/login.js"></script>
</body>

</html>