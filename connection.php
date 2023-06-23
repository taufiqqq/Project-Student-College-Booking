<?php
// Login to MySQL Server from PHP
$conn = mysqli_connect("localhost", "root", "");

// If login failed, terminate the page (using the 'die' function)
if (!$conn) {
    die("Error when connecting to MySQL: " . mysqli_connect_error());
}


// Create the 'project' database if it doesn't exist
$createDBQuery = "CREATE DATABASE IF NOT EXISTS project";
if (mysqli_query($conn, $createDBQuery)) {
    echo "Database created successfully or already exists!";
} else {
    die("Error creating database: " . mysqli_error($conn));
}

// Choose the 'project' database to work with
$selected = mysqli_select_db($conn, "project");

// If the required database cannot be used, terminate the page
if (!$selected) {
    die("Cannot use database: " . mysqli_error($conn));
}

// Continue with your code here
// You can perform database operations such as querying or modifying data

?>
