<!DOCTYPE html>
<?php
	session_start();
	
	// connecting to host via phpmyadmin
	$con = mysqli_connect('localhost','root','root1234');

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


?>
<html>
<head>
	<title>My Profile - Flip Book</title>
	<link rel="icon" type="image/png" href="images/flipbook_logo.png" />
	<meta name="viewport" content="width=device-width, intial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="layout.css">
	<!--<link rel="stylesheet" type="text/css" href="profile_styles.css">-->
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
	<!--Aside (Categories)-->
	<!---------------------->
	<aside>
		<p id="aside_title">Categories</p>
		<form action="main.php" method="post">
			<select name="category">
				<option value="default" disabled selected>Select a category</option>
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
		<center><h2>My Profile</h2></center>
		<br>
		<br>

			<div class="wrapper">
				<center><div style="float: left; margin-left: 20em">
					<p><i class="fa fa-user-circle" style="font-size:500%; color:#f7d340;"></i></p>
						<?php 
							echo '<h4>'.$fname.' '.$lname.'</h4><h4>'.$email.'</h4>';

						?>
					<p>
						<form action="passwordChangeFromAccount.php" method="post">
							<button type='submit' >Change Password</button>
						</form>
					</p>
					
				</div></center>
				<div class="right">
					<div class="info">

						<div class="info_data">

								
						  </div>
						</div>
					</div>
								
				  <div class="listings" style="float: right; margin-right: 20em">
						<h3>Recent Listings</h3>
						<div class="listings_data">
						
							 <div class="data">
							 
								<p>
										<?php 
									
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
												$sql2 = " SELECT * from posts WHERE email = '$email' AND postdate = '$recentListing' ";
												$sql_result2 = mysqli_query($con, $sql2);
												
												$recentBook = mysqli_fetch_array($sql_result2);
												$recentBookId = $recentBook[0];
												$recentBookTitle = $recentBook['bookTitle'];
												$recentBookAuthor = $recentBook[3];

												echo ("<font color = 'black'><b>Date: </b></font>".$recentListing.'<br>');
												echo ("<font color = 'black'><b>Title: </b></font>".$recentBookTitle.'<br>'); 
												echo ("<font color = 'black'><b>Author: </b></font>".$recentBookAuthor.'<br>'); 
										
											}
									?>
								</p>
								<p>
									<form action="seller_listings.php" method="post">
										<button type="submit">My listings/Confirm transactions</button>
									</form>
								</p>
								
							 </div>


							 <div class="data">
								<p>
									

								</p>
							</div>
							
							
						</div>
						
						
					</div>
					
					
				</div>
				
				
			</div>
		
		
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