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

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../images/logo.png">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>SRS - Home | Parishioner</title>


	<style type="text/css">
		*{
			font-family: century gothic;
		}

		.button{
			background-color: #30B0E4;
			text-decoration: none;
			text-transform: uppercase;
			letter-spacing: 2px;
			color: black;
			padding: 5px 10px;
		}

		.button:hover{
			color: white;
			background-color: blue;
			transition: .5s;
		}

	</style>

</head>

<body>
	
	<div class="header">
		<img src="../images/logo.png">
		<h1>Parokya ni San Nicolas de Tolentino</h1>
		<h3>Welcome, <?php echo $sessionname;?>!</h3><a href="logout.php" style="float: right; margin-right: 30px; margin-top: 30px;">Logout</a>
	</div>

	<div style="width: 50%; margin: 100px auto;">
		<h2 align="center">Request a Record</h2><br>

		<center><a href="baptismalrequest.php" class="button" style="padding: 5px 44px;">Baptism</a></center><br>
		<center><a href="confirmationrequest.php" class="button">Confirmation</a></center><br>
		<center><a href="communionrequest.php" class="button" style="padding: 5px 20px;">Communion</a></center><br>
		<center><a href="weddingrequest.php" class="button" style="padding: 5px 38px;">Wedding</a></center><br>
		<center><a href="deceasedrequest.php" class="button" style="padding: 5px 35px;">Deceased</a></center><br>

	</div>

</body>
</html>
