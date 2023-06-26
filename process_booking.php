<?php
include("connection.php");
session_start();
include("managerauthentication.php")
?>

<?php 

if (isset($_POST['submit'])) {
    $bookingStatus = $_POST['booking_status'];
  
    // Assuming you have a database connection established
  
    foreach ($bookingStatus as $bookingId => $status) {
      // Perform necessary validation and sanitization on the input
  
      // Update the database table with the new status
      $updateQuery = "UPDATE booking SET status = '$status' WHERE id = '$bookingId'";
      mysqli_query($conn, $updateQuery);
    }
  
    // Redirect back to the original page after updating the table
    header("Location: managerapplication.php");
    exit();
  }

?>