<?php 
// Check if the user is not logged in as a admin
if (!isset($_SESSION['username']) || $_SESSION['userRole'] !== 'admin') {
    header('Location: index.php');
    exit();
}

// Check if the session expiration cookie exists and has not expired
if (isset($_SESSION['last_activity'])) {
    $inactivityTimeout = 1800; // 30 minutes in seconds

    // Calculate the time difference between the current time and the last activity timestamp
    $timeSinceLastActivity = time() - $_SESSION['last_activity'];

    // Check if the inactivity timeout has been reached
    if ($timeSinceLastActivity > $inactivityTimeout) {
        // Session expired, destroy the session and redirect to login page
        session_unset();
        session_destroy();
        setcookie('session_expiration', '', time() - 3600); // Delete the session expiration cookie
        header('Location: login.php');
        exit();
    } else {
        // Update the last activity timestamp
        $_SESSION['last_activity'] = time();

        // Update the session_expiration cookie
        $expirationTime = time() + $inactivityTimeout;
        setcookie('session_expiration', $expirationTime, $expirationTime, '/');
    }
} else {
    // Redirect to login page if the last activity timestamp is not set
    header('Location: login.php');
    exit();
}

$sess_username = $_SESSION['username'];

// Prepare and execute the query using a prepared statement
$stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
$stmt->bind_param("s", $sess_username);
$stmt->execute();
$admin_result = $stmt->get_result();

// Fetch the result
if ($admin_result->num_rows > 0) {
    $admin_row = $admin_result->fetch_assoc();
}

// Close the statement
$stmt->close();
?>