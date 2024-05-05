<?php
session_start(); // Start up PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: index.php");
?>

<html>
<head>
    <title>Edit Leave Application Page</title>
    <link rel="icon" href="../image/logo.png" type="image/png">
    <link rel="stylesheet" href="../styles.css">
    <script src="../script.js"></script>
</head>

<body>
    <?php
    include('staff_mainpage.html');
    ?>

    <?php
	     require ("../config.php"); 
	     $_SESSION['s_id'] = $_GET['s_id'];
         $id = $_SESSION['s_id'];
	     $sql = "SELECT * FROM LEAVEAPPLICATION WHERE leaveApplicationId = '$id';";
		 $result = mysqli_query($conn, $sql);
	
		 if (mysqli_num_rows($result) == 1)	
		 $row = mysqli_fetch_assoc($result);

		 mysqli_close($conn);
	?>	
    
    <form name="leaveAppForm" method="post" action="update_leave_application.php" onsubmit="return(validateLeaveAppForm());" >
    <div class="leaveAppFormContainer">
        <div id="leaveAppFormTitle">
            Leave Application Details
        </div>
        <div id="leaveAppFormBody">
            <div class="leaveAppFormItem">
				<label class="leaveApp" for="appId">Leave Application ID : </label>
				<input type="text" id = "appId" name="appId" value="<?php echo $row['leaveApplicationId']; ?>" disabled>
			</div>
            <div class="leaveAppFormItem">
				<label class="leaveApp" for="startDuration">Start Date : </label>
				<input type="datetime-local" id="startDuration" name="startDuration" value="<?php echo $row['startDuration']; ?>" onmouseout="checkStartDuration(); checkLeaveDuration();">
                <font id='dateMessage1'></font>
            </div>
			<div class="leaveAppFormItem">
				<label class="leaveApp" for="endDuration">End Date : </label>
				<input type="datetime-local" id="endDuration" name="endDuration" value="<?php echo $row['endDuration']; ?>" onmouseout="checkLeaveDuration();">
                <font id='dateMessage2'></font>
            </div>
			<div class="leaveAppFormItem">
				<label class="leaveApp" for="leaveType">Leave Type : </label>
				<select id="leaveType" name="leaveType" onmouseout="checkLeaveType();">
                <?php 
                $leave = $row['leaveType']; 
                if ($leave == 'sick leave') {?>
                    <option value=""> - select leave type - </option>
                    <option value="sick leave" selected>Sick leave</option>
                    <option value="annual leave">Annual leave</option>
                    <option value="casual leave">Casual leave</option>
                    <option value="maternity leave">Maternity leave</option>
                    <option value="paternity leave">Paternity leave</option>
                    <option value="bereavement leave">Bereavement leave</option>
                    <option value="compensatory leave">Compensatory leave</option>
                    <option value="sabbatical leave">Sabbatical leave</option>
                    <option value="unpaid leave">Unpaid leave</option>
                <?php }
                else if ($leave == 'annual leave') {?>
                    <option value=""> - select leave type - </option>
                    <option value="sick leave">Sick leave</option>
                    <option value="annual leave" selected>Annual leave</option>
                    <option value="casual leave">Casual leave</option>
                    <option value="maternity leave">Maternity leave</option>
                    <option value="paternity leave">Paternity leave</option>
                    <option value="bereavement leave">Bereavement leave</option>
                    <option value="compensatory leave">Compensatory leave</option>
                    <option value="sabbatical leave">Sabbatical leave</option>
                    <option value="unpaid leave">Unpaid leave</option>
                <?php }
                else if ($leave == 'casual leave') {?>
                    <option value=""> - select leave type - </option>
                    <option value="sick leave">Sick leave</option>
                    <option value="annual leave">Annual leave</option>
                    <option value="casual leave" selected>Casual leave</option>
                    <option value="maternity leave">Maternity leave</option>
                    <option value="paternity leave">Paternity leave</option>
                    <option value="bereavement leave">Bereavement leave</option>
                    <option value="compensatory leave">Compensatory leave</option>
                    <option value="sabbatical leave">Sabbatical leave</option>
                    <option value="unpaid leave">Unpaid leave</option>
                <?php }
                else if ($leave == 'maternity leave') {?>
                    <option value=""> - select leave type - </option>
                    <option value="sick leave">Sick leave</option>
                    <option value="annual leave">Annual leave</option>
                    <option value="casual leave">Casual leave</option>
                    <option value="maternity leave" selected>Maternity leave</option>
                    <option value="paternity leave">Paternity leave</option>
                    <option value="bereavement leave">Bereavement leave</option>
                    <option value="compensatory leave">Compensatory leave</option>
                    <option value="sabbatical leave">Sabbatical leave</option>
                    <option value="unpaid leave">Unpaid leave</option>
                <?php }
                else if ($leave == 'paternity leave') {?>
                    <option value=""> - select leave type - </option>
                    <option value="sick leave">Sick leave</option>
                    <option value="annual leave">Annual leave</option>
                    <option value="casual leave">Casual leave</option>
                    <option value="maternity leave">Maternity leave</option>
                    <option value="paternity leave" selected>Paternity leave</option>
                    <option value="bereavement leave">Bereavement leave</option>
                    <option value="compensatory leave">Compensatory leave</option>
                    <option value="sabbatical leave">Sabbatical leave</option>
                    <option value="unpaid leave">Unpaid leave</option>
                <?php }
                else if ($leave == 'bereavement leave') {?>
                    <option value=""> - select leave type - </option>
                    <option value="sick leave">Sick leave</option>
                    <option value="annual leave">Annual leave</option>
                    <option value="casual leave">Casual leave</option>
                    <option value="maternity leave">Maternity leave</option>
                    <option value="paternity leave">Paternity leave</option>
                    <option value="bereavement leave" selected>Bereavement leave</option>
                    <option value="compensatory leave">Compensatory leave</option>
                    <option value="sabbatical leave">Sabbatical leave</option>
                    <option value="unpaid leave">Unpaid leave</option>
                <?php }
                else if ($leave == 'compensatory leave') {?>
                    <option value=""> - select leave type - </option>
                    <option value="sick leave">Sick leave</option>
                    <option value="annual leave">Annual leave</option>
                    <option value="casual leave">Casual leave</option>
                    <option value="maternity leave">Maternity leave</option>
                    <option value="paternity leave">Paternity leave</option>
                    <option value="bereavement leave">Bereavement leave</option>
                    <option value="compensatory leave" selected>Compensatory leave</option>
                    <option value="sabbatical leave">Sabbatical leave</option>
                    <option value="unpaid leave">Unpaid leave</option>
                <?php }
                else if ($leave == 'sabbatical leave') {?>
                    <option value=""> - select leave type - </option>
                    <option value="sick leave">Sick leave</option>
                    <option value="annual leave">Annual leave</option>
                    <option value="casual leave">Casual leave</option>
                    <option value="maternity leave">Maternity leave</option>
                    <option value="paternity leave">Paternity leave</option>
                    <option value="bereavement leave">Bereavement leave</option>
                    <option value="compensatory leave">Compensatory leave</option>
                    <option value="sabbatical leave" selected>Sabbatical leave</option>
                    <option value="unpaid leave">Unpaid leave</option>
                <?php }
                else if ($leave == 'unpaid leave') {?>
                    <option value=""> - select leave type - </option>
                    <option value="sick leave">Sick leave</option>
                    <option value="annual leave">Annual leave</option>
                    <option value="casual leave">Casual leave</option>
                    <option value="maternity leave">Maternity leave</option>
                    <option value="paternity leave">Paternity leave</option>
                    <option value="bereavement leave">Bereavement leave</option>
                    <option value="compensatory leave">Compensatory leave</option>
                    <option value="sabbatical leave">Sabbatical leave</option>
                    <option value="unpaid leave" selected>Unpaid leave</option>
                <?php }?>
                </select>
                <font id='leaveTypeMessage'></font>
			</div>
			<div class="leaveAppFormItem">
				<label class="leaveApp" for="reason">Reason to leave: </label><br/>
				<textarea id="reason" name="reason"><?php echo $row['reasonToLeave']; ?></textarea>
			</div>
            <div class="leaveAppFormButton">
                <input class="button-leaveApp" type="submit" value="Save"/><div></div>
                <input class="button-leaveApp" type="submit" name="submit" value="Cancel" onclick="document.location='view_leave_report.php'">
			</div>
        </div>
	</div>
    </form>

</body>
</html>