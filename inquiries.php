<?php

session_start();

// connecting to host via phpmyadmin
$con = mysqli_connect('localhost','root','root1234');

// selecting database from connection
mysqli_select_db($con, 'flipbook');

// variables to be connected to from html form
$myFName = $_POST['myFName'];
$myLName = $_POST['myLName'];
$myEmail = $_POST['myEmail'];
$myComment = $_POST['myComment'];

$reg = " insert into userinquiry(fname, lname, email, comment) values ('$myFName', '$myLName', '$myEmail', '$myComment')";

if(mysqli_query($con, $reg)){
	$_SESSION['valid_inquiry'] = true;
	header("location:ContactUs.php");
}
else {
	$_SESSION['valid_inquiry'] = false;
	header("location:ContactUs.php");
}




?>