<?php
	session_start();
	$con = mysqli_connect('localhost','root','root1234');
	mysqli_select_db($con, 'flipbook');

	$bookid = $_SESSION['bookid'];
	$email = $_SESSION['user'];

	$check = mysqli_query($con,"SELECT * FROM cart WHERE bookid = '$bookid'");
	$checkNum = mysqli_num_rows($check);
	
	if($checkNum > 0){
		echo "alert('Already in cart')";
	}
	else{
		//this will always insert the last created listing on the page because bookid's current value is that of the last listing
		$reg = "INSERT into cart (bookid, email) VALUES ('$bookid','$email')";
		mysqli_query($con, $reg);
		echo "alert('Added to cart')";
	} 
?>