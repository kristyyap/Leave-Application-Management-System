<?php
session_start(); // Start up PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
header("Location: index.php");   //send user to login page

    require ("../config.php"); 
    $_SESSION['u_id'] = $_GET['s_id'];
    $id = $_SESSION['u_id'];

	$sql = "DELETE FROM USER WHERE userId = '$id';";

	if (mysqli_multi_query($conn, $sql)) {
		echo '<script>window.history.go(-1);</script>';
	} 
    else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
    
    mysqli_close($conn);
    
  ?>