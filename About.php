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
			<li class="icons"><a href="profile.html"><i class="fa fa-user-circle" style="font-size:150%"></i></a></li>
			<li class="icons"><a href="checkout.html"><i class="fa fa-shopping-cart" style="font-size:150%"></i></a></li>
			<li class="icons"><a href="post.html"><i class="fa fa-plus" style="font-size:150%"></i></a></li>

		
			<!---Menu items--->
			<div>
				<br>
				<br>
				<br>
				<li id="menu-about"><a id="about" href="About.html">About Us</a></li>
				<li id="menu-contact"><a id="contact" href="ContactUs.html">Contact Us</a></li>
			</div>
		</ul>
	</nav>


	<!---------------------->
	<!--------Aside--------->
	<!---------------------->
	<aside>
		<p id="aside_title">Categories</p>
	</aside>


	<!---------------------->
	<!--------Main---------->
	<!---------------------->
	<main id="about-main">
		<center><h2>Get to know Flip Book! </h2></center>

		<div id="about-info">
			<p>As all broke college students know, textbooks remain extremely expensive and hard to locate online. Additionally, it is impossibly hard to locate sellers through Academica. Lucky for you, Flip Book is an easy-to-use platform open to strictly Wayne State University students and faculty to sell and buy textbooks at competitive prices without worrying about the costs of shipping. We value user satisfaction above everything and provide various functionalities for users to make the most of their time. As a buyer, you may browse through our vast database of course materials and find what matches your needs. On the other hand, as a seller, you will be able to make some quick cash listing books you no longer use.</p>

			<h4>Here is what you can do on Flip Book:</h4>
			<ol>
				<li> Register as an official member</li>
				<li> Post a book and set your listing price</li>
				<li> Search for books by title, author, subject, or ISBN</li>
				<li> Contact a seller</li>
				<li> Checkout a book</li>
			</ol>
			
			<p>If you have any questions, feel free to <a href = "ContactUs.html"><u>contact us!</u></a><br></p>
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
