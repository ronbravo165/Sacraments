<?php

	session_start();

?>

<?php

	include 'connection.php';
	$owner_id = $_REQUEST['id'];

	$result = mysqli_query($con,"SELECT * from wedrequest_tbl where id = '$owner_id'");
	$test = mysqli_fetch_array($result);

	if (!$result) {
		die("Data not found.");
	}

		$id = $test['id'];
		$groom = $test['groom'];
		$bride = $test['bride'];
		$address = $test['address'];
		
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<title>SRS - Wedding Record Request (Delete)</title>
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
		<li><a href="deceased.php" class="nav-menu active">Requests</a></li>
		<li><a href="user.php" class="nav-menu">User Lists</a></li>
		<li><a href="logout.php" class="nav-menu" style="color: red">LOGOUT</a></li>
	</ul>

	<form action="wedrequestdeleteexec.php" method="post" class="delete-container">
		<h1 align="center">Are you sure you want to delete <?php echo $groom;?> and <?php echo $bride;?> record?</h1>
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<center>
			<input type="submit" name="ok" value="DELETE">
			<a href="requests.php">BACK</a>
		</center>
	</form>

</body>
</html>