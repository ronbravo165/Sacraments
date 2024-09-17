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
	<style>
		.m-t-80 {
			margin-top: 80px;
		}
	</style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="bootstrap.min.css" rel="stylesheet" type='text/css'>
	<link rel="icon" type="image/png" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="css/heading.css">
	<link href="fonts/font-awesome.min.css" rel="stylesheet" type='text/css'>
	<!-- Data Table CSS -->
	<link rel='stylesheet' href='dataTables.bootstrap5.min.css'>
	<script src="bootstrap.bundle.min.js" ></script>
	<script src="popper.min.js"></script>
	<script src="bootstrap.min.js"></script>
	
	<!-- jQuery -->
	<script src='jquery-3.7.0.js'></script>
	<!-- Data Table JS -->
	<script src='jquery.dataTables.min.js'></script>
	<script src='dataTables.responsive.min.js'></script>
	<script src='dataTables.bootstrap5.min.js'></script>
	<title>SRS - Home</title>
</head>
<body>
	<?php include 'connection.php'; ?>
	<?php include 'topbar.php';
	?>
	<div class="container-fluid">
		<div class="row flex-nowrap">
		<div id="menu" class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;"> 
				<ul class="nav nav-pills flex-column mb-auto"> 
					<li class="active"> 
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
					<li> 
						<a href="user.php" class="nav-link text-white"> <i class="fa fa-bookmark"></i><span class="ms-2">User Lists</span> </a> 
					</li>
				</ul> <hr> 
			</div>
			<div class="col py-3">
				<div class="container">
					<div class="m-t-80">
						<div class="row">
							<div class="col-lg-4">
								<div class="card" style="width: 18rem;">
								
									<div class="card-body text-center">
										<h5 class="card-title">Baptism</h5>
										<h1 align="center" style="font-size: 60px;">
											<?php
												$query = mysqli_query($con,"SELECT * from baptism_tbl");

												echo mysqli_num_rows($query);
											?>
										</h1>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="card" style="width: 18rem;">
								
									<div class="card-body text-center">
										<h5 class="card-title">Confirmation</h5>
										<h1 align="center" style="font-size: 60px;">
											<?php
												$query = mysqli_query($con,"SELECT * from confirmation_tbl");

												echo mysqli_num_rows($query);
							
											?>
										</h1>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="card" style="width: 18rem;">
								
									<div class="card-body text-center">
										<h5 class="card-title">Communion</h5>
										<h1 align="center" style="font-size: 60px;">
											<?php
												$query = mysqli_query($con,"SELECT * from communion_tbl");

												echo mysqli_num_rows($query);
											?>
										</h1>
									</div>
								</div>
							</div>
						</div>

						<div class="clear-fix">&nbsp;</div>
					
						<div class="row">
							<div class="col-lg-4">
								<div class="card" style="width: 18rem;">
								
									<div class="card-body text-center">
										<h5 class="card-title">Wedding</h5>
										<h1 align="center" style="font-size: 60px;">
											<?php
												$query = mysqli_query($con,"SELECT * from wedding_tbl");

												echo mysqli_num_rows($query);
											?>
										</h1>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="card" style="width: 18rem;">
								
									<div class="card-body text-center">
										<h5 class="card-title">Deceased</h5>
										<h1 align="center" style="font-size: 60px;">
											<h1 align="center" style="font-size: 60px;">
											<?php
											$query = mysqli_query($con,"SELECT * from deceased_tbl");

											echo mysqli_num_rows($query);
											?>
										</h1>
										</h1>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>	
		</div>

		
	</div>	
	
	<footer style="width: 100%; font-family: arial narrow; position: fixed; bottom: 0; margin-bottom: 0; background-color: white;">

		<p align="center">Diocese of San Jose Nueva Ecija<br>Parokya ni San Nicolas de Tolentino<br>Carranglan, Nueva Ecija<br>&copy; All rights reserved 2024.</p>
	
	</footer>
</body>
</html>