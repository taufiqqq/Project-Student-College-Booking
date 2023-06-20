<?php
session_start();

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate the login credentials
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform authentication logic here (e.g., querying the database)
    // Assuming the authentication is successful, set the user role in the session
    //$userRole = 'student'; // Replace with actual user role fetched from the database

    // Set session variables
    $_SESSION['username'] = $username;
    $_SESSION['userRole'] = $userRole;

    // Redirect the user to the appropriate page based on their role
    if ($userRole === 'student') {
        header('Location: studenthome.php');
    } elseif ($userRole === 'manager') {
        header('Location: managerhome.php');
    } elseif ($userRole === 'admin') {
        header('Location: adminhome.php');
    } else {
        echo '<script>';
        echo 'loginError();';
        echo '</script>';
        header('Location: login.php');
    }
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <script src="assets/js/main.js"></script>
</head>

<body>
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
</body>

</html>
