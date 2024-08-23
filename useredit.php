<?php

	session_start();

?>

<?php

	$session = $_SESSION['id'];
	include 'connection.php';
	$result = mysqli_query($con,"SELECT * from user_tbl where id = '$session'");

	while ($row = mysqli_fetch_array($result)) {
		$sessionname = $row['fullname'];
	}

?>

<?php
	include 'connection.php';
	$owner_id = $_REQUEST['id'];

	$result = mysqli_query($con,"SELECT * from user_tbl where id = '$owner_id'");
	$test = mysqli_fetch_array($result);

	if (!$result) {
		die("Error: Data not found.");
	}

		$id = $test['id'];
		$username = $test['username'];
		$password = $test['password'];
		$fullname = $test['fullname'];
		
?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<title>SRS - Users' List (Update)</title>
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
		<li><a href="user.php" class="nav-menu active">User Lists</a></li>
		<li><a href="logout.php" class="nav-menu" style="color: red">LOGOUT</a></li>
	</ul>

	<div class="container-update">
		<h1 align="center">Update Users Information</h1>

		<div class="content-update">
			<center><form method="post" action="usereditexec.php">
				<input type="hidden" name="id" value="<?php echo $id;?>">

				<label>Fullname:</label>
				<input type="text" name="fullname" value="<?php echo $fullname;?>"><br><br>
				<label>Username</label>
				<input type="text" name="username" value="<?php echo $username;?>"><br><br>
				<label>Password:</label>
				<input type="text" name="password" value="<?php echo $password;?>">
				<br><br>
					<input type="submit" name="add" value="UPDATE" style="width: 15%;">
					<a href="user.php">BACK</a>
					<br><br>
				</center>

			</form>
		</div>
	</div>

	

</body>
</html>