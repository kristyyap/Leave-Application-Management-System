<?php
session_start(); // Start up PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
header("Location: index.php");   //send user to login page

    require ("../config.php"); 
    $id = $_SESSION["s_id"];
	$start = $_POST["startDuration"];
	$end = $_POST["endDuration"];
    $leaveType = $_POST["leaveType"];
    $reason = $_POST["reason"];

	$sql = "UPDATE LEAVEAPPLICATION SET startDuration = '$start', endDuration = '$end', leaveDuration = TIMESTAMPDIFF(HOUR, '$start', '$end'), leaveType = '$leaveType', reasontoLeave = '$reason' WHERE leaveApplicationId = '$id';";

	if (mysqli_multi_query($conn, $sql)) {
		header('Location: view_leave_report.php'); 
	} 
    else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
    
    mysqli_close($conn);
    
  ?>