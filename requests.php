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
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="icon" type="image/png" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="css/heading.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- Data Table CSS -->
	<link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
	
	<!-- jQuery -->
	<script src='https://code.jquery.com/jquery-3.7.0.js'></script>
	<!-- Data Table JS -->
	<script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
	<script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
	<script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>
	<title>SRS - Requests</title>
</head>
<body>

	<?php include 'topbar.php';
	?>

	<!-- The sidebar -->
	<div class="container-fluid">
		<div class="row flex-nowrap">
			<div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;"> 
				<ul class="nav nav-pills flex-column mb-auto"> 
					<li class="nav-item"> 
						<a href="home.php" class="nav-link text-white" aria-current="page"> <i class="fa fa-home"></i><span class="ms-2">Home</span> </a> 
					</li> 
					<li>
						<a href="#" class="nav-link text-white"> <i class="fa fa-first-order"></i><span class="ms-2">Baptism</span> </a> 
					</li>
					<li>
						<a href="#" class="nav-link text-white"> <i class="fa fa-first-order"></i><span class="ms-2">Communion</span> </a> 
					</li> 
					<li> 
						<a href="#" class="nav-link text-white"> <i class="fa fa-cog"></i><span class="ms-2">Confirmation</span> </a> 
					</li> 
					<li> 
						<a href="#" class="nav-link text-white"> <i class="fa fa-bookmark"></i><span class="ms-2">Wedding</span> </a> 
					</li>
					<li> 
						<a href="#" class="nav-link text-white"> <i class="fa fa-bookmark"></i><span class="ms-2">Deceased</span> </a> 
					</li> 
					<li> 
						<a href="#" class="nav-link active"> <i class="fa fa-bookmark"></i><span class="ms-2">Request</span> </a> 
					</li>
					<li> 
						<a href="#" class="nav-link text-white"> <i class="fa fa-bookmark"></i><span class="ms-2">User Lists</span> </a> 
					</li>
				</ul> <hr> 
			</div>
			<div class="col py-3">
				<h2>List of Requests</h2>
				<div class="m-4">
					<ul class="nav nav-tabs" id="myTab">
						<li class="nav-item">
							<a href="#baptismal" class="nav-link active" data-bs-toggle="tab">Baptismal Requests</a>
						</li>
						<li class="nav-item">
							<a href="#communion" class="nav-link" data-bs-toggle="tab">Communion Requests</a>
						</li>
						<li class="nav-item">
							<a href="#confirmation" class="nav-link" data-bs-toggle="tab">Confirmation Requests</a>
						</li>
						<li class="nav-item">
							<a href="#wedding" class="nav-link" data-bs-toggle="tab">Wedding Requests</a>
						</li>
						<li class="nav-item">
							<a href="#deceased" class="nav-link" data-bs-toggle="tab">Deceased Record Requests</a>
						</li>
					</ul>
					<div class="clearfix">&nbsp;</div>
					<div class="tab-content">
						<div class="tab-pane fade show active" id="baptismal">
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
											$result = mysqli_query($con,"SELECT * FROM baprequest_tbl"); 
											while ($row = $result->fetch_assoc()):
									?>
									<tr>
										<td><?php echo $row['fullname']; ?></td>
										<td><?php echo $row['address']; ?></td>
										<td><?php echo $row['birthday']; ?></td>
										<td><a style='text-decoration: none; color: black;' href='baprequestdelete.php?id="<?php echo $row['id']; ?>"'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</a></td>
									</tr>

									<?php endwhile; ?>
								</tbody>
								
							</table>
						</div>
						<div class="tab-pane fade" id="communion">
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
											$result = mysqli_query($con,"SELECT * FROM comrequest_tbl"); 
											while ($row = $result->fetch_assoc()):
									?>
									<tr>
										<td><?php echo $row['fullname']; ?></td>
										<td><?php echo $row['address']; ?></td>
										<td><?php echo $row['birthday']; ?></td>
										<td><a style='text-decoration: none; color: black;' href='baprequestdelete.php?id="<?php echo $row['id']; ?>"'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</a></td>
									</tr>

									<?php endwhile; ?>
								</tbody>
								
							</table>							
						</div>
						<div class="tab-pane fade" id="confirmation">
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
									$result = mysqli_query($con,"SELECT * FROM conrequest_tbl"); 
										while ($row = $result->fetch_assoc()):
									?>
									<tr>
										<td><?php echo $row['fullname']; ?></td>
										<td><?php echo $row['address']; ?></td>
										<td><?php echo $row['birthday']; ?></td>
										<td><a style='text-decoration: none; color: black;' href='baprequestdelete.php?id="<?php echo $row['id']; ?>"'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</a></td>
									</tr>

									<?php endwhile; ?>
								</tbody>

							</table>		
						</div>
						<div class="tab-pane fade" id="wedding">
							<table id="example" class="table table-striped example" style="width:100%">
								<thead>
									<tr>
										<td>Husband</td>
										<td>Wife</td>
										<td>Address</td>
										<td>Action</td>
									</tr>
								</thead>

								<tbody>
									<?php include 'connection.php';
									$result = mysqli_query($con,"SELECT * FROM wedrequest_tbl"); 
										while ($row = $result->fetch_assoc()):
									?>
									<tr>
										<td><?php echo $row['groom']; ?></td>
										<td><?php echo $row['bride']; ?></td>
										<td><?php echo $row['address']; ?></td>
										<td><a style='text-decoration: none; color: black;' href='baprequestdelete.php?id="<?php echo $row['id']; ?>"'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</a></td>
									</tr>

									<?php endwhile; ?>
								</tbody>

							</table>
						</div>
						<div class="tab-pane fade" id="deceased">
							<table id="example" class="table table-striped example" style="width:100%">
								<thead>
									<tr>
										<td>Fullname</td>
										<td>Address</td>
										<td>Caused of Death</td>
										<td>Action</td>
									</tr>
								</thead>

								<tbody>
									<?php include 'connection.php';
									$result = mysqli_query($con,"SELECT * FROM decrequest_tbl"); 
										while ($row = $result->fetch_assoc()):
									?>
									<tr>
										<td><?php echo $row['fullname']; ?></td>
										<td><?php echo $row['address']; ?></td>
										<td><?php echo $row['caused']; ?></td>
										<td><a style='text-decoration: none; color: black;' href='baprequestdelete.php?id="<?php echo $row['id']; ?>"'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</a></td>
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

</body>
<script>
	$(document).ready(function() {
    $('.example').DataTable({
      //disable sorting on last column
      "columnDefs": [
        { "orderable": false, "targets": 3 }
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