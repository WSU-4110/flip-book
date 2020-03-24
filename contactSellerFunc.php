<?php

$to = 'gh3717@wayne.edu';
//$to = $_POST['toemail'];
$from = 'nithishaomkar@gmail.com';
//$from = $_POST['fromEmail'];
$subj = 'test subject';
//$subj = $_POST['subject'];
$message = 'test message';
//$message = $_POST['message'];

$headers = "From: ".$from."\r\n";
$headers .= "Reply-To: ".$to."\r\n";
$headers .= "Content-type: text/html\r\n";

mail($to,$subj,$message,$headers);

echo "Email sent succuessfully.";


?>


