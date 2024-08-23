<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../images/logo.png">
	<title>SRS - Parishioner's Login</title>
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}

		.login {
			background-color: #fff;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			max-width: 300px;
			width: 100%;
		}

		.login h2, .login h3 {
			margin-bottom: 20px;
			color: #333;
			text-align: center;
		}

		.login label {
			display: block;
			margin-bottom: 5px;
			color: #333;
		}

		.login input[type="text"], 
		.login input[type="password"] {
			width: 100%;
			padding: 10px;
			margin-bottom: 10px;
			border: 1px solid #ccc;
			border-radius: 4px;
		}

		.login input[type="submit"] {
			width: 100%;
			padding: 10px;
			background-color: green;
			border: none;
			border-radius: 4px;
			color: #fff;
			font-size: 16px;
			cursor: pointer;
		}

		.login input[type="submit"]:hover {
			background-color: blue;
		}

		.login a {
			display: inline-block;
			margin-top: 10px;
			color: #007bff;
			text-decoration: none;
			font-size: 14px;
			background-color: blue;
			padding: 5px;
			color: white;
			border-radius: 4px;
			letter-spacing: 1px;
		}

		.login a:hover {
			text-decoration: underline;
		}
	</style>
</head>
<body>

	<div class="login">
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
	</div>

</body>
</html>