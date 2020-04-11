<?php

session_start();

$con = mysqli_connect('localhost','root','root1234');

mysqli_select_db($con, 'flipbook');

$email = $_POST['email'];
$password = $_POST['password'];

$s = " select * from users where email = '$email' && password ='$password'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1) {
	//$_SESSION['email'] = $email;
	header('location:main.html');
}
else {
	header('location:login.html');
}

?>