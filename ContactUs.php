  <!DOCTYPE html>
<html>
<head>
	<title>Flip Book</title>
	<link rel="icon" type="image/png" href="images/flipbook_logo.png" />
	<meta name="viewport" content="width=device-width, intial-scale=1.0">
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
					<a href=""><i class="fa fa-search" style="font-size:26px"></i></a>
				</form>
			</li>
			

			<!---Icons--->
			<li>
				<p id="icons">
					<a href="post.html"><i class="fa fa-plus" style="font-size:36px"></i></a>
					<a href="profile.html"><i class="fa fa-user-circle-o" style="font-size:36px"></i></a>
					<a href="checkout.html"><i class="fa fa-shopping-cart" style="font-size:36px"></i></a>
				</p>
			</li>


			<!---Menu items--->
			<div id="menu">
				<br>
				<br>
				<li><a id="about" href="About.html">About</a></li>
				<li><a id="contact" href="ContactUs.html">Contact Us</a></li>
			</div>
		</ul>
	</nav>


	<aside>
		<p id="aside_title">Categories</p>
	</aside>
	<main>
		<h2>Have any questions?</h2>
		
		<p>All fields must be filled to successfully submit the form.</p>
	<div class = "container">
	<form action = "inquiries.php" method = "POST"> 
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
	</form>
	</div>
	</main>

	<footer>
		<p>	&copy; 2020, Flip Book, Inc.</p>
	</footer>



</body>
</html>