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
	<link rel="stylesheet" type="text/css" href="index-styles.css">
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
			<li><a href="index.php"><img id="logo" src="images/flipbook_logo.png" width="150px" height="100px"></a></li>
			
			
			<!---Menu items--->
			<div>
				<br>
				<br>
				<br>
				<li id="menu-home"><a id="index-nav" href="index.php">Home</a></li>
				<li id="menu-about"><a id="index-nav" href="About-index.php">About Us</a></li>
				<li id="menu-contact"><a id="index-nav" href="ContactUs-index.php">Contact Us</a></li>
			</div>
		</ul>
	</nav>


	<main id="ContactUs-main">
			<center><h2>Have any questions?</h2></center>
			
			<center><p>All fields must be filled to successfully submit the form.</p></center>
			<div class = "container">
			<form action = "inquiries-index.php" method = "POST"> 
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