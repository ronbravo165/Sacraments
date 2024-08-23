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
	<title>SRS - Home</title>
</head>
<body>

	<div class="header">
		<img src="images/logo.png">
		<h1>Sacramental Record System</h1>
		<h3>Parokya ni San Nicolas de Tolentino</h3>
	</div>

	<ul>
		<li><a href="#" class="nav-menu" style="background-color: gold;"></a></li>
		<li><a href="home.php" class="nav-menu active">Home</a></li>
		<li><a href="baptism.php" class="nav-menu">Baptism</a></li>
		<li><a href="communion.php" class="nav-menu">Communion</a></li>
		<li><a href="confirmation.php" class="nav-menu">Confirmation</a></li>
		<li><a href="wedding.php" class="nav-menu">Wedding</a></li>
		<li><a href="deceased.php" class="nav-menu">Deceased</a></li>
		<li><a href="requests.php" class="nav-menu">Requests</a></li>
		<li><a href="user.php" class="nav-menu">User Lists</a></li>
		<li><a href="logout.php" class="nav-menu" style="color: red">LOGOUT</a></li>
	</ul>

	<table>
		<tr>
			<td colspan="6"><h1 align="center" style="font-family: century gothic;">Reports (Sacramental Records)</h1></td>
		</tr>
		<tr>
			<td>
				<div class="container"><br><br><br>
					<h1 align="center" style="font-size: 60px;">
						
						<?php

							include 'connection.php';

							$query = mysqli_query($con,"SELECT * from baptism_tbl");

							echo mysqli_num_rows($query);

						?>

					</h1><br><br><br><br>
					<p align="center">Baptism</p>
				</div>
			</td>

			<td>
				<div class="container"><br><br><br>
					<h1 align="center" style="font-size: 60px;">
						
						<?php

							include 'connection.php';

							$query = mysqli_query($con,"SELECT * from confirmation_tbl");

							echo mysqli_num_rows($query);

						?>

					</h1><br><br><br><br>
					<p align="center">Confirmation</p>
				</div>
			</td>

			<td>
				<div class="container"><br><br><br>
					<h1 align="center" style="font-size: 60px;">
						
						<?php

							include 'connection.php';

							$query = mysqli_query($con,"SELECT * from communion_tbl");

							echo mysqli_num_rows($query);

						?>

					</h1><br><br><br><br>
					<p align="center">Communion</p>
				</div>
			</td>

			<td>
				<div class="container"><br><br><br>
					<h1 align="center" style="font-size: 60px;">
						
						<?php

							include 'connection.php';

							$query = mysqli_query($con,"SELECT * from wedding_tbl");

							echo mysqli_num_rows($query);

						?>

					</h1><br><br><br><br>
					<p align="center">Wedding</p>
				</div>
			</td>

			<td>
				<div class="container"><br><br><br>
					<h1 align="center" style="font-size: 60px;">
						
						<?php

							include 'connection.php';

							$query = mysqli_query($con,"SELECT * from deceased_tbl");

							echo mysqli_num_rows($query);

						?>

					</h1><br><br><br><br>
					<p align="center">Deceased</p>
				</div>
			</td>

			<td>
				<div class="container"><br><br><br>
					<p style="margin-left: 10px;">Baptismal - 
						
						<?php

							include 'connection.php';

							$query = mysqli_query($con,"SELECT * from baprequest_tbl");

							echo mysqli_num_rows($query);

						?>

					</p>

					<p style="margin-left: 10px;">Confirmation - 
						
						<?php

							include 'connection.php';

							$query = mysqli_query($con,"SELECT * from conrequest_tbl");

							echo mysqli_num_rows($query);

						?>

					</p>

					<p style="margin-left: 10px;">Communion - 
						
						<?php

							include 'connection.php';

							$query = mysqli_query($con,"SELECT * from comrequest_tbl");

							echo mysqli_num_rows($query);

						?>

					</p>

					<p style="margin-left: 10px;">Wedding - 
						
						<?php

							include 'connection.php';

							$query = mysqli_query($con,"SELECT * from wedrequest_tbl");

							echo mysqli_num_rows($query);

						?>

					</p>

					<p style="margin-left: 10px;">Deceased - 
						
						<?php

							include 'connection.php';

							$query = mysqli_query($con,"SELECT * from decrequest_tbl");

							echo mysqli_num_rows($query);

						?>

					</p>

					<br><br>
					<p align="center" style="margin-top: 6px;">Requests</p>
				</div>
			</td>			
		</tr>
	</table>

	<footer style="width: 85%; margin-left: 15%; font-family: arial narrow; position: fixed; bottom: 0; margin-bottom: 0; background-color: white;">

		<p align="center">Diocese of San Jose Nueva Ecija<br>Parokya ni San Nicolas de Tolentino<br>Carranglan, Nueva Ecija<br>&copy; All rights reserved 2024.</p>
		
	</footer>

</body>
</html>