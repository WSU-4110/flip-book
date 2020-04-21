<?php
  session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Sign Up - Flip Book</title>
	<link rel="icon" type="image/png" href="images/flipbook_logo.png" />
	<meta name="viewport" content="width=device-width, intial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="layout.css">
	<link rel="stylesheet" type="text/css" href="styles_nitisha.css">
	<link rel="stylesheet" type="text/css" href="index-styles.css">
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
				<li id="menu-about"><a id="index-nav" href="about-index.php">About Us</a></li>
				<li id="menu-contact"><a id="index-nav" href="ContactUs-index.php">Contact Us</a></li>
			</div>
		</ul>
	</nav>

	<!---------------------->
	<!---------Main--------->
	<!---------------------->

	<main id="signup-main">
		<form action="registration.php" method="post">

				<center><h1 id="registration-title">Register for an account with Flip Book!</h1></center>

					<label id="fname"><b>First Name: </b></label>
			        <input type="text" class="input-area" name="fname" required> <br>
					
					<label id="lname"><b>Last Name: </b></label>
			        <input type="text" class="input-area" name="lname" required> <br>

			        <label id="email"><b>Email ending in "@wayne.edu": </b></label>
			        <input type="text" class="input-area" name="email" pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[wayne]+\.[edu]{2,}$" required> <br>
					<!--<input  required />-->
					
				<!--Error message is displayed if email is already in use-->
		        <?php
		        	if(isset($_SESSION['valid_email']) && $_SESSION['valid_email'] == false) {
		        		echo "<p style='color:green' align='center'>Inputted email address is already taken.</p>";
		        		$_SESSION['valid_email'] = null;
		        	}
		        ?>
		        	<label id="secQ"><b>Security Question: </b></label>
					<input type="text" class="input-area" name="secQ" value="Who was your childhood best friend?" readonly> <br>
					
					<label id="secAns"><b>Security Answer: </b></label>
			        <input type="text" class="input-area" name="secAns" required> <br>

			        <label id="password1"><b>Password: </b></label>
			        <input type="password" class="input-area" name="password" required> <br>

			        <label id="password2"><b>Confirm Password: </b></label>
		        	<input type="password" class="input-area" name="password2" required> <br>
					
					 <!--Error message if passwords do not match-->
		        <?php
		        	if(isset($_SESSION['valid_password']) && $_SESSION['valid_password'] == false) {
		        		echo "<p style='color:green' align='center'>Passwords do not match!</p>";
		        		$_SESSION['valid_password'] = null;
		        	}

		        ?>
						
					<button type="submit">Sign In</button>
		</form>
			

		<p class="account-status" >Already have an account? <a href="login.php"><u>Login here!</u></a></p>
	</main>
	

	<!---------------------->
	<!--------Footer-------->
	<!---------------------->
	<footer>
		<p id="copyright">&copy; 2020, Flip Book, Inc.</p>
	</footer>


</body>
</html>