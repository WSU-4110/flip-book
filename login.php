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

  <main id="login-main">
    <form action="validation.php" method="post">

        <center><h1>Login to your Flip Book account!</h1></center>

         <?php
              if(isset($_SESSION['valid_login']) && $_SESSION['valid_login'] == false) {
                echo "<p style='color:green' align='center'>Account does not exist!</p>";
                $_SESSION['valid_login'] = null;
              }
          ?>

              <label id="email"><b>Wayne State Email Address: </b></label>
              <input type="email" class="input-area" name="email" required> <br>

              <label id="password1"><b>Password: </b></label>
              <input type="password" class="input-area" name="password" required> <br>

            <button type="submit">Sign In</button>
    </form>

    <p class="account-status" >Forgot your password? <a href="forgotPass.php"><u>Click here!</u></a></p>
    <p class="account-status" >Don't have an account? <a href="signUpPage.php"><u>Register here!</u></a></p>
  
  
  </main>


  <!---------------------->
  <!--------Footer-------->
  <!---------------------->
  <footer>
    <p id="copyright">&copy; 2020, Flip Book, Inc.</p>
  </footer>


</body>
</html>