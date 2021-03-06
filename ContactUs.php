<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Flip Book</title>
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
				<li id="menu-about"><a id="about" href="About.php">About Us</a></li>
				<li id="menu-contact"><a id="contact" href="ContactUs.php">Contact Us</a></li>
			</div>
		</ul>
	</nav>


	<!---------------------->
	<!--------Aside--------->
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

	<main>
			<center><h2>Have any questions?</h2></center>
			
			<center><p>All fields must be filled to successfully submit the form.</p></center>
			<div class = "container">
			<form action = "inquiries.php" method = "POST"> 
				<div class = "contactform">
					<strong>
					<label for = "myFName"> First Name: </label>
					<input type = "text" name= "myFName" required = "required"> <br>
					<label for = "myLName"> Last Name: </label>
					<input type = "text" name = "myLName" required = "required"> <br>
					<label for = "myEmail"> E-mail: </label>
					<input type = "email" name = "myEmail" required = "required"> <br>	
					<label for = "myComment"> What can we help you with?: </label>
					<textarea type = "text" cols = "20" rows = "2" name = "myComment" required></textarea>
					<input type = "submit" value = "Submit" id = "mySubmit">
					</strong>
				</div>
			</form>
			</div>
			<?php
		        if(isset($_SESSION['valid_inquiry']) && $_SESSION['valid_inquiry'] == true) {
		        	echo "<p style='color:#25701d' align='center'>Thank you for reaching out! We will respond to you as soon as possible.</p>";
		        	$_SESSION['valid_inquiry'] = null;
		        }
			?>

			<?php
		        if(isset($_SESSION['valid_inquiry']) && $_SESSION['valid_inquiry'] == false) {
		        	echo "<p style='color:#25701d' align='center'>Error: message could not be sent!</p>";
		        	$_SESSION['valid_inquiry'] = null;
		        }
			?>
	</main>

	<!---------------------->
	<!--------Footer-------->
	<!---------------------->
	<footer>
		<p id="copyright">&copy; 2020, Flip Book, Inc.</p>
	</footer>



</body>
</html>