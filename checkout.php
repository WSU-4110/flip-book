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

	<aside id="aside_checkout">
		<p id="aside_title">Cart Total </p>
		<table id="total_items">
			<tr>
				<th>Books</th>
				<th>Price</th>
			</tr>
			<tr>
				<td>Coding for Dummies</td>
				<td>$10.00</td>
			</tr>
			<tr>
				<td><b>Grand Total:</b></td>
				<td><b>$10.00</b></td>
			</tr>
		</table>

	</aside>

	<div id="main_checkout_frame">
		<div class="cart_item_frame">
			<div class="column">
				<a><img id="book_image" src="images/sampleTextBook.jpg"></a>
			</div>
			<div class="column">
				<p><b>Title:</b> Coding For Dummies</p>
				<p><b>Author:</b> Nikhil Abraham</p>
				<p><b>ISBN:</b> 978-1119293323</p>				
				<form action="contactSeller.php" method="post">
					<label>Book ID: </label>				
					<input name="bookid" type="text" id="bookid" value="5" readonly> <br>
					<input type = "submit" id ="submitbtn" value="Contact Seller">
					
				</form>
			</div>
			<div class="column">
				<p id="book_price" href="" style="font-size: 36px">$10.00</p>
			</div>
			<div class="column">
				<div class="buttons">
					<p id="remove_book" href=""><button style="font-size: 18px">Remove Book</button></p>
				</div>
			</div>
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