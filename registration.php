<?php

session_start();
header('location:login.html');

$con = mysqli_connect('localhost','root','root1234');

mysqli_select_db($con, 'flipbook');

$email = $_POST['email'];
$password = $_POST['password'];

$s = " select * from users where email = '$email'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1) {
	echo "Email is already in use.";
}
else {
	$reg = " insert into users(email, password) values ('$email', '$password') ";
	mysqli_query($con, $reg);
	echo "Registration successful!";
}

?>