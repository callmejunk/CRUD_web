<?php 

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == "POST")  {
    $fullname = $_POST['fullname'];
	$username = $_POST['username'];
    $email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "INSERT INTO `userlogin`(`username`, `fullname`, `email`, `password`) VALUES ('$fullname','$username','$email','$password')" ;
	$query = $conn->query($sql);

	if ($query) {
		header("location: login.php");
	} else {
		echo "signup unsuccessful";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Signup Form</title>
</head>
<body>
	
		 <div class="form">
                <h1 class="form-title">SIGN UP</h1>
                <form action="" method="post">
                    <div>
                        <label for="fullname">Fullname</label>
                        <input type="text" name="fullname" id="fullname" required>
                    </div>
                    <div>
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" required>
                    </div>
                     <div>
                        <label for="email">Email</label><br>
                        <input type="email" name="email" id="email" required>
                    </div>

                    <div>
                        <label for="password">Password</label><br>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="button">
                        <div>
                            Already have an have account? <a href="login.php">Login</a>
                        </div>
                        <div>
                            <button>Sign up</button>
                        </div>
                    </div>
                </div>
	
</body>
</html>