<?php

session_start();


$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'flipbook');

$email = $_POST['email'];
$answer = $_POST['secAns'];

$s = " select * from users where email = '$email'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 0) {
	echo "Email does not exist.";
}
else {
	
	$row = mysqli_fetch_array($result);
	$userAns = $row[4];
	
	$_SESSION['user'] = $email;
	
	if ($answer == $userAns) {
		
		header('location:main.php');
	}
	else {
		echo"<script type='text/javascript'>alert('Wrong answer.');</script>";
		header("Refresh:0 url=signUpPage.php");
	}

}

?>
