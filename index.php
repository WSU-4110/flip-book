<!DOCTYPE html>
<html>
<head>
	<title>Welcome - Flip Book</title>
	<link rel="icon" type="image/png" href="images/flipbook_logo.png" />
	<meta name="viewport" content="width=device-width, intial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="index-styles.css">
	<link rel="stylesheet" type="text/css" href="layout.css">
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
		
			<!---Menu items--->
			<div>
				<br>
				<br>
				<br>
				<li id="menu-contact"><a id="contact" href="ContactUs.php">Contact Us</a></li>
			</div>
		</ul>
	</nav>


	<!---------------------->
	<!---------Main--------->
	<!---------------------->
	<main id="index-main">
		<p id="welcome">Welcome to Flip Book!</p>
		<p class="welcome-text">Flip Book is a platform that allows Wayne State students to post their old textbooks for other students to purchase.</p>
		<p class="welcome-text">Get started now!</p>

		<!--Buttons-->
		<button><a href="signUpPage.php">Sign Up</a></button>
		<button><a href="login.php">Log In</a></button>
	</main>
	

	<!---------------------->
	<!--------Footer-------->
	<!---------------------->
	<footer>
		<p id="copyright">&copy; 2020, Flip Book, Inc.</p>
	</footer>


</body>
</html>