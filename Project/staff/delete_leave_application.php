<?php
session_start(); // Start up PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
header("Location: index.php");   //send user to login page

    require ("../config.php"); 
    $_SESSION['s_id'] = $_GET['s_id'];
    $id = $_SESSION['s_id'];

	$sql = "DELETE FROM LEAVEAPPLICATION WHERE leaveApplicationId = '$id';";

	if (mysqli_multi_query($conn, $sql)) {
		header('Location: view_leave_report.php'); 
	} 
    else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
    
    mysqli_close($conn);
    
  ?>