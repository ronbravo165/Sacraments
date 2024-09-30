<?php

	session_start();

?>

<?php

	include 'connection.php';
	$owner_id = $_REQUEST['id'];

	$result = mysqli_query($con,"SELECT * from baptism_tbl where id = '$owner_id'");
	$recordResult = mysqli_fetch_array($result);

	if (!$result) {
		die("Error: Data not found.");
	}

		$id = $recordResult['id'];
		$bn = $recordResult['bn'];
		$pn = $recordResult['pn'];
		$ln = $recordResult['ln'];
		$fullname = $recordResult['fullname'];
		$father = $recordResult['father'];
		$mother = $recordResult['mother'];
		$birthplace = $recordResult['birthplace'];
		$bday = $recordResult['birthdate'];
		$baptismalDate = $recordResult['baptismalDate'];
		$godfather = $recordResult['godfather'];
		$godmother = $recordResult['godmother'];
		$presider = $recordResult['presider'];
		$purpose = $recordResult['purpose'];
		$priest = $recordResult['priest'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/logo.png">
	<title>SRS - Baptism (Print)</title>

	<style type="text/css">
		
		body{
			padding: 0;
			margin: 0;	
		}

		div{
			width: 7.5in;
			height: 10in;
			border: 5px solid black;
			margin: .5in auto;
			position: relative;
		}

	</style>

</head>
<body>

	<div>
		<center>
			<img src="images/logo.png" width="80px" style="margin-top: 10px; float: left; margin-left: 140px;">
			<p style="margin-top: 20px; margin-left: 5px; float: left; font-size: 16px; font-family: century gothic;" align="center">Diocese of San Jose Nueva Ecija<br>Parokya ni San Nicolas de Tolentino<br>Carranglan, Nueva Ecija</p>
			<img src="images/diocese.png" width="80px" style="margin-top: 10px; float: left; margin-left: 5px;">
		</center>
			<img src="images/logo2.png" width="600px" style="position: absolute; top: 18%; left: 8%;">
			<br><br><br><br><br>
			<p align="center" style="font-family: century gothic; font-size: 30px;">Certificate of Baptism</p>

			<p align="center" style="font-family: century gothic;">This is to certify that</p><h2 align="center" style="font-family: century gothic; text-transform: uppercase;"><?php echo $fullname;?></h2><p align="center" style="font-family: century gothic;">child of <b><?php echo $father;?></b> and <b><?php echo $mother;?></b>, born in <br><b><?php echo $birthplace;?></b> on <b><?php echo $birthplace;?></b><br><br>has received in the Catholic Church of <br><b>Parokya ni San Nicolas de Tolentino</b> on<br><b><?php echo $baptismalDate;?> </b><br><br>the Holy Sacrament of Baptism which administered by<br><b><?php echo $presider;?></b><br><br>the sponsors being</p>

<br>
		<center>
			<table>
				<tr>
					<td width="250" style="border-bottom: 1px solid black;" colspan="3"><center><?php echo $godfather;?></td>
					<td width="250" style="border-bottom: 1px solid black;" colspan="3"><center><?php echo $godmother;?></td>
				</tr>

				<tr>
					<td width="250" style="border-bottom: 1px solid black;" colspan="3">&nbsp;</td>
					<td width="250" style="border-bottom: 1px solid black;" colspan="3">&nbsp;</td>
				</tr>

				<tr>
					<td width="250" style="border-bottom: 1px solid black;" colspan="3">&nbsp;</td>
					<td width="250" style="border-bottom: 1px solid black;" colspan="3">&nbsp;</td>
				</tr>

			</table>
		</center><br><br>

			<table style="margin-left: 103px; font-family: century gothic;">
				<tr>
					<td>Purpose:</td>
					<td style="border-bottom: 1px solid black;" width="150"><center><?php echo $purpose;?></center></td>
				</tr>

				<tr>
					<td>Date Issued:</td>
					<td style="border-bottom: 1px solid black;" width="150"><center><?php echo date('F d, Y');?></center></td>
				</tr>

				<tr>
					<td>Book No.:</td>
					<td style="border-bottom: 1px solid black;" width="150"><center><?php echo $bn;?></center></td>
				</tr>

				<tr>
					<td>Page No.:</td>
					<td style="border-bottom: 1px solid black;" width="150"><center><?php echo $pn;?></center></td>
				</tr>

				<tr>
					<td>Line No.:</td>
					<td style="border-bottom: 1px solid black;" width="150"><center><?php echo $ln;?></center></td>
				</tr>

			</table>
			<br><br><br><br><br>
			<center>
				<table style="font-family: century gothic;">
					<tr>
						<td style="border-bottom: 1px solid black;" width="350px"></td>	
					</tr>

					<tr>
						<td style="font-size: 16px; text-transform: uppercase;"><center><b><?php echo $priest;?></b></center></td>
					</tr>

					<tr>
						<td><center>Parish Priest</center></td>
					</tr>
				</table>
			</center>
	</div>

	<center>
		<form>
			<input type="button" onclick="window.print()" value="PRINT"><br>
		</form>

		<a href="baptism.php" style="font-family: century gothic; text-decoration: none; color: black;">BACK</a>

	</center>

</body>
</html>