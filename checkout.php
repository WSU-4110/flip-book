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
						$_SESSION['bookidCheckout'] = $bookid;
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
							<img style="margin-left:4em; margin-top:1em" width="100px" height="120px" src="images/'.$img.'" />
						</div>
						<div class="column">
							<p><b>Title:</b>'.$bookTitle.'</p>
							<p><b>Author:</b>'.$author.'</p>
							<p><b>ISBN:</b>'.$ISBN.'</p>
							<p><b>Book ID:</b>'.$bookid.'</p>
						</div>
						<div class="column">
							<p id="book_price" href="" style="font-size: 36px">$'.$price.'</p>
						</div>
						<div class="column">
							<div class="cart-buttons" style="margin-right:4em">
							<p>
								<form action="contactSeller.php" method="post">
	
									<input type = "submit" id ="submitbtn" value="Contact Seller" style="font-size: 18px">
									
								</form>
								</p>
								<p id="remove_book">
									<form action="removeFromCart.php" method="post">
											<input type="hidden" name="specificBook" value="'.$bookid.'">
											<td><input type="submit" value="Remove book" style="font-size: 18px">
									</form>
								</p>
								<p><form action="checkout.php" method="post">
											<input type="hidden" name="specificBook" value="'.$bookid.'">
											<input type="submit" id="confirm-buyer-transaction" name="confirm-buyer-transaction" value="Confirm transaction" style="font-size: 18px">
								</form></p>
							</div>
						</div>
					</div>';
				}
			}

			// Functionality for Confirm transaction button
			if(isset($_POST['confirm-buyer-transaction'])) {
				$bookid = $_POST['specificBook'];
				$reg = "INSERT into confirmbuyer (bookid, email) VALUES ('$bookid', '$email')";
				mysqli_query($con, $reg);


				$reg2 = mysqli_query($con, "SELECT * FROM confirmseller WHERE bookid = '$bookid'");
				$count = mysqli_num_rows($reg2);
				if($count > 0) {
					$reg3 = "DELETE FROM cart WHERE bookid = '$bookid'";
					$reg4 = "DELETE FROM posts WHERE bookid = '$bookid'";
					$reg5 = "DELETE FROM confirmbuyer WHERE bookid = '$bookid'";
					$reg6 = "DELETE FROM confirmseller WHERE bookid = '$bookid'";
					mysqli_query($con,$reg3);
					mysqli_query($con,$reg4);
					mysqli_query($con,$reg5);
					mysqli_query($con,$reg6);
					
					$message = "";
					$message = "Successful transaction!";
					echo '<center><p style="font-size:20px">'.$message.'</p></center>';
				}
				else {
					$message = "";
					$message = "Waiting on confirmation from seller!";
					echo '<center><p style="font-size:20px">'.$message.'</p></center>';
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
</body>