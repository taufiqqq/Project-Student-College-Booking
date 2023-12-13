<?php
session_start();
require_once "connection.php"; // Include the connection.php file

$sessionTimeout = 3600; // 1 hour in seconds

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate the login credentials
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform authentication logic here (e.g., querying the database)
    $queryadmin = "SELECT 'admin' AS role, password FROM admin WHERE username = '$username'";
    $resultadmin = mysqli_query($conn, $queryadmin);

    $querystudent = "SELECT 'student' AS role, password FROM student WHERE username = '$username'";
    $resultstudent = mysqli_query($conn, $querystudent);

    $querymanager = "SELECT 'manager' AS role, password FROM manager WHERE username = '$username'";
    $resultmanager = mysqli_query($conn, $querymanager);

    $queryCombined = "SELECT role, password FROM (
        $queryadmin
        UNION ALL
        $querystudent
        UNION ALL
        $querymanager
    ) AS combined";
    $resultCombined = mysqli_query($conn, $queryCombined);

    if ($resultCombined) {
        if (mysqli_num_rows($resultCombined) === 1) {
            // User found in one of the tables
            $row = mysqli_fetch_assoc($resultCombined);
            $userRole = $row['role'];
            $hashedPassword = $row['password'];

            // Verify the password
            if ($password === $hashedPassword) {
                // Set session variables
                $_SESSION['username'] = $username;
                $_SESSION['userRole'] = $userRole;
                $_SESSION['last_activity'] = time(); // Store the current timestamp

                // Set a cookie to track the session expiration
                $expirationTime = time() + $sessionTimeout;
                setcookie('session_expiration', $expirationTime, $expirationTime, '/');

                // Redirect the user to the appropriate page based on their role
                if ($userRole === 'student') {
                    header('Location: studenthome.php');
                    exit();
                } elseif ($userRole === 'manager') {
                    header('Location: managerhome.php');
                    exit();
                } elseif ($userRole === 'admin') {
                    header('Location: adminHome.php');
                    exit();
                } else {
                    echo '<script>';
                    echo 'loginError();';
                    echo '</script>';
                    header('Location: https://facebook.com');
                    exit();
                }
            } else {
                echo '<script>';
                echo 'loginError();';
                echo '</script>';
                header('Location: https://twitter.com');
                exit();
            }
        } else {
            echo '<script>';
            echo 'loginError();';
            echo '</script>';
            header('Location: https://youtube.com');
            exit();
        }
    } else {
        echo 'Error: ' . mysqli_error($conn);
        header('Location: https://tiktok.com');
        exit();
    }
}
