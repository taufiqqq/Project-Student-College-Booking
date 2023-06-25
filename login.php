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
    <title>Webleb</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" type="text/css" href="assets/css/login.css" />
  </head>
  <body style="display: flex; align-items: center; justify-content: center">
    
    <div class="login-page">
      
      <div class="form">
        <img src="assets/img/utmcollege.png" alt="utm" height="100" width="100">
        <form class="register-form" method="POST">
          <h2><i class="fas fa-lock"></i> Register</h2>
          <input type="text" placeholder="Full Name *" required />
          <input type="text" placeholder="Username *" required />
          <input type="email" placeholder="Email *" required />
          <input type="password" placeholder="Password *" required />
          <button type="submit">create</button>
          <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>
        <form class="login-form" method="post" action="authentication.php">
          <h2><i class="fas fa-lock"></i> Login</h2>
          <input type="text" name="username" placeholder="Username" required />
          <input type="password" name="password" placeholder="Password" required />
          <button type="submit" name="send2">login</button>
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
