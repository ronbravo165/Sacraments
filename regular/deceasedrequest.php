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

<?php
	if (isset($_POST['add'])) {
			$registerId = $session;
			$bn = $_POST['bn'];
			$pn = $_POST['pn'];
			$ln = $_POST['ln'];
			$fullname = $_POST['fullname'];
			$father = $_POST['father'];
			$mother = $_POST['mother'];
			$birthplace = $_POST['birthPlace'];
			$bday = $_POST['birthDate'];
			$decday = $_POST['deathDate'];
			$presider = $_POST['presider'];
			$caused = $_POST['caused'];
			$priest = $_POST['priest'];
			$status = 0;
			mysqli_query($con, "INSERT INTO deceased_tbl (registerId, bn, pn, ln, fullname, father, mother, birthplace, birthdate, decdate, presider, priest, caused, status) VALUES ('$registerId', '$bn', '$pn', '$ln', '$fullname', '$father', '$mother', '$birthplace', '$bday', '$decday', '$presider', '$priest', '$caused', '$status')");

			echo '<script>alert("Added successfully.")</script>';
			echo '<script>windows: location="deceasedrequest.php"</script>';
	}

	if (isset($_POST['delete'])) {
		$id = $_POST['id'];
		mysqli_query($con,"DELETE from deceased_tbl where id='$id'");

		echo '<script>alert("Deleted.")</script>';
		echo '<script>windows: location="deceasedrequest.php"</script>';
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
	<link rel='stylesheet' href='../dataTables.bootstrap5.min.css'>
	<script src="../bootstrap.bundle.min.js" ></script>
	<script src="../popper.min.js"></script>
	<script src="../bootstrap.min.js"></script>
	
	<!-- jQuery -->
	<script src='../jquery-3.7.0.js'></script>
	<script src="../jquery-1.12.4.js"></script>
	<script src="../jquery-ui.js"></script>
	<!-- Data Table JS -->
	<script src='../jquery.dataTables.min.js'></script>
	<script src='../dataTables.responsive.min.js'></script>
	<script src='../dataTables.bootstrap5.min.js'></script>
	<title>SRS - Deceased Request</title>
</head>
<body>
	<?php include '../connection.php'; ?>
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
		<div class="row flex-nowrap">
			
			<div class="col py-3">
				<h1 align="center">Deceased Records</h1>
				<div class="text-left">
					<button type="button" class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-target="#exampleModal">
					<span class="btn-label"><i class="fa fa-plus"></i></span> Request Form</button>
				</div>
				
				<!-- Modal -->
				<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-xl">
						<div class="modal-content" >
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="exampleModalLabel">Deceased Form</h1>
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
												<label for="ln" class="col-sm-3 col-form-label">Line No.</label>
												<div class="col-sm-9">
													<input type="text" name="ln" class="form-control" id="ln">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="mb-3 row">
												<label for="fullname" class="col-sm-3 col-form-label">Full Name</label>
												<div class="col-sm-9">
													<input type="text" name="fullname" class="form-control" id="fullname">
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="mb-3 row">
												<label for="birthDate" class="col-sm-3 col-form-label">Birth Date</label>
												<div class="col-sm-9">
												<input type="text" name="birthDate" class="form-control" id="birthDate"></p>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="mb-3 row">
												<label for="birthPlace" class="col-sm-3 col-form-label">Birth Place</label>
												<div class="col-sm-9">
													<input type="text" name="birthPlace" class="form-control" id="birthPlace">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="mb-3 row">
												<label for="father" class="col-sm-3 col-form-label">Father's Name</label>
												<div class="col-sm-9">
													<input type="text" name="father" class="form-control" id="father">
												</div>
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="mb-3 row">
												<label for="mother" class="col-sm-3 col-form-label">Mother's Name</label>
												<div class="col-sm-9">
													<input type="text" name="mother" class="form-control" id="mother">
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										
										<div class="col-md-6">
											<div class="mb-3 row">
												<label for="deathDate" class="col-sm-3 col-form-label">Date of Death</label>
												<div class="col-sm-9">
												<input type="text" name="deathDate" class="form-control" id="deathDate"></p>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3 row">
												<label for="caused" class="col-sm-3 col-form-label">Caused</label>
												<div class="col-sm-9">
													<input type="text" name="caused" class="form-control" id="caused">
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="mb-3 row">
												<label for="presider" class="col-sm-3 col-form-label">Presider</label>
												<div class="col-sm-9">
													<input type="text" name="presider" class="form-control" id="presider">
												</div>
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="mb-3 row">
												<label for="priest" class="col-sm-3 col-form-label">Parish Priest</label>
												<div class="col-sm-9">
													<input type="text" name="priest" class="form-control" id="priest">
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
							<td>Full name</td>
							<td>Birth Date</td>
							<td>Birth Place</td>
							<td>Deceased Date</td>
							<td>Caused of Death</td>
							<td>Priest</td>
							<td>Status</td>
							<td>Action</td>
						</tr>
					</thead>
					
					<tbody>
						<?php 
								$result = mysqli_query($con,"SELECT * FROM deceased_tbl where registerId = $session"); 
								while ($row = $result->fetch_assoc()):
						?>
						<tr>
							<td><?php echo $row['fullname']; ?></td>
							<td><?php echo $row['birthdate']; ?></td>
							<td><?php echo $row['birthplace']; ?></td>
							<td><?php echo $row['decdate']; ?></td>
							<td><?php echo $row['caused']; ?></td>
							<td><?php echo $row['priest']; ?></td>
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
							<td>
								<?php
									$status = $row['status'];
									$bapId = $row['id'];
									if ($status == 0) {
										print('<ul class="list-inline m-0">
											<li class="list-inline-item">
												<button class="btn btn-success btn-sm rounded-0" type="button" title="Edit" data-bs-toggle="modal" data-bs-target="#updateModal'.$bapId.'" data-bs-target="#updateModal"><i class="fa fa-edit"></i></button>
											</li>
											<li class="list-inline-item">
												<a class="btn btn-danger btn-sm rounded-0 delete_baptism" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal'.$bapId.'" href="javascript:void(0)" data-bs-target="#deleteModal"><i class="fa fa-trash"></i></a>
											</li>
										</ul>');
									}
									
								?>
							</td>
						</tr>
						
						<!-- View Modal -->
						<div class="modal fade" id="updateModal<?php echo $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-xl">
							<div class="modal-content" >
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="exampleModalLabel">Deceased Form</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
									<form class="modal-content animate" method="post">
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
													<label for="ln" class="col-sm-3 col-form-label">Line No.</label>
													<div class="col-sm-9">
														<input type="text" name="ln" class="form-control" id="ln" value="<?php echo $row['ln'] ?>">
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="mb-3 row">
													<label for="fullname" class="col-sm-3 col-form-label">Full Name</label>
													<div class="col-sm-9">
														<input type="text" name="fullname" class="form-control" id="fullname" value="<?php echo $row['fullname'] ?>">
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="mb-3 row">
													<label for="birthDate" class="col-sm-3 col-form-label">Birth Date</label>
													<div class="col-sm-9">
													<input type="text" name="birthDate" class="form-control" id="birthDate" value="<?php echo $row['birthdate'] ?>"></p>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="mb-3 row">
													<label for="birthPlace" class="col-sm-3 col-form-label">Birth Place</label>
													<div class="col-sm-9">
														<input type="text" name="birthPlace" class="form-control" id="birthPlace" value="<?php echo $row['birthplace'] ?>">
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="father" class="col-sm-3 col-form-label">Father's Name</label>
													<div class="col-sm-9">
														<input type="text" name="father" class="form-control" id="father" value="<?php echo $row['father'] ?>">
													</div>
												</div>
											</div>
											
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="mother" class="col-sm-3 col-form-label">Mother's Name</label>
													<div class="col-sm-9">
														<input type="text" name="mother" class="form-control" id="mother" value="<?php echo $row['mother'] ?>">
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="deathDate" class="col-sm-3 col-form-label">Date of Death</label>
													<div class="col-sm-9">
													<input type="text" name="deathDate" class="form-control" id="deathDate" value="<?php echo $row['decdate'] ?>"></p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="caused" class="col-sm-3 col-form-label">Caused</label>
													<div class="col-sm-9">
														<input type="text" name="caused" class="form-control" id="caused" value="<?php echo $row['caused'] ?>">
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="presider" class="col-sm-3 col-form-label">Presider</label>
													<div class="col-sm-9">
														<input type="text" name="presider" class="form-control" id="presider" value="<?php echo $row['presider'] ?>">
													</div>
												</div>
											</div>
											
											<div class="col-md-6">
												<div class="mb-3 row">
													<label for="priest" class="col-sm-3 col-form-label">Parish Priest</label>
													<div class="col-sm-9">
														<input type="text" name="priest" class="form-control" id="priest" value="<?php echo $row['priest'] ?>">
													</div>
												</div>
											</div>
										</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											<button type="submit" name="add" class="btn btn-primary">Update</button>
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

						<?php endwhile; ?>
					</tbody>
					
				</table>
			</div>
		</div>
	</div>

</body>
<script>
	$(function(){
		$('#birthDate').datepicker();
		$('#deathDate').datepicker();
	});

	$(document).ready(function() {
		$('.example').DataTable({
		//disable sorting on last column
		"columnDefs": [
			{ "orderable": false, "targets": 7 }
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



