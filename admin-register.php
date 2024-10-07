<?php
if (isset($_POST['add'])) {
	include 'connection.php';
        $firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
        $fullname = $firstname .' '. $lastname;  
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		mysqli_query($con,"INSERT INTO user_tbl (username, password, fullname) VALUES ('$username', '$password', '$fullname')");

		echo '<script>alert("Your account has been created successfully.")</script>';
		echo '<script>windows: location="index.php"</script>';
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
	<link rel="stylesheet" href="../jquery-ui.css">
	<link href="fonts/font-awesome.min.css" rel="stylesheet" type='text/css'>

	<script src="bootstrap.bundle.min.js" ></script>
	<script src="popper.min.js"></script>
	<script src="bootstrap.min.js"></script>
	
	<!-- jQuery -->
	<script src='jquery-3.7.0.js'></script>
	<script src="jquery-1.12.4.js"></script>
	<script src="jquery-ui.js"></script>

	<link rel="stylesheet" type="text/css" href="regular.css">
	<title>SRS - Register</title>

</head>

<body>
<section class="wrapper">
	<div class="container">
		<div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
			<!-- <div class="logo">
				<img decoding="async" src="/Sacraments/images/logo.png" class="img-fluid" alt="logo">
			</div> -->
			<form class="rounded bg-white shadow p-5" method="post">
				<h3 class="text-dark fw-bolder fs-4 mb-2">Create an Account</h3>

				<div class="fw-normal text-muted mb-2">
					Already have an account? <a href="index.php" class="text-primary fw-bold text-decoration-none">Sign in here</a>
				</div>
                <div class="form-floating mb-3">
					<input type="text" class="form-control" id="firstname" name="firstname" placeholder="name@example.com" required>
					<label for="floatingFirstName">First Name</label>
				</div>
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="lastname" name="lastname" placeholder="name@example.com" required>
					<label for="floatingLastName">Last Name</label>
				</div> 
				<div class="form-floating mb-3">
					<input type="username" class="form-control" id="username" name="username" placeholder="username" required>
					<label for="floatingInput">Username</label>
				</div>
				<div class="form-floating mb-3">
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
					<label for="floatingPassword">Password</label>
				</div> 
				<button type="submit" name="add" class="btn btn-primary submit_btn w-100 my-4">Continue</button> 
			</form>
		</div>
	</div>
</section>
	
</body>
</html>