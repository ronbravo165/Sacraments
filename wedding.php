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
			$status = 1;

			mysqli_query($con,"INSERT INTO wedding_tbl (bn, pn, ln, groom, groomage, groombirthdate, groomfather, groommother, groomaddress, bride, brideage, bridebirthdate, bridefather, bridemother, brideaddress, godfather, godmother, wedday, presider, status) VALUES ('$bn', '$pn', '$ln', '$groom', '$groomage', '$groombday', '$groomfather', '$groommother', '$groomaddress', '$bride', '$brideage', '$bridebday', '$bridefather', '$bridemother', '$brideaddress', '$godfather', '$godmother', '$wedday', '$presider', '$status')");

			echo '<script>alert("Added successfully.")</script>';
			echo '<script>windows: location="wedding.php"</script>';
	}

	if (isset($_POST['update'])) {
		
		$groombirthdate = date("m/d/Y", strtotime($_POST['groombirthdate'])); 
		$bridebirthdate = date("m/d/Y", strtotime($_POST['bridebirthdate']));
		$weddingdate = date("m/d/Y", strtotime($_POST['weddingdate']));
		$id = $_POST['id'];
		$bn = $_POST['bn'];
		$pn = $_POST['pn'];
		$ln = $_POST['ln'];
		$groom = $_POST['groomfullname'];
		$groomage = $_POST['groomage'];
		$groombday = $groombirthdate;
		$groomfather = $_POST['groomfather'];
		$groommother = $_POST['groommother'];
		$groomaddress = $_POST['groomaddress'];
		$bride = $_POST['bridefullname'];
		$brideage = $_POST['brideage'];
		$bridebday = $bridebirthdate;
		$bridefather = $_POST['bridefather'];
		$bridemother = $_POST['bridemother'];
		$brideaddress = $_POST['brideaddress'];
		$godfather = $_POST['godfather'];
		$godmother = $_POST['godmother'];
		$wedday = $weddingdate;
		$presider = $_POST['presider'];
		mysqli_query($con,"UPDATE `wedding_tbl` SET 
							`bn` = '$bn', 
							`pn` = '$pn', 
							`ln` = '$ln', 
							`groom` = '$groom',
							`groomage` = '$groomage',
							`groombirthdate` = '$groombday',
							`groomfather` = '$groomfather',
							`groommother` = '$groommother',
							`groomaddress` = '$groomaddress',
							`bride` = '$bride',
							`brideage` = '$brideage',
							`bridebirthdate` = '$bridebday',
							`bridefather` = '$bridefather',
							`bridemother` = '$bridemother',
							`brideaddress` = '$brideaddress',
							`godfather` = '$godfather',
							`godmother` = '$godmother',
							`wedday` = '$wedday',
							`presider` = '$presider'
							WHERE id='$id'"
					);
							
		echo '<script>alert("Updates has been saved!")</script>';
		echo '<script>windows: location="wedding.php"</script>';
	}

	if (isset($_POST['delete'])) {
		include 'connection.php';
		$id = $_POST['id'];
		mysqli_query($con,"DELETE from wedding_tbl where id='$id'");

		echo '<script>alert("Deleted.")</script>';
		echo '<script>windows: location="wedding.php"</script>';
	}

	if (isset($_POST['approve'])) {
		$id = $_POST['id'];
		mysqli_query($con,"UPDATE wedding_tbl SET status = 1 where id = '$id'");
		echo '<script>alert("This request has been approved!")</script>';
		echo '<script>windows: location="wedding.php"</script>';
	}

	if (isset($_POST['reject'])) {
		$id = $_POST['id'];
		$rejectReason = $_POST['rejectReason'];
		mysqli_query($con,"UPDATE `wedding_tbl` SET 
								`rejectReason` = '$rejectReason', 
								`status` = 2 
								WHERE id='$id'"
						);
		echo '<script>alert("This request has been rejected!")</script>';
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
													<label for="presider" class="col-sm-2 col-form-label">Priest:</label>
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
							<td>Status</td>
							<td>Rejection Reason</td>
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
									<?php
										$status = $row['status'];

										
										if ($status == 0) {
											echo '<span class="badge bg-info">For Approval</span>';
										} else if ($status == 1) {
											echo '<span class="badge bg-success">Approved</span>';
										} else {
											echo '<span class="badge bg-danger">Rejected</span>';
										}
									?>	
								
							</td>
							<td><?php echo $row['rejectReason']; ?></td>
							<td>
								<ul class="list-inline m-0">
									
									
									<?php
										$requestorId = $row['registerId'];
										$status = $row['status'];
										$bapId = $row['id'];		
										if ($requestorId != 0 && ($status == 0 && $status != 1)) {
											print('<li class="list-inline-item">
														<button class="btn btn-info btn-sm rounded-0" type="button" title="Edit" data-bs-toggle="modal" data-bs-target="#updateModal'.$bapId.'" data-bs-target="#updateModal"><i class="fa fa-edit"></i></button>
													</li>
													<li class="list-inline-item">
														<a class="btn btn-warning btn-sm rounded-0 delete_baptism" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal'.$bapId.'" href="javascript:void(0)" data-bs-target="#deleteModal"><i class="fa fa-trash"></i></a>
													</li>
													<li class="list-inline-item">
														<a class="btn btn-success btn-sm rounded-0 approve_baptism" title="Approve" data-bs-toggle="modal" data-bs-target="#approveModal'.$bapId.'" href="javascript:void(0)" data-bs-target="#approveModal"><i class="fa fa-check"></i></a>
													</li>	
													<li class="list-inline-item">
														<a class="btn btn-danger btn-sm rounded-0 reject_baptism" title="Reject" data-bs-toggle="modal" data-bs-target="#rejectModal'.$bapId.'" href="javascript:void(0)" data-bs-target="#rejectModal"><i class="fa fa-times"></i></a>
													</li>'
												);
										} else if ($status == 1) {
											print('<li class="list-inline-item">
													<a class="btn btn-dark btn-sm rounded-0 print_baptism" title="Print" href="viewbap.php?id='.$bapId.'"><i class="fa fa-print"></i></a>
													</li>'
												);
										}
											
									?>		
									
								</ul>
							</td>
						</tr>
						
						<!-- View Modal -->
						<div class="modal fade" id="updateModal<?php echo $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-xl">
								<div class="modal-content" >
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="exampleModalLabel">Wedding Form</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
										<form class="modal-content animate" method="post">
											<input type="hidden" name="id" value="<?php echo $row['id'];?>">
											<div class="modal-body">
											
												<div class="row">
													<div class="col-md-4">
														<div class="mb-3 row">
															<label for="staticEmail" class="col-sm-3 col-form-label">Book No.</label>
															<div class="col-sm-9">
																<input type="text" name="bn" class="form-control" id="bn" value="<?php echo $row['bn'] ?>">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="mb-3 row">
															<label for="staticEmail" class="col-sm-3 col-form-label">Page No.</label>
															<div class="col-sm-9">
																<input type="text" name="pn" class="form-control" id="pn" value="<?php echo $row['pn'] ?>">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="mb-3 row">
															<label for="staticEmail" class="col-sm-3 col-form-label">Line No.</label>
															<div class="col-sm-9">
																<input type="text" name="ln" class="form-control" id="ln" value="<?php echo $row['ln'] ?>">
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
															<input type="text" name="groomfullname" class="form-control" id="groomfullname" value="<?php echo $row['groom'] ?>"></p>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="mb-3 row">
															<label for="groomaddress" class="col-sm-2 col-form-label">Address:</label>
															<div class="col-sm-10">
																<input type="text" name="groomaddress" class="form-control" id="groomaddress" value="<?php echo $row['groomaddress'] ?>">
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="mb-3 row">
															<label for="groombirthdate" class="col-sm-2 col-form-label">Birthdate:</label>
															<div class="col-sm-10">
																<?php
																	$date = $row['groombirthdate'];
																	$newDate = date("Y-m-d", strtotime($date));
																?>
																<input type="date" name="groombirthdate" class="form-control" id="groombirthdate" value="<?php echo $newDate ?>"></p>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="mb-3 row">
															<label for="groomage" class="col-sm-2 col-form-label">Age:</label>
															<div class="col-sm-10">
																<input type="number" name="groomage" class="form-control" id="groomage" value="<?php echo $row['groomage'] ?>">
															</div>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="mb-3 row">
															<label for="groomfather" class="col-sm-2 col-form-label">Father:</label>
															<div class="col-sm-10">
															<input type="text" name="groomfather" class="form-control" id="groomfather" value="<?php echo $row['groomfather'] ?>"></p>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="mb-3 row">
															<label for="groommother" class="col-sm-2 col-form-label">Mother:</label>
															<div class="col-sm-10">
																<input type="text" name="groommother" class="form-control" id="groommother" value="<?php echo $row['groommother'] ?>">
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
															<input type="text" name="bridefullname" class="form-control" id="bridefullname" value="<?php echo $row['bride'] ?>"></p>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="mb-3 row">
															<label for="brideaddress" class="col-sm-2 col-form-label">Address:</label>
															<div class="col-sm-10">
																<input type="text" name="brideaddress" class="form-control" id="brideaddress" value="<?php echo $row['brideaddress'] ?>">
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="mb-3 row">
															<label for="bridebirthdate" class="col-sm-2 col-form-label">Birthdate:</label>
															<div class="col-sm-10">
																<?php
																	$date = $row['bridebirthdate'];
																	$newDate = date("Y-m-d", strtotime($date));
																?>
																<input type="date" name="bridebirthdate" class="form-control" id="bridebirthdate" value="<?php echo $newDate ?>"></p>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="mb-3 row">
															<label for="brideage" class="col-sm-2 col-form-label">Age:</label>
															<div class="col-sm-10">
																<input type="number" name="brideage" class="form-control" id="brideage" value="<?php echo $row['brideage'] ?>">
															</div>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="mb-3 row">
															<label for="bridefather" class="col-sm-2 col-form-label">Father:</label>
															<div class="col-sm-10">
															<input type="text" name="bridefather" class="form-control" id="bridefather" value="<?php echo $row['bridefather'] ?>"></p>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="mb-3 row">
															<label for="bridemother" class="col-sm-2 col-form-label">Mother:</label>
															<div class="col-sm-10">
																<input type="text" name="bridemother" class="form-control" id="bridemother" value="<?php echo $row['bridemother'] ?>">
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
															<?php
																$date = $row['wedday'];
																$newDate = date("Y-m-d", strtotime($date));
															?>
															<input type="date" name="weddingdate" class="form-control" id="weddingdate" value="<?php echo $newDate ?>"></p>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="mb-3 row">
															<label for="presider" class="col-sm-2 col-form-label">Priest:</label>
															<div class="col-sm-10">
																<input type="text" name="presider" class="form-control" id="presider" value="<?php echo $row['presider'] ?>">
															</div>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="mb-3 row">
															<label for="godfather" class="col-sm-2 col-form-label">Godfather:</label>
															<div class="col-sm-10">
															<input type="text" name="godfather" class="form-control" id="godfather" value="<?php echo $row['godfather'] ?>"></p>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="mb-3 row">
															<label for="godmother" class="col-sm-2 col-form-label">Godmother:</label>
															<div class="col-sm-10">
																<input type="text" name="godmother" class="form-control" id="godmother" value="<?php echo $row['godmother'] ?>">
															</div>
														</div>
													</div>
												</div>

											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												<button type="submit" name="update" class="btn btn-primary">Update</button>
											</div>
										</form>
									
								</div>
							</div>
						</div>
									
						<!-- Delete Modal -->
						<div class="modal fade" id="deleteModal<?php echo $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<form lass="modal-content animate" method="post">
										<input type="hidden" name="id" value="<?php echo $row['id'];?>">
										<div class="modal-header">
											<h5 class="modal-title" id="deleteModal">Delete!</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											Are you sure you want to delete this record?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
											<button type="submit" name="delete" class="btn btn-danger">Yes</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						
						<!-- Approve Modal -->
						<div class="modal fade" id="approveModal<?php echo $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<form lass="modal-content animate" method="post">
										<input type="hidden" name="id" value="<?php echo $row['id'];?>">
										<div class="modal-header">
											<h5 class="modal-title" id="approveModal">Approval!</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											Are you sure you want to approve this request?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
											<button type="submit" name="approve" class="btn btn-success">Yes</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						
						<!-- Reject Modal -->
						<div class="modal fade" id="rejectModal<?php echo $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<form lass="modal-content animate" method="post">
										<input type="hidden" name="id" value="<?php echo $row['id'];?>">
										<div class="modal-header">
											<h5 class="modal-title" id="rejectModal">Are you sure you want to reject this request?</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											Reason
											<div class="col-sm-12">
												<textarea style="width: 470px; height: 100px;" name="rejectReason" id="rejectReason"></textarea>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
											<button type="submit" name="reject" class="btn btn-success">Yes</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<?php endwhile; ?>
					</tbody>
					
				</table>
			</div>
		</div>
	</div>

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