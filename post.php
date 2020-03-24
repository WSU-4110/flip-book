<?php
  session_start();
 
  $email = $_SESSION['user'];
  
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
			<li><a href="main.html"><img id="logo" src="images/flipbook_logo.png" width="150px" height="100px"></a></li>
			
			<!---Searchbar--->
			<li>
				<form id="searchbox" action="">
					<input id="search_bar" type="text" placeholder=" Search by title, author, subject, or ISBN" size="70px">
					<a href=""><i class="fa fa-search" style="font-size:100%"></i></a>
				</form>
			</li>


			<!--Icons-->
			<li class="icons"><a href="profile.php"><i class="fa fa-user-circle" style="font-size:150%"></i></a></li>
				<p><?php echo($email); ?></p>
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
	</aside>


	<!---------------------->
	<!--------Main---------->
	<!---------------------->
	<main>
		<center><h2>Post a textbook</h2></center>
	
		<form id="post-form" action = "post_book.php" method = "post" > 
			<strong>
				<label>Email: </label>				
				<input name="email" type="text" id="email" value="<?php echo($email); ?>" readonly> <br>
				
				<label>Textbook title: </label>
				<input id="book-title" type = "text" name= "book-title" required = "required"> <br>
				
				<label>Author: </label>
				<input id="author" type = "text" name = "author" required = "required"> <br>
				
				<label>ISBN: </label>
				<input id="ISBN" type = "text" name = "ISBN" required = "required"> <br>
				
				<label>Edition: </label>
				<input id="edition" type = "text" name = "edition" required = "required"> <br>
				
				<label>Subject: </label>
				<input id="subject" type = "text" name = "subject" required = "required"> <br>
				
				<label>Class number: </label>
				<input id="class-num" type = "text" name = "class-num"> <br>
				
				<label>Price: </label>
				<input id="price" type = "text" name = "price"> <br>
				
				<label for="img">Image of textbook cover:</label>
				<input type="file" id="img" name="img" accept="image/*"> <br><br>
				
				<input id="post-submit" type = "submit" value = "Post book">
			</strong>
		</form>
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