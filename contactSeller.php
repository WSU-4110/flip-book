<?php

  
	
		session_start();
		
		
		// connecting to host via phpmyadmin
		$con = mysqli_connect('localhost','root','root1234');

		if (!$con) {
			echo'Not connected';
		}

		// selecting youtube database from connection
		mysqli_select_db($con, 'flipbook');
		 

		// variables connected from html form
		$bookid = $_SESSION['bookidCheckout'];

		// match bookid to email
		$query = " SELECT * FROM posts WHERE bookid = '$bookid' ";
		$result = mysqli_query($con, $query) or die(mysqli_error());

		$row = mysqli_fetch_array($result);
		$poster = $row[1];
		

	
	
?>


<!DOCTYPE html>
<html>
<head>
	<title>Contact Seller - Flip Book</title>
	<link rel="icon" type="image/png" href="images/flipbook_logo.png" />
	<meta name="viewport" content="width=device-width, intial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="layout.css">
	<link rel="stylesheet" type="text/css" href="styles_nitisha.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
				<form id="searchbox" action="">
					<input id="search_bar" type="text" placeholder=" Search by title, author, subject, or ISBN" size="70px">
					<a href=""><i class="fa fa-search" style="font-size:100%"></i></a>
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
				<li id="menu-about"><a id="about" href="About.php">About Us</a></li>
				<li id="menu-contact"><a id="contact" href="ContactUs.php">Contact Us</a></li>
			</div>
		</ul>
	</nav>

	<!---------------------->
	<!---------Main--------->
	<!---------------------->
	
	
	

	<main id="signup-main">
		<form action="MAILTO:<?php echo($poster);?>" method="post" enctype="text/plain">

				<center><h1>Contact Seller</h1></center>

					<label id="sellerEmail"><b>Seller Email: </b></label>
			        <input name="sellerEmail" type="email" id="senderEmail" value="<?php echo($poster); ?>" readonly> <br>
					
					<label id="subject"><b>Subject: </b></label>
			        <input name="subject" type="text" id="subject" value="<?php echo("Book ID:".$bookid); ?>" readonly> <br>
					
			        <label id="message"><b>Message: </b></label>
			        <input type="text" class="input-area" name="message" required> <br>
						
					<input type = "submit" id ="submitbtn" value="Submit">
		</form>

	</main>
	

	<!---------------------->
	<!--------Footer-------->
	<!---------------------->
	<footer>
		<p id="copyright">&copy; 2020, Flip Book, Inc.</p>
	</footer>


</body>
</html>