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

<?php
if (isset($_POST['add'])) {
	include 'connection.php';
		$id = $_POST['id'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$fullname = $_POST['fullname'];

		mysqli_query($con,"INSERT INTO user_tbl (id, bn, pn, ln) VALUES ('$id', '$bn', '$pn', '$ln', '$fullname', '$father', '$mother', '$birthplace', '$bday', '$bmonth', '$byear', '$decday', '$decmonth', '$decyear', '$presider', '$caused', '$priest')");

		echo '<script>alert("Added successfully.")</script>';
		echo '<script>windows: location="deceased.php"</script>';
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="bootstrap.min.css" rel="stylesheet" type='text/css'>
	<link rel="icon" type="image/png" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="css/heading.css">
	<link rel="stylesheet" href="jquery-ui.css">
	<link href="fonts/font-awesome.min.css" rel="stylesheet" type='text/css'>
	<!-- Data Table CSS -->
	<link rel='stylesheet' href='dataTables.bootstrap5.min.css'>
	<script src="bootstrap.bundle.min.js" ></script>
	<script src="popper.min.js"></script>
	<script src="bootstrap.min.js"></script>
	
	<!-- jQuery -->
	<script src='jquery-3.7.0.js'></script>
	<script src="jquery-1.12.4.js"></script>
	<script src="jquery-ui.js"></script>
	<!-- Data Table JS -->
	<script src='jquery.dataTables.min.js'></script>
	<script src='dataTables.responsive.min.js'></script>
	<script src='dataTables.bootstrap5.min.js'></script>
	<title>SRS - Deceased</title>
</head>
<body>

<?php include 'connection.php'; ?>
	<?php include 'topbar.php'; ?>

	<div class="container-fluid">
		<div class="row flex-nowrap">
			<div id="menu" class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;"> 
				<ul class="nav nav-pills flex-column mb-auto"> 
					<li> 
						<a href="home.php" class="nav-link text-white" aria-current="page"> <i class="fa fa-home"></i><span class="ms-2">Home</span> </a> 
					</li> 
					<li>
						<a href="baptism.php" class="nav-link text-white"> <i class="fa fa-first-order"></i><span class="ms-2">Baptism</span> </a> 
					</li>
					<li>
						<a href="communion.php" class="nav-link text-white"> <i class="fa fa-first-order"></i><span class="ms-2">Communion</span> </a> 
					</li> 
					<li> 
						<a href="confirmation.php" class="nav-link text-white"> <i class="fa fa-cog"></i><span class="ms-2">Confirmation</span> </a> 
					</li> 
					<li> 
						<a href="wedding.php" class="nav-link text-white"> <i class="fa fa-bookmark"></i><span class="ms-2">Wedding</span> </a> 
					</li>
					<li> 
						<a href="deceased.php" class="nav-link text-white"> <i class="fa fa-bookmark"></i><span class="ms-2">Deceased</span> </a> 
					</li> 
					<li > 
						<a href="requests.php" class="nav-link text-white"> <i class="fa fa-bookmark"></i><span class="ms-2">Request</span> </a> 
					</li>
					<li class="active"> 
						<a href="user.php" class="nav-link text-white"> <i class="fa fa-bookmark"></i><span class="ms-2">User Lists</span> </a> 
					</li>
				</ul> <hr> 
			</div>
			<div class="col py-3">
				<h1 align="center">User Lists</h1>
				<table id="example" class="table table-striped example" style="width:100%">
					<thead>
						<tr>
							<td>Full name</td>
							<td>Username</td>
							<td>Action</td>
						</tr>
					</thead>
					
					<tbody>
						<?php include 'connection.php';
								$result = mysqli_query($con,"SELECT * FROM user_tbl"); 
								while ($row = $result->fetch_assoc()):
						?>
						<tr>
							<td><?php echo $row['fullname']; ?></td>
							<td><?php echo $row['username']; ?></td>
							<td>
							<ul class="list-inline m-0">
									<li class="list-inline-item">
										<button class="btn btn-success btn-sm rounded-0" type="button" title="Edit"><i class="fa fa-edit"></i></button>
									</li>
									<li class="list-inline-item">
										<a class="btn btn-danger btn-sm rounded-0" title="Delete" href='baptismdelete.php?id="<?php echo $row['id']; ?>"'><i class="fa fa-trash"></i></a>
									</li>
								</ul>
								<!-- <a style='text-decoration: none; color: black;' href='baprequestdelete.php?id="<?php echo $row['id']; ?>"'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</a> -->
							
							</td>
						</tr>

						<?php endwhile; ?>
					</tbody>
					
				</table>
			</div>
		</div>
	</div>

<!-- <?php

	include 'connection.php';
	$result = mysqli_query($con,"SELECT * FROM user_tbl");

	echo "<center><br>
			<table class='table' border='1'>
				<thead>
					<th style='font-family: century gothic;'>Full Name</th>
					<th style='font-family: century gothic;'>Username</th>
					<th style='font-family: century gothic;'>Password</th>
					<th style='font-family: century gothic;'>Action</th>
				</thead>";

	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td style='margin-left: 16%;'><center>" . $row['fullname'] . "</center></td>";
		echo "<td style='margin-left: 16%;'><center>" . $row['username'] . "</center></td>";
		echo "<td style='margin-left: 16%;'><center>**********</center></td>";
		echo "<td><center><a style='text-decoration: none; color: black;' href='useredit.php?id=".$row['id']."'>&nbsp;&nbsp;Edit&nbsp;&nbsp;</a></center></td>";
		echo "</tr>";
	}
		echo "</table></center>";
?>

	<footer style="width: 85%; margin-left: 15%; font-family: arial narrow; position: fixed; bottom: 0; margin-bottom: 0; background-color: white;">

		<p align="center">Diocese of San Jose Nueva Ecija<br>Parokya ni San Nicolas de Tolentino<br>Carranglan, Nueva Ecija<br>&copy; All rights reserved 2024.</p>
		
	</footer> -->

</body>
<script>

	$(document).ready(function() {
		$('.example').DataTable({
		//disable sorting on last column
		"columnDefs": [
			{ "orderable": false, "targets": 2 }
		],
		language: {
			//customize pagination prev and next buttons: use arrows instead of words
			'paginate': {
			'previous': '<span class="fa fa-chevron-left"></span>',
			'next': '<span class="fa fa-chevron-right"></span>'
			},
			//customize number of elements to be displayed
			"lengthMenu": 'Display <select class="form-control input-sm">'+
			'<option value="10">10</option>'+
			'<option value="20">20</option>'+
			'<option value="30">30</option>'+
			'<option value="40">40</option>'+
			'<option value="50">50</option>'+
			'<option value="-1">All</option>'+
			'</select> results'
		}
		})  
	});
</script>
</html>