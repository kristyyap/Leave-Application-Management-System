<?php
session_start(); //Start up PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: index.php");
?>

<html>
<head>
    <title>User Management Page</title>
    <link rel="icon" href="../image/logo.png" type="image/png">
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <?php
    include('admin_mainpage.html');
    ?>
    
    <div id="reportBody">
    <h2>List of Users</h2>
    <?php
    include('search_user.html');
    ?>

    <div id="add-user-button"><div><a href = "add_new_user.php"><img id="add-button" src="../image/add-button.png" alt="Add user" title="add a new user"/></a></div></div>

        <?php
        
        $search = $_POST["searchName"];
        $sortType = $_POST["sortType"];
        require("../config.php");
        // handles searching on all users
        if ($search == ""){
            // handles sorting on all users
            if ($sortType == "" || $sortType == "userId")
                $sql = "SELECT * FROM USER INNER JOIN USERLOGIN on USER.name = USERLOGIN.username ORDER BY userId";
            else if($sortType == "name")
                $sql = "SELECT * FROM USER INNER JOIN USERLOGIN on USER.name = USERLOGIN.username ORDER BY name";
            else if($sortType == "staffNo")
                $sql = "SELECT * FROM USER INNER JOIN USERLOGIN on USER.name = USERLOGIN.username ORDER BY staffNo";
            else if($sortType == "role")
                $sql = "SELECT * FROM USER INNER JOIN USERLOGIN on USER.name = USERLOGIN.username ORDER BY level";
        }
        // handles searching on an user
        else {
            // handles sorting on an user
            $sql = "SELECT * FROM USER INNER JOIN USERLOGIN on USER.name = USERLOGIN.username WHERE name='$search'";
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
            echo "<th> User ID </th>";
            echo "<th> Staff Name </th>";
            echo "<th> Staff No. </th>";
            echo "<th> Role </th>";
            echo "<th> Edit/View User Details </th>";
        echo "</tr>";

            if($count == 0){
                echo "<p> There is no such user in the system. </p>";
            }
            else{
            while($row = mysqli_fetch_assoc($result))
            {
                $x = $x + 1;
                echo "<tr>";
                    echo "<td>" .$x. "</td>";
                    echo "<td>" .$row['userId']. "</td>";
                    echo "<td>" .$row['name']. "</td>";
                    echo "<td>" .$row['staffNo']. "</td>";
                    if ($row['level'] == 1){
                        echo "<td>Admin</td>";
                    }
                    else if ($row['level'] == 2){
                        echo "<td>Manager</td>";
                    }
                    else if ($row['level'] == 3){
                        echo "<td>Staff</td>";
                    }
                    echo "<td>" ."<a href='edit_user_profile.php?s_id=$row[userId]'>Edit/View</a>". "</td>";
                echo "</tr>";
            }
        }
        echo "</table>";

        ?> 
    </div>
</body>
</html>


