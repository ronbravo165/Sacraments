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

	if (isset($_POST['approve'])) {
		$id = $_POST['id'];
		mysqli_query($con,"UPDATE baptism_tbl SET status = 1 where id = '$id'");
		echo '<script>alert("This request has been approved!")</script>';
		echo '<script>windows: location="requests.php"</script>';
	}

	if (isset($_POST['reject'])) {
		$id = $_POST['id'];
		mysqli_query($con,"UPDATE baptism_tbl SET status = 2 where id = '$id'");
		echo '<script>alert("This request has been rejected!")</script>';
		echo '<script>windows: location="requests.php"</script>';
	}

	if (isset($_POST['approveCom'])) {
		$id = $_POST['id'];
		mysqli_query($con,"UPDATE communion_tbl SET status = 1 where id = '$id'");
		echo '<script>alert("This request has been approved!")</script>';
		echo '<script>windows: location="requests.php"</script>';
	}

	if (isset($_POST['rejectCom'])) {
		$id = $_POST['id'];
		mysqli_query($con,"UPDATE communion_tbl SET status = 2 where id = '$id'");
		echo '<script>alert("This request has been rejected!")</script>';
		echo '<script>windows: location="requests.php"</script>';
	}

	if (isset($_POST['approveCon'])) {
		$id = $_POST['id'];
		mysqli_query($con,"UPDATE confirmation_tbl SET status = 1 where id = '$id'");
		echo '<script>alert("This request has been approved!")</script>';
		echo '<script>windows: location="requests.php"</script>';
	}

	if (isset($_POST['rejectCon'])) {
		$id = $_POST['id'];
		mysqli_query($con,"UPDATE confirmation_tbl SET status = 2 where id = '$id'");
		echo '<script>alert("This request has been rejected!")</script>';
		echo '<script>windows: location="requests.php"</script>';
	}

	if (isset($_POST['approveWed'])) {
		$id = $_POST['id'];
		mysqli_query($con,"UPDATE wedding_tbl SET status = 1 where id = '$id'");
		echo '<script>alert("This request has been approved!")</script>';
		echo '<script>windows: location="requests.php"</script>';
	}

	if (isset($_POST['rejectWed'])) {
		$id = $_POST['id'];
		mysqli_query($con,"UPDATE wedding_tbl SET status = 2 where id = '$id'");
		echo '<script>alert("This request has been rejected!")</script>';
		echo '<script>windows: location="requests.php"</script>';
	}

	if (isset($_POST['approveDec'])) {
		$id = $_POST['id'];
		mysqli_query($con,"UPDATE deceased_tbl SET status = 1 where id = '$id'");
		echo '<script>alert("This request has been approved!")</script>';
		echo '<script>windows: location="requests.php"</script>';
	}

	if (isset($_POST['rejectDec'])) {
		$id = $_POST['id'];
		mysqli_query($con,"UPDATE deceased_tbl SET status = 2 where id = '$id'");
		echo '<script>alert("This request has been rejected!")</script>';
		echo '<script>windows: location="requests.php"</script>';
	}
?>

<!DOCTYPE html>
<html>
<head>
	
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
	<title>SRS - Requests</title>
</head>
<body>

	<?php include 'topbar.php';
	?>

	<!-- The sidebar -->
	<div class="container-fluid">
		<div class="row flex-nowrap">
			<div id="menu" class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;"> 
				<ul class="nav nav-pills flex-column mb-auto"> 
					<li > 
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
					<li class="active"> 
						<a href="requests.php" class="nav-link text-white"> <i class="fa fa-bookmark"></i><span class="ms-2">Request</span> </a> 
					</li>
					<li> 
						<a href="user.php" class="nav-link text-white"> <i class="fa fa-bookmark"></i><span class="ms-2">User Lists</span> </a> 
					</li>
				</ul> <hr> 
			</div>
			<div class="col py-3">
				<h2>List of Requests</h2>
				<div class="m-4">
					<ul class="nav nav-tabs" id="myTab">
						<li class="nav-item">
							<a href="#baptismal" class="nav-link active" data-bs-toggle="tab"><strong>Baptismal Requests</strong></a>
						</li>
						<li class="nav-item">
							<a href="#communion" class="nav-link" data-bs-toggle="tab"><strong>Communion Requests</strong></a>
						</li>
						<li class="nav-item">
							<a href="#confirmation" class="nav-link" data-bs-toggle="tab"><strong>Confirmation Requests</strong></a>
						</li>
						<li class="nav-item">
							<a href="#wedding" class="nav-link" data-bs-toggle="tab"><strong>Wedding Requests</strong></a>
						</li>
						<li class="nav-item">
							<a href="#deceased" class="nav-link" data-bs-toggle="tab"><strong>Deceased Record Requests</strong></a>
						</li>
					</ul>
					<div class="clearfix">&nbsp;</div>
					<hr>
					<div class="tab-content">
						<div class="tab-pane fade show active" id="baptismal">
							<ul class="nav nav-tabs" id="myTab">
								<li class="nav-item">
									<a href="#pending" class="nav-link active" data-bs-toggle="tab">Pending Requests</a>
								</li>
								<li class="nav-item">
									<a href="#approved" class="nav-link" data-bs-toggle="tab">Approved Requests</a>
								</li>
								<li class="nav-item">
									<a href="#rejected" class="nav-link" data-bs-toggle="tab">Rejected Requests</a>
								</li>
								
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade show active" id="pending">
									<div class="clearfix">&nbsp;</div>	
									<table id="example" class="table table-striped example" style="width:100%">
										<thead>
											<tr>
											<td>Fullname</td>
											<td>Address</td>
											<td>Birthday</td>
											<td>Action</td>
											</tr>
										</thead>

										<tbody>
											<?php include 'connection.php';
											$result = mysqli_query($con,"SELECT * FROM baptism_tbl where status = 0 AND registerId !=0 "); 
											while ($row = $result->fetch_assoc()):
											?>
											<tr>
											<td><?php echo $row['fullname']; ?></td>
											<td><?php echo $row['birthplace']; ?></td>
											<td><?php echo $row['birthdate']; ?></td>
											<td>
												<?php
													$requestorId = $row['registerId'];
													$status = $row['status'];
													$bapId = $row['id'];		
													if ($requestorId != 0 && $status == 0) {
														print('<li class="list-inline-item">
																	<a class="btn btn-success btn-sm rounded-0 approve_baptism" title="Approve" data-bs-toggle="modal" data-bs-target="#approveModal'.$bapId.'" href="javascript:void(0)" data-bs-target="#approveModal"><i class="fa fa-check"></i></a>
																</li>	
																<li class="list-inline-item">
																	<a class="btn btn-danger btn-sm rounded-0 reject_baptism" title="Reject" data-bs-toggle="modal" data-bs-target="#rejectModal'.$bapId.'" href="javascript:void(0)" data-bs-target="#rejectModal"><i class="fa fa-times"></i></a>
																</li>'
															);
													}
													
												?>	
											</td>
											</tr>
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
																<h5 class="modal-title" id="rejectModal">Reject!</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																Are you sure you want to reject this request?
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
								<div class="tab-pane fade " id="approved">
									<div class="clearfix">&nbsp;</div>	
									<table id="example" class="table table-striped example" style="width:100%">
										<thead>
											<tr>
											<td>Fullname</td>
											<td>Address</td>
											<td>Birthday</td>
											<!-- <td>Action</td> -->
											</tr>
										</thead>

										<tbody>
											<?php include 'connection.php';
											$result = mysqli_query($con,"SELECT * FROM baptism_tbl where status = 1 AND registerId !=0 "); 
											while ($row = $result->fetch_assoc()):
											?>
											<tr>
											<td><?php echo $row['fullname']; ?></td>
											<td><?php echo $row['birthplace']; ?></td>
											<td><?php echo $row['birthdate']; ?></td>
											<!-- <td><a style='text-decoration: none; color: black;' href='baprequestdelete.php?id="<?php echo $row['id']; ?>"'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</a></td> -->
											</tr>

											<?php endwhile; ?>
										</tbody>

									</table>
								</div>
								<div class="tab-pane fade s" id="rejected">
									<div class="clearfix">&nbsp;</div>	
									<table id="example" class="table table-striped example" style="width:100%">
										<thead>
											<tr>
											<td>Fullname</td>
											<td>Address</td>
											<td>Birthday</td>
											<!-- <td>Action</td> -->
											</tr>
										</thead>

										<tbody>
											<?php include 'connection.php';
											$result = mysqli_query($con,"SELECT * FROM baptism_tbl where status = 2 AND registerId !=0 "); 
											while ($row = $result->fetch_assoc()):
											?>
											<tr>
											<td><?php echo $row['fullname']; ?></td>
											<td><?php echo $row['birthplace']; ?></td>
											<td><?php echo $row['birthdate']; ?></td>
											<!-- <td><a style='text-decoration: none; color: black;' href='baprequestdelete.php?id="<?php echo $row['id']; ?>"'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</a></td> -->
											</tr>

											<?php endwhile; ?>
										</tbody>

									</table>
								</div>
							</div>
							
							<div class="clearfix">&nbsp;</div>
							
						</div>
						<div class="tab-pane fade" id="communion">
							<ul class="nav nav-tabs" id="comTab">
								<li class="nav-item">
									<a href="#pendingCom" class="nav-link active" data-bs-toggle="tab">Pending Requests</a>
								</li>
								<li class="nav-item">
									<a href="#approvedCom" class="nav-link" data-bs-toggle="tab">Approved Requests</a>
								</li>
								<li class="nav-item">
									<a href="#rejectedCom" class="nav-link" data-bs-toggle="tab">Rejected Requests</a>
								</li>
								
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade show active" id="pendingCom">
									<div class="clearfix">&nbsp;</div>	
									<table id="example" class="table table-striped example" style="width:100%">
										<thead>
											<tr>
											<td>Fullname</td>
											<td>Communion Date</td>
											<td>Communion Time</td>
											<td>Action</td>
											</tr>
										</thead>

										<tbody>
											<?php include 'connection.php';
											$result = mysqli_query($con,"SELECT * FROM communion_tbl where status = 0 AND registerId !=0 "); 
											while ($row = $result->fetch_assoc()):
											?>
											<tr>
											<td><?php echo $row['fullname']; ?></td>
											<td><?php echo $row['comdate']; ?></td>
											<td><?php echo $row['comtime']; ?></td>
											<td>
												<?php
													$requestorId = $row['registerId'];
													$status = $row['status'];
													$bapId = $row['id'];		
													if ($requestorId != 0 && $status == 0) {
														print('<li class="list-inline-item">
																	<a class="btn btn-success btn-sm rounded-0 approve_baptism" title="Approve" data-bs-toggle="modal" data-bs-target="#approveComModal'.$bapId.'" href="javascript:void(0)" data-bs-target="#approveComModal"><i class="fa fa-check"></i></a>
																</li>	
																<li class="list-inline-item">
																	<a class="btn btn-danger btn-sm rounded-0 reject_baptism" title="Reject" data-bs-toggle="modal" data-bs-target="#rejectComModal'.$bapId.'" href="javascript:void(0)" data-bs-target="#rejectComModal"><i class="fa fa-times"></i></a>
																</li>'
															);
													}
													
												?>	
											</td>
											</tr>
											<!-- Approve Modal -->
											<div class="modal fade" id="approveComModal<?php echo $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<form lass="modal-content animate" method="post">
															<input type="hidden" name="id" value="<?php echo $row['id'];?>">
															<div class="modal-header">
																<h5 class="modal-title" id="approveComModal">Approval!</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																Are you sure you want to approve this request?
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
																<button type="submit" name="approveCom" class="btn btn-success">Yes</button>
															</div>
														</form>
													</div>
												</div>
											</div>
											
											<!-- Reject Modal -->
											<div class="modal fade" id="rejectComModal<?php echo $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<form lass="modal-content animate" method="post">
															<input type="hidden" name="id" value="<?php echo $row['id'];?>">
															<div class="modal-header">
																<h5 class="modal-title" id="rejectComModal">Reject!</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																Are you sure you want to reject this request?
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
																<button type="submit" name="rejectCom" class="btn btn-success">Yes</button>
															</div>
														</form>
													</div>
												</div>
											</div>
											<?php endwhile; ?>
										</tbody>

									</table>
								</div>
								<div class="tab-pane fade" id="approvedCom">
									<div class="clearfix">&nbsp;</div>	
									<table id="example" class="table table-striped example" style="width:100%">
										<thead>
											<tr>
											<td>Fullname</td>
											<td>Communion Date</td>
											<td>Communion Time</td>
											</tr>
										</thead>

										<tbody>
											<?php include 'connection.php';
											$result = mysqli_query($con,"SELECT * FROM communion_tbl where status = 1 AND registerId !=0 "); 
											while ($row = $result->fetch_assoc()):
											?>
											<tr>
											<td><?php echo $row['fullname']; ?></td>
											<td><?php echo $row['comdate']; ?></td>
											<td><?php echo $row['comtime']; ?></td>
											</tr>
											<?php endwhile; ?>
										</tbody>

									</table>
								</div>
								<div class="tab-pane fade" id="rejectedCom">
									<div class="clearfix">&nbsp;</div>	
									<table id="example" class="table table-striped example" style="width:100%">
										<thead>
											<tr>
											<td>Fullname</td>
											<td>Communion Date</td>
											<td>Communion Time</td>
											</tr>
										</thead>

										<tbody>
											<?php include 'connection.php';
											$result = mysqli_query($con,"SELECT * FROM communion_tbl where status = 2 AND registerId !=0 "); 
											while ($row = $result->fetch_assoc()):
											?>
											<tr>
											<td><?php echo $row['fullname']; ?></td>
											<td><?php echo $row['comdate']; ?></td>
											<td><?php echo $row['comtime']; ?></td>
											</tr>
											<?php endwhile; ?>
										</tbody>

									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="confirmation">
							<ul class="nav nav-tabs" id="conTab">
								<li class="nav-item">
									<a href="#pendingCon" class="nav-link active" data-bs-toggle="tab">Pending Requests</a>
								</li>
								<li class="nav-item">
									<a href="#approvedCon" class="nav-link" data-bs-toggle="tab">Approved Requests</a>
								</li>
								<li class="nav-item">
									<a href="#rejectedCon" class="nav-link" data-bs-toggle="tab">Rejected Requests</a>
								</li>
								
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade show active" id="pendingCon">
									<div class="clearfix">&nbsp;</div>	
									<table id="example" class="table table-striped example" style="width:100%">
										<thead>
											<tr>
												<td>Fullname</td>
												<td>Confirmation Date</td>
												<td>Confirmation Time</td>
												<td>Action</td>
											</tr>
										</thead>

										<tbody>
											<?php 
											$result = mysqli_query($con,"SELECT * FROM confirmation_tbl where status = 0 AND registerId !=0 "); 
											while ($row = $result->fetch_assoc()):
											?>
											<tr>
												<td><?php echo $row['fullname']; ?></td>
												<td><?php echo $row['condate']; ?></td>
												<td><?php echo $row['contime']; ?></td>
											<td>
												<?php
													$requestorId = $row['registerId'];
													$status = $row['status'];
													$bapId = $row['id'];		
													if ($requestorId != 0 && $status == 0) {
														print('<li class="list-inline-item">
																	<a class="btn btn-success btn-sm rounded-0 approve_baptism" title="Approve" data-bs-toggle="modal" data-bs-target="#approveConModal'.$bapId.'" href="javascript:void(0)" data-bs-target="#approveConModal"><i class="fa fa-check"></i></a>
																</li>	
																<li class="list-inline-item">
																	<a class="btn btn-danger btn-sm rounded-0 reject_baptism" title="Reject" data-bs-toggle="modal" data-bs-target="#rejectConModal'.$bapId.'" href="javascript:void(0)" data-bs-target="#rejectConModal"><i class="fa fa-times"></i></a>
																</li>'
															);
													}
													
												?>	
											</td>
											</tr>
											<!-- Approve Modal -->
											<div class="modal fade" id="approveConModal<?php echo $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<form lass="modal-content animate" method="post">
															<input type="hidden" name="id" value="<?php echo $row['id'];?>">
															<div class="modal-header">
																<h5 class="modal-title" id="approveConModal">Approval!</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																Are you sure you want to approve this request?
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
																<button type="submit" name="approveCon" class="btn btn-success">Yes</button>
															</div>
														</form>
													</div>
												</div>
											</div>
											
											<!-- Reject Modal -->
											<div class="modal fade" id="rejectConModal<?php echo $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<form lass="modal-content animate" method="post">
															<input type="hidden" name="id" value="<?php echo $row['id'];?>">
															<div class="modal-header">
																<h5 class="modal-title" id="rejectConModal">Reject!</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																Are you sure you want to reject this request?
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
																<button type="submit" name="rejectCon" class="btn btn-success">Yes</button>
															</div>
														</form>
													</div>
												</div>
											</div>
											<?php endwhile; ?>
										</tbody>

									</table>
								</div>
								<div class="tab-pane fade " id="approvedCon">
									<div class="clearfix">&nbsp;</div>	
									<table id="example" class="table table-striped example" style="width:100%">
										<thead>
											<tr>
												<td>Fullname</td>
												<td>Confirmation Date</td>
												<td>Confirmation Time</td>
											</tr>
										</thead>

										<tbody>
											<?php
											$result = mysqli_query($con,"SELECT * FROM confirmation_tbl where status = 1 AND registerId !=0 "); 
											while ($row = $result->fetch_assoc()):
											?>
											<tr>
												<td><?php echo $row['fullname']; ?></td>
												<td><?php echo $row['condate']; ?></td>
												<td><?php echo $row['contime']; ?></td>
											</tr>
											<?php endwhile; ?>
										</tbody>

									</table>
								</div>
								<div class="tab-pane fade" id="rejectedCon">
									<div class="clearfix">&nbsp;</div>	
									<table id="example" class="table table-striped example" style="width:100%">
										<thead>
											<tr>
											<td>Fullname</td>
												<td>Confirmation Date</td>
												<td>Confirmation Time</td>
											</tr>
										</thead>

										<tbody>
											<?php 
											$result = mysqli_query($con,"SELECT * FROM confirmation_tbl where status = 2 AND registerId !=0 "); 
											while ($row = $result->fetch_assoc()):
											?>
											<tr>
												<td><?php echo $row['fullname']; ?></td>
												<td><?php echo $row['condate']; ?></td>
												<td><?php echo $row['contime']; ?></td>
											</tr>
											<?php endwhile; ?>
										</tbody>

									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="wedding">
							<ul class="nav nav-tabs" id="wedTab">
								<li class="nav-item">
									<a href="#pendingWed" class="nav-link active" data-bs-toggle="tab">Pending Requests</a>
								</li>
								<li class="nav-item">
									<a href="#approvedWed" class="nav-link" data-bs-toggle="tab">Approved Requests</a>
								</li>
								<li class="nav-item">
									<a href="#rejectedWed" class="nav-link" data-bs-toggle="tab">Rejected Requests</a>
								</li>
								
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade show active" id="pendingWed">
									<div class="clearfix">&nbsp;</div>	
									<table id="example" class="table table-striped example" style="width:100%">
										<thead>
											<tr>
												<td>Groom's Name</td>
												<td>Groom's Age</td>
												<td>Bride's Name</td>
												<td>Bride's Age</td>
												<td>Wedding Date</td>
												<td>Action</td>
											</tr>
										</thead>

										<tbody>
											<?php 
											$result = mysqli_query($con,"SELECT * FROM wedding_tbl where status = 0 AND registerId !=0 "); 
											while ($row = $result->fetch_assoc()):
											?>
											<tr>
												<td><?php echo $row['groom']; ?></td>
												<td><?php echo $row['groomage']; ?></td>
												<td><?php echo $row['bride']; ?></td>
												<td><?php echo $row['brideage']; ?></td>
												<td><?php echo $row['wedday']; ?></td>
											<td>
												<?php
													$requestorId = $row['registerId'];
													$status = $row['status'];
													$bapId = $row['id'];		
													if ($requestorId != 0 && $status == 0) {
														print('<li class="list-inline-item">
																	<a class="btn btn-success btn-sm rounded-0 approve_baptism" title="Approve" data-bs-toggle="modal" data-bs-target="#approveWedModal'.$bapId.'" href="javascript:void(0)" data-bs-target="#approveWedModal"><i class="fa fa-check"></i></a>
																</li>	
																<li class="list-inline-item">
																	<a class="btn btn-danger btn-sm rounded-0 reject_baptism" title="Reject" data-bs-toggle="modal" data-bs-target="#rejectWedModal'.$bapId.'" href="javascript:void(0)" data-bs-target="#rejectWedModal"><i class="fa fa-times"></i></a>
																</li>'
															);
													}
													
												?>	
											</td>
											</tr>
											<!-- Approve Modal -->
											<div class="modal fade" id="approveWedModal<?php echo $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<form lass="modal-content animate" method="post">
															<input type="hidden" name="id" value="<?php echo $row['id'];?>">
															<div class="modal-header">
																<h5 class="modal-title" id="approveWedModal">Approval!</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																Are you sure you want to approve this request?
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
																<button type="submit" name="approveWed" class="btn btn-success">Yes</button>
															</div>
														</form>
													</div>
												</div>
											</div>
											
											<!-- Reject Modal -->
											<div class="modal fade" id="rejectWedModal<?php echo $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<form lass="modal-content animate" method="post">
															<input type="hidden" name="id" value="<?php echo $row['id'];?>">
															<div class="modal-header">
																<h5 class="modal-title" id="rejectWedModal">Reject!</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																Are you sure you want to reject this request?
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
																<button type="submit" name="rejectWed" class="btn btn-success">Yes</button>
															</div>
														</form>
													</div>
												</div>
											</div>
											<?php endwhile; ?>
										</tbody>

									</table>
								</div>
								<div class="tab-pane fade " id="approvedWed">
									<div class="clearfix">&nbsp;</div>	
									<table id="example" class="table table-striped example" style="width:100%">
										<thead>
											<tr>
												<td>Groom's Name</td>
												<td>Groom's Age</td>
												<td>Bride's Name</td>
												<td>Bride's Age</td>
												<td>Wedding Date</td>
											</tr>
										</thead>

										<tbody>
											<?php
											$result = mysqli_query($con,"SELECT * FROM wedding_tbl where status = 1 AND registerId !=0 "); 
											while ($row = $result->fetch_assoc()):
											?>
											<tr>
												<td><?php echo $row['groom']; ?></td>
												<td><?php echo $row['groomage']; ?></td>
												<td><?php echo $row['bride']; ?></td>
												<td><?php echo $row['brideage']; ?></td>
												<td><?php echo $row['wedday']; ?></td>
											</tr>
											<?php endwhile; ?>
										</tbody>

									</table>
								</div>
								<div class="tab-pane fade" id="rejectedWed">
									<div class="clearfix">&nbsp;</div>	
									<table id="example" class="table table-striped example" style="width:100%">
										<thead>
											<tr>
												<td>Groom's Name</td>
												<td>Groom's Age</td>
												<td>Bride's Name</td>
												<td>Bride's Age</td>
												<td>Wedding Date</td>
											</tr>
										</thead>

										<tbody>
											<?php 
											$result = mysqli_query($con,"SELECT * FROM wedding_tbl where status = 2 AND registerId !=0 "); 
											while ($row = $result->fetch_assoc()):
											?>
											<tr>
												<td><?php echo $row['groom']; ?></td>
												<td><?php echo $row['groomage']; ?></td>
												<td><?php echo $row['bride']; ?></td>
												<td><?php echo $row['brideage']; ?></td>
												<td><?php echo $row['wedday']; ?></td>
											</tr>
											<?php endwhile; ?>
										</tbody>

									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="deceased">
							<ul class="nav nav-tabs" id="wedTab">
								<li class="nav-item">
									<a href="#pendingDec" class="nav-link active" data-bs-toggle="tab">Pending Requests</a>
								</li>
								<li class="nav-item">
									<a href="#approvedDec" class="nav-link" data-bs-toggle="tab">Approved Requests</a>
								</li>
								<li class="nav-item">
									<a href="#rejectedDec" class="nav-link" data-bs-toggle="tab">Rejected Requests</a>
								</li>
								
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade show active" id="pendingDec">
									<div class="clearfix">&nbsp;</div>	
									<table id="example" class="table table-striped example" style="width:100%">
										<thead>
											<tr>
											<td>Fullname</td>
											<td>Birth Date</td>
											<td>Deceased Date</td>
											<td>Caused of Death</td>
											<td>Action</td>
											</tr>
										</thead>

										<tbody>
											<?php 
											$result = mysqli_query($con,"SELECT * FROM deceased_tbl where status = 0 AND registerId !=0 "); 
											while ($row = $result->fetch_assoc()):
											?>
											<tr>
											<td><?php echo $row['fullname']; ?></td>
											<td><?php echo $row['birthdate']; ?></td>
											<td><?php echo $row['decdate']; ?></td>
											<td><?php echo $row['caused']; ?></td>
											<td>
												<?php
													$requestorId = $row['registerId'];
													$status = $row['status'];
													$bapId = $row['id'];		
													if ($requestorId != 0 && $status == 0) {
														print('<li class="list-inline-item">
																	<a class="btn btn-success btn-sm rounded-0 approve_baptism" title="Approve" data-bs-toggle="modal" data-bs-target="#approveDecModal'.$bapId.'" href="javascript:void(0)" data-bs-target="#approveDecModal"><i class="fa fa-check"></i></a>
																</li>	
																<li class="list-inline-item">
																	<a class="btn btn-danger btn-sm rounded-0 reject_baptism" title="Reject" data-bs-toggle="modal" data-bs-target="#rejectDecModal'.$bapId.'" href="javascript:void(0)" data-bs-target="#rejectDecModal"><i class="fa fa-times"></i></a>
																</li>'
															);
													}
													
												?>	
											</td>
											</tr>
											<!-- Approve Modal -->
											<div class="modal fade" id="approveDecModal<?php echo $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<form lass="modal-content animate" method="post">
															<input type="hidden" name="id" value="<?php echo $row['id'];?>">
															<div class="modal-header">
																<h5 class="modal-title" id="approveDecModal">Approval!</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																Are you sure you want to approve this request?
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
																<button type="submit" name="approveDec" class="btn btn-success">Yes</button>
															</div>
														</form>
													</div>
												</div>
											</div>
											
											<!-- Reject Modal -->
											<div class="modal fade" id="rejectDecModal<?php echo $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<form lass="modal-content animate" method="post">
															<input type="hidden" name="id" value="<?php echo $row['id'];?>">
															<div class="modal-header">
																<h5 class="modal-title" id="rejectDecModal">Reject!</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																Are you sure you want to reject this request?
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
																<button type="submit" name="rejectDec" class="btn btn-success">Yes</button>
															</div>
														</form>
													</div>
												</div>
											</div>
											<?php endwhile; ?>
										</tbody>

									</table>
								</div>
								<div class="tab-pane fade" id="approvedDec">
									<div class="clearfix">&nbsp;</div>	
									<table id="example" class="table table-striped example" style="width:100%">
										<thead>
											<tr>
											<td>Fullname</td>
											<td>Birth Date</td>
											<td>Deceased Date</td>
											<td>Caused of Death</td>
											</tr>
										</thead>

										<tbody>
											<?php include 'connection.php';
											$result = mysqli_query($con,"SELECT * FROM deceased_tbl where status = 1 AND registerId !=0 "); 
											while ($row = $result->fetch_assoc()):
											?>
											<tr>
											<td><?php echo $row['fullname']; ?></td>
											<td><?php echo $row['birthdate']; ?></td>
											<td><?php echo $row['decdate']; ?></td>
											<td><?php echo $row['caused']; ?></td>
											</tr>
											<?php endwhile; ?>
										</tbody>

									</table>
								</div>
								<div class="tab-pane fade" id="rejectedDec">
									<div class="clearfix">&nbsp;</div>	
									<table id="example" class="table table-striped example" style="width:100%">
										<thead>
											<tr>
											<td>Fullname</td>
											<td>Birth Date</td>
											<td>Deceased Date</td>
											<td>Caused of Death</td>
											</tr>
										</thead>

										<tbody>
											<?php 
											$result = mysqli_query($con,"SELECT * FROM deceased_tbl where status = 2 AND registerId !=0 "); 
											while ($row = $result->fetch_assoc()):
											?>
											<tr>
											<td><?php echo $row['fullname']; ?></td>
											<td><?php echo $row['birthdate']; ?></td>
											<td><?php echo $row['decdate']; ?></td>
											<td><?php echo $row['caused']; ?></td>
											</tr>
											<?php endwhile; ?>
										</tbody>

									</table>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>

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
} );
</script>
</html>