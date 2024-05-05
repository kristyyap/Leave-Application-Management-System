<?php
session_start(); //Start up PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: index.php");
?>

<html>
<head>
    <title>Leave Application Report</title>
    <link rel="icon" href="../image/logo.png" type="image/png">
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <?php
    include('admin_mainpage.html');
    ?>
    
    <div id="reportBody">
    <h2>List of Leave Application</h2>
    <?php
    include('search_leave_application.html');
    ?>

        <?php
        
        $search = $_POST["searchName"];
        $sortType = $_POST["sortType"];
        require("../config.php");
        // handles searching on all users leave application
        if ($search == ""){
            // handles sorting on all users leave application
            if ($sortType == "" || $sortType == "leaveApplicationId")
                $sql = "SELECT * FROM LEAVEAPPLICATION INNER JOIN USER on LEAVEAPPLICATION.staffNo = USER.staffNo ORDER BY leaveApplicationId";
            else if($sortType == "name")
                $sql = "SELECT * FROM LEAVEAPPLICATION INNER JOIN USER on LEAVEAPPLICATION.staffNo = USER.staffNo ORDER BY name";
            else if($sortType == "startDuration")
                $sql = "SELECT * FROM LEAVEAPPLICATION INNER JOIN USER on LEAVEAPPLICATION.staffNo = USER.staffNo ORDER BY startDuration";
            else if($sortType == "endDuration")
                $sql = "SELECT * FROM LEAVEAPPLICATION INNER JOIN USER on LEAVEAPPLICATION.staffNo = USER.staffNo ORDER BY endDuration";
            else if($sortType == "leaveDuration")
                $sql = "SELECT * FROM LEAVEAPPLICATION INNER JOIN USER on LEAVEAPPLICATION.staffNo = USER.staffNo ORDER BY leaveDuration";
            else if($sortType == "leaveType")
                $sql = "SELECT * FROM LEAVEAPPLICATION INNER JOIN USER on LEAVEAPPLICATION.staffNo = USER.staffNo ORDER BY leaveType";
            else if($sortType == "status")
                $sql = "SELECT * FROM LEAVEAPPLICATION INNER JOIN USER on LEAVEAPPLICATION.staffNo = USER.staffNo ORDER BY status";
        }
        // handles searching on an user's leave application
        else {
            // handles sorting on an user's leave application
            if ($sortType == "" || $sortType == "leaveApplicationId")
                $sql = "SELECT * FROM LEAVEAPPLICATION INNER JOIN USER on LEAVEAPPLICATION.staffNo = USER.staffNo WHERE name='$search' ORDER BY leaveApplicationId";
            else if($sortType == "name")
                $sql = "SELECT * FROM LEAVEAPPLICATION INNER JOIN USER on LEAVEAPPLICATION.staffNo = USER.staffNo WHERE name='$search' ORDER BY name";
            else if($sortType == "startDuration")
                $sql = "SELECT * FROM LEAVEAPPLICATION INNER JOIN USER on LEAVEAPPLICATION.staffNo = USER.staffNo WHERE name='$search' ORDER BY startDuration";
            else if($sortType == "endDuration")
                $sql = "SELECT * FROM LEAVEAPPLICATION INNER JOIN USER on LEAVEAPPLICATION.staffNo = USER.staffNo WHERE name='$search' ORDER BY endDuration";
            else if($sortType == "leaveDuration")
                $sql = "SELECT * FROM LEAVEAPPLICATION INNER JOIN USER on LEAVEAPPLICATION.staffNo = USER.staffNo WHERE name='$search' ORDER BY leaveDuration";
            else if($sortType == "leaveType")
                $sql = "SELECT * FROM LEAVEAPPLICATION INNER JOIN USER on LEAVEAPPLICATION.staffNo = USER.staffNo WHERE name='$search' ORDER BY leaveType";
            else if($sortType == "status")
                $sql = "SELECT * FROM LEAVEAPPLICATION INNER JOIN USER on LEAVEAPPLICATION.staffNo = USER.staffNo WHERE name='$search' ORDER BY status";
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
            echo "<th> Leave Application ID </th>";
            echo "<th> Staff Name </th>";
            echo "<th> Start Duration </th>";
            echo "<th> End Duration </th>";
            echo "<th> Leave Duration (day(s)) </th>";
            echo "<th> Leave Type </th>";
            echo "<th> Status </th>";
            echo "<th> View Details </th>";
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
                echo "<td>" .$row['name']. "</td>";
                echo "<td>" .$row['startDuration']. "</td>";
                echo "<td>" .$row['endDuration']. "</td>";
                echo "<td>" .number_format($row['leaveDuration']/24,2). "</td>";
                echo "<td>" .$row['leaveType']. "</td>";
                echo "<td>" .$row['status']. "</td>";
                echo "<td>" ."<a href='view_approval.php?s_id=$row[leaveApplicationId]'>View</a>". "</td>";
                echo "</tr>";
        }
        }
        echo "</table>";

        ?> 
    </div>
</body>
</html>


