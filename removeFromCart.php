<?php

session_start();

$con = mysqli_connect('localhost','root','root1234');

mysqli_select_db($con, 'flipbook');

$email = $_SESSION['user'];
$bookid = $_POST['specificBook'];

mysqli_query($con,"DELETE FROM cart WHERE bookid = '$bookid' AND email = '$email'");

header("location:checkout.php");
?>
