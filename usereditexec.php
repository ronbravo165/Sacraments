<?php

	include 'connection.php';

	$owner_id = $_REQUEST['id'];

		$id = $_POST['id'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$fullname = $_POST['fullname'];

	mysqli_query($con,"UPDATE user_tbl SET id='$id', username='$username', password='$password', fullname='$fullname' where id = '$owner_id'");

	echo '<script>alert("Record Updated.")</script>';
	echo '<script>windows: location="user.php"</script>';

?>