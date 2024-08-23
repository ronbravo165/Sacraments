<?php
if (isset($_POST['add'])) {
	include '../connection.php';
		$id = $_POST['id'];
		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		mysqli_query($con,"INSERT INTO register_tbl (id, fullname, username, password) VALUES ('$id', '$fullname', '$username', '$password')");

		echo '<script>alert("Added successfully.")</script>';
		echo '<script>windows: location="index.php"</script>';
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../images/logo.png">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>SRS - Register</title>

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
			width: 100px;
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
			<h2 align="center">Signup Form</h2>
			<label>Full Name:</label><br>
			<input type="text" name="fullname" required><br>
			<label>Username:</label><br>
			<input type="text" name="username" required><br>
			<label>Password:</label><br>
			<input type="password" name="password" required><br><br>

			<center><input type="submit" value="Sign Up" name="add"></center>

		</form>
	</div>
	
</body>
</html>