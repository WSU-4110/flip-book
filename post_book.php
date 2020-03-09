<?php

session_start();
header('location:post.html');

$con = mysqli_connect('localhost','root','root1234');

mysqli_select_db($con, 'flipbook');

$bookTitle = $_POST['book-title'];
$author = $_POST['author'];
$ISBN = $_POST['ISBN'];
$edition = $_POST['edition'];
$subject = $_POST['subject'];
$classNum = $_POST['class-num'];
$tags = $_POST['tags'];
$price = $_POST['price'];
$img = $_POST['img'];


//$s = " select * from users where email = '$email'";

//$result = mysqli_query($con, $s);

//$num = mysqli_num_rows($result);

/*if($num == 1) {
	echo "Posting unsuccessful.";
}
else {
	
}*/

$reg = " insert into posts (bookTitle, author, ISBN, edition, subject, classNum, tags, price, img) values ('$bookTitle', '$author', '$ISBN', '$edition', '$subject', '$classNum', '$tags', '$price', '$img')";
mysqli_query($con, $reg);

?>