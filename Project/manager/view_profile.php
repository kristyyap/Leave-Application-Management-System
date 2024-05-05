<?php
session_start(); // Start up PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: index.php");
?>

<html>
<head>
    <title>Manager Profile Page</title>
    <link rel="icon" href="../image/logo.png" type="image/png">
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <?php
    include('manager_mainpage.html');
    ?>

    <?php
	     require ("../config.php"); 
	     $username = $_SESSION["USER"];
	     $sql = "SELECT * FROM USER INNER JOIN USERLOGIN on USER.name = USERLOGIN.username WHERE name = '$username';";
		 $result = mysqli_query($conn, $sql);
	
		 if (mysqli_num_rows($result) == 1)	
		 $row = mysqli_fetch_assoc($result);

		 mysqli_close($conn);
	?>	

	<form method="post" action="edit_profile.php">
		<div class="profileContainer">
		<div id="profileTitle">
            Profile Details
        </div>
		<div class="profileBody">
			<div class="profileFormItem">
				<label class="profile" for="userId">User ID : </label>
				<input type="text" id="userId" name="userId" value="<?php echo $row['userId']; ?>" disabled >
			</div>
			<div class="profileFormItem">
				<label class="profile" for="staffNo">Staff No : </label>
				<input type="text" id="staffNo" name="staffNo" value="<?php echo $row['staffNo']; ?>" disabled >
			</div>
			<div class="profileFormItem">
				<label class="profile" for="name">Full Name : </label>
				<input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" disabled >
			</div>
			<div class="profileFormItem">
				<label class="profile" for="ic">IC No. : </label>
				<input type="text" id="ic" name="ic" value="<?php echo $row['ic']; ?>" disabled >
			</div>
			<div class="profileFormItem">
				<label class="profile" for="DOB">Date of Birth : </label>
				<input type="date" id="DOB" name="DOB" value="<?php echo $row['DOB']; ?>" disabled >
			</div>
			<div class="profileFormItem">
				<label class="profile" for="male">Gender : </label>
				<?php $value=$row['gender']; 
                if ($value == 'Female') {?>
				<input type="radio" id = "male" name="gender" value="Male" disabled/>
				<label for="male">Male</label>
				<input type="radio" id = "female" name="gender" value="Female" checked disabled>
				<label for="female">Female</label>
				<?php }
				else {?>
				<input type="radio" id = "male" name="gender" value="Male" checked disabled>
				<label for="male">Male</label>
				<input type="radio" id = "female" name="gender" value="Female" disabled>
				<label for="female">Female</label>
				<?php }?>
			</div>
			<div class="profileFormItem">
				<label class="profile" for="phone">Phone No. : </label>
				<input type="text" id = "phone" name="phone" value="<?php echo $row['phone']; ?>" disabled >
			</div>
			<div class="profileFormItem">
				<label class="profile" for="email">Email : </label>
				<input type="email" id = "email" name="email" value="<?php echo $row['email']; ?>" disabled >
			</div>
			<div class="profileFormItem">
				<label class="profile" for="homeAddress">Address : </label><br/>
				<textarea id = "homeAddress" name="homeAddress" rows="5" cols="75" disabled><?php echo $row['homeAddress']; ?></textarea>
			</div>
			<div class="profileFormItem">
				<label class="profile" for="password">Password : </label>
				<input type="password" id="password" name="password" value="<?php echo $row['password']; ?>" disabled >
			</div>
			<div class="profileFormButton">
				<input class="button-profile" type="submit" name="submit" value="Edit">
			</div>
		</div>
		</div>
	</form>

</body>
</html>

