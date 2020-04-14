<?php

session_start();


$con = mysqli_connect('localhost','root','root1234');

mysqli_select_db($con, 'flipbook');

$email = $_POST['email'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$password2 = $_POST['password2'];
$answer = $_POST['secAns'];

$s = " select * from users where email = '$email'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1) {
	echo "Email is already in use.";
}
else {
	if ($password == $password2) {
		$reg = " insert into users (email, password, fname, lname, securityAns) values ('$email', '$password', '$fname', '$lname', '$answer')";
		mysqli_query($con, $reg);
		echo "Registration successful!";
		
		header('location:login.php');
	}
	else {
		echo"<script type='text/javascript'>alert('Passwords do not match.');</script>";
		header("Refresh:0 url=signUpPage.php");
	}

}

?>
