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
	$conday = $_POST['conday'];
	$conmonth = $_POST['conmonth'];
	$conyear = $_POST['conyear'];
	$godfather = $_POST['godfather'];
	$godmother = $_POST['godmother'];
	$presider = $_POST['presider'];
	$purpose = $_POST['purpose'];
	$priest = $_POST['priest'];

	mysqli_query($con,"UPDATE confirmation_tbl SET id='$id', bn='$bn', pn='$pn', ln='$ln', fullname='$fullname', father='$father', mother='$mother', birthplace='$birthplace', bday='$bday', bmonth='$bmonth', byear='$byear', conday='$conday', conmonth='$conmonth', conyear='$conyear', godfather='$godfather', godmother='$godmother', presider='$presider', purpose='$purpose', priest='$priest' where id = '$owner_id'");

	echo '<script>alert("Record Updated.")</script>';
	echo '<script>windows: location="confirmation.php"</script>';

?>