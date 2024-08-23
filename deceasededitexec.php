<?php

	include 'connection.php';

	$owner_id = $_REQUEST['id'];

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

	mysqli_query($con,"UPDATE deceased_tbl SET id='$id', bn='$bn', pn='$pn', ln='$ln', fullname='$fullname', father='$father', mother='$mother', birthplace='$birthplace', bday='$bday', bmonth='$bmonth', byear='$byear', decday='$decday', decmonth='$decmonth', decyear='$decyear', presider='$presider', caused='$caused', priest='$priest' where id = '$owner_id'");

	echo '<script>alert("Record Updated.")</script>';
	echo '<script>windows: location="deceased.php"</script>';

?>