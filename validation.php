<?php

session_start();
//$errors = "";
//$fields = array("email", "password");

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'flipbook');

$email = $_POST['email'];
$password = $_POST['password'];

$_SESSION['user'] = $email;

$s = " select * from users where email = '$email' && password ='$password'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1) {
	//$_SESSION['email'] = $email;
	//$_SESSION['email'] = $email;
	header('location:main.php');
}
else {
	header('location:login.php');
}

?>