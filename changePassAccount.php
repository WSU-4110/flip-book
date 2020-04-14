<?php

session_start();


$con = mysqli_connect('localhost','root','root1234');

mysqli_select_db($con, 'flipbook');

$email = $_SESSION['user'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

$s = " select * from users where email = '$email'";

$result = mysqli_query($con, $s);


	if ($password == $password2) {
		$sql = " UPDATE users SET password = '$password' ";
		mysqli_query($con, $sql);
		echo "Password changed successfully!";
		
		header('location:login.php');
	}
	else {
		echo"<script type='text/javascript'>alert('Passwords do not match.');</script>";
		header("Refresh:0 url=login.php");
	}



?>
