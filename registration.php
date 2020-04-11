<?php

session_start();


$con = mysqli_connect('localhost','root','root1234');

mysqli_select_db($con, 'flipbook');

$email = $_POST['email'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$password2 = $_POST['password2'];

$s = " select * from users where email = '$email'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($password != $password2){
	$_SESSION['valid_password'] = false;
	//echo "Passwords do not match!";
	header('location:signUpPage.php');
}
else if($num == 1) {
	$_SESSION['valid_email'] = false;
	header("location:signUpPage.php");
}
else {
	$reg = " insert into users(email, password, fname, lname) values ('$email', '$password', '$fname', '$lname') ";
	mysqli_query($con, $reg);
	echo "Registration successful!";
	header('location:login.html');
}



/*if($num == 1) {
	$_SESSION['valid_email'] = true;
	echo "Email is already in use.";
	
}
else {
	if ($password == $password2) {
		$reg = " insert into users (email, password, fname, lname) values ('$email', '$password', '$fname', '$lname')";
		mysqli_query($con, $reg);
		echo "Registration successful!";
		header('location:login.php');
	}
	else {
		echo"<script type='text/javascript'>alert('Passwords do not match.');</script>";
		header("Refresh:0 url=signUpPage.php");
	}

}*/

?>
