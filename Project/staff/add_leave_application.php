<?php
session_start(); // Start up PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
header("Location: index.php");   //send user to login page

    require ("../config.php"); 
    $username = $_SESSION["USER"];
    $staff = mysqli_query($conn, "SELECT staffNo FROM USER INNER JOIN USERLOGIN on USER.name = USERLOGIN.username WHERE name = '$username'");
    $result = mysqli_fetch_assoc($staff);
    $staffNo = $result['staffNo'];
	$start = $_POST["startDuration"];
	$end = $_POST["endDuration"];
    $leaveType = $_POST["leaveType"];
    $reason = $_POST["reason"];

	$sql = "INSERT INTO LEAVEAPPLICATION (staffNo, startDuration, endDuration, leaveDuration, leaveType, reasonToLeave, status)
    VALUES ('$staffNo', '$start', '$end', TIMESTAMPDIFF(HOUR, '$start', '$end'), '$leaveType', '$reason', 'pending');";

	if (mysqli_multi_query($conn, $sql)) {
		header('Location: view_leave_report.php'); 
	} 
    else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
    
    mysqli_close($conn);
    
  ?>