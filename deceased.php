<?php
session_start();

if (!isset($_SESSION['id'])) {
	echo '<script>windows: location="index.php"</script>';
}
?>

<?php
$session = $_SESSION['id'];
include 'connection.php';
$result = mysqli_query($con, "SELECT * FROM user_tbl where id = '$session'");
while ($row = mysqli_fetch_array($result)) {
	$sessionname = $row['fullname'];
}
?>

<?php
if (isset($_POST['add'])) {
	include 'connection.php';
		$id = $_POST['id'];
		$bn = $_POST['bn'];
		$pn = $_POST['pn'];
		$ln = $_POST['ln'];
		$fullname = $_POST['fullname'];
		$father = $_POST['father'];
		$mother = $_POST['mother'];
		$birthplace = $_POST['birthplace'];
		$bday = $_POST['bday'];
		$bmonth = $_POST['bmonth'];
		$byear = $_POST['byear'];
		$decday = $_POST['decday'];
		$decmonth = $_POST['decmonth'];
		$decyear = $_POST['decyear'];
		$presider = $_POST['presider'];
		$caused = $_POST['caused'];
		$priest = $_POST['priest'];

		mysqli_query($con, "INSERT INTO deceased_tbl (id, bn, pn, ln, fullname, father, mother, birthplace, bday, bmonth, byear, decday, decmonth, decyear, presider, caused, priest) VALUES ('$id', '$bn', '$pn', '$ln', '$fullname', '$father', '$mother', '$birthplace', '$bday', '$bmonth', '$byear', '$decday', '$decmonth', '$decyear', '$presider', '$caused', '$priest')");

		echo '<script>alert("Added successfully.")</script>';
		echo '<script>windows: location="deceased.php"</script>';
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link rel="stylesheet" type="text/css" href="css/style3.css">
	<title>SRS - Deceased</title>
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
		<li><a href="wedding.php" class="nav-menu">Wedding</a></li>
		<li><a href="deceased.php" class="nav-menu active">Deceased</a></li>
		<li><a href="requests.php" class="nav-menu">Requests</a></li>
		<li><a href="user.php" class="nav-menu">User Lists</a></li>
		<li><a href="logout.php" class="nav-menu" style="color: red">LOGOUT</a></li>
	</ul>

	<h1 style="font-family: century gothic; margin-left: 16%;" align="center">Deceased Records</h1>
	<input type="button" name="button" value="ADD RECORD" class="button" onclick="document.getElementById('id01').style.display='block'">

	<form method="post" action="searchdec.php">
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
				<label>Full Name:</label>
				<input type="text" name="fullname" required style="height: 25px; width: 80.3%; font-family: century gothic;"><br><br>
				<label>Birthday:</label>&nbsp;&nbsp;&nbsp;
				<select name="bday" style="width: 12%;">
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

				<select name="bmonth" style="width: 13%;">
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

				<input type="text" name="byear" required class="textbox1" placeholder="Year" style="width: 10%;">
				<label>Birthplace:</label>
				<input type="text" name="birthplace" required class="textbox1" style="width: 31.5%;">
				<br><br>
				
				<label>Father:</label>
				<input type="text" name="father" required class="textbox1" style="width: 36.4%;">&nbsp;&nbsp;
				<label>Mother:</label>
				<input type="text" name="mother" required class="textbox1" style="width: 36.4%;">

				<br><br>

				<label>Date of Death:</label>
				<select name="decday" style="width: 12%;">
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

				<select name="decmonth" style="width: 13%;">
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

				<input type="text" name="decyear" required class="textbox1" placeholder="Year" style="width: 10%;">

				<br><br>
				<label>Presider:</label>
				<input type="text" name="presider" required class="textbox1" style="width: 33.5%;">&nbsp;&nbsp;
				<label>Caused:</label>
				<input type="text" name="caused" required class="textbox1" style="width: 33.5;"><br><br>
				<label>Parish Priest:</label>
				<input type="text" name="priest" required class="textbox1" style="width: 67%;">

				<br><br>

				<center><input type="submit" name="add" value="ADD RECORD" class="button-add"></center>
				<br>
			</div>

		</form>
	</div>

<?php

	include 'connection.php';
	$result = mysqli_query($con,"SELECT * FROM deceased_tbl");

	echo "<center><br>
			<table class='table' border='1'>
				<thead>
					<th style='font-family: century gothic;'>Full Name</th>
					<th style='font-family: century gothic;'>Action</th>
				</thead>";

	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td style='margin-left: 16%;'><center>" . $row['fullname'] . "</center></td>";
		echo "<td><center><a style='text-decoration: none; color: black;' href='deceasededit.php?id=".$row['id']."'>&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>&nbsp;<a style='text-decoration: none; color: black;' href='deceaseddelete.php?id=".$row['id']."'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</a></center></td>";
		echo "</tr>";
	}
		echo "</table></center>";
?>

	<footer style="width: 85%; margin-left: 15%; font-family: arial narrow; position: fixed; bottom: 0; margin-bottom: 0; background-color: white;">

		<p align="center">Diocese of San Jose Nueva Ecija<br>Parokya ni San Nicolas de Tolentino<br>Carranglan, Nueva Ecija<br>&copy; All rights reserved 2024.</p>
		
	</footer>

</body>
</html>