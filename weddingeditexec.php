<?php

	include 'connection.php';

	$owner_id = $_REQUEST['id'];

		$id = $_POST['id'];
		$bn = $_POST['bn'];
		$pn = $_POST['pn'];
		$ln = $_POST['ln'];
		$groom = $_POST['groom'];
		$groomage = $_POST['groomage'];
		$groombday = $_POST['groombday'];
		$groombmonth = $_POST['groombmonth'];
		$groombyear = $_POST['groombyear'];
		$groomfather = $_POST['groomfather'];
		$groommother = $_POST['groommother'];
		$groomaddress = $_POST['groomaddress'];
		$bride = $_POST['bride'];
		$brideage = $_POST['brideage'];
		$bridebday = $_POST['bridebday'];
		$bridebmonth = $_POST['bridebmonth'];
		$bridebyear = $_POST['bridebyear'];
		$bridefather = $_POST['bridefather'];
		$bridemother = $_POST['bridemother'];
		$brideaddress = $_POST['brideaddress'];
		$godfather = $_POST['godfather'];
		$godmother = $_POST['godmother'];
		$wedday = $_POST['wedday'];
		$wedmonth = $_POST['wedmonth'];
		$wedyear = $_POST['wedyear'];
		$presider = $_POST['presider'];

	mysqli_query($con,"UPDATE wedding_tbl SET id='$id', bn='$bn', pn='$pn', ln='$ln', groom='$groom', groomage='$groomage', groombday='$groombday', groombmonth='$groombmonth', groombyear='$groombyear', groomfather='$groomfather', groommother='$groommother', groomaddress='$groomaddress', bride='$bride', brideage='$brideage', bridebday='$bridebday', bridebmonth='$bridebmonth', bridebyear='$bridebyear', bridefather='$bridefather', bridemother='$bridemother', brideaddress='$brideaddress', godfather='$godfather', godmother='$godmother', wedday='$wedday', wedmonth='$wedmonth', wedyear='$wedyear', presider='$presider' where id = '$owner_id'");

	echo '<script>alert("Record Updated.")</script>';
	echo '<script>windows: location="wedding.php"</script>';

?>