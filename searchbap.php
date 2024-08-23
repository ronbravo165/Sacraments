<?php

	session_start();

?>

<?php

	include 'connection.php';
	$output = '';

	if (isset($_POST['search'])) {
		$searchq = $_POST['search'];
		$searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);

		$query = mysqli_query($con,"SELECT * from baptism_tbl where fullname LIKE '%$searchq%'") or die("No record found.");

		$count = mysqli_num_rows($query);

		echo "<a href='baptism.php' style='float: right;'>BACK</a>";
		echo "<table style='font-family: century gothic;'>
				<tr>
					<th><center>Book No.</center></th>
					<th><center>Page No.</center></th>
					<th><center>Line No.</center></th>
					<th><center>Full Name</center></th>
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
				$fullname = $row['fullname'];

				$output .='<tr><td><center>'.$bn.'</center></td><td><center>'.$pn.'</center></td><td>'.$ln.'</td><td><center>'.$fullname.'</center></td><td><a href="baptismedit.php?id='.$row['id'].'"><center>EDIT</center></a></td><td><a href="baptismdelete.php?id='.$row['id'].'"><center>DELETE</center></a></td><td><a href="viewbap.php?id='.$row['id'].'"><center>VIEW</center></a></td>';
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
	<title>SRS - Baptism</title>
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
		<li><a href="baptism.php" class="nav-menu active">Baptism</a></li>
		<li><a href="communion.php" class="nav-menu">Communion</a></li>
		<li><a href="confirmation.php" class="nav-menu">Confirmation</a></li>
		<li><a href="wedding.php" class="nav-menu">Wedding</a></li>
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