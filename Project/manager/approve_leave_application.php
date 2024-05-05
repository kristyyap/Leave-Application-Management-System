<?php
session_start(); // Start up PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
header("Location: index.php");   //send user to login page

    require ("../config.php"); 
    $id = $_SESSION['s_id'];

	$sql = "UPDATE LEAVEAPPLICATION SET status='approved' WHERE leaveApplicationId = '$id';";

	if (mysqli_multi_query($conn, $sql)) {
		echo '<script>window.history.go(-2);</script>';
	} 
    else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
    
    mysqli_close($conn);
    
  ?>