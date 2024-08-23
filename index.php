<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>San Nicolas de Tolentino | Login</title>
	<link rel="icon" type="image/png" href="images/logo.png">
	<style type="text/css">
		
		body {
	margin: 0;
	padding: 0;
	font-family: 'Poppins', sans-serif;
}
body:before {
	content: '';
	position: fixed;
	width: 100vw;
	height: 100vh;
	background-image: url('images/parish.jpg');
	background-position: center center;
	background-repeat: no-repeat;
	background-attachment: fixed;
	-webkit-background-size: cover;
	background-size: cover;
	-webkit-filter: blur(10px);
	-moz-filter: blur(10px);
	filter: blur(10px);
}
.contact-form {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	width: 400px;
	height: 350px;
	padding: 80px 40px;
	background: rgba(0, 0, 0, 0.5);
}
.avatar {
	position: absolute;
	width: 80px;
	height: 80px;
	border-radius: 50%;
	overflow: hidden;
	top: calc(-80px/2);
	left: 190px;
}
.contact-form h2 {
	margin: 0;
	padding: 0 0 20px;
	color: #fff;
	text-align: center;
	text-transform: uppercase;
}
.contact-form p {
	margin: 0;
	padding: 0;
	font-weight: bold;
	color: #fff;
}
.contact-form input {
	width: 100%;
	margin-bottom: 20px;
}
.contact-form input[type=text], .contact-form input[type=password] {
	border: none;
	border-bottom: 1px solid #fff;
	background: transparent;
	outline: none;
	height: 40px;
	color: #fff;
	font-size: 16px;
}
.contact-form input[type=submit] {
	height: 30px;
	color: black;
	font-size: 15px;
	background: #A9CCE3;
	cursor: pointer;
	border-radius: 25px;
	border: none;
	outline: none;
	margin-top: 15%;
}

.contact-form input[type=submit]:hover {
	color: white;
	background-color: blue;
	transition: .5s;
}


	</style>

</head>
<body>
	<div class="contact-form">
		<img alt="" class="avatar" src="images/logo.png">
		<h2>San Nicolas de Tolentino Parish</h2>
		<form action="process.php" method="post">
			<p>Username</p><input placeholder="Enter Username" type="text" name="username">
			<p>Password</p><input placeholder="Enter Password" type="password" name="password">
			<input type="submit" value="LOGIN">
		</form>
	</div>
</body>
</html>