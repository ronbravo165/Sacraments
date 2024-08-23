<?php
session_start();

if (!isset($_SESSION['id'])) {
	echo '<script>windows: location="index.php"</script>';
}
?>

<?php
$session = $_SESSION['id'];
include '../connection.php';
$result = mysqli_query($con,"SELECT * FROM register_tbl where id = '$session'");
while ($row = mysqli_fetch_array($result)) {
	$sessionname = $row['fullname'];
}
?>

<?php
if (isset($_POST['add'])) {
	include '../connection.php';
		$id = $_POST['id'];
		$fullname = $_POST['fullname'];
		$address = $_POST['address'];
		$caused = $_POST['caused'];

		mysqli_query($con,"INSERT INTO decrequest_tbl (id, fullname, address, caused) VALUES ('$id', '$fullname', '$address', '$caused')");

		echo '<script>alert("Added successfully.")</script>';
		echo '<script>windows: location="home.php"</script>';
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../images/logo.png">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>SRS - Confirmation Request</title>

	<style type="text/css">
		
		.register{
			width: 30%;
			margin: 150px auto;
			font-family: century gothic;
		}

		.register input[type=text], .register input[type=password]{
			width: 100%;
			height: 30px;
		}

		.register input[type=submit]{
			width: 150px;
			height: 30px;
			background-color: #33FF33;
			color: black;
			border: none;
			text-transform: uppercase;
			font-family: century gothic;
		}

		.register input[type=submit]:hover{
			color: white;
			background-color: green;
			transition: .5s;
		}

	</style>

</head>
<body>

	<div class="register">
		<form method="post">
			<input type="hidden" value="0" name="id">
			<h2 align="center">Confirmation Request Form</h2>
			<label>Full Name:</label><br>
			<input type="text" name="fullname" required><br>
			<label>Address:</label><br>
			<input type="text" name="address" required><br>
			<label>Cause of Death:</label><br>
			<input type="text" name="caused" required><br><br>

			<center><input type="submit" value="Request Record" name="add"></center>

		</form>
	</div>

</body>
</html>