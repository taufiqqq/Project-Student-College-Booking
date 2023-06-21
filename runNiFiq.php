<?php
require_once "connection.php"; // Include the connection.php file

// SQL query to create the Admin table
$sqlAdmin = "
CREATE TABLE Admin (
  username VARCHAR(50) PRIMARY KEY,
  password VARCHAR(255),
  email VARCHAR(100),
  name VARCHAR(100),
  gender ENUM('Male', 'Female'),
  phone VARCHAR(20)
)";

// SQL query to create the Student table
$sqlStudent = "
CREATE TABLE Student (
  username VARCHAR(50) PRIMARY KEY,
  password VARCHAR(255),
  email VARCHAR(100),
  name VARCHAR(100),
  matricnum VARCHAR(10),
  gender ENUM('Male', 'Female'),
  phone VARCHAR(20)
)";

// SQL query to create the Manager table
$sqlManager = "
CREATE TABLE Manager (
  username VARCHAR(50) PRIMARY KEY,
  password VARCHAR(255),
  email VARCHAR(100),
  name VARCHAR(100),
  gender ENUM('Male', 'Female'),
  staffnum VARCHAR(10),
  phone VARCHAR(20),
  collegeHandled VARCHAR(100)
)";

// SQL query to create the College table
$sqlCollege = "
CREATE TABLE College (
  name VARCHAR(100) NOT NULL,
  location VARCHAR(100),
  PRIMARY KEY (Name)
)";

// SQL query to create the Room table
$sqlRoom = "
CREATE TABLE Room (
  id INT AUTO_INCREMENT PRIMARY KEY,
  collegeName VARCHAR(100),
  roomType ENUM('onePerson', 'twoPerson', 'onePersonBathroom'),
  pricing DECIMAL(10,2),
  availability INT,
  FOREIGN KEY (collegeName) REFERENCES College(Name)
)";

// SQL query to create the Booking table
$sqlBooking = "
CREATE TABLE Booking (
  id INT AUTO_INCREMENT PRIMARY KEY,
  collegeName VARCHAR(100),
  roomName INT,
  dateBook DATE,
  username VARCHAR(50),
  status ENUM('Pending', 'Rejected', 'Approved'),
  FOREIGN KEY (collegeName) REFERENCES College(Name),
  FOREIGN KEY (roomName) REFERENCES Room(id),
  FOREIGN KEY (username) REFERENCES Student(username)
);";

// Execute the SQL queries to create,
mysqli_query($conn, $sqlAdmin);
mysqli_query($conn, $sqlStudent);
mysqli_query($conn, $sqlManager);
mysqli_query($conn, $sqlCollege);
mysqli_query($conn, $sqlRoom);
mysqli_query($conn, $sqlBooking);

// Check if any errors occurred during table creation
if (mysqli_error($conn)) {
    echo "Error creating tables: " . mysqli_error($conn);
} else {
    echo "Tables created successfully!";
}

// Insert sample data into the tables
$insertAdmin = "
INSERT INTO Admin (username, password, email, name, gender, phone)
VALUES ('admin', 'password', 'admin@gmail.com', 'ADMINAH', 'Female', '999')
";

$insertStudent = "
INSERT INTO Student (username, password, email, name, gender, phone)
VALUES ('student', 'password', 'student@gmail.com', 'STUDENTIAL', 'Male', '111')
";

$insertCollege = "
INSERT INTO College (Name, Location)
VALUES ('KTDI', 'Jalan Resak')
";

$insertRoom = "
INSERT INTO Room (collegeName, roomType, pricing, availability)
VALUES ('KTDI', 'onePerson', 4.00, 32)
";

$insertBooking = "
INSERT INTO Booking (collegeName, roomName, dateBook)
VALUES ('KTDI', 1, CURDATE())
";

mysqli_query($conn, $insertAdmin);
mysqli_query($conn, $insertStudent);
mysqli_query($conn, $insertCollege);
mysqli_query($conn, $insertRoom);
mysqli_query($conn, $insertBooking);

// Check if any errors occurred during data insertion
if (mysqli_error($conn)) {
    echo "Error inserting data: " . mysqli_error($conn);
} else {
    echo "Data inserted successfully!";
}

// Close the database connection
mysqli_close($conn);
?>
