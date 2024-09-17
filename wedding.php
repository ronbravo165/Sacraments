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
		$bn = $_POST['bn'];
		$pn = $_POST['pn'];
		$ln = $_POST['ln'];
		$groom = $_POST['groomfullname'];
		$groomage = $_POST['groomage'];
		$groombday = $_POST['groombirthdate'];
		$groomfather = $_POST['groomfather'];
		$groommother = $_POST['groommother'];
		$groomaddress = $_POST['groomaddress'];
		$bride = $_POST['bridefullname'];
		$brideage = $_POST['brideage'];
		$bridebday = $_POST['bridebirthdate'];
		$bridefather = $_POST['bridefather'];
		$bridemother = $_POST['bridemother'];
		$brideaddress = $_POST['brideaddress'];
		$godfather = $_POST['godfather'];
		$godmother = $_POST['godmother'];
		$wedday = $_POST['weddingdate'];
		$presider = $_POST['presider'];


		mysqli_query($con,"INSERT INTO wedding_tbl (bn, pn, ln, groom, groomage, groombirthdate, groomfather, groommother, groomaddress, bride, brideage, bridebirthdate, bridefather, bridemother, brideaddress, godfather, godmother, wedday, presider) VALUES ('$bn', '$pn', '$ln', '$groom', '$groomage', '$groombday', '$groomfather', '$groommother', '$groomaddress', '$bride', '$brideage', '$bridebday', '$bridefather', '$bridemother', '$brideaddress', '$godfather', '$godmother', '$wedday', '$presider')");

		echo '<script>alert("Added successfully.")</script>';
		echo '<script>windows: location="wedding.php"</script>';
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
	<title>SRS - Wedding</title>
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
					<li class="active"> 
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
				<h1 align="center">Wedding Records</h1>
				<div class="text-left">
					<button type="button" class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-target="#exampleModal">
					<span class="btn-label"><i class="fa fa-plus"></i></span> Add Record</button>
				</div>
				
				<!-- Modal -->
				<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-xl">
						<div class="modal-content" >
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="exampleModalLabel">Wedding Form</h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
								<form class="modal-content animate" method="post">
									<div class="modal-body">
									
										<div class="row">
											<div class="col-md-4">
												<div class="mb-3 row">
													<label for="staticEmail" class="col-sm-3 col-form-label">Book No.</label>
													<div class="col-sm-9">
														<input type="text" name="bn" class="form-control" id="bn">
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="mb-3 row">
													<label for="staticEmail" class="col-sm-3 col-form-label">Page No.</label>
													<div class="col-sm-9">
														<input type="text" name="pn" class="form-control" id="pn">
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="mb-3 row">
													<label for="staticEmail" class="col-sm-3 col-form-label">Line No.</label>
													<div class="col-sm-9">
														<input type="text" name="ln" class="form-control" id="ln">
													</div>
												</div>
											</div>
										</div>
										
										<div class="row">
											<!-- <div class="clearfix">&nbsp;</div> -->
											<h2 class="modal-title fs-5">Groom Information:</h2>
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="groomfullname" class="col-sm-2 col-form-label">Fullname:</label>
													<div class="col-sm-10">
													<input type="text" name="groomfullname" class="form-control" id="groomfullname"></p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="groomaddress" class="col-sm-2 col-form-label">Address:</label>
													<div class="col-sm-10">
														<input type="text" name="groomaddress" class="form-control" id="groomaddress">
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="groombirthdate" class="col-sm-2 col-form-label">Birthdate:</label>
													<div class="col-sm-10">
													<input type="text" name="groombirthdate" class="form-control" id="groombirthdate"></p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="groomage" class="col-sm-2 col-form-label">Age:</label>
													<div class="col-sm-10">
														<input type="number" name="groomage" class="form-control" id="groomage">
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="groomfather" class="col-sm-2 col-form-label">Father:</label>
													<div class="col-sm-10">
													<input type="text" name="groomfather" class="form-control" id="groomfather"></p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="groommother" class="col-sm-2 col-form-label">Mother:</label>
													<div class="col-sm-10">
														<input type="text" name="groommother" class="form-control" id="groommother">
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<!-- <div class="clearfix">&nbsp;</div> -->
											<h2 class="modal-title fs-5">Bride Information:</h2>
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="bridefullname" class="col-sm-2 col-form-label">Fullname:</label>
													<div class="col-sm-10">
													<input type="text" name="bridefullname" class="form-control" id="bridefullname"></p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="brideaddress" class="col-sm-2 col-form-label">Address:</label>
													<div class="col-sm-10">
														<input type="text" name="brideaddress" class="form-control" id="brideaddress">
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="bridebirthdate" class="col-sm-2 col-form-label">Birthdate:</label>
													<div class="col-sm-10">
													<input type="text" name="bridebirthdate" class="form-control" id="bridebirthdate"></p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="brideage" class="col-sm-2 col-form-label">Age:</label>
													<div class="col-sm-10">
														<input type="number" name="brideage" class="form-control" id="brideage">
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="bridefather" class="col-sm-2 col-form-label">Father:</label>
													<div class="col-sm-10">
													<input type="text" name="bridefather" class="form-control" id="bridefather"></p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="bridemother" class="col-sm-2 col-form-label">Mother:</label>
													<div class="col-sm-10">
														<input type="text" name="bridemother" class="form-control" id="bridemother">
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<!-- <div class="clearfix">&nbsp;</div> -->
											<h2 class="modal-title fs-5">Other Information:</h2>
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="weddingdate" class="col-sm-2 col-form-label">Date of Wedding:</label>
													<div class="col-sm-10">
													<input type="text" name="weddingdate" class="form-control" id="weddingdate"></p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="presider" class="col-sm-2 col-form-label">Presider:</label>
													<div class="col-sm-10">
														<input type="text" name="presider" class="form-control" id="presider">
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="godfather" class="col-sm-2 col-form-label">Godfather:</label>
													<div class="col-sm-10">
													<input type="text" name="godfather" class="form-control" id="godfather"></p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="godmother" class="col-sm-2 col-form-label">Godmother:</label>
													<div class="col-sm-10">
														<input type="text" name="godmother" class="form-control" id="godmother">
													</div>
												</div>
											</div>
										</div>

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										<button type="submit" name="add" class="btn btn-primary">Save</button>
									</div>
								</form>
							
						</div>
					</div>
				</div>

				<div class="clear-fix">&nbsp;</div>
				<table id="example" class="table table-striped example" style="width:100%">
					<thead>
						<tr>
							<td>Groom's Name</td>
							<td>Groom's Age</td>
							<td>Groom's Birthdate</td>
							<td>Groom's Address</td>
							<td>Bride's Name</td>
							<td>Bride's Age</td>
							<td>Bride's Birthdate</td>
							<td>Bride's Address</td>
							<td>Wedding Date</td>
							<td>Action</td>
						</tr>
					</thead>
					
					<tbody>
						<?php include 'connection.php';
								$result = mysqli_query($con,"SELECT * FROM wedding_tbl"); 
								while ($row = $result->fetch_assoc()):
						?>
						<tr>
							<td><?php echo $row['groom']; ?></td>
							<td><?php echo $row['groomage']; ?></td>
							<td><?php echo $row['groombirthdate']; ?></td>
							<td><?php echo $row['groomaddress']; ?></td>
							<td><?php echo $row['bride']; ?></td>
							<td><?php echo $row['brideage']; ?></td>
							<td><?php echo $row['bridebirthdate']; ?></td>
							<td><?php echo $row['brideaddress']; ?></td>
							<td><?php echo $row['wedday']; ?></td>
							<td>
							<ul class="list-inline m-0">
									<li class="list-inline-item">
										<button class="btn btn-primary btn-sm rounded-0" type="button" title="Add"><i class="fa fa-table"></i></button>
									</li>
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
	<!-- <ul>
		<li><a href="#" class="nav-menu" style="background-color: gold;"></a></li>
		<li><a href="home.php" class="nav-menu">Home</a></li>
		<li><a href="baptism.php" class="nav-menu">Baptism</a></li>
		<li><a href="communion.php" class="nav-menu">Communion</a></li>
		<li><a href="confirmation.php" class="nav-menu">Confirmation</a></li>
		<li><a href="wedding.php" class="nav-menu active">Wedding</a></li>
		<li><a href="deceased.php" class="nav-menu">Deceased</a></li>
		<li><a href="requests.php" class="nav-menu">Requests</a></li>
		<li><a href="user.php" class="nav-menu">User Lists</a></li>
		<li><a href="logout.php" class="nav-menu" style="color: red">LOGOUT</a></li>
	</ul>

	<h1 style="font-family: century gothic; margin-left: 16%;" align="center">Wedding Records</h1>
	<input type="button" name="button" value="ADD RECORD" class="button" onclick="document.getElementById('id01').style.display='block'">

	<form method="post" action="searchwed.php">
		<input type="submit" name="search" value="SEARCH" class="search">
		<input type="text" name="search" class="textbox" placeholder="Search here..." required>
	</form>

	<div id="id01" class="modal">
		<form class="modal-content animate" method="post">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">&times;</span>
				<img src="images/logo.png" class="avatar" width="100px">
			</div>

			<input type="hidden" value="0" name="id">

			<div class="container1">
				<br>
				<label>Book No.:</label>&nbsp;&nbsp;
				<input type="text" name="bn" required class="textbox1" style="width: 19%;">
				<label>Page No.:</label>
				<input type="text" name="pn" required class="textbox1" style="width: 19%;">
				<label>Line No.:</label>
				<input type="text" name="ln" required class="textbox1" style="width: 19%;">
				<br><br>

				<h3 style="font-family: century gothic;">Groom Information:</h3>

				<label>Full Name:</label>
				<input type="text" name="groom" required style="height: 25px; width: 80.3%; font-family: century gothic;"><br><br>
				<label>Birthday:</label>&nbsp;&nbsp;&nbsp;
				<select name="groombday" style="width: 12%;">
					<option>--- Date ---</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>

				<select name="groombmonth" style="width: 14%;">
					<option>--- Month ---</option>
					<option value="January">January</option>
					<option value="February">February</option>
					<option value="March">March</option>
					<option value="April">April</option>
					<option value="May">May</option>
					<option value="June">June</option>
					<option value="July">July</option>
					<option value="August">August</option>
					<option value="September">September</option>
					<option value="October">October</option>
					<option value="November">November</option>
					<option value="December">December</option>
				</select>

				<input type="text" name="groombyear" required class="textbox1" placeholder="Year" style="width: 15%;">
				<label>Age:</label>
				<input type="text" name="groomage" required class="textbox1" style="width: 31.5%;">
				<br><br>
				
				<label>Father:</label>
				<input type="text" name="groomfather" required class="textbox1" style="width: 36.4%;">&nbsp;&nbsp;
				<label>Mother:</label>
				<input type="text" name="groommother" required class="textbox1" style="width: 36.4%;">

				<br><br>
				<label>Address:</label>
				<input type="text" name="groomaddress" required class="textbox1" style="width: 82.5%;">

				<br><br>

				<h3 style="font-family: century gothic;">Bride Information:</h3>

				<label>Full Name:</label>
				<input type="text" name="bride" required style="height: 25px; width: 80.3%; font-family: century gothic;"><br><br>
				<label>Birthday:</label>&nbsp;&nbsp;&nbsp;
				<select name="bridebday" style="width: 12%;">
					<option>--- Date ---</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>

				<select name="bridebmonth" style="width: 14%;">
					<option>--- Month ---</option>
					<option value="January">January</option>
					<option value="February">February</option>
					<option value="March">March</option>
					<option value="April">April</option>
					<option value="May">May</option>
					<option value="June">June</option>
					<option value="July">July</option>
					<option value="August">August</option>
					<option value="September">September</option>
					<option value="October">October</option>
					<option value="November">November</option>
					<option value="December">December</option>
				</select>

				<input type="text" name="bridebyear" required class="textbox1" placeholder="Year" style="width: 15%;">
				<label>Age:</label>
				<input type="text" name="brideage" required class="textbox1" style="width: 31.5%;">
				<br><br>
				
				<label>Father:</label>
				<input type="text" name="bridefather" required class="textbox1" style="width: 36.4%;">&nbsp;&nbsp;
				<label>Mother:</label>
				<input type="text" name="bridemother" required class="textbox1" style="width: 36.4%;">

				<br><br>
				<label>Address:</label>
				<input type="text" name="brideaddress" required class="textbox1" style="width: 82.5%;">

				<br><br>

				<h3 style="font-family: century gothic;">Other Information:</h3>

				<label>Date of Wedding:</label>
				<select name="wedday" style="width: 20%;">
					<option>--- Date ---</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>

				<select name="wedmonth" style="width: 26%;">
					<option>--- Month ---</option>
					<option value="January">January</option>
					<option value="February">February</option>
					<option value="March">March</option>
					<option value="April">April</option>
					<option value="May">May</option>
					<option value="June">June</option>
					<option value="July">July</option>
					<option value="August">August</option>
					<option value="September">September</option>
					<option value="October">October</option>
					<option value="November">November</option>
					<option value="December">December</option>
				</select>

				<input type="text" name="wedyear" required class="textbox1" placeholder="Year" style="width: 26%;">

				&nbsp;

				<br><br>

				<label>Godfather:</label>
				<input type="text" name="godfather" required class="textbox1" style="width: 32%;">&nbsp;&nbsp;
				<label>Godmother:</label>
				<input type="text" name="godmother" required class="textbox1" style="width: 32%;">

				<br><br>
				<label>Presider:</label>
				<input type="text" name="presider" required class="textbox1" style="width: 83%;">&nbsp;&nbsp;
				

				<br><br>

				<center><input type="submit" name="add" value="ADD RECORD" class="button-add"></center>
				<br><br>
				<br>
			</div>

		</form>
	</div>

<?php

	include 'connection.php';
	$result = mysqli_query($con,"SELECT * FROM wedding_tbl");

	echo "<center><br>
			<table class='table' border='1'>
				<thead>
					<th style='font-family: century gothic;'>Groom</th>
					<th style='font-family: century gothic;'>Bride</th>					
					<th style='font-family: century gothic;'>Action</th>
				</thead>";

	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td style='margin-left: 16%;'><center>" . $row['groom'] . "</center></td>";
		echo "<td style='margin-left: 16%;'><center>" . $row['bride'] . "</center></td>";
		echo "<td><center><a style='text-decoration: none; color: black;' href='weddingedit.php?id=".$row['id']."'>&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>&nbsp;<a style='text-decoration: none; color: black;' href='weddingdelete.php?id=".$row['id']."'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</a></center></td>";
		echo "</tr>";
	}
		echo "</table></center>";
?>

	<footer style="width: 85%; margin-left: 15%; font-family: arial narrow; position: fixed; bottom: 0; margin-bottom: 0; background-color: white;">

		<p align="center">Diocese of San Jose Nueva Ecija<br>Parokya ni San Nicolas de Tolentino<br>Carranglan, Nueva Ecija<br>&copy; All rights reserved 2024.</p>
		
	</footer> -->

</body>
<script>
	$(function(){
		$('#groombirthdate').datepicker();
		$('#bridebirthdate').datepicker();
		$('#weddingdate').datepicker();
	});

	$(document).ready(function() {
		$('.example').DataTable({
		//disable sorting on last column
		"columnDefs": [
			{ "orderable": false, "targets": 8 }
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