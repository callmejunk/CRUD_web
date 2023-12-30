<?php
session_start();


if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {

    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Student Information</title>

</head>
<body>
	<div class="header">
		<div class="logo">
			<h3>MY CRUD</h3>
		</div>
		<div>
			<a href="logout.php" class="logout">logout</a>
		</div>
	</div>
	<h1 class="title"> Student Information</h1>

	<div class="table">
		<table>
			<div class="span"><a href="create.php" class="btn-primary">ADD STUDENT</a></div>
	            <thead>
	               <tr>
	                  <th>Fullname</th>
	                  <th>Date of Birth</th>
	                  <th>Email</th>
	                  <th>Address</th> <!-- Fixed typo "address" to "Address" -->
	                  <th>Action</th>
	               </tr>
	           </thead>
	           <tbody>
	                  <?php
		                  include('conn.php');
		                  $query = "SELECT * FROM `student`";
		                  $result = mysqli_query($conn, $query);
		                  while ($row = mysqli_fetch_assoc($result)) {
		            	      echo "<tr>";
		                      echo "<td>" . $row['fullname'] . "</td>";
		                      echo "<td>" . $row['dob'] . "</td>";
		                      echo "<td>" . $row['email'] . "</td>";
		                      echo "<td>" . $row['address'] . "</td>";
		                      echo "<td>
		                     	 <a href='update.php?studentID=$row[studentID]' class='btn-primary'>UPDATE</a> |
		                         <a href='delete_request.php?studentID=$row[studentID]' class='btn-danger'>DELETE</a>
		                         </td>";
		                      echo "</tr>";
		                        }
		                        mysqli_close($conn);
	                       ?>
	           </tbody>
	   </table>
   </div>
</body>
</html>