<?php

	session_start();

?>

<?php

	include 'connection.php';
	$owner_id = $_REQUEST['id'];

	$result = mysqli_query($con,"SELECT * from wedding_tbl where id = '$owner_id'");
	$test = mysqli_fetch_array($result);

	if (!$result) {
		die("Data not found.");
	}

		$id = $test['id'];
		$bn = $test['bn'];
		$pn = $test['pn'];
		$ln = $test['ln'];
		$groom = $test['groom'];
		$groomage = $test['groomage'];
		$groombday = $test['groombday'];
		$groombmonth = $test['groombmonth'];
		$groombyear = $test['groombyear'];
		$groomfather = $test['groomfather'];
		$groommother = $test['groommother'];
		$groomaddress = $test['groomaddress'];
		$bride = $test['bride'];
		$brideage = $test['brideage'];
		$bridebday = $test['bridebday'];
		$bridebmonth = $test['bridebmonth'];
		$bridebyear = $test['bridebyear'];
		$bridefather = $test['bridefather'];
		$bridemother = $test['bridemother'];
		$brideaddress = $test['brideaddress'];
		$godfather = $test['godfather'];
		$godmother = $test['godmother'];
		$wedday = $test['wedday'];
		$wedmonth = $test['wedmonth'];
		$wedyear = $test['wedyear'];
		$presider = $test['presider'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<title>SRS - Wedding (Delete)</title>
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
		<li><a href="wedding.php" class="nav-menu active">Wedding</a></li>
		<li><a href="deceased.php" class="nav-menu">Deceased</a></li>
		<li><a href="deceased.php" class="nav-menu">Requests</a></li>
		<li><a href="deceased.php" class="nav-menu">Reports</a></li>
		<li><a href="user.php" class="nav-menu">User Lists</a></li>
		<li><a href="logout.php" class="nav-menu" style="color: red">LOGOUT</a></li>
	</ul>

	<form action="weddingdeleteexec.php" method="post" class="delete-container">
		<h1 align="center">Are you sure you want to delete this record <?php echo $groom;?> and <?php echo $bride;?>?</h1>
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<center>
			<input type="submit" name="ok" value="DELETE">
			<a href="wedding.php">BACK</a>
		</center>
	</form>

</body>
</html>