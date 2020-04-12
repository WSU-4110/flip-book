<?php

session_start();
$con = mysqli_connect('localhost','root','root1234');
mysqli_select_db($con, 'flipbook');

$email = $_SESSION['email'];
$bookid = $_POST['specificBook'];

$check = mysqli_query($con,"SELECT * FROM cart WHERE bookid = '$bookid' AND email = '$email'");
$count = mysqli_num_rows($check);

if($count == 0){
	$reg = "INSERT into cart (email,bookid) VALUES ('$email','$bookid')";
	mysqli_query($con, $reg);
}

header("location:checkout.php");

?>