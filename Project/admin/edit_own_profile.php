<?php
session_start(); // Start up PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: index.php");
?>

<html>
<head>
    <title>Admin Profile Page</title>
    <link rel="icon" href="../image/logo.png" type="image/png">
    <link rel="stylesheet" href="../styles.css">
	<script src="../script.js"></script>
</head>

<body>
    <?php
    include('admin_mainpage.html');
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

	<form name="profileForm" method="post" action="../update_profile.php" onsubmit="return(validateProfile());">
		<div class="profileContainer">
		<div id="profileTitle">
            Profile Details
        </div>
		<div class="profileBody">
			<div class="profileFormItem">
				<label class="profile" for="userId">User ID : </label>
				<input type="text" id="userId" name="userId" value="<?php echo $row['userId']; ?>" required >
			</div>
			<div class="profileFormItem">
				<label class="profile" for="level">User Level : </label>
				<select id="level" name="level" onmouseout="checkRoleChoice2();">
					<?php $value=$row['level']; 
					if ($value == '1') {?>
						<option value=""> - select role - </option>
						<option value="1" selected>Admin</option>
						<option value="2">Manager</option>
						<option value="3">Staff</option>
					<?php }
					else if ($value == '2'){?>
						<option value=""> - select role - </option>
						<option value="1">Admin</option>
						<option value="2" selected>Manager</option>
						<option value="3">Staff</option>
						<?php }
					else {?>
						<option value=""> - select role - </option>
						<option value="1">Admin</option>
						<option value="2">Manager</option>
						<option value="3" selected>Staff</option>
					<?php }?>
            	</select>
			</div>
			<div id='roleMessage'></div>
			<div class="profileFormItem">
				<label class="profile" for="staffNo">Staff No : </label>
				<input type="text" id="staffNo" name="staffNo" value="<?php echo $row['staffNo']; ?>" required>
			</div>
			<div class="profileFormItem">
				<label class="profile" for="name">Full Name : </label>
				<input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>
			</div>
			<div class="profileFormItem">
				<label class="profile" for="ic">IC No. : </label>
				<input type="text" id="ic" name="ic" value="<?php echo $row['ic']; ?>" pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}" required>
			</div>
			<div class="profileFormItem">
				<label class="profile" for="DOB">Date of Birth : </label>
				<input type="date" id="DOB" name="DOB" value="<?php echo $row['DOB']; ?>" required>
			</div>
			<div class="profileFormItem">
				<label class="profile" for="male">Gender : </label>
                <?php $value=$row['gender']; 
                if ($value == 'Female') {?>
				<input type="radio" id = "male" name="gender" value="Male">
                <label for="male">Male</label>
                <input type="radio" id = "female" name="gender" value="Female" checked>
                <label for="female">Female</label>
                <?php }
                else {?>
				<input type="radio" id = "male" name="gender" value="Male" checked>
                <label for="male">Male</label>
                <input type="radio" id = "female" name="gender" value="Female">
                <label for="female">Female</label>
                <?php }?>
			</div>
			<div class="profileFormItem">
				<label class="profile" for="phone">Phone No. : </label>
				<input type="tel" id="phone" name="phone" value="<?php echo $row['phone']; ?>" pattern="[0-9]{3}-[0-9]{7,8}" required>
			</div>
			<div class="profileFormItem">
				<label class="profile" for="email">Email : </label>
				<input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
			</div>
			<div class="profileFormItem">
				<label class="profile" for="homeAddress">Address : </label><br/>
				<textarea id="homeAddress" name="homeAddress" rows="5" cols="75" required><?php echo $row['homeAddress']; ?></textarea>
			</div>
			<div class="profileFormItem">
				<label class="profile" for="password">Password : </label>
				<input type="password" id="password" name="password" value="<?php echo $row['password']; ?>" onkeyup="checkChangedPassword();" disabled>
				<?php $_SESSION["password"] = $row['password'];?>
				<input type="button" value="Change password" onclick="changePassword();">
				<input type="button" value="Cancel" onclick="cancelChangePassword();">
			</div>
			<div id="changePassword"></div>
			<div id="passwordMessage"></div>
			<div class="profileFormButton">
				<input class="button-profile" type="submit" name="submit" value="Save" ><div></div>
				<input class="button-profile" type="submit" name="submit" value="Cancel" onclick="document.location='view_own_profile.php'">
			</div>
		</div>
		</div>
	</form>

</body>
</html>

