<html>
<head>
    <title>Add New User Page</title>
    <link rel="icon" href="../image/logo.png" type="image/png">
    <link rel="stylesheet" href="../styles.css">
	<script src="../script.js"></script>
</head>

<body>
    <?php
    include('admin_mainpage.html');
    ?>

	<form name="profileForm" method="post" action="insert_new_user.php" onsubmit="return(validateProfile());">
		<div class="profileContainer">
		<div id="profileTitle">
            Add New User
        </div>
		<div class="profileBody">
			<div class="profileFormItem">
				<label class="profile" for="level">User Level : </label>
				<select id="level" name="level" onmouseout="checkRoleChoice2();" required>
						<option value="" selected> - select role - </option>
						<option value="1">Admin</option>
						<option value="2">Manager</option>
						<option value="3">Staff</option>
            	</select>
			</div>
			<div id='roleMessage'></div>
			<div class="profileFormItem">
				<label class="profile" for="staffNo">Staff No : </label>
				<input type="text" id="staffNo" name="staffNo" placeholder="XXXXX" required>
			</div>
			<div class="profileFormItem">
				<label class="profile" for="name">Full Name : </label>
				<input type="text" id="name" name="name" placeholder="full name" required>
			</div>
			<div class="profileFormItem">
				<label class="profile" for="ic">IC No. : </label>
				<input type="text" id="ic" name="ic" placeholder="XXXXXX-XX-XXXX" pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}" required>
			</div>
			<div class="profileFormItem">
				<label class="profile" for="DOB">Date of Birth : </label>
				<input type="date" id="DOB" name="DOB" placeholder="2001-10-29" required>
			</div>
			<div class="profileFormItem">
				<label class="profile" for="male">Gender : </label>
				<input type="radio" id = "male" name="gender" value="Male" checked>
                <label for="male">Male</label>
                <input type="radio" id = "female" name="gender" value="Female">
                <label for="female">Female</label>
			</div>
			<div class="profileFormItem">
				<label class="profile" for="phone">Phone No. : </label>
				<input type="tel" id="phone" name="phone" placeholder="XXX-XXXXXXXX" pattern="[0-9]{3}-[0-9]{7,8}" required>
			</div>
			<div class="profileFormItem">
				<label class="profile" for="email">Email : </label>
				<input type="email" id="email" name="email" placeholder="XXXX@XXXX.XXX" required>
			</div>
			<div class="profileFormItem">
				<label class="profile" for="homeAddress">Address : </label><br/>
				<textarea id="homeAddress" name="homeAddress" rows="5" cols="75" placeholder="full address" required></textarea>
			</div>
			<div class="profileFormItem">
				<label class="profile" for="password">Password : </label>
				<input type="password" id="password" name="password" onkeyup="checkChangedPassword();" required>
			</div>
            <div class="profileFormItem">
				<label class="profile" for="cpassword">Confirm Password : </label>
				<input type="password" id="cpassword" name="cpassword" onkeyup="checkChangedPassword();" required>
				<font id='passwordMessage'></font>
			</div>
			<div class="profileFormButton">
				<input class="button-profile" type="submit" name="submit" value="Add"><div></div>
				<input class="button-profile" type="submit" name="submit" value="Cancel" onclick="document.location='user_management.php'">
			</div>
		</div>
		</div>
	</form>

</body>
</html>

