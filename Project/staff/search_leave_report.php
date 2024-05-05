<?php
session_start(); //Start up PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: index.php");
?>

<html>
<head>
    <title>Staff Leave Application Report</title>
    <link rel="icon" href="../image/logo.png" type="image/png">
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <?php
    include('staff_mainpage.html');
    ?>
    
    <div id="reportBody">
    <h2>List of Application</h2>
    <?php
    include('search_leave_report.html');
    ?>

        <?php
        require("../config.php");
        $username = $_SESSION["USER"];
        $staff = mysqli_query($conn, "SELECT staffNo FROM USER INNER JOIN USERLOGIN on USER.name = USERLOGIN.username WHERE name = '$username'");
        $result = mysqli_fetch_assoc($staff);
        $staffNo = $result['staffNo'];
        $search = $_POST["status"];
        $sortType = $_POST["sortType"];
        // handles searching on user's all leave application
        if ($search == ""){
            // handles sorting on user's all leave application
            if ($sortType == "" || $sortType == "leaveApplicationId")
                $sql = "SELECT * FROM LEAVEAPPLICATION WHERE staffNo = '$staffNo' ORDER BY leaveApplicationId";
            else if($sortType == "startDuration")
                $sql = "SELECT * FROM LEAVEAPPLICATION WHERE staffNo = '$staffNo' ORDER BY startDuration";
            else if($sortType == "endDuration")
                $sql = "SELECT * FROM LEAVEAPPLICATION WHERE staffNo = '$staffNo' ORDER BY endDuration";
            else if($sortType == "leaveDuration")
                $sql = "SELECT * FROM LEAVEAPPLICATION WHERE staffNo = '$staffNo' ORDER BY leaveDuration";
            else if($sortType == "leaveType")
                $sql = "SELECT * FROM LEAVEAPPLICATION WHERE staffNo = '$staffNo' ORDER BY leaveType";
            else if($sortType == "status")
                $sql = "SELECT * FROM LEAVEAPPLICATION WHERE staffNo = '$staffNo' ORDER BY status";
        }
        // handles searching on an user's certain leave application
        else {
            // handles sorting on an user's certain leave application
            if ($sortType == "" || $sortType == "leaveApplicationId")
                $sql = "SELECT * FROM LEAVEAPPLICATION WHERE staffNo = '$staffNo' AND status = '$search' ORDER BY leaveApplicationId";
            else if($sortType == "startDuration")
                $sql = "SELECT * FROM LEAVEAPPLICATION WHERE staffNo = '$staffNo' AND status = '$search' ORDER BY startDuration";
            else if($sortType == "endDuration")
                $sql = "SELECT * FROM LEAVEAPPLICATION WHERE staffNo = '$staffNo' AND status = '$search' ORDER BY endDuration";
            else if($sortType == "leaveDuration")
                $sql = "SELECT * FROM LEAVEAPPLICATION WHERE staffNo = '$staffNo' AND status = '$search' ORDER BY leaveDuration";
            else if($sortType == "leaveType")
                $sql = "SELECT * FROM LEAVEAPPLICATION WHERE staffNo = '$staffNo' AND status = '$search' ORDER BY leaveType";
            else if($sortType == "status")
                $sql = "SELECT * FROM LEAVEAPPLICATION WHERE staffNo = '$staffNo' AND status = '$search' ORDER BY status";
        }
        $result = mysqli_query($conn, $sql) or die(mysqli_connect_error());
        $x = 0;

        $count=mysqli_num_rows($result);

        mysqli_close($conn);
        ?>
        
        <?php
        echo "<table class='reportTable'>";
        echo "<tr>";
            echo "<th> No. </th>";
            echo "<th> Leave ID </th>";
            echo "<th> Start Duration </th>";
            echo "<th> End Duration </th>";
            echo "<th> Leave Duration (day(s)) </th>";
            echo "<th> Leave Type </th>";
            echo "<th> Reason to Leave </th>";
            echo "<th> Status </th>";
            echo "<th> Edit </th>";
            echo "<th> Delete </th>";
        echo "</tr>";
       
        if($count == 0){
            echo "<p> Leave application not found </p>";
        }
        else{
        while($row = mysqli_fetch_assoc($result))
        {
            $x = $x + 1;
            echo "<tr>";
                echo "<td>" .$x. "</td>";
                echo "<td>" .$row['leaveApplicationId']. "</td>";
                echo "<td>" .$row['startDuration']. "</td>";
                echo "<td>" .$row['endDuration']. "</td>";
                echo "<td>" .number_format($row['leaveDuration']/24,2). "</td>";
                echo "<td>" .$row['leaveType']. "</td>";
                echo "<td>" .$row['reasonToLeave']. "</td>";
                echo "<td>" .$row['status']. "</td>";

                $_SESSION["LEAVEAPPID"] = $row['leaveApplicationId'];
                if ($row['status'] == 'pending'){
                    echo "<td>" ."<a href='edit_leave_application.php?s_id=$row[leaveApplicationId]'>Edit</a>". "</td>";
                }
                else{
                    echo "<td>" ."-". "</td>";
                }
                if ($row['status'] == 'approved' || $row['status'] == 'denied'){
                    echo "<td>" ."-". "</td>";
                }
                else{
                    echo "<td>" ."<a href='delete_leave_application.php?s_id=$row[leaveApplicationId]' onclick='return(getDeleteConfirmation());'>Delete</a>". "</td>";
                }
                echo "</tr>";
        }
        }
        echo "</table>";
        ?> 
        </div>
</body>
</html>


