<?php

session_start();

$con = mysqli_connect('localhost','root','root1234');

mysqli_select_db($con, 'flipbook');

$email = $_POST['email'];
$password = $_POST['password'];

 $_SESSION['user'] = $email;


$s = " select * from users where email = '$email' && password ='$password'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1) {
	//$_SESSION['email'] = $email;
	header('location:main.php');
}
else {
	$_SESSION['valid_login'] = false;
	header('location:login.php');
}

?>