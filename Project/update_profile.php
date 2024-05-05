<?php
session_start(); // Start up PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
header("Location: index.php");   //send user to login page

	$name = $_POST["name"];
	$ic = $_POST["ic"];
    $staffNo = $_POST["staffNo"];
    $DOB = $_POST["DOB"];
	$gender = $_POST["gender"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $homeAddress = $_POST["homeAddress"];
    if ($_POST["password"]==null){
        $password = $_SESSION["password"];
    }
    else{
        $password = $_POST["password"];
    }
    if ($_SESSION['LEVEL']=="1"){
        $userId = $_POST["userId"];
        $level = $_POST["level"];
    }
 		 
	require ("config.php"); 

	$sql = "UPDATE USER SET name = '$name', ic = '$ic', staffNo = '$staffNo', DOB = '$DOB', gender = '$gender', email = '$email', phone = '$phone', homeAddress = '$homeAddress' WHERE name = '$name';" ;
    $sql .= "UPDATE USERLOGIN SET password = '$password' WHERE username = '$name';";
    if ($_SESSION['LEVEL']=="1"){
        $sql .= "UPDATE USER SET userId = '$userId' WHERE name = '$name';" ;
        $sql .= "UPDATE USERLOGIN SET level = '$level' WHERE username = '$name';" ;
    }

	if (mysqli_multi_query($conn, $sql)) {
		echo '<script>window.history.go(-2);</script>';
	} 
    else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
    
    mysqli_close($conn);
    
  ?>