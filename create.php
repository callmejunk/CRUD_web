<?php 

include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$name = $_POST['fullname'];
	$dob = $_POST['dob'];
	$email = $_POST['email'];
	$address = $_POST['address'];

	$sql = "INSERT INTO `student`(`fullname`, `dob`, `email`, `address`) VALUES ('$name','$dob','$email','$address')";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo "failed to add student";
	} else {
		header("location: index.php");
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>add new student</title>
</head>
<body>

	<h1 class="title">Add New Student</h1>
	<div class="form">
		<form method="post">
			<label for="name">Fullname</label>
			<input type="text" name="fullname" id="name" required><br>
			<label for="dob">Date of Birth</label>
			<input type="date" name="dob" id="dob" required><br>
			<label for="email">Email</label>
			<input type="Email" name="email" id="email" required><br>
			<label for="address">Adress</label>
			<input type="text" name="address" id="address" required><br>
			<a href="index.php" class="back">Back</a>
			<button>Done</button>
		</form>
	</div>
</body>
</html>