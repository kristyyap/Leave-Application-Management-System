<?php
session_start(); //Start up PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: index.php");
?>

<html>
<head>
    <title>Manage Leave Approval</title>
    <link rel="icon" href="../image/logo.png" type="image/png">
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <?php
    include('manager_mainpage.html');
    ?>

    <?php
        require("../config.php");
        $sql = "SELECT * FROM LEAVEAPPLICATION INNER JOIN USER on LEAVEAPPLICATION.staffNo = USER.staffNo WHERE status = 'pending' ORDER BY startDuration ";
        $result = mysqli_query($conn, $sql) or die(mysqli_connect_error());
        $x = 0;

        $count=mysqli_num_rows($result);

        mysqli_close($conn);
    ?>
    
    <div id="reportBody">
    <h2>List of Leave Application Pending </h2>

    <?php
        echo "<table class='reportTable'>";
        echo "<tr>";
            echo "<th > No. </th>";
            echo "<th> Leave Application ID </th>";
            echo "<th> Staff Name </th>";
            echo "<th> Start Duration </th>";
            echo "<th> End Duration </th>";
            echo "<th> Leave Duration (day(s)) </th>";
            echo "<th> Leave Type </th>";
            echo "<th> Status </th>";
            echo "<th> Leave Application Approval </th>";
        echo "</tr>";

        if($count == 0){
            echo "<p> There is no leave application pending. </p>";
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
                echo "<td>" ."<a href='manage_approval.php?s_id=$row[leaveApplicationId]'>Manage</a>". "</td>";
                echo "</tr>";
        }
        }
        echo "</table>";

    ?> 
    </div>
</body>
</html>