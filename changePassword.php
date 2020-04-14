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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<!----------------------->
	<!---Navigation/header--->
	<!----------------------->
	<nav>
		<ul class="navigation">
			<!---Flip Book Logo--->
			<li><a href="signUpPage.php"><img id="logo" src="images/flipbook_logo.png" width="150px" height="100px"></a></li>
			
		
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
	<!---------Main--------->
	<!---------------------->

	<main id="signup-main">
		<form action="changePassFunc.php" method="post">

				<center><h1>Forgot your Password?</h1></center>
					<p> Log in to your account by answering your security question </p>
					
					<label id="email"><b>Email Address: </b></label>
			        <input type="email" class="input-area" name="email" required> <br>

					<label id="secQ"><b>Security Question: Who was your childhood best friend?</b></label><br>
					
					<label id="secAns"><b>Security Answer: </b></label>
			        <input type="text" class="input-area" name="secAns" required> <br>

						
					<button type="submit">Submit</button>
					
					
		</form>

		<p class="account-status" >Already have an account? <a href="login.php"><u>Login here!</u></a></p>
		<p class="account-status" >Sign up <a href="signUpPage.php"><u>Create an account!</u></a></p>
	</main>
	

	<!---------------------->
	<!--------Footer-------->
	<!---------------------->
	<footer>
		<p id="copyright">&copy; 2020, Flip Book, Inc.</p>
	</footer>


</body>
</html>