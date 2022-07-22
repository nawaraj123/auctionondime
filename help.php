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
    <h3> What's the best way to win an auction?</h3>
    <p>Everyone wants to know how to improve their chances of winning an auction on a Dime. There isn't a guaranteed winning strategy, but we'll offer you a few tips to help get you started:</p>
    <p><strong>Place your bid within the last 15 seconds</strong></p>
    <p>By placing a bid in the last few seconds, you know the time will reset and you'll become the highest bidder. If someone else bids, time will be added and you'll get another chance to bid. </p>
    <br>
    <p><strong>Bid on the cheapest products </strong></p>
    <p>You can get some great deals on our most expensive items. However, these items also tend to generate the most competitive auctions.  Fewer bidders bid on cheaper items, meaning that you are much more likely to win.</p>
    <br>
    <p><strong>Protect yourself with Bid-O-Matic</strong></p>
    <p>Bid-O-Matic is a powerful tool when using strategic limits. It can scare away the other bidders because they know that the Bid-O-Matic will always place bids to keep you on top. Your chances of winning are increased, and they know it- which may help you intimidate your competition.</p>
    <br>
    <p><strong>Turn your opponents' Bid-O-Matics against each other</strong></p>
    <p>Some people set the Bid-O-Matic and forget about it. It is easy to win if your competition has stepped away from the computer with the assumption that their Bid-O-Matic will fully protect them. We’ve noticed that users tend to set the "Bid From" value of their Bid-O-Matic to a round number, so use this to your advantage. Wait for a round number and place a single bid after it on the off-chance that the Bid-O-Matic has reached its limit.</p>
    <br>
    <p><strong>Watch other bidders</strong></p>
    <p>View the details of the last ten bids placed and try to figure out:</p>
    <p>Who is bidding?</p>
    <p>When do they place their bids?</p>
    <br>
    <h3>How do you pronounce a Dime?</h3>
    <p>This is a much more common question than you'd think. a Dime is pronounced ('Kwi-Bids), as in Quick Bids.</p>
    <p>a Dime. Say it out loud. "a Dime." Good. Now go tell your friends about a Dime and you'll receive free bids if they sign up and purchase a Bid Pack. Just be sure to use the "Refer a Friend" link in the My a Dime section.</p>
    <br>
    <h3>How does the Bid-O-Matic work?</h3>
    <p>Bid-O-Matic automatically places bids for you in a more efficient way than other auction sites. Bid-O-Matic even lets you bid if you're not logged on to our website! Using Bid-O-Matic guarantees your bid will be placed in the last 20 seconds. You'll never have to worry about losing your Internet connection or getting distracted in the final seconds because Bid-O-Matic will bid as you instruct it to.</p>
    <p><strong>Bid-O-Matic's Protocol:</strong></p>
    <p>Bid-O-Matic will bid whenever the timer drops below 20 seconds, though it's up to the Bid-O-Matic exactly when it will place that bid.</p>
    <p>Bid-O-Matic can be set up with a minimum of 3 bids and a maximum of 25 bids at a time.</p>
    <p>Bid-O-Matic will start to bid for you as soon as you click the 'Activate' button, unless there is less than 2 seconds remaining on the auction clock.</p>
    <p>Bid-O-Matic may be deactivated at any point during the auction. Please keep in mind that the number of deactivations will be limited to minimize server load.</p>
    <p>If an auction ends, all unused Bid-O-Matic bids will remain in your account.</p>
    <p>You can only set one Bid-O-Matic at a time per auction.</p>
    <p><strong>Bid-O-matics cannot be activated on auctions with less than 2 seconds remaining on the auction clock.</strong></p>
    <br>
    <p><strong>How to Use:</strong></p>
    <p>In the Bid-O-Matic area on the right side of every auction page, simply enter the Bid From price (which is the price you want the Bid-O-Matic to start placing bids at) and the number of bids you're prepared for it to use. Then select 'Activate'.
    <p>Sit back, relax, and watch your Bid-O-Matic do all the work for you.</p>
    <br>
    <p><strong>What about when two or more Bid-O-Matics are set to bid in the same price range?</strong></p>
    <p>If there are two or more Bid-O-Matics bidding in the same auction, a bid will be placed sometime in the last 20 seconds just like if there was one Bid-O-Matic bidder. Only one bid from a Bid-O-Matic bidder will be placed at a time.</p>
    <p>The exact time that Bid-O-Matic bids varies – it can be anywhere between 0 and 20 seconds. It's randomized to prevent other bidders from knowing if a Bid-O-Matic is in play.</p>
    <p>*Please note that while the Bid-O-Matic function is offered on many of our auctions, it is not offered on all of them. If you do not see it on the auction page, you might be looking at an auction where Bid-O-Matic is not available.</p>
    <br>
    <h3>How much do bids cost?</h3>
    <p>Each bid costs $0.60, and they are available for purchase in Bid Packs here or through the QBar. a Dime accepts Visa, MasterCard, American Express, Discover, and PayPal.</p>
    <br>
    <h3>Can everyone be a winner?</h3>
    <p>Yes! Even if you don't win the auction, you'll never have to walk away with nothing. Any time after you've placed your first bid in an auction, you may choose to buy the product at a discount using the Buy Now feature. You'll never have to pay more than the Value Price for any products on a Dime. But not everyone will win the auction at a large discount.</p>
    <br>
    <h3>Are products brand-new?</h3>
    <p>All products on a Dime are brand-new and factory sealed!</p>
  </div>
  <div class="col-md-4 bidpic"><img src="images/bid-1.jpg"><br>
    <br>
    <img src="images/bid-2.jpg" > </div>
</div>
<!-- footer -->
<?php include "includes/footer.php"; ?>
</html>