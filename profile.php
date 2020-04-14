<!DOCTYPE html>
<?php
	session_start();
	
	// connecting to host via phpmyadmin
	$con = mysqli_connect('localhost','root','');

	// selecting youtube database from connection
	mysqli_select_db($con, 'flipbook');
	
	$email = $_SESSION['user'];
	
	$date = 'CURDATE()';
	
	// match user to user info
	$query = " SELECT * FROM users WHERE email = '$email' ";
	$result = mysqli_query($con, $query);
	
	$row = mysqli_fetch_array($result);
	$fname = $row[2];
	$lname = $row[3];
	
	
	// check if user posted any books
	$userQuery = " SELECT email FROM posts WHERE email = '$email' ";
	$userResult = mysqli_query($con, $userQuery);
	$count = mysqli_num_rows($userResult); 
	
	if ($count == 0) {
		echo ("You have not posted anything yet.");
	}
	else {
		
		// fetch user's recent listings
		$sql = " SELECT MAX(postdate) from posts WHERE email = '$email' ";
		$sql_result = mysqli_query($con, $sql);
		
		$daterow = mysqli_fetch_array($sql_result);
		$recentListing = $daterow[0];
		
		// fetch information pretaining the most recent date
		$sql2 = " SELECT * from posts WHERE email = '$email' AND postdate = $recentListing ";
		$sql_result2 = mysqli_query($con, $sql2);
		
		$recentBook = mysqli_fetch_array($sql_result2);
		$recentBookId = $recentBook[0];
		$recentBookTitle = $recentBook['bookTitle'];
		$recentBookAuthor = $recentBook[3];
	}
	
	
?>
?>
<html>
<head>
	<title>Welcome - Flip Book</title>
	<link rel="icon" type="image/png" href="images/flipbook_logo.png" />
	<meta name="viewport" content="width=device-width, intial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="layout.css">
	<link rel="stylesheet" type="text/css" href="profile_styles.css">
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
			<li class="icons"><a href="profile.php"><i class="fa fa-user-circle" style="font-size:150%"></i></a></li>
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
	<!----Main page area---->
	<!---------------------->
	<main>
	<center>
		
			<div class="wrapper">
				<div class="left">
					<img src="https://i.imgur.com/cMy8V5j.png" 
					alt="user" width="100">
					<h4>
						<?php 
							echo ($fname.' '.$lname);
						?>
					</h4>
					 <p>Flip Book User</p>
				</div>
				<div class="right">
					<div class="info">
						<h3>Information</h3>
						<div class="info_data">
							 <div class="data">
								<h4>First Name</h4>
								<p>
									<?php 
										echo ($fname);
									?>
								</p>
								<h4>Last Name</h4>
								<p>
									<?php 
										echo ($lname);
									?>
								</p>
							 </div>
							 <div class="data">
							   <h4>Email</h4>
								<p>
									<?php 
										echo ($email);
									?>
								</p>
								<p>
									<form action=".php" method="post">
									<button type='submit' >Change Password</button>
									</form>
								</p>
						  </div>
						</div>
					</div>
								
				  <div class="listings">
						<h3>Recent Listings</h3>
						<div class="listings_data">
						
							 <div class="data">
							 
								<p>
										<?php 
									
										//if ($count == 0) {
											//echo ("You have not posted anything yet.");
										//}
										
										//else {
											
											echo ("<font color = 'black'><b>Date: </b></font>".$recentListing.' ');
											echo ("<font color = 'black'><b>Title: </b></font>".$recentBookTitle.' '); 
											echo ("<font color = 'black'><b>Author: </b></font>".$recentBookAuthor.'<br>'); 
										//}
									
										
									?>
								</p>
								
							 </div>


							 <div class="data">
								<p>
									<form action="myListings.php" method="post">
									
									  <button type="submit">My Listings</button>
		
									</form>

								</p>
							</div>
							
							
						</div>
						
						
					</div>
					
					
				</div>
				
				
			</div>
		
		
		</div>
		</center>
	</main>
	
		<!---<div class = "container">
		<div class = "contactform">
			<h4>Change Password</h4>
								<p>
									<form action="changePassAccount.php" method="post">

											<label id="password1"><b>Password: </b></label>
											<input type="password" class="input-area" name="password" required> <br>

											<label id="password2"><b>Confirm Password: </b></label>
											<input type="password" class="input-area" name="password2" required> <br>

											<input type = "submit" value = "Change Password" id = "mySubmit">
									</form>
								</p>
								<br>
								<br>
		</div>
		</div>
	
		


	<!---------------------->
	<!--------Footer-------->
	<!---------------------->
	<footer>
		<p id="copyright">&copy; 2020, Flip Book, Inc.</p>
	</footer>



</body>
</html>








