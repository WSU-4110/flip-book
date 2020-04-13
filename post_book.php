
<?php

session_start();

$con = mysqli_connect('localhost','root','root1234');

mysqli_select_db($con, 'flipbook');

$email = $_SESSION['user'];
$bookTitle = $_POST['book-title'];
$author = $_POST['author'];
$ISBN = $_POST['ISBN'];
$edition = $_POST['edition'];
$subject = $_POST['subject'];
$classNum = $_POST['class-num'];
$price = $_POST['price'];
$img = $_POST['img'];
$date = 'CURDATE()';

$reg = "INSERT into posts (email, bookTitle, author, ISBN, edition, subject, classNum, price, img, postdate) VALUES ('$email', '$bookTitle', '$author', '$ISBN', '$edition', '$subject', '$classNum', '$price', '$img', $date)";

if(mysqli_query($con, $reg)) {
	$_SESSION['valid_post'] = true;
	header("location:post.php");
}
else {
	$_SESSION['valid_post'] = false;
	header("location:post.php");
}


?>