<?php
 
require ("config.php"); 

$sql = "CREATE TABLE USER(
		    userId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 		    name VARCHAR(100) UNIQUE NOT NULL,
 		    ic VARCHAR(14) NOT NULL,
        staffNo VARCHAR(5) NOT NULL,
        DOB DATE NOT NULL,
        gender VARCHAR(8) NOT NULL,
        email VARCHAR(50) NOT NULL,
        phone VARCHAR(12) NOT NULL,
        homeAddress VARCHAR(200) NOT NULL
       );";

$sql .= "CREATE TABLE USERLOGIN(
         username varchar(100) PRIMARY KEY REFERENCES USER(name),
         password varchar(12) NOT NULL,
         level int(3)
        );";

$sql .= "CREATE TABLE LEAVEAPPLICATION(
         leaveApplicationId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         staffNo VARCHAR(5) REFERENCES USER(staffNo),
         startDuration DATETIME NOT NULL,
         endDuration DATETIME NOT NULL,
         leaveDuration INT(10),
         leaveType VARCHAR(50) NOT NULL,
         reasonToLeave VARCHAR(1000) NOT NULL,
         status VARCHAR(10) NOT NULL
         );";

if (mysqli_multi_query($conn, $sql)) {
  echo "<h3>Tables created successfully</h3>";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>