<?php

	session_start();
	$con = mysqli_connect('localhost','root','') or die("Could not connect");
	mysqli_select_db($con, 'flipbook') or die(mysqli_error($con));
	$output = '';


	$bookid = $_SESSION['bookid'];
	
	
	
	$query = " SELECT * FROM posts WHERE bookid = '$bookid' ";
	$query_result = mysqli_query($con, $query);

	if($query_result)
	{
		while($row = mysqli_fetch_array($query_result))
		{
			$bookTitle = $row['bookTitle'];
			$author = $row['author'];
			$ISBN = $row['ISBN'];
			$edition = $row['edition'];
			$subject = $row['subject'];
			$classNum = $row['classNum'];
			$price = $row['price'];
			$postUser = $row['email'];
			
			$userQuery = " SELECT * FROM users WHERE email = '$postUser' ";
			$userQuery_result = mysqli_query($con, $userQuery);

								if($userQuery_result)
								{
									while($row = mysqli_fetch_array($userQuery_result))
									{
										$fname = $row['fname'];
										$lname = $row['lname'];
									}

								}
		}
		
			$output .= '<h1><center><strong>Book Details</strong></center></h1>
					<h2>
					<center><div> <b>Posted by: </b>'.$fname." ".$lname.'</div></center>
					<center><div> <b>Book Title: </b>'.$bookTitle.'</div></center>
					<center><div> <b>Author: </b>'.$author.'</div></center>
					<center><div> <b>ISBN: </b>'.$ISBN.'</div></center>
					<center><div> <b>Edition: </b>'.$edition.'</div></center>
					<center><div> <b>Subject: </b>'.$subject.'</div></center>
					<center><div> <b>Class Number: </b>'.$classNum.'</div></center>
					<center><div> <b>Price: </b>'.$price.'</div></center></h2>'; 
		print($output);
	}
	else{
		$output = "No details found. ";
		print($output);
	}
	

	


?>