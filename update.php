<?php
include('conn.php');

if (isset($_GET['studentID'])) {
    $id = $_GET['studentID'];
    $sql = "SELECT * FROM `student` WHERE studentID = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        header('Location: index.php');
        exit();
    }
}

if (isset($_POST['submit'])) {
    $fname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $id = $_GET['studentID'];

    $sql = "UPDATE `student` SET `fullname`='$fname', `dob`='$dob', `email`='$email', `address`='$address' WHERE `studentID` = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg=Record updated successfully!");
        exit();
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Student</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1 class="title">Update Student</h1>
    <div class="form">
	    <form method="post" action="">
	        <label for="name">Fullname</label>
	        <input type="text" name="fullname" id="name" value="<?php echo isset($row['fullname']) ? $row['fullname'] : ''; ?>" required><br>
	        <label for="dob">Date of Birth</label>
	        <input type="date" name="dob" id="dob" value="<?php echo isset($row['dob']) ? $row['dob'] : ''; ?>" required><br>
	        <label for="email">Email</label>
	        <input type="email" name="email" id="email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>" required><br>
	        <label for="address">Address</label>
	        <input type="text" name="address" id="address" value="<?php echo isset($row['address']) ? $row['address'] : ''; ?>" required><br>
	        <a href="index.php" class="back">Back</a>
	        <button type="submit" name="submit">Done</button>

	    </form>
    </div>
</body>

</html>
