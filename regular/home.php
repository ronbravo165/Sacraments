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
	$sessionname = $row['firstname'] . ' ' . $row['lastname'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="../bootstrap.min.css" rel="stylesheet" type='text/css'>
	<link rel="icon" type="image/png" href="../images/logo.png">
	<link rel="stylesheet" type="text/css" href="../css/heading.css">
	<link rel="stylesheet" href="../jquery-ui.css">
	<link href="../fonts/font-awesome.min.css" rel="stylesheet" type='text/css'>
	<!-- Data Table CSS -->
	<!-- <link rel='stylesheet' href='dataTables.bootstrap5.min.css'> -->
	<script src="../bootstrap.bundle.min.js" ></script>
	<script src="../popper.min.js"></script>
	<script src="../bootstrap.min.js"></script>
	
	<!-- jQuery -->
	<script src='../jquery-3.7.0.js'></script>
	<script src="../jquery-1.12.4.js"></script>
	<script src="../jquery-ui.js"></script>
	<!-- Data Table JS -->
	<!-- <script src='jquery.dataTables.min.js'></script>
	<script src='dataTables.responsive.min.js'></script>
	<script src='dataTables.bootstrap5.min.js'></script> -->
	<link rel="stylesheet" type="text/css" href="./regular.css">
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
	
<nav class="navbar navbar-expand-lg static-top topbar">
    <div class="container">

        <a class="navbar-brand" href="#">
            <img src="../images/logo.png" alt="..." height="80">
        </a>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h1 class="heading1">Sacramental Record System</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h3 class="heading2">Welcome, <?php echo $sessionname;?>!</h3>
                </div>
            </div>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link logout" aria-current="page" href="logout.php">Logout</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>
	<div class="container-fluid">
		<div class="col py-3">
			<div class="container">
				<div class="clearfix">&nbsp;</div>
				<div class="m-t-80">
					<div class="row">
						<div class="col-lg-4">
							<div class="card text-bg-warning mb-3 " style="max-width: 18rem;">
							
								<div class="card-body text-center card-height">
									<h5 class="card-title">
										<a href="baptismalrequest.php" class="text-bg-warning text-decoration">Baptism Request</a>
									</h5>
									
									
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div  class="card text-bg-info mb-3" style="max-width: 18rem;">
							
								<div class="card-body text-center card-height">
									<h5 class="card-title">
										<a href="confirmationrequest.php" class="text-bg-info text-decoration">Confirmation Request</a>
									</h5>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="card text-bg-light mb-3" style="max-width: 18rem;">
								<div class="card-body text-center card-height">
									<h5 class="card-title">
										<a href="communionrequest.php" class="text-bg-light text-decoration">Communion Request</a>
									</h5>
								</div>
							</div>
						</div>
					</div>

					<div class="clear-fix">&nbsp;</div>
				
					<div class="row">
						<div class="col-lg-4">
							<div class="card text-bg-primary mb-3" style="max-width: 18rem;">
								<div class="card-body text-center card-height">
									<h5 class="card-title">
										<a href="weddingrequest.php" class="text-bg-primary text-decoration">Wedding Request</a>
									</h5>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="card text-bg-secondary mb-3" style="max-width: 18rem;">
								<div class="card-body text-center card-height">
									<h5 class="card-title">
										<a href="deceasedrequest.php" class="text-bg-secondary text-decoration">Deceased Request</a>
									</h5>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>		
	<!-- <div style="width: 50%; margin: 100px auto;">
		<h2 align="center">Submit A Request</h2><br>

		<center><a href="baptismalrequest.php" class="button" style="padding: 5px 44px;">Baptism</a></center><br>
		<center><a href="confirmationrequest.php" class="button">Confirmation</a></center><br>
		<center><a href="communionrequest.php" class="button" style="padding: 5px 20px;">Communion</a></center><br>
		<center><a href="weddingrequest.php" class="button" style="padding: 5px 38px;">Wedding</a></center><br>
		<center><a href="deceasedrequest.php" class="button" style="padding: 5px 35px;">Deceased</a></center><br>

	</div> -->

</body>
</html>
