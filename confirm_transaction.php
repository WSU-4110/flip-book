<?php

	session_start();

	$con = mysqli_connect('localhost','root','root1234');
	mysqli_select_db($con, 'flipbook');

	$bookid = $_SESSION['bookid'];
	header("location:seller_listings.php");

	if(($_SESSION['confirm-buyer-transaction'] == true) && ($_SESSION['confirm-seller-transaction'] == true)) {
		mysqli_query($con,"DELETE FROM cart WHERE bookid = '$bookid'");
		mysqli_query($con, "DELETE FROM posts WHERE bookid = '$bookid'");

	}


?>