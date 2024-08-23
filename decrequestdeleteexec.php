<?php

	include 'connection.php';
	$id = $_POST['id'];
	mysqli_query($con,"DELETE from decrequest_tbl where id='$id'");

	echo '<script>alert("Deleted.")</script>';
	echo '<script>windows: location="requests.php"</script>';

?>