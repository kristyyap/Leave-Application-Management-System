<?php 
session_start(); // Start up your PHP Session
 
require('config.php');

// username and password sent from form
$myusername=$_POST["username"];
$mypassword=$_POST["password"];
$myuserlevel=$_POST["level"];

$sql="SELECT * FROM USERLOGIN WHERE username='$myusername' and password='$mypassword' and level='$myuserlevel'";

$result = mysqli_query($conn, $sql);

$rows=mysqli_fetch_assoc($result);

$user_name=$rows["username"];
$user_id=$rows["password"];
$user_level=$rows["level"];
	
// mysqli_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Add user information to the session (global session variables)		
$_SESSION["Login"] = "YES";
$_SESSION["USER"] = $user_name;
$_SESSION["ID"] = $user_id;
$_SESSION["LEVEL"] = $user_level;

if($_SESSION['LEVEL'] == "1"){
    header("Location: admin/admin_homepage.php");
}else if($_SESSION['LEVEL'] == "2"){
    header("Location: manager/manager_homepage.php");
}if($_SESSION['LEVEL'] == "3"){
    header("Location: staff/staff_homepage.php");
}

//if wrong username and password
} else {
$_SESSION["Login"] = "NO";
header("Location: relogin_page.php");
}

mysqli_close($conn);

?>
