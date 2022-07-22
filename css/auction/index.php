<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to Auction on A Dime</title>
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
<!-- banner -->
<div class="banner">
  <div class="container blue-bg blue-bg-2">
    <div class="col-md-8"> 
      <!-- Slideshow 4 -->
      <section class="slider">
        <div class="flexslider">
          <ul class="slides">
            <li> <img src="images/slider-1.jpg" /> </li>
            <li> <img src="images/slider-2.jpg" /> </li>
            <li> <img src="images/slider-3.jpg" /> </li>
            <li> <img src="images/slider-4.jpg" /> </li>
          </ul>
        </div>
      </section>
    </div>
    <div class="upcom">
      <h3>UPCOMING PRODUCTS</h3>
      <br>
      <img src="images/upcom.jpg"  > </div>
  </div>
</div>
<div class="clearfix"></div>

<!-- products part -->
<div class="container cont-box"> 
  <!-- product item column -->
  <div class="col-md-3">
    <div class="prod-box">
      <div class="bids">4000 Bids</div>
      <!-- flip -->
      <div id="f1_container">
        <div id="f1_card" class="shadow">
          <div class="front face"> <span>
            <div class="dis"> <strong>Beats by Dre Studio Headphones</strong><br>
              Value $199.99</div>
            <div class="imag"> <img src="images/pic1.jpg" >
              <p>Item # E5836</p>
            </div>
            </span> </div>
          <div class="back face center">
            <p>This is nice for exposing more information about an image.</p>
            <p>Any content can go here.</p>
          </div>
        </div>
      </div>
      <!-- end of flip -->
      <div class="but">
        <input name="apply" class="btn-green" type="button" id="apply" value="Apply Bid">
        <input name="fill" class="btn-gray" type="button" id="fill" value="Fill it up">
      </div>
    </div>
  </div>
  <!-- end of product item column -->
 <div class="col-md-3">
    <div class="prod-box">
      <div class="bids">4000 Bids</div>
      <!-- flip -->
      <div id="f1_container">
        <div id="f1_card" class="shadow">
          <div class="front face"> <span>
            <div class="dis"> <strong>Beats by Dre Studio Headphones</strong><br>
              Value $199.99</div>
            <div class="imag"> <img src="images/pic2.jpg" >
              <p>Item # E5836</p>
            </div>
            </span> </div>
          <div class="back face center">
            <p>This is nice for exposing more information about an image.</p>
            <p>Any content can go here.</p>
          </div>
        </div>
      </div>
      <!-- end of flip -->
      <div class="but">
        <input name="apply" class="btn-green" type="button" id="apply" value="Apply Bid">
        <input name="fill" class="btn-gray" type="button" id="fill" value="Fill it up">
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="prod-box">
      <div class="bids">4000 Bids</div>
      <!-- flip -->
      <div id="f1_container">
        <div id="f1_card" class="shadow">
          <div class="front face"> <span>
            <div class="dis"> <strong>Beats by Dre Studio Headphones</strong><br>
              Value $199.99</div>
            <div class="imag"> <img src="images/pic3.jpg" >
              <p>Item # E5836</p>
            </div>
            </span> </div>
          <div class="back face center">
            <p>This is nice for exposing more information about an image.</p>
            <p>Any content can go here.</p>
          </div>
        </div>
      </div>
      <!-- end of flip -->
      <div class="but">
        <input name="apply" class="btn-green" type="button" id="apply" value="Apply Bid">
        <input name="fill" class="btn-gray" type="button" id="fill" value="Fill it up">
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="prod-box">
      <div class="bids">4000 Bids</div>
      <!-- flip -->
      <div id="f1_container">
        <div id="f1_card" class="shadow">
          <div class="front face"> <span>
            <div class="dis"> <strong>Beats by Dre Studio Headphones</strong><br>
              Value $199.99</div>
            <div class="imag"> <img src="images/pic4.jpg" >
              <p>Item # E5836</p>
            </div>
            </span> </div>
          <div class="back face center">
            <p>This is nice for exposing more information about an image.</p>
            <p>Any content can go here.</p>
          </div>
        </div>
      </div>
      <!-- end of flip -->
      <div class="but">
        <input name="apply" class="btn-green" type="button" id="apply" value="Apply Bid">
        <input name="fill" class="btn-gray" type="button" id="fill" value="Fill it up">
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="prod-box">
      <div class="bids">4000 Bids</div>
      <!-- flip -->
      <div id="f1_container">
        <div id="f1_card" class="shadow">
          <div class="front face"> <span>
            <div class="dis"> <strong>Beats by Dre Studio Headphones</strong><br>
              Value $199.99</div>
            <div class="imag"> <img src="images/pic5.jpg" >
              <p>Item # E5836</p>
            </div>
            </span> </div>
          <div class="back face center">
            <p>This is nice for exposing more information about an image.</p>
            <p>Any content can go here.</p>
          </div>
        </div>
      </div>
      <!-- end of flip -->
      <div class="but">
        <input name="apply" class="btn-green" type="button" id="apply" value="Apply Bid">
        <input name="fill" class="btn-gray" type="button" id="fill" value="Fill it up">
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="prod-box">
      <div class="bids">4000 Bids</div>
      <!-- flip -->
      <div id="f1_container">
        <div id="f1_card" class="shadow">
          <div class="front face"> <span>
            <div class="dis"> <strong>Beats by Dre Studio Headphones</strong><br>
              Value $199.99</div>
            <div class="imag"> <img src="images/pic6.jpg" >
              <p>Item # E5836</p>
            </div>
            </span> </div>
          <div class="back face center">
            <p>This is nice for exposing more information about an image.</p>
            <p>Any content can go here.</p>
          </div>
        </div>
      </div>
      <!-- end of flip -->
      <div class="but">
        <input name="apply" class="btn-green" type="button" id="apply" value="Apply Bid">
        <input name="fill" class="btn-gray" type="button" id="fill" value="Fill it up">
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="prod-box">
      <div class="bids">4000 Bids</div>
      <!-- flip -->
      <div id="f1_container">
        <div id="f1_card" class="shadow">
          <div class="front face"> <span>
            <div class="dis"> <strong>Beats by Dre Studio Headphones</strong><br>
              Value $199.99</div>
            <div class="imag"> <img src="images/pic7.jpg" >
              <p>Item # E5836</p>
            </div>
            </span> </div>
          <div class="back face center">
            <p>This is nice for exposing more information about an image.</p>
            <p>Any content can go here.</p>
          </div>
        </div>
      </div>
      <!-- end of flip -->
      <div class="but">
        <input name="apply" class="btn-green" type="button" id="apply" value="Apply Bid">
        <input name="fill" class="btn-gray" type="button" id="fill" value="Fill it up">
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="prod-box">
      <div class="bids">4000 Bids</div>
      <!-- flip -->
      <div id="f1_container">
        <div id="f1_card" class="shadow">
          <div class="front face"> <span>
            <div class="dis"> <strong>Beats by Dre Studio Headphones</strong><br>
              Value $199.99</div>
            <div class="imag"> <img src="images/pic8.jpg" >
              <p>Item # E5836</p>
            </div>
            </span> </div>
          <div class="back face center">
            <p>This is nice for exposing more information about an image.</p>
            <p>Any content can go here.</p>
          </div>
        </div>
      </div>
      <!-- end of flip -->
      <div class="but">
        <input name="apply" class="btn-green" type="button" id="apply" value="Apply Bid">
        <input name="fill" class="btn-gray" type="button" id="fill" value="Fill it up">
      </div>
    </div>
  </div>
  <div class="col-md-12 pages"><a href="#">&lt;&lt;Previous</a><a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">Next&gt;&gt;</a></div>
</div>
<!-- footer -->
<?php include "includes/footer.php"; ?>
</html>