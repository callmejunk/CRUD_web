<?php
session_start();
include 'conn.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `userlogin` WHERE username = '$username' AND password = '$password'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) {
        echo "Invalid credentials";
    } else {
        $_SESSION["logged_in"] = true;
        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Login Form</title>
</head>
<body>
	
		 <div>
        <div class="form">
            <h1 class="form-title">LOGIN</h1>
            <form action="" method="post">
                <div>
                    <label for="username">Username</label><br>
                    <input type="text" name="username" id="username" required>
                </div>

                <div>
                    <label for="password">password</label><br>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="button">
	                <div>
	                    Don't have account? <a href="signup.php">sign up Now</a>
	                </div>
	                 	<div>
	                    <button>log in</button>
	                </div>
                </div>
	
</body>
</html>