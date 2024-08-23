<?php

	session_start();

?>

<?php

	include 'connection.php';
	$output = '';

	if (isset($_POST['search'])) {
		$searchq = $_POST['search'];
		$searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);

		$query = mysqli_query($con,"SELECT * from wedding_tbl where bride LIKE '%$searchq%' or groom LIKE '%$searchq%'") or die("No record found.");

		$count = mysqli_num_rows($query);

		echo "<a href='wedding.php' style='float: right;'>BACK</a>";
		echo "<table style='font-family: century gothic;'>
				<tr>
					<th><center>Book No.</center></th>
					<th><center>Page No.</center></th>
					<th><center>Line No.</center></th>
					<th><center>Groom</center></th>
					<th><center>Bride</center></th>
					<th colspan='3'><center>Action</center></th>
				</tr>";

		if ($count == 0) {
			$output = 'There was no search results!';
		}else{
			while ($row = mysqli_fetch_array($query)) {
				$id = $row['id'];
				$bn = $row['bn'];
				$pn = $row['pn'];
				$ln = $row['ln'];
				$groom = $row['groom'];
				$bride = $row['bride'];

				$output .='<tr><td><center>'.$bn.'</center></td><td><center>'.$pn.'</center></td><td><center>'.$ln.'</center></td><td><center>'.$groom.'</center></td><td><center>'.$bride.'</center></td><td><a href="weddingedit.php?id='.$row['id'].'"><center>EDIT</center></a></td><td><a href="weddingdelete.php?id='.$row['id'].'">DELETE</a></td>';
			}
		}
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
	<title>SRS - Wedding</title>
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
		<li><a href="user.php" class="nav-menu">User Lists</a></li>
		<li><a href="logout.php" class="nav-menu" style="color: red">LOGOUT</a></li>
	</ul>




	<h2 align="center" style="margin-left: 15%; font-family: century gothic;">Search Results</h2>

	<?php

		print("$output");

	?>

</body>
</html>