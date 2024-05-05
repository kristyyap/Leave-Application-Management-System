<?php

require ("config.php");

$sql = "INSERT INTO USER (name, ic, staffNo, DOB, gender, email, phone, homeAddress)
VALUES ('Wai Jia Wen', '011029-01-0258', 'AM001', '2001-10-29', 'Female', 'waiwen@graduate.utm.my', '017-7026808', '12, Jalan Delima 24, Taman Delima 2, 86000 Kluang, Johor.');";
$sql .= "INSERT INTO USER (name, ic, staffNo, DOB, gender, email, phone, homeAddress)
VALUES ('James Wong', '990422-01-5005', 'MN001', '1999-04-22', 'Male', 'jamesw@gmail.com', '015-5023467', 'No. 8, Jalan 5/8, Taman Murni, 81300 Skudai, Johor.');";
$sql .= "INSERT INTO USER (name, ic, staffNo, DOB, gender, email, phone, homeAddress)
VALUES ('Wendy Tan', '980712-01-5006', 'MN002', '1998-07-12', 'Female', 'wendytan@gmail.com', '019-9798994', '50, Jalan Kurnia, Taman Kurnia, 81300 Skudai, Johor.');";
$sql .= "INSERT INTO USER (name, ic, staffNo, DOB, gender, email, phone, homeAddress)
VALUES ('Lau Yanni', '000718-01-6008', 'SF001', '2000-07-18', 'Female', 'lauyanni@gmail.com', '011-18374673', 'No. 54A, Jalan Skudai 6, 81300 Skudai, Johor.');";
$sql .= "INSERT INTO USER (name, ic, staffNo, DOB, gender, email, phone, homeAddress)
VALUES ('Chong Jenny', '010818-01-4344', 'SF002', '2001-08-18', 'Female', 'chongjenny@gmail.com', '012-7688901', 'No. 10A, Jalan Sri Putri 10, 81300 Skudai, Johor.');";
$sql .= "INSERT INTO USER (name, ic, staffNo, DOB, gender, email, phone, homeAddress)
VALUES ('Ong Sung Hoon', '971212-01-9797', 'SF003', '1997-12-12', 'Male', 'ongsunghoon@gmail.com', '011-11123456', '14, Jalan Mewah 6, Taman Mewah, 81300 Skudai, Johor.');";
$sql .= "INSERT INTO USER (name, ic, staffNo, DOB, gender, email, phone, homeAddress)
VALUES ('Quah Yi Heng', '950915-01-8973', 'SF004', '1995-09-15', 'Male', 'yiheng@gmail.com', '013-9888121', '11, Jalan Bintang 4, Taman Bintang, 81300 Skudai, Johor.');";


$sql .= "INSERT INTO USERLOGIN (username, password, level)
VALUES ('Wai Jia Wen', 'waijiawen', 1);";
$sql .= "INSERT INTO USERLOGIN (username, password, level)
VALUES ('James Wong', 'jameswong', 2);";
$sql .= "INSERT INTO USERLOGIN (username, password, level)
VALUES ('Wendy Tan', 'wendytan', 2);";
$sql .= "INSERT INTO USERLOGIN (username, password, level)
VALUES ('Lau Yanni', 'lauyanni', 3);";
$sql .= "INSERT INTO USERLOGIN (username, password, level)
VALUES ('Chong Jenny', 'chongjenny', 3);";
$sql .= "INSERT INTO USERLOGIN (username, password, level)
VALUES ('Ong Sung Hoon', 'ongsunghoon', 3);";
$sql .= "INSERT INTO USERLOGIN (username, password, level)
VALUES ('Quah Yi Heng', 'quahyiheng', 3);";

/* 
    leave types: 
    sick leave, annual leave, casual leave, maternity leave, paternity leave, 
    bereavement leave, compensatory leave, sabbatical leave, unpaid leave

    leaveDuration: in hours
*/

$sql .= "INSERT INTO LEAVEAPPLICATION (staffNo, startDuration, endDuration, leaveDuration, leaveType, reasonToLeave, status)
VALUES ('SF004', '2023-02-12 09:00:00', '2023-02-16 9:00:00', TIMESTAMPDIFF(HOUR, startDuration, endDuration), 'annual leave', 'Chinese New Year leave.', 'denied');";
$sql .= "INSERT INTO LEAVEAPPLICATION (staffNo, startDuration, endDuration, leaveDuration, leaveType, reasonToLeave, status)
VALUES ('SF004', '2023-04-25 09:00:00', '2023-04-28 9:00:00', TIMESTAMPDIFF(HOUR, startDuration, endDuration), 'compensatory leave', 'Worked overtime.', 'approved');";
$sql .= "INSERT INTO LEAVEAPPLICATION (staffNo, startDuration, endDuration, leaveDuration, leaveType, reasonToLeave, status)
VALUES ('SF001', '2023-03-08 09:00:00', '2023-05-08 9:00:00', TIMESTAMPDIFF(HOUR, startDuration, endDuration), 'maternity leave', 'Childbirth.', 'approved');";
$sql .= "INSERT INTO LEAVEAPPLICATION (staffNo, startDuration, endDuration, leaveDuration, leaveType, reasonToLeave, status)
VALUES ('SF002', '2023-05-22 09:00:00', '2023-05-24 09:00:00', TIMESTAMPDIFF(HOUR, startDuration, endDuration), 'sick leave', 'Have high fever.', 'approved');";
$sql .= "INSERT INTO LEAVEAPPLICATION (staffNo, startDuration, endDuration, leaveDuration, leaveType, reasonToLeave, status)
VALUES ('SF003', '2023-05-22 09:00:00', '2023-05-24 09:00:00', TIMESTAMPDIFF(HOUR, startDuration, endDuration), 'casual leave', 'Have a trip with family.', 'denied');";
$sql .= "INSERT INTO LEAVEAPPLICATION (staffNo, startDuration, endDuration, leaveDuration, leaveType, reasonToLeave, status)
VALUES ('SF002', '2023-06-02 09:00:00', '2023-06-02 13:00:00', TIMESTAMPDIFF(HOUR, startDuration, endDuration), 'sick leave', 'Have medical laboratory test.', 'approved');";
$sql .= "INSERT INTO LEAVEAPPLICATION (staffNo, startDuration, endDuration, leaveDuration, leaveType, reasonToLeave, status)
VALUES ('SF002', '2023-06-02 09:00:00', '2023-06-04 9:00:00', TIMESTAMPDIFF(HOUR, startDuration, endDuration), 'annual leave', 'Go to concert.', 'denied');";
$sql .= "INSERT INTO LEAVEAPPLICATION (staffNo, startDuration, endDuration, leaveDuration, leaveType, reasonToLeave, status)
VALUES ('SF001', '2023-06-12 09:00:00', '2023-06-12 13:00:00', TIMESTAMPDIFF(HOUR, startDuration, endDuration), 'unpaid leave', 'Have emergency family matters.', 'approved');";
$sql .= "INSERT INTO LEAVEAPPLICATION (staffNo, startDuration, endDuration, leaveDuration, leaveType, reasonToLeave, status)
VALUES ('SF002', '2023-07-04 09:00:00', '2023-07-05 9:00:00', TIMESTAMPDIFF(HOUR, startDuration, endDuration), 'unpaid leave', 'Have emergency family matters.', 'pending');";
$sql .= "INSERT INTO LEAVEAPPLICATION (staffNo, startDuration, endDuration, leaveDuration, leaveType, reasonToLeave, status)
VALUES ('SF001', '2023-07-08 09:00:00', '2023-07-12 9:00:00', TIMESTAMPDIFF(HOUR, startDuration, endDuration), 'annual leave', 'Back to hometown.', 'pending');";
$sql .= "INSERT INTO LEAVEAPPLICATION (staffNo, startDuration, endDuration, leaveDuration, leaveType, reasonToLeave, status)
VALUES ('SF003', '2023-07-15 09:00:00', '2023-07-17 9:00:00', TIMESTAMPDIFF(HOUR, startDuration, endDuration), 'annual leave', 'Back to hometown.', 'pending');";

if (mysqli_multi_query($conn, $sql)) {
  echo "<h3>New records added successfully</h3>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
 
?> 
