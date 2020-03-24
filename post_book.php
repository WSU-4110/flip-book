<?php

session_start();


$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'flipbook');


$bookTitle = $_POST['book-title'];
$author = $_POST['author'];
$ISBN = $_POST['ISBN'];
$edition = $_POST['edition'];
$subject = $_POST['subject'];
$classNum = $_POST['class-num'];
$price = $_POST['price'];
$img = $_POST['img'];
$email = $_SESSION['user'];


//$s = " select * from users where email = '$email'";

//$result = mysqli_query($con, $s);

//$num = mysqli_num_rows($result);

/*if($num == 1) {
	
}
else {
	
}*/

//echo ($email." ". $bookTitle." ". $author ." ".$ISBN." ". $edition." ". $subject." ". $classNum." ". $tags." ". $price." ". $img);

$reg = " INSERT into posts (bookid, emailAddress, bookTitle, author, ISBN, edition, subject, classNum, price, pic) VALUES 		
(NULL, '$email', '$bookTitle', '$author', '$ISBN', '$edition', '$subject', '$classNum', '$price', '$img') ";
$result = mysqli_query($con, $reg);

echo "Posting sucessful";

?>