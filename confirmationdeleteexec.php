<?php

	include 'connection.php';
	$id = $_POST['id'];
	mysqli_query($con,"DELETE from conrequest_tbl where id='$id'");

	echo '<script>alert("Deleted.")</script>';
	echo '<script>windows: location="confirmation.php"</script>';

?>