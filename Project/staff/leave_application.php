<?php
session_start(); // Start up PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: index.php");
?>

<html>
<head>
    <title>Leave Application Page</title>
    <link rel="icon" href="../image/logo.png" type="image/png">
    <link rel="stylesheet" href="../styles.css">
    <script src="../script.js"></script>
</head>

<body>
    <?php
    include('staff_mainpage.html');
    ?>
    
    <form name="leaveAppForm" method="post" action="add_leave_application.php" onsubmit="return(validateLeaveAppForm());" >
    <div class="leaveAppFormContainer">
        <div id="leaveAppFormTitle">
            Leave Application Form
        </div>
        <div id="leaveAppFormDesc">
            Please fill in the form below if you need to leave work. 
            All leave applications need to be approved by the manager.
        </div>
        <div id="leaveAppFormBody">
			<div class="leaveAppFormItem">
				<label class="leaveApp" for="startDuration">Start Date : </label>
				<input type="datetime-local" id="startDuration" name="startDuration" onmouseout="checkStartDuration(); checkLeaveDuration();">
                <font id='dateMessage1'></font>
            </div>
			<div class="leaveAppFormItem">
				<label class="leaveApp" for="endDuration">End Date : </label>
				<input type="datetime-local" id="endDuration" name="endDuration" onmouseout="checkLeaveDuration();">
                <font id='dateMessage2'></font>
			</div>
			<div class="leaveAppFormItem">
				<label class="leaveApp" for="leaveType">Leave Type : </label>
				<select id="leaveType" name="leaveType" onmouseout="checkLeaveType();">
                    <option value="" selected> - select leave type - </option>
                    <option value="sick leave">Sick leave</option>
                    <option value="annual leave">Annual leave</option>
                    <option value="casual leave">Casual leave</option>
                    <option value="maternity leave">Maternity leave</option>
                    <option value="paternity leave">Paternity leave</option>
                    <option value="bereavement leave">Bereavement leave</option>
                    <option value="compensatory leave">Compensatory leave</option>
                    <option value="sabbatical leave">Sabbatical leave</option>
                    <option value="unpaid leave">Unpaid leave</option>
                </select>
                <font id='leaveTypeMessage'></font>
			</div>
			<div class="leaveAppFormItem">
				<label class="leaveApp" for="reason">Reason to leave : </label><br/>
				<textarea id="reason" name="reason"></textarea>
			</div>
            <div class="leaveAppFormButton">
                <input class="button-leaveApp" type="submit" value="Submit">
			</div>
        </div>
	</div>
    </form>

</body>
</html>