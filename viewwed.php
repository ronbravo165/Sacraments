<?php

	session_start();

?>

<?php

	include 'connection.php';
	$owner_id = $_REQUEST['id'];

	$result = mysqli_query($con,"SELECT * from wedding_tbl where id = '$owner_id'");
	$data = mysqli_fetch_array($result);

	if (!$result) {
		die("Error: Data not found.");
	}

		$id = $data['id'];
		$bn = $data['bn'];
		$pn = $data['pn'];
		$ln = $data['ln'];
		$groom = $data['groom'];
        $bride = $data['bride'];
		$wedday = $data['wedday'];
		$priest = $data['presider'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/logo.png">
	<title>SRS - Wedding (Print)</title>

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
			<p align="center" style="font-family: century gothic; font-size: 30px;">Certificate of Wedding</p>

			<p align="center" style="font-family: century gothic;">This is to certify that</p>

        <h2 align="center" style="font-family: century gothic; text-transform: uppercase;"><?php echo $groom;?> and <?php echo $bride;?></h2><p align="center" style="font-family: century gothic;"> were joined in the holy matrimony at the Catholic Church of <br><b>Parokya ni San Nicolas de Tolentino</b> on<br><b><?php echo $wedday;?></b> which administered by<br><b><?php echo $priest;?></b><br>
            <br>
            Given this <?php echo date('F d, Y');?>
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

		<a href="wedding.php" style="font-family: century gothic; text-decoration: none; color: black;">BACK</a>

	</center>

</body>
</html>