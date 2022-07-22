<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login or Sign up to Auction on A Dime</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="css/font-awesome.min.css">

<!-- bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Custom CSS -->

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- slider -->
<!-- Demo CSS -->
<link rel="stylesheet" href="css/demo.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<!-- login form css -->
<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />

<!-- Modernizr -->
<script src="js/modernizr.js"></script>
</head>

<body>
<!-- header part -->
<?php include "includes/header.php"; ?>

<!-- end of header part --> 

<!-- navigation menu part -->

<nav class="navbar navbar-inverse" role="navigation">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li> <a href="index.php">Home</a> </li>
          <li> <a href="#">Categories</a>
            <ul class="dropdown-menu">
              <li> <a href="#">Item 1</a> </li>
              <li> <a href="#">Item 2</a> </li>
              <li> <a href="#">Item 3</a> </li>
            </ul>
          </li>
          <li> <a href="#">How It Works</a> </li>
          <li> <a href="#">Buy Bids</a> </li>
          <li> <a href="#">Help</a> </li>
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </div>
  </div>
  <!-- /.container --> 
</nav>
<div class="clearfix"></div>
<!-- end of navigation part --> 

<!-- products part -->
<div class="container cont-box">
  <div class="col-md-6">
    <h3>Member Login</h3>
    <section>
      <div id="container_demo" >
        <div id="wrapper">
          <div id="login">
            <form autocomplete="on">
              <p>
                <label for="username" class="uname"> Your email or username </label>
                <input id="username" name="username" required type="text" placeholder="myusername or mymail@mail.com"/>
              </p>
              <p>
                <label for="password" class="youpasswd" > Your password </label>
                <input id="password" name="password" required type="password" placeholder="eg. X8df!90EO" />
              </p>
              <p class="keeplogin">
                <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" />
                <label for="loginkeeping">Keep me logged in</label>
              </p>
              <p class="login button">
                <input type="submit" value="Login" />
              </p>
              <p class="change_link"> <a href="#">Forget your pasword ?</a> <a href="#toregister" class="to_register">Join us</a> </p>
            </form>
          </div>
        </div>
      </div>
    </section>
    <div class="clearfix"></div>
  </div>
  <div class="col-md-6">
    <h3>Create Your Account</h3>
    <p>If you are new user then please create your member account.</p>
    <section>
      <div id="container_demo" >
        <div id="wrapper">
          <div id="login" >
            <form >
              <p>
                <label for="usernamesignup" class="uname" >Your username</label>
                <input id="usernamesignup" name="usernamesignup" required type="text" placeholder="mysuperusername690" />
              </p>
              <p>
                <label for="emailsignup" class="youmail" > Your email</label>
                <input id="emailsignup" name="emailsignup" required type="email" placeholder="mysupermail@mail.com"/>
              </p>
              <p>
                <label for="passwordsignup" class="youpasswd" >Your password </label>
                <input id="passwordsignup" name="passwordsignup" required type="password" placeholder="eg. X8df!90EO"/>
              </p>
              <p>
                <label for="passwordsignup_confirm" class="youpasswd" >Please confirm your password </label>
                <input id="passwordsignup_confirm" name="passwordsignup_confirm" required type="password" placeholder="eg. X8df!90EO"/>
              </p>
              <p class="signin button">
                <input type="submit" value="Sign up"/>
              </p>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<!-- footer -->
<?php include "includes/footer.php"; ?>
</html>