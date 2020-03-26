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
			<li class="icons"><a href="profile.html"><i class="fa fa-user-circle" style="font-size:150%"></i></a></li>
			<li class="icons"><a href="checkout.html"><i class="fa fa-shopping-cart" style="font-size:150%"></i></a></li>
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
	<!--------Aside--------->
	<!---------------------->	
	<aside>
		<p id="aside_title">Categories</p>
		<form id="form_categories" action="main.php" method="post">
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
	<!--------Main---------->
	<!---------------------->
	<main>
		<center><h2>Post a textbook</h2></center>
	
		<form id="post-form" method = "post" action="post_book.php" > 
			<strong>
				<label>Textbook title: </label>
				<input id="book-title" type = "text" name= "book-title" required = "required"> <br>
				<label>Author: </label>
				<input id="author" type = "text" name = "author" required = "required"> <br>
				<label>ISBN: </label>
				<input id="ISBN" type = "text" name = "ISBN" required = "required"> <br>
				<label>Edition: </label>
				<input id="edition" type = "text" name = "edition" required = "required"> <br>
				<label>Subject: </label>
				<select name="subject">
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
					<option value="Sociology">Sociology</option>
				</select><br>
				<label>Class number: </label>
				<input id="class-num" type = "text" name = "class-num"> <br>
				<!--<label>Tags: </label>
				<input id="tags" type = "text" name = "tags"> <br>-->
				<label>Price: </label>
				<input id="price" type = "text" name = "price"> <br>
				<label for="img">Image of textbook cover:</label>
				<input type="file" id="img" name="img" accept="image/*"> <br><br>
				<input id="post-submit" type = "submit" value = "Post book" id = "mySubmit">
			</strong>
		</form>

		<?php
		        if(isset($_SESSION['valid_post']) && $_SESSION['valid_post'] == true) {
		        	echo "<p style='color:#25701d' align='center'>Book was posted successfully!</p>";
		        	$_SESSION['valid_password'] = null;
		        }

		?>

		<?php
		        if(isset($_SESSION['valid_post']) && $_SESSION['valid_post'] == false) {
		        	echo "<p style='color:#25701d' align='center'>Book could not be posted. Please try again.</p>";
		        	$_SESSION['valid_password'] = null;
		        }

		?>
	</main>


	<!---------------------->
	<!--------Footer-------->
	<!---------------------->
	<footer>
		<p id="copyright">&copy; 2020, Flip Book, Inc.</p>
	</footer>


	<script>
		function myFunction() {
		  var x = document.getElementById("img");
		  x.disabled = true;
		}
	</script>



</body>
</html>
