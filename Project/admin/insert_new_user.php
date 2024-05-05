<?php
session_start(); // Start up PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
header("Location: index.php");   //send user to login page

    require ("../config.php"); 
    $name = $_POST["name"];
	$ic = $_POST["ic"];
    $staffNo = $_POST["staffNo"];
    $DOB = $_POST["DOB"];
	$gender = $_POST["gender"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $homeAddress = $_POST["homeAddress"];
    $level = $_POST["level"];
    $password = $_POST["password"];

	$sql = "INSERT INTO USER (name, ic, staffNo, DOB, gender, email, phone, homeAddress)
    VALUES ('$name', '$ic', '$staffNo', '$DOB', '$gender', '$email', '$phone', '$homeAddress');";
    $sql .= "INSERT INTO USERLOGIN (username, password, level)
    VALUES ('$name', '$password', '$level');";

	if (mysqli_multi_query($conn, $sql)) {
		header('Location: user_management.php'); 
	} 
    else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
    
    mysqli_close($conn);
    
  ?>