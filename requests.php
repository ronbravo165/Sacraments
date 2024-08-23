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

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>SRS - Requests</title>
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
		<li><a href="requests.php" class="nav-menu active">Requests</a></li>
		<li><a href="user.php" class="nav-menu">User Lists</a></li>
		<li><a href="logout.php" class="nav-menu" style="color: red">LOGOUT</a></li>
	</ul>


	<h2 style="margin-left: 260px;">List of Requests</h2>

	<h3 style="margin-left: 260px;">Baptismal Requests</h3>
	

		<?php

			include 'connection.php';

			$result = mysqli_query($con,"SELECT * FROM baprequest_tbl");

			echo "<table style='margin-left: 260px; width: 75%;' border='1'>
					<tr>
						<td>Fullname</td>
						<td>Address</td>
						<td>Birthday</td>
						<td>Action</td>
					</tr>";

			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $row['fullname'] . "</td>";
				echo "<td>" . $row['address'] . "</td>";
				echo "<td>" . $row['birthday'] . "</td>";
				echo "<td><a style='text-decoration: none; color: black;' href='baprequestdelete.php?id=".$row['id']."'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</a></td>";
				echo "</tr>";

			}
				echo "</table>";
		?>

		<br>

		<h3 style="margin-left: 260px;">Communion Requests</h3>
	

		<?php

			include 'connection.php';

			$result = mysqli_query($con,"SELECT * FROM comrequest_tbl");

			echo "<table style='margin-left: 260px; width: 75%;' border='1'>
					<tr>
						<td>Fullname</td>
						<td>Address</td>
						<td>Birthday</td>
						<td>Action</td>
					</tr>";

			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $row['fullname'] . "</td>";
				echo "<td>" . $row['address'] . "</td>";
				echo "<td>" . $row['birthday'] . "</td>";
				echo "<td><a style='text-decoration: none; color: black;' href='comrequestdelete.php?id=".$row['id']."'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</a></td>";
				echo "</tr>";

			}
				echo "</table>";
		?>

		<br>

		<h3 style="margin-left: 260px;">Confirmation Requests</h3>
	

		<?php

			include 'connection.php';

			$result = mysqli_query($con,"SELECT * FROM conrequest_tbl");

			echo "<table style='margin-left: 260px; width: 75%;' border='1'>
					<tr>
						<td>Fullname</td>
						<td>Address</td>
						<td>Birthday</td>
						<td>Action</td>
					</tr>";

			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $row['fullname'] . "</td>";
				echo "<td>" . $row['address'] . "</td>";
				echo "<td>" . $row['birthday'] . "</td>";
				echo "<td><a style='text-decoration: none; color: black;' href='conrequestdelete.php?id=".$row['id']."'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</a></td>";
				echo "</tr>";

			}
				echo "</table>";
		?>

		<br>

		<h3 style="margin-left: 260px;">Wedding Requests</h3>
	

		<?php

			include 'connection.php';

			$result = mysqli_query($con,"SELECT * FROM wedrequest_tbl");

			echo "<table style='margin-left: 260px; width: 75%;' border='1'>
					<tr>
						<td>Husband</td>
						<td>Wife</td>
						<td>Address</td>
						<td>Action</td>
					</tr>";

			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $row['groom'] . "</td>";
				echo "<td>" . $row['bride'] . "</td>";
				echo "<td>" . $row['address'] . "</td>";
				echo "<td><a style='text-decoration: none; color: black;' href='wedrequestdelete.php?id=".$row['id']."'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</a></td>";
				echo "</tr>";

			}
				echo "</table>";
		?>

		<br>

		<h3 style="margin-left: 260px;">Deceased Record Requests</h3>
	

		<?php

			include 'connection.php';

			$result = mysqli_query($con,"SELECT * FROM decrequest_tbl");

			echo "<table style='margin-left: 260px; width: 75%;' border='1'>
					<tr>
						<td>Full Name</td>
						<td>Address</td>
						<td>Cause of Death</td>
						<td>Action</td>
					</tr>";

			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $row['fullname'] . "</td>";
				echo "<td>" . $row['address'] . "</td>";
				echo "<td>" . $row['caused'] . "</td>";
				echo "<td><a style='text-decoration: none; color: black;' href='decrequestdelete.php?id=".$row['id']."'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</a></td>";
				echo "</tr>";

			}
				echo "</table>";
		?>


		<br><br><br><br>

</body>
</html>