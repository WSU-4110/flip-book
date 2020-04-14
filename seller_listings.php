<!DOCTYPE html>
<?php
	session_start()
?>
<html>
<head>
	<title>Welcome - Flip Book</title>
	<link rel="icon" type="image/png" href="images/flipbook_logo.png" />
	<meta name="viewport" content="width=device-width, intial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="layout.css">
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
				<li id="menu-about"><a id="about" href="About.php">About Us</a></li>
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
		<div style="color:black; text-align: center; font-size: 70%">
			<h1>My Listings</h1>
			<br>

			<center><table id="seller-listings" border="1px solid black">

				<?php
					$con = mysqli_connect('localhost','root','root1234');
					mysqli_select_db($con, 'flipbook');

					$email = $_SESSION['user'];

					$query = mysqli_query($con, "SELECT * FROM posts where email = '$email' ");
					$count = mysqli_num_rows($query);

					if($count == 0) {
						// if no search results are found in database
						echo '<h2>No listings to display!</h2>';
					}
					else {
						while($row = mysqli_fetch_array($query)) {
							$bookid = $row['bookid'];
							$bookTitle = $row['bookTitle'];

							echo '<tr><td>Book ID: '.$bookid.'</td><td>'.$bookTitle.'</td><td>
								<form action="seller_listings.php" method="post">
									<input type="hidden" name="specificBook" value="'.$bookid.'">
									<input type="submit" id="confirm-seller-transaction" value="Confirm transaction" name="confirm-seller-transaction">
									</form></td></tr>';
						}
					}

					if(isset($_POST['confirm-seller-transaction'])) {
						$bookid = $_POST['specificBook'];
						$reg = "INSERT into confirmseller (bookid, email) VALUES ('$bookid', '$email')";
						mysqli_query($con, $reg);


						$reg2 = mysqli_query($con, "SELECT * FROM confirmbuyer WHERE bookid = '$bookid'");
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
							$output2="";
							$output2 .= '<p style="font-size: 1.5em>'.$message.'</p>';
							echo '<p style="font-size:20px">'.$message.'</p>';
							
						}
						else {
							$message = "";
							$message = "Waiting on confirmation from buyer!";
							$output3="";
							$output3 .= '<p style="font-size: 1.5em>'. $message.'</p>';
							echo '<p style="font-size:20px">'.$message.'</p>';
						}
					
					}
					
				?>
		
			</table></center>

			
		
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