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
			$img = $row['img'];
			
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
					
					<center>
					<style>
					table {
					  font-family: arial, sans-serif;
					  border-collapse: collapse;
					  width: 100%;
					}

					td, th {
					  border: 3px solid green;
					  text-align: left;
					  padding: 10px;
					}

					tr:nth-child(even) {
					  background-color: #FFFFCC;
					}
					</style>
					
					<table>
					  <tr>
						<th><h2><center>Book</center></h2></th>
						<th><h2><center>Details</center></h2></th>
					  </tr>
					  <tr>
						<td><center><img width="300px" height="350px" src="images/'.$img.'" /></center></td>
						<td>
						<h2>
						<div> <b>Posted by: </b>'.$fname." ".$lname.'</div>
						<div> <b>Book Title: </b>'.$bookTitle.'</div>
						<div> <b>Author: </b>'.$author.'</div>
						<div> <b>ISBN: </b>'.$ISBN.'</div>
						<div> <b>Edition: </b>'.$edition.'</div>
						<div> <b>Subject: </b>'.$subject.'</div>
						<div> <b>Class Number: </b>'.$classNum.'</div>
						<div> <b>Price: </b>'.$price.'</div>
						</h2>
						</td>
					</tr>
					</table>
					</center>'; 
		print($output);
	}
	else{
		$output = "No details found. ";
		print($output);
	}
	

	


?>