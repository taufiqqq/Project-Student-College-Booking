<?php 
include("connection.php");
session_start();
include("studentauthentication.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form input values
    $college = $_POST['college'];
    $room = $_POST['room'];
    $dateBook = date("Y-m-d");
    $username = $sess_username;

    // Check if the user already has a pending or accepted booking
    $bookingQuery = "SELECT status FROM Booking WHERE username = '$username' AND (status = 'Pending' OR status = 'Approved')";
    $bookingResult = mysqli_query($conn, $bookingQuery);

    if ($bookingResult && mysqli_num_rows($bookingResult) > 0) {
        // User already has a pending or accepted booking, reject the new booking
        echo "You already have a pending or accepted booking. Please wait for the current booking status or contact the administration for assistance.";
    } else {
        // Check room availability
        $availabilityQuery = "SELECT availability FROM Room WHERE collegename = '$college' AND roomType = '$room' AND gender = '$gender'";
        $availabilityResult = mysqli_query($conn, $availabilityQuery);

        if ($availabilityResult && mysqli_num_rows($availabilityResult) > 0) {
            // Room is available, proceed with booking
            $sql = "INSERT INTO Booking (collegename, roomType, gender, dateBook, username, status)
                    VALUES ('$college', '$room', '$gender', '$dateBook', '$username', 'Pending')";

            if (mysqli_query($conn, $sql)) {
                // Booking submitted successfully, reduce room availability by 1
                
                echo "Booking submitted successfully.";
            } else {
                echo "Error submitting booking: " . mysqli_error($conn);
            }
        } else {
            echo "Fully booked, please choose another room or college.";
        }
    }
}
?>
<!-- 
$reduceAvailabilityQuery = "UPDATE Room SET availability = availability - 1 WHERE collegename = '$college' AND roomType = '$room' AND gender = '$gender'";
                mysqli_query($conn, $reduceAvailabilityQuery);
                 -->
