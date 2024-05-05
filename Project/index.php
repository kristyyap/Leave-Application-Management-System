<!DOCTYPE html>
<html>
	<head>
        <title>Login Page</title>
        <link rel="stylesheet" href = "styles.css">
        <link rel="icon" href="image/logo.png" type="image/png">
        <script src="script.js"></script>
    </head>
	<body>
        <?php
            $cookie_name = "Wai_Jia_Wen";
            $cookie_value = "UTM";

            // Setting the cookie
            setcookie($cookie_name, $cookie_value, time()+86400*30, "/", "");

            // Check if the cookie is set
            if(!isset($_COOKIE[$cookie_name])){
                $message = "Cookie named '".$cookie_name."' is not set!";
            }
            else{
                $message = "Cookie named [".$cookie_name."] is set! Value is: ".$cookie_value;
            }
        ?>

        <script> message = alert("<?php echo $message; ?>");</script>
        <div id = "loginContainer">
        <div id = "loginHeader">
            <h1>Leave Application System</h1>
        </div>

        <div id = "loginBody">
            <h3>LOGIN</h3>
            <form name="loginForm" method="post" action="check_login.php" onsubmit="return(validateLoginForm());">
		        <div><input type="text" id="loginName" name="username" placeholder="Username"></div>
		        <div><input type="password" id="loginPassword" name="password" placeholder="Password"></div>
                <div id="loginRole">
                    <select name="level" onmouseout="checkRoleChoice();">
                        <option value="" selected> - select role - </option>
                        <option value="1">Admin</option>
                        <option value="2">Manager</option>
                        <option value="3">Staff</option>
                    </select>
                    <div id='roleMessage'></div>
                </div>
		        <div id="loginButton"><input type="submit" value="SIGN IN"></div>
		    </form>
        </div>
        </div>
	</body>
</html>