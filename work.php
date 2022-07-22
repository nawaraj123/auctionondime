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
<link rel="stylesheet" href="css/jquery.bxslider.css" type="text/css" />

<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <![endif]-->

<script src="js/jquery-1.11.2.js"></script>
<script src="js/jquery.bxslider.js"></script>
<script src="js/jquery.quickflip.source.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
    $('.quickFlip').quickFlip();
    
    $('.quickFlip3').quickFlip({
        vertical : true
    });
    
    $('.quickFlip2').quickFlip();
});
</script>
<!-- Modernizr -->
<script src="js/modernizr.js"></script>
</head>

<body>
<!-- header part -->
<?php include "includes/header.php"; ?>

<!-- end of header part --> 

<!-- navigation menu part -->
<div class="menu">
  <div class="container">
    <nav id="nav" role="navigation"> <a href="#nav" title="Show navigation">Show navigation</a> <a href="#" title="Hide navigation">Hide navigation</a>
      <ul class="clearfix">
        <li><a href="index.php">Home</a></li>
        <li> <a href="#" aria-haspopup="true"><span>Categories</span></a>
          <ul>
            <li><a href="#">Mobiles</a></li>
            <li><a href="#">Laptops</a></li>
            <li><a href="#">Desktops</a></li>
            <li><a href="#">Home Theater</a></li>
            <li><a href="#">Home Appliance</a></li>
            <li><a href="#">Electronics</a></li>
          </ul>
        </li>
        <li><a href="work.php">How it Works</a></li>
        <li><a href="buy-bids.php">Buy Bids</a></li>
        <li><a href="help.php">Help</a></li>
        <li><a href="account.php">My Account</a>
        	<ul>
            <li><a href="myboard.php">My Board</a></li>
            <li><a href="payment-info.php">My Payment Info</a></li>
        </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>
<div class="clearfix"></div>
<!-- end of navigation part --> 
<!-- banner --> 

<!-- products part -->
<div class="container cont-box">
  <div class="col-md-8">
    <h2>Bid, win and save money on everything your family needs</h2>
    <p>An iPad for $13.66, a Macbook for $3.44 or a 50-Inch HDTV for just $1.00.. American families are winning deals like this on a Dime every minute. And shipping on <strong>a Dime</strong> is always FREE on all items.</p>
    <p>There is no membership fee on a Dime. Click <a href="sign.php">here</a> to create a FREE account.</p>
    <br>
    <h3>How do the auctions work?</h3>
    <p>1.Every auction starts at $0.00 and each bid raises the price by only $0.01. There are no reserve prices - everything must go.</p>
    <p>2.Every bid placed restarts the countdown clock. If no new bids are placed before the clock runs out, the highest bidder wins the auction.</p>
    <p>3.The winner can now buy the item for its final price, typically 60-99% off retail. Shipping on a Dime is always FREE on all items.</p>
    <br>
    <p>You need to purchase a Bid Pack before you can bid</p>
    <p>Every bid costs 60 cents and must be purchased prior to bidding.</p>
    <p>Click here to purchase your first Bid Pack and start bidding to win and save!</p>
    <p>Every bid you purchase gives you a chance of winning a great deal.</p>
    <p>If you don't win, you can get all your Bids back</p>
    <br>
    <p>If you don't win the auction, you can buy the same item for its Buy it Now price
      and get all the bids you used in that auction back for free.</p>
    <p>You can then use the bids again and try to win another auction.</p>
    <br>
    <h3>I won an auction! What do I do now?</h3>
    <p>Just navigate to <a href="account.php">"My Acount"</a> and <a href="myboard.php">"Won auctions"</a> to pay for your win.</p>
    <p>Pay for the final auction price, and we will ship your item for free within 10 days.</p>
    <p>All items on a Dime are brand new and come with standard manufacturer warranties.</p>
    <br>
    <h3>Still have questions?</h3>
    <p>Contact our support team.</p>
    <p>Bid, Win and Save Money Today!</p>
    <br>
    <h3>JOIN FREE</h3>
    <p>No Questions Asked 100% Money Back Guarantee!</p>
    <br>
    <p>-Your entire first purchase back if you are not 100% satisfied!</p>
    <p>-Win or Lose - no questions asked. Full refund will always be granted automatically.</p>
    <p>-To get the refund, simply email info@email.com within 90 days. </p>
  </div>
  <div class="col-md-4 bidpic"><img src="images/bid-1.jpg"><br>
<br>
  <img src="images/bid-2.jpg" >
  </div>
</div>
<!-- footer -->
<?php include "includes/footer.php"; ?>
</html>