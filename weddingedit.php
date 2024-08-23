<?php

	session_start();

?>

<?php

	$session = $_SESSION['id'];
	include 'connection.php';
	$result = mysqli_query($con,"SELECT * from user_tbl where id = '$session'");

	while ($row = mysqli_fetch_array($result)) {
		$sessionname = $row['fullname'];
	}

?>

<?php
	include 'connection.php';
	$owner_id = $_REQUEST['id'];

	$result = mysqli_query($con,"SELECT * from wedding_tbl where id = '$owner_id'");
	$test = mysqli_fetch_array($result);

	if (!$result) {
		die("Error: Data not found.");
	}

		$id = $test['id'];
		$bn = $test['bn'];
		$pn = $test['pn'];
		$ln = $test['ln'];
		$groom = $test['groom'];
		$groomage = $test['groomage'];
		$groombday = $test['groombday'];
		$groombmonth = $test['groombmonth'];
		$groombyear = $test['groombyear'];
		$groomfather = $test['groomfather'];
		$groommother = $test['groommother'];
		$groomaddress = $test['groomaddress'];
		$bride = $test['bride'];
		$brideage = $test['brideage'];
		$bridebday = $test['bridebday'];
		$bridebmonth = $test['bridebmonth'];
		$bridebyear = $test['bridebyear'];
		$bridefather = $test['bridefather'];
		$bridemother = $test['bridemother'];
		$brideaddress = $test['brideaddress'];
		$godfather = $test['godfather'];
		$godmother = $test['godmother'];
		$wedday = $test['wedday'];
		$wedmonth = $test['wedmonth'];
		$wedyear = $test['wedyear'];
		$presider = $test['presider'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<title>SRS - Wedding (Update)</title>
</head>
<body>

	<div class="header">
		<img src="images/logo.png">
		<h1>Sacramental Record System</h1>
		<h3>Parokya ni San Nicolas de Tolentino</h3>
	</div>

	<ul>
		<li><a href="#" class="nav-menu" style="background-color: gold;"></a></li>
		<li><a href="home.php" class="nav-menu">Home</a></li>
		<li><a href="baptism.php" class="nav-menu">Baptism</a></li>
		<li><a href="communion.php" class="nav-menu">Communion</a></li>
		<li><a href="confirmation.php" class="nav-menu">Confirmation</a></li>
		<li><a href="wedding.php" class="nav-menu active">Wedding</a></li>
		<li><a href="deceased.php" class="nav-menu">Deceased</a></li>
		<li><a href="user.php" class="nav-menu">User Lists</a></li>
		<li><a href="logout.php" class="nav-menu" style="color: red">LOGOUT</a></li>
	</ul>

	<div class="container-update">
		<h1 align="center">Update Wedding Record</h1>

		<div class="content-update">
			<form method="post" action="weddingeditexec.php">
				<input type="hidden" name="id" value="<?php echo $id;?>">

				<label>Book No:</label>
				<input type="text" name="bn" value="<?php echo $bn;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label>Page No:</label>
				<input type="text" name="pn" value="<?php echo $pn;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label>Line No:</label>
				<input type="text" name="ln" value="<?php echo $ln;?>">
				<br><br>
				<h3 style="font-family: century gothic;">Groom's Personal Information</h3>
				<label>Groom:</label>
				<input type="text" name="groom" value="<?php echo $groom;?>" style="width: 40%;">&nbsp;&nbsp;&nbsp;
				<label>Birthday:</label>
				<select name="groombday" style="width: 8%;">
					<option><?php echo $groombday;?></option>
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

				<select name="groombmonth" style="width: 15%;">
					<option><?php echo $groombmonth;?></option>
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
				<input type="text" name="groombyear" value="<?php echo $groombyear;?>" style="width: 11.5%;"><br><br>


				<label>Father:</label>
				<input type="text" name="groomfather" value="<?php echo $groomfather;?>" style="width: 40%;">&nbsp;&nbsp;&nbsp;
				<label>Mother:</label>
				<input type="text" name="groommother" value="<?php echo $groommother;?>" style="width: 39.9%;"><br><br>

				<label>Address:</label>
				<input type="text" name="groomaddress" value="<?php echo $groomaddress;?>" style="width: 60%;">
				<label>Age:</label>
				<input type="text" name="groomage" value="<?php echo $groomage;?>" style="width: 20%;">


				<h3 style="font-family: century gothic;">Bride's Personal Information</h3>
				<label>Bride:</label>
				<input type="text" name="bride" value="<?php echo $bride;?>" style="width: 40%;">&nbsp;&nbsp;&nbsp;
				<label>Birthday:</label>
				<select name="bridebday" style="width: 8%;">
					<option><?php echo $bridebday;?></option>
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

				<select name="bridebmonth" style="width: 15%;">
					<option><?php echo $bridebmonth;?></option>
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
				<input type="text" name="bridebyear" value="<?php echo $bridebyear;?>" style="width: 11.5%;"><br><br>

				<label>Father:</label>
				<input type="text" name="bridefather" value="<?php echo $bridefather;?>" style="width: 40%;">&nbsp;&nbsp;&nbsp;
				<label>Mother:</label>
				<input type="text" name="bridemother" value="<?php echo $bridemother;?>" style="width: 39.9%;"><br><br>

				<label>Address:</label>
				<input type="text" name="brideaddress" value="<?php echo $brideaddress;?>" style="width: 60%;">
				<label>Age:</label>
				<input type="text" name="brideage" value="<?php echo $brideage;?>" style="width: 20%;">
				<br><br>

				<h2 align="center">Other Information</h2>

				<label><center>Date of Wedding:</center></label>
				<center><select name="wedday" style="width: 8%;">
					<option><?php echo $wedday;?></option>
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

				<select name="wedmonth" style="width: 15%;">
					<option><?php echo $wedmonth;?></option>
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
				<input type="text" name="wedyear" value="<?php echo $wedyear;?>" style="width: 11.5%;"></center><br>

				<label>Godfather:</label>
				<input type="text" name="godfather" value="<?php echo $godfather;?>" style="width: 36%;">&nbsp;&nbsp;&nbsp;
				<label>Godmother:</label>
				<input type="text" name="godmother" value="<?php echo $godmother;?>" style="width: 36%;"><br><br>

				<label>Presider:</label>
				<input type="text" name="presider" value="<?php echo $presider;?>" style="width: 90%;"><br><br>


				<br>

				<center>
					<input type="submit" name="add" value="UPDATE" style="width: 15%;">
					<a href="wedding.php">BACK</a>
					<br><br>
				</center>

			</form>
		</div>
	</div>

</body>
</html>