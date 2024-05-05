<?php
session_start(); //Start up PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: index.php");
?>

<html>
<head>
    <title>View Leave Report</title>
    <link rel="icon" href="../image/logo.png" type="image/png">
    <link rel="stylesheet" href="../styles.css">
    <script src="../script.js"></script>
</head>

<body>
    <?php
    include('staff_mainpage.html');
    ?>

    <?php
        require("../config.php");
        $username = $_SESSION["USER"];
        $staff = mysqli_query($conn, "SELECT staffNo FROM USER INNER JOIN USERLOGIN on USER.name = USERLOGIN.username WHERE name = '$username'");
        $result = mysqli_fetch_assoc($staff);
        $staffNo = $result['staffNo'];
        $sql = "SELECT * FROM LEAVEAPPLICATION WHERE staffNo = '$staffNo'";
        $result = mysqli_query($conn, $sql) or die(mysqli_connect_error());
        $x = 0;

        $count=mysqli_num_rows($result);

        mysqli_close($conn);
    ?>
    
    <div id="reportBody">
    <h2>List of Application</h2>
    <?php
    include('search_leave_report.html');
    ?>

    <?php
        echo "<table class='reportTable'>";
        echo "<tr>";
            echo "<th > No. </th>";
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