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
		<li id="menu-about"><a id="about" href="About.html">About Us</a></li
        <li id="menu-contact"><a id="contact" href="ContactUs.html">Contact Us</a></li>
      </div>
    </ul>
  </nav>

  <!---------------------->
  <!---------Main--------->
  <!---------------------->

  <main id="login-main">
    <form action="validation.php" method="post">

        <center><h1>Login to your FlipBook account!</h1></center>

              <label id="email"><b>Email Address: </b></label>
              <input type="email" class="input-area" name="email" required> <br>

              <label id="password1"><b>Password: </b></label>
              <input type="password" class="input-area" name="password" required> <br>

            <button type="submit">Sign In</button>
    </form>

    <p class="account-status" >Don't have an account? <a href="signUpPage.html"><u>Register here!</u></a></p>
	<p class="account-status" >Forgot your password? <a href="changePassword.php"><u>Change Password</u></a></p>
	
  </main>


  <!---------------------->
  <!--------Footer-------->
  <!---------------------->
  <footer>
    <p id="copyright">&copy; 2020, Flip Book, Inc.</p>
  </footer>


</body>
</html>
