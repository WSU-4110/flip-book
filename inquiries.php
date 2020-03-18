<?php

session_start();

// connecting to host via phpmyadmin
$con = mysqli_connect('localhost','root','');

// selecting contactus database from connection
mysqli_select_db($con, 'contactus');

// variables to be connected to from html form
$myFName = $_POST['myFName'];
$myLName = $_POST['myLName'];
$myEmail = $_POST['myEmail'];
$myComment = $_POST['myComment'];

$reg = " insert into userinquiry(fname, lname, email, comment) values ('$myFName', '$myLName', '$myEmail', '$myComment')";
mysqli_query($con, $reg);
echo"Thank you for reaching out! We will respond to you as soon as possible.";




?>