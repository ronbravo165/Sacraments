<?php
session_start();

if (!isset($_SESSION['id'])) {
	echo '<script>windows: location="index.php"</script>';
}
?>

<?php
$session = $_SESSION['id'];
include 'connection.php';
$result = mysqli_query($con,"SELECT * FROM user_tbl where id = '$session'");
while ($row = mysqli_fetch_array($result)) {
	$sessionname = $row['fullname'];
}
?>

<?php
if (isset($_POST['add'])) {
	include 'connection.php';
		$id = $_POST['id'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$fullname = $_POST['fullname'];

		mysqli_query($con,"INSERT INTO user_tbl (id, bn, pn, ln) VALUES ('$id', '$bn', '$pn', '$ln', '$fullname', '$father', '$mother', '$birthplace', '$bday', '$bmonth', '$byear', '$decday', '$decmonth', '$decyear', '$presider', '$caused', '$priest')");

		echo '<script>alert("Added successfully.")</script>';
		echo '<script>windows: location="deceased.php"</script>';
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link rel="stylesheet" type="text/css" href="css/style3.css">
	<title>SRS - Deceased</title>
</head>
<body>

	<div class="header">
		<img src="images/logo.png">
		<h1>Sacramental Record System</h1>
		<h3>Parokya ni San Nicolas de Tolentino</h3>
	</div>

	<ul>
		<li><a href="#" class="nav-menu" style="background-color: gold;"></a></li>
		<li><a href="home.php" class="nav-menu">Home</a></li>
		<li><a href="baptism.php" class="nav-menu">Baptism</a></li>
		<li><a href="communion.php" class="nav-menu">Communion</a></li>
		<li><a href="confirmation.php" class="nav-menu">Confirmation</a></li>
		<li><a href="wedding.php" class="nav-menu">Wedding</a></li>
		<li><a href="deceased.php" class="nav-menu">Deceased</a></li>
		<li><a href="requests.php" class="nav-menu">Requests</a></li>
		<li><a href="user.php" class="nav-menu active">User Lists</a></li>
		<li><a href="logout.php" class="nav-menu" style="color: red">LOGOUT</a></li>
	</ul>

<?php

	include 'connection.php';
	$result = mysqli_query($con,"SELECT * FROM user_tbl");

	echo "<center><br>
			<table class='table' border='1'>
				<thead>
					<th style='font-family: century gothic;'>Full Name</th>
					<th style='font-family: century gothic;'>Username</th>
					<th style='font-family: century gothic;'>Password</th>
					<th style='font-family: century gothic;'>Action</th>
				</thead>";

	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td style='margin-left: 16%;'><center>" . $row['fullname'] . "</center></td>";
		echo "<td style='margin-left: 16%;'><center>" . $row['username'] . "</center></td>";
		echo "<td style='margin-left: 16%;'><center>**********</center></td>";
		echo "<td><center><a style='text-decoration: none; color: black;' href='useredit.php?id=".$row['id']."'>&nbsp;&nbsp;Edit&nbsp;&nbsp;</a></center></td>";
		echo "</tr>";
	}
		echo "</table></center>";
?>

	<footer style="width: 85%; margin-left: 15%; font-family: arial narrow; position: fixed; bottom: 0; margin-bottom: 0; background-color: white;">

		<p align="center">Diocese of San Jose Nueva Ecija<br>Parokya ni San Nicolas de Tolentino<br>Carranglan, Nueva Ecija<br>&copy; All rights reserved 2024.</p>
		
	</footer>

</body>
</html>