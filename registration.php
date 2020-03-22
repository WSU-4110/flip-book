<?php

session_start();


$con = mysqli_connect('localhost','root','root1234');

mysqli_select_db($con, 'flipbook');

$email = $_POST['email'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$password2 = $_POST['password2'];

$s = " select * from users where email = '$email'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1) {
	echo "Email is already in use.";
}
else {
	if ($password2 == $password) {
		$reg = " insert into 'users' (email, password, fname, lname, phone) values ('$email', '$password', '$fname', '$lname', '$phone')";
		mysqli_query($con, $reg);
		echo "Registration successful!";
		header('location:login.html');
	}
	else {
		echo"<script type='text/javascript'>alert('Passwords do not match.');</script>";
		header("Refresh:0 url=signUpPage.php");
	}

}

?>
