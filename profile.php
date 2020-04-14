<!DOCTYPE html>
<?php
	session_start();
	
		
	// connecting to host via phpmyadmin
	$con = mysqli_connect('localhost','root','');

	// selecting youtube database from connection
	mysqli_select_db($con, 'flipbook');
	
	$email = $_SESSION['user'];
	
	// match user email to rest of the user's information
	$query = " SELECT * FROM users WHERE email = '$email' ";
	$result = mysqli_query($con, $query);

	$row = mysqli_fetch_array($result);
	$fname = $row[2];
	$lname = $row[3];
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
						  </div>
						</div>
					</div>
								
				  <div class="listings">
						<h3>My Listings</h3>
						<div class="listings_data">
						
							 <div class="data">
							 
								<h4>Recent</h4>
								<p>
										<!---<?php 
									
										if ($count == 0) {
											echo ("You have not posted anything yet.");
										}
										
										else {
											echo ("Date: ".$recentListing.'<br>');
											echo ("Title: ".$recentBookTitle.'<br>'); 
											echo ("Author: ".$recentBookAuthor.'<br>'); 
										}
									
										
									?>--->
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








