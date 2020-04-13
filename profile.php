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

<!DOCTYPE html>
<html>
<head>
	<title>Welcome - Flip Book</title>
	<link rel="icon" type="image/png" href="images/flipbook_logo.png" />
	<meta name="viewport" content="width=device-width, intial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="layout.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<!----------------------->
	<!---Navigation/header--->
	<!----------------------->
	<nav>
		<ul class="navigation">
			<!---Flip Book Logo--->
			<li><a href="main.html"><img id="logo" src="images/flipbook_logo.png" width="150px" height="100px"></a></li>
			
			<!---Searchbar--->
			<li>
				<form id="searchbox" action="">
					<input id="search_bar" type="text" placeholder=" Search by title, author, subject, or ISBN" size="70px">
					<a href=""><i class="fa fa-search" style="font-size:100%"></i></a>
				</form>
			</li>


			<!--Icons-->
			<li class="icons"><a href="profile.html"><i class="fa fa-user-circle" style="font-size:150%"></i></a></li>
			<li class="icons"><a href="checkout.html"><i class="fa fa-shopping-cart" style="font-size:150%"></i></a></li>
			<li class="icons"><a href="post.html"><i class="fa fa-plus" style="font-size:150%"></i></a></li>

		
			<!---Menu items--->
			<div>
				<br>
				<br>
				<br>
				<li id="menu-about"><a id="about" href="About.html">About Us</a></li>
				<li id="menu-contact"><a id="contact" href="ContactUs.html">Contact Us</a></li>
			</div>
		</ul>
	</nav>

	<!---------------------->
	<!----Main page area---->
	<!---------------------->
	<main>
		<p>
			<div class="wrapper2">
				<div class="left">
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
										echo ($fname);
									?>
								</p>
							 </div>
						</div>
					</div>
				</div>
			</div>
		
		
		</p>
	</main>


	<!---------------------->
	<!--------Footer-------->
	<!---------------------->
	<footer>
		<p id="copyright">&copy; 2020, Flip Book, Inc.</p>
	</footer>



</body>
</html>