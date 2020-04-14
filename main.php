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
		<div style="color:black; text-align: center; font-size: 70%">
			<br><br>
			<?php
				$con = mysqli_connect('localhost','root','');
				mysqli_select_db($con, 'flipbook');

				//variables
				$output = '';
				$img_output = '';

				//if else statement to check whether search matches anything in database
				if(isset($_POST['search'])) {
					$searchq = $_POST['search'];

					$query = mysqli_query($con,"SELECT * FROM posts WHERE bookTitle LIKE '%$searchq%'") or die("Could not search!");
					$count = mysqli_num_rows($query);

					if($count == 0) {
						// if no search results are found in database
						$output .= '<h2>'.'No search results!'.'</h2>';
					}
					else {
						// returning data if search is successful
						echo '<table style="color:black; text-align: center; font-size: 120%; margin-left: 5%; margin-right: 5%">';
						while ($row = mysqli_fetch_array($query)) {


							// Assigning variables to store data
							$bookid = $row['bookid'];
							$bookTitle = $row['bookTitle'];
							$author = $row['author'];
							$ISBN = $row['ISBN'];
							$edition = $row['edition'];
							$subject = $row['subject'];
							$classNum = $row['classNum'];
							$price = $row['price'];
							$img = $row['img'];
							
							
							$_SESSION['bookid'] = $bookid;
							
							//Retrieving postuser name
							
								

							$img_output = '<a href = "bookdetails.php"><img width="100px" height="120px" src="images/'.$img.'" /></a>';
							//$output .= '<div><h2>'. $img_output . '<br>'. $bookTitle.'<br>By: '. $author.'<br>$'.$price . '</h2></div>';

							echo 	"<tr>
										<td>$img_output
									<tr>
										<td>$bookTitle										
									<tr>
										<td>$author
									<tr>
										<td>$$price
									<tr>
										<form action='addToCart.php' method='post'>
											<input type='hidden' name='specificBook' value='".$bookid."'>
											<td><input type='submit' value='Add to Cart'>
										</form>";
						}
						echo '</table>';
					}
				}
			?>
			<?php
				$con = mysqli_connect('localhost','root','');
				mysqli_select_db($con, 'flipbook');

				//variables
				$output = '';
				$img_output = '';

				//if else statement to check whether search matches anything in database
				if(isset($_POST['category'])) {
					$searchq = $_POST['category'];

					$query = mysqli_query($con,"SELECT * FROM posts WHERE subject LIKE '%$searchq%'") or die("Could not search!");
					$count = mysqli_num_rows($query);

					if($count == 0) {
						// if no search results are found in database
						$output .= '<h2>'.'No search results!'.'</h2>';
					}
					else {
						// returning data if search is successful
						echo '<table style="color:black; text-align: center; font-size: 120%; margin-left: 5%; margin-right: 5%">';
						while ($row = mysqli_fetch_array($query)) {

							// Assigning variables to store data
							$bookid = $_row['bookid'];
							
							$_SESSION['bookid'] = $bookid; 
							$bookTitle = $row['bookTitle'];
							$author = $row['author'];
							$ISBN = $row['ISBN'];
							$edition = $row['edition'];
							$subject = $row['subject'];
							$classNum = $row['classNum'];
							$price = $row['price'];
							$img = $row['img'];

							$img_output = '<img width="100px" height="120px" src="images/'.$img.'" />';
							//$output .= '<div><h2>'. $img_output . '<br>'. $bookTitle.'<br>By: '. $author.'<br>$'.$price . '</h2></div>';

							echo 	"<tr>
										<td>$img_output
									<tr>
										<td>$bookTitle										
									<tr>
										<td>$author
									<tr>
										<td>$$price
									<tr>
										<form action='addToCart.php' method='post'>
											<input type='hidden' name='specificBook' value='".$bookid."'>
											<td><input type='submit' value='Add to Cart'>
										</form>";
						}
						echo '</table>';
					}
				}
			?>		
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