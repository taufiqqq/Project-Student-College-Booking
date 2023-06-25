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

// SQL query to create the College table
$sqlCollege = "
CREATE TABLE College (
  name VARCHAR(100) NOT NULL,
  location VARCHAR(100),
  PRIMARY KEY (name)
)";

// SQL query to create the Room table
$sqlRoom = "
CREATE TABLE Room (
  collegename VARCHAR(100),
  roomType ENUM('onePerson', 'twoPerson', 'onePersonBathroom'),
  gender ENUM('Male', 'Female'),
  pricing DECIMAL(10,2),
  availability INT,
  PRIMARY KEY (collegename, roomType, gender),
  FOREIGN KEY (collegename) REFERENCES College(name)
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
  collegeHandled VARCHAR(100),
  FOREIGN KEY (collegeHandled) REFERENCES College(name)
)";

// SQL query to create the Booking table
$sqlBooking = "
CREATE TABLE Booking (
  id INT AUTO_INCREMENT PRIMARY KEY,
  collegename VARCHAR(100),
  roomType ENUM('onePerson', 'twoPerson', 'onePersonBathroom'),
  gender ENUM('Male', 'Female'),
  dateBook DATE,
  username VARCHAR(50),
  status ENUM('Pending', 'Rejected', 'Approved'),
  FOREIGN KEY (collegename) REFERENCES College(name),
  FOREIGN KEY (collegename, roomType, gender) REFERENCES Room(collegename, roomType, gender),
  FOREIGN KEY (username) REFERENCES Student(username)
)";


// Execute the SQL queries to create,
mysqli_query($conn, $sqlAdmin);
mysqli_query($conn, $sqlStudent);
mysqli_query($conn, $sqlCollege);
mysqli_query($conn, $sqlRoom);
mysqli_query($conn, $sqlManager);
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

$insertManager = "
INSERT INTO Manager (username, password, email, name, gender, staffnum, phone, collegeHandled)
VALUES ('manager', 'password', 'manager@gmail.com', 'MANAGERNAMA', 'Male', '10010', '555', 'KTDI')
";

$insertCollege = "
INSERT INTO College (name, location)
VALUES ('KTDI', 'Jalan Resak, UTM');
";

$insertRoom = "
INSERT INTO Room (collegename, roomType, gender, pricing, availability)
VALUES ('KTDI', 'twoPerson', 'Male', 4.00, 10);
";

$insertBooking = "
INSERT INTO Booking (collegename, roomType, gender, dateBook, username, status)
VALUES ('KTDI', 'twoPerson', 'Male', '2023-06-22', 'student', 'Pending');
";

mysqli_query($conn, $insertAdmin);
mysqli_query($conn, $insertStudent);
mysqli_query($conn, $insertCollege);
mysqli_query($conn, $insertRoom);
mysqli_query($conn, $insertBooking);
mysqli_query($conn, $insertManager);


// Check if any errors occurred during data insertion
if (mysqli_error($conn)) {
    echo "Error inserting data: " . mysqli_error($conn);
} else {
    echo "Data inserted successfully!";
}

// Close the database connection
mysqli_close($conn);
?>
