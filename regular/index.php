<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../bootstrap.min.css" rel="stylesheet" type='text/css'>
	<link rel="icon" type="image/png" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="../css/heading.css">
	<link rel="stylesheet" href="../jquery-ui.css">
	<link href="../fonts/font-awesome.min.css" rel="stylesheet" type='text/css'>

	<script src="../bootstrap.bundle.min.js" ></script>
	<script src="../popper.min.js"></script>
	<script src="../bootstrap.min.js"></script>
	
	<!-- jQuery -->
	<script src='../jquery-3.7.0.js'></script>
	<script src="../jquery-1.12.4.js"></script>
	<script src="../jquery-ui.js"></script>

	<link rel="stylesheet" type="text/css" href="./regular.css">
	<title>SRS - Parishioner's Login</title>
	
</head>
<body>
<section class="wrapper">
	<div class="container">
		<div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
			<!-- <div class="logo">
				<img decoding="async" src="/Sacraments/images/logo.png" class="img-fluid" alt="logo">
			</div> -->
			<form class="rounded bg-white shadow p-5" method="post" action="process.php">
				<h3 class="text-dark fw-bolder fs-4 mb-2">Parishioner's Login</h3>
				<div class="clearfix">&nbsp;</div>
				<!-- <div class="fw-normal text-muted mb-2">
					Don't have an account? <a href="register.php" class="text-primary fw-bold text-decoration-none">Sign up here</a>
				</div> -->

				<div class="form-floating mb-3">
					<input type="username" class="form-control" id="username" name="username" placeholder="username" required>
					<label for="floatingInput">Username</label>
				</div>
				<div class="form-floating mb-3">
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
					<label for="floatingPassword">Password</label>
					<!-- <span class="password-info mt-2">Use 8 or more characters with a mix of letters, numbers & symbols.</span> -->
				</div> 
				<!-- <div class="form-floating mb-3">
					<input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Password" required>
					<label for="floatingPassword">Confirm Password</label>
				</div>  -->
				<!-- <div class="form-check d-flex align-items-center">
					<input class="form-check-input" type="checkbox" id="gridCheck" checked>
					<label class="form-check-label ms-2" for="gridCheck">
						I Agree <a href="#">Terms and conditions</a>.
					</label>
				</div> -->
				<button type="submit" name="submit" class="btn btn-primary submit_btn w-100 my-4">Login</button> 
				<div class="fw-normal text-muted mb-2">
					<a href="register.php" class="text-primary fw-bold text-decoration-none">Forgot password?</a> or
					<a href="register.php" class="text-primary fw-bold text-decoration-none">Sign up here</a>
				</div>
			</form>
		</div>
	</div>
</section>
	
	<!-- <div class="login">
		<form method="post" action="process.php">
			<h2>Parishioner's Login</h2>
			<h3>Parokya ni San Nicolas de Tolentino</h3>
			<label>Username:</label>
			<input type="text" name="username" placeholder="Please enter your username..." required>
			<label>Password:</label>
			<input type="password" name="password" placeholder="Please enter your password..." required>
			<input type="submit" name="submit" value="LOGIN">
			<center><a href="register.php">Sign Up</a></center>	
		</form>
	</div> -->

</body>
</html>