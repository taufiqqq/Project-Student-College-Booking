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
<html>

<head>
    <title>Login</title>
    <script src="assets/js/main.js"></script>
</head>

<body>
    <h2>Login</h2>
    <form method="POST" action="authentication.php">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
</body>

</html>
