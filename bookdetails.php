<!DOCTYPE html>
<?php
	session_start()
?>
<html>
<head>
	<title>Welcome - Flip Book</title>
	<link rel="icon" type="image/png" href="images/flipbook_logo.png" />
	<meta name="viewport" content="width=device-width, intial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="layout.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
	<!----------------------->
	<!---Navigation/header--->
	<!----------------------->
	<nav>
		<ul class="navigation">
			<!---Flip Book Logo--->
			<li><a href="main.php"><img id="logo" src="images/flipbook_logo.png" width="150px" height="100px"></a></li>
			
			<!---Searchbar--->
			<li>
				<form id="searchbox" action="main.php" method="post">
					<input id="search_bar" name="search" placeholder=" Search by title, author, subject, or ISBN" size="70px">
					<input type="submit" value="search">
				</form>
			</li>


			<!--Icons-->
			<li class="icons"><a href="logout.php" onclick="return confirm('Are you sure you want to logout?');"><i class="fa fa-sign-out" style="font-size:150%;color:red"></i></a></li>
			<li class="icons"><a href="profile1.php"><i class="fa fa-user-circle" style="font-size:150%"></i></a></li>
			<li class="icons"><a href="checkout.php"><i class="fa fa-shopping-cart" style="font-size:150%"></i></a></li>
			<li class="icons"><a href="post.php"><i class="fa fa-plus" style="font-size:150%"></i></a></li>

		
			<!---Menu items--->
			<div>
				<br>
				<br>
				<br>
				<li id="menu-about"><a id="about" href="About.html">About Us</a></li>
				<li id="menu-contact"><a id="contact" href="ContactUs.php">Contact Us</a></li>
			</div>
		</ul>
	</nav>


	<!---------------------->
	<!--Aside (Categories)-->
	<!---------------------->
	<aside>
		<p id="aside_title">Categories</p>
		<form action="main.php" method="post">
			<select name="category">
				<option value="Accounting">Accounting</option>
				<option value="Art">Art</option>
				<option value="Biology">Biology</option>
				<option value="Calculus">Calculus</option>
				<option value="Chemistry">Chemistry</option>
				<option value="Computer Science">Computer Science</option>
				<option value="Criminal Justice">Criminal Justice</option>
				<option value="Dance">Dance</option>
				<option value="Economics">Economics</option>
				<option value="Education">Education</option>
				<option value="Engineering">Engineering</option>
				<option value="Environmental Science">Environmental Science</option>
				<option value="History">History</option>
				<option value="Journalism">Journalism</option>
				<option value="Languages">Languages</option>
				<option value="Law">Law</option>
				<option value="Management">Management</option>
				<option value="Medicine">Medicine</option>
				<option value="Music">Music</option>
				<option value="Nursing">Nursing</option>
				<option value="Pharmacy">Pharmacy</option>
				<option value="Philosophy">Philosophy</option>
				<option value="Political Science">Political Science</option>
				<option value="Psychology">Psychology</option>
				<option value="Sociology">Sociology</option>-
			</select>
			<input type="submit" value="Submit">
  			
		</form>


	</aside>


	<!---------------------->
	<!----Main page area---->
	<!---------------------->
	<main>
		<div style="color:black; text-align: center; font-size: 70%">
			<br><br>
		<?php
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
				
			
			echo '<h1><center><strong>Book Details</strong></center></h1>
							
							
			<style>
			table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 80%;
			}

			td, th {
			border: 2px solid black;
			text-align: left;
			padding: 10px;
			}
			tr:nth-child(even) {
			background-color: #F0F0F0;
			}
						
			</style>';
					
				echo '<table>';
				echo '<tr>
					<th><h2><center>Book</center></h2></th>
					<th><h2><center>Details</center></h2></th>
					<th><h2><center>Purchase</center></h2></th>
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
					';
					echo 
					"<td>
					<form action='addToCart.php' method='post'>
						<center><input type='hidden' id = 'add' name='specificBook' value='".$bookid."'>
						<input type='submit' value='Add to Cart'></button>
						</form>
					</td>
					</tr>";

				echo'</table>'; 
						
		
		}
		else{
			$output = "No details found. ";
			print($output);
		}

		?>
	
		</div>
	</main>


	<!---------------------->
	<!--------Footer-------->
	<!---------------------->
	<footer>
		<p id="copyright">&copy; 2020, Flip Book, Inc.</p>
	</footer>



</body>
</html>








