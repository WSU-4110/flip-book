<!DOCTYPE html>
<?php
	session_start();

	$con = mysqli_connect('localhost','root','root1234');

	mysqli_select_db($con, 'flipbook');
?>
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

	<aside id="aside_checkout">
		<p id="aside_title">Cart Total</p>
		<table id="total_items">
		<?php
			$cartTotal = 0;
			//grab the current user's email
			$email = $_SESSION['user'];
			//check the cart table and collect all the books in their account
			$cartedBooks = mysqli_query($con,"SELECT * FROM cart WHERE email LIKE '%$email%'");
			//record the quantity
			$numBooks = mysqli_num_rows($cartedBooks);
			//if the have any books...
			if(!$numBooks == 0){
				echo "<tr>
					<th>Books</th>
					<th>Price</th>
				</tr>";
				//while they still have books.
				while ($row = mysqli_fetch_array($cartedBooks)) {
					//grab the bookid of the current row
					$bookid = $row['bookid'];
					//query the posts table for that bookid
					$aBook = mysqli_query($con,"SELECT * FROM posts WHERE bookid LIKE '%$bookid%'");
					$details = mysqli_fetch_array($aBook);
					//grab all the important cart details of that book
					$bookTitle = $details['bookTitle'];
					$price = $details['price'];
					echo "<tr>
						<td>".$bookTitle."</td>
						<td>".$price."</td>
					</tr>";
					$cartTotal = $cartTotal + $price;
				}
				echo"<tr>
					<td><b>Grand Total:</b></td>
					<td><b>".$cartTotal."</b></td>
				</tr>";
			}
		?>	
		</table>
	</aside>

	<div id="main_checkout_frame">
		<?php
			//grab the current user's email
			$email = $_SESSION['user'];
			//check the cart table and collect all the books in their account
			$cartedBooks = mysqli_query($con,"SELECT * FROM cart WHERE email LIKE '%$email%'");
			//record the quantity
			$numBooks = mysqli_num_rows($cartedBooks);
			//if the have any books...
			if(!$numBooks == 0){
				//while they still have books.
				while ($row = mysqli_fetch_array($cartedBooks)) {
					echo '<div class="cart_item_frame">';
						//grab the bookid of the current row
						$bookid = $row['bookid'];
						//query the posts table for that bookid
						$aBook = mysqli_query($con,"SELECT * FROM posts WHERE bookid LIKE '%$bookid%'");
						$details = mysqli_fetch_array($aBook);
						//grab all the important cart details of that book
						$img = $details['img'];
						$bookTitle = $details['bookTitle'];
						$author = $details['author'];
						$ISBN = $details['ISBN'];
						$price = $details['price'];
						echo '<div class="column">
							<a><img id="book_image" src="images/sampleTextBook.jpg"></a>
						</div>
						<div class="column">
							<p><b>Title:</b>'.$bookTitle.'</p>
							<p><b>Author:</b>'.$author.'</p>
							<p><b>ISBN:</b>'.$ISBN.'</p>
						</div>
						<div class="column">
							<p id="book_price" href="" style="font-size: 36px">$'.$price.'</p>
						</div>
						<div class="column">
							<div class="buttons">
								<p id="contact_seller"><button style="font-size: 18px">Contact seller</button></p>
								<p id="remove_book">
									<form action="removeFromCart.php" method="post">
											<input type="hidden" name="specificBook" value="'.$bookid.'">
											<td><input type="submit" value="Remove book" style="font-size: 18px">
									</form>
								</p>
							</div>
						</div>
					</div>';
				}
			}
		?>
	</div>

	<!---------------------->
	<!--------Footer-------->
	<!---------------------->
	<footer>
		<p id="copyright">&copy; 2020, Flip Book, Inc.</p>
	</footer>
</body>
</html>
