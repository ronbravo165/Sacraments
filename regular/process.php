<?php
include '../connection.php';
session_start();

$hostname = 'localhost';
$dbname = 'sacrament_db';
$username = 'root';
$password = '';
$loginPassword = md5($_POST['password']);
mysqli_connect($hostname, $username, $password) or DIE('Not connected.');
mysqli_select_db($con,$dbname) or DIE('Database is not available.');
$login = mysqli_query($con,"SELECT * FROM register_tbl WHERE (username = '" .($_POST['username']). "') and (password = '" .($loginPassword). "')");
$row = mysqli_fetch_array($login);

if ($row) {
	$_SESSION['id'] = $row['id'];
	echo '<script>windows: location="home.php"</script>';
}else{
	header("location: index.php?err");
}

?>