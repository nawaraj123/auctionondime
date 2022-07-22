<?php
    error_reporting(0);
	include_once('Dbconnection/db_conn.php');
	include_once('admin/classes/product.php');
	include_once('admin/classes/bid.php');
	include_once('admin/classes/useraccount.php');
	include("admin/classes/front.php");
	include_once('admin/classes/subcategory.php');
	include_once('admin/classes/alliance.php');
	include_once('admin/classes/company.php');
	include_once('admin/classes/Pagesettings.classes.php');

	 $product=new Product(); 
	 $bid=new Bid(); 
	 $account=new Useraccount(); 
	if(isset($_POST['fill']))
  		{	
		if(isset($POST['submit']))
		{
			?>
            <script>
			alert("Please Bid First");
			</script>
            <?php 
		}
		}
 		if(isset($_POST['submit']))
  		{		if(!isset($_SESSION)) 
                { 
                  session_start(); 
		
                 }
				 $username=$_SESSION['username'];
	         $login=$username;
			  
			  if($login==null){
				  ?>
                  <script>		 
         alert('Please Login First');
		 window.location ="sign.php";     
				</script>
				<?php  } else 
				
				{		?>		
				
			<?php 	//echo $_POST['current_bid_number']; 
			require_once 'anet_php_sdk/AuthorizeNet.php'; 
   
  // API credentials only need to be defined once
  define("AUTHORIZENET_API_LOGIN_ID", "9Mr89aEd5BrT");
  define("AUTHORIZENET_TRANSACTION_KEY", "32v55e8v9Q4cpCZh");
  define("AUTHORIZENET_SANDBOX", true);
   
  $sale = new AuthorizeNetAIM;
  $sale->amount = "0.1";
  $sale->card_num = '4111111111111111';
  $sale->exp_date = '0418';
  $response = $sale->authorizeAndCapture();
  if ($response->approved) {
    echo "Success! Transaction ID:" . $response->transaction_id;
  } else {
    echo "ERROR:" . $response->error_message;
  }
				$product->setCurrent_bid_number($_POST['current_bid_number']);
				$bid->setCurrent_bid_number($_POST['current_bid_number']+1);
				$bid->setProduct_id($_POST['product_id']);
				$bid->setPrice($_POST['price']);
				$userid=$bid->search_user_id($username);
				$bid->setUser_id($userid);	
				//echo $userid; die();						 
				 $bid->addBid();
				 $bid_required_to_win=$product->getRequire_to_win($_POST['product_id']);
				 ?>
                 <script src="js/jquery.quickflip.source.js" type="text/javascript"></script>

                <!-- <script type="text/javascript">
$(function() {
    $('.quickFlip').quickFlip();
    
    $('.quickFlip3').quickFlip({
        vertical : true
    });
    
    $('.quickFlip2').quickFlip();
});
</script>-->
                 <script>
				 $(function(){     
  		$('html, body').animate({
   		 scrollTop: $('.active_bid #example').offset().top
  			});
			});
				 </script>
                 
				 <script>
				 setTimeout(function() {     
                $(".active_bid .bids_required_to_win").show();
		        $(".active_bid .blackP").hide();		
                 },3000);		
				 </script>
                 
                 
                  <script>
				 setTimeout(function() {     
                $(".active_bid .bids_required_to_win").hide();
		        $(".active_bid .blackP").show();		
                 },13000);		 
		
				 </script>
                 <?php 

				 $bid_in_percentage=($bid_required_to_win/$_POST['bid'])*100;
				 
				// echo $bid_in_percentage; die();
				 

				 if( $bid_in_percentage >25)
				 { ?>
					  
                      <script>
					  setTimeout(function() { 
     $('.active_bid #fill').css('background-color', 'blue','color','#fff'); 
}, 15000);	</script>
                      
                      <script>
					  setTimeout(function() { 
     $('.active_bid #fill').css('background-color', '#bec0bd'); 
}, 20000);
					  </script>   
                      <script>       
                 $(function(){     
  $('html, body').animate({
    scrollTop: $('#example').offset().top
  });
});
               </script>  
				<?php  }			 
				 
				 $product->updateProduct_bid($_POST['product_id']);		
				 //$account->getCurrentbalance($username);		 
				 $account->updateUseraccount($username);					
				}  
	  
  }	$pagesettingObj=new Pagesettings();
	 $pagesettingObj->setSelf('products.php');
	 if(!empty($_GET['page']))
    {
	$pagesettingObj->setPagenum($_GET['page']);	
	}
	else
    {
   $pagesettingObj->setPagenum(1);
    }
  $pagesettingObj->setRowsperpage(24); 
  $pagesettingObj->getPageno(20,'tbl_product');
  $pagesettingObj->setOffset($pagesettingObj->getPagenum());
  $productsList=$product->listProduct($pagesettingObj->getOffset(),$pagesettingObj->getRowsperpage());	
 
 
?><!doctype html>
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

<!-- Modernizr -->
<script src="js/modernizr.js"></script>
<script>
$(document).ready(function(){  
        $("#bids_required_to_win").hide();  
});
</script>

<script>
$(document).ready(function(){  
        $("#fill1").hide();  
});
</script>

<script>
$('#apply').on('click', function(e){

    $("#bids_required_to_win").show();
});
</script>
<script>
$(document).ready(function(){
    
        $(".bids_required_to_win").hide();
   
});
</script>

<script>
$(document).ready(function(){
    
        $(".redPanel").hide();
   
});
</script>

</head>

<body>
<!-- header part -->
<header>
  <div class="container">
    <div class="col-md-3 logo">
      <h1>Auction on <br>
        A Dime</h1>
    </div>
<?php  include('session.php');?>
<!--<?php include ('include/header.php'); ?>
--> </div>
  </div>
</header>

<!-- end of header part --> 

<!-- navigation menu part -->

<?php if(!isset($_SESSION)) 
                {  session_start();		
                 } $login=$_SESSION['username'];			  
			  if($login==null){
				  ?>
<div class="menu">
  <div class="container">
    <nav id="nav" role="navigation"> <a href="#nav" title="Show navigation">Show navigation</a> <a href="#" title="Hide navigation">Hide navigation</a>
      <ul class="clearfix">
        <li><a href="index.php">Home</a></li>
        <li> <a href="#" aria-haspopup="true"><span>Categories</span></a>
          <ul>
          <?php 
											   $compObj=Company::listCompany();
											   
											   foreach($compObj as $comp){
												   
											  ?>
            <li><a href="#"><?php echo $comp->getName() ?></option>
											  
											 </a></li> <?php }?>
            
          </ul>
        </li>
        <li><a href="work.php">How it Works</a></li>
        <li><a href="buy-bids.php">Buy Bids</a></li>
        <li><a href="help.php">Help</a></li>
        <!--<li><a href="account.php">My Account</a>
        	<ul>
            <li><a href="myboard.php">My Board</a></li>
            <li><a href="payment-info.php">My Payment Info</a></li>
        </ul>
        </li>-->
      </ul>
    </nav>
  </div>
</div>
<?php } else {?>
<div class="menu">
  <div class="container">
    <nav id="nav" role="navigation"> <a href="#nav" title="Show navigation">Show navigation</a> <a href="#" title="Hide navigation">Hide navigation</a>
      <ul class="clearfix">
        <li><a href="index.php">Home</a></li>
        <li> <a href="#" aria-haspopup="true"><span>Categories</span></a>
          <ul>
          <?php 
											   $compObj=Company::listCompany();
											   
											   foreach($compObj as $comp){
												   
											  ?>
            <li><a href="#"><?php echo $comp->getName() ?></option>
											  
											 </a></li> <?php }?>
            
          </ul>
        </li>
        <li><a href="work.php">How it Works</a></li>
        <li><a href="buy-bids.php">Buy Bids</a></li>
        <li><a href="help.php">Help</a></li>
        <li><a href="account.php"><span>My Account</span></a>
        	<ul>
            <li><a href="myboard.php">My Board</a></li>
            <li><a href="payment-info.php">My Payment Info</a></li>
        </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>
 <?php 



}?>
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
    <div class="col-md-4">
      <div class="upcom">
        <h3>UPCOMING PRODUCTS</h3>
        <br>
        <script type="text/javascript">
$(document).ready(function(){
  $('.slider8').bxSlider({
    mode: 'vertical',
    slideWidth: 300,
    minSlides: 1,
    slideMargin: 10
  });
});
</script>
        <div class="slider8">
          <div class="slide"><img src="images/beats.jpg"></div>
          <div class="slide"><img src="images/laptop.jpg"></div>
          <div class="slide"><img src="images/iphone.jpg"></div>
          <div class="slide"><img src="images/led.jpg"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>

<!-- products part -->
<div class="container cont-box"> 
  <!-- product item column -->
  <?php 
				 
				    $i=0;
								   if($pagesettingObj->getPagenum()>1){
					   		 $i+=6*($pagesettingObj->getPagenum()-1);
					      }
				 foreach($productsList as $product){
									$i++;
							  ?>  
  <!-- product item column -->
    <form action="#<?php echo $product->getId()?>" method="post"  name="frm"  enctype="multipart/form-data" class="<?php echo ($bid->getProduct_id() == $product->getId())?"active_bid":""; ?>">		
  <div class="col-md-3">
  <div id="<?php  echo $product->getId() ?>"></div>
    <div class="prod-box">
      <div class="bids"><?php echo $product->getBid();?> Bids</div>
       <div class="bids_required_to_win" style=" background-color:white;display:none; "> Bids Required To Win <?php echo $bid_required_to_win; ?>		
       <div style="color:black;">
       <h3>Features:</h3>
       <ul>
       <li>
       a
       </li>
       <li>
       a
       </li>
      
       </ul>
                <a href="product_details.php?id=<?php echo $product->getId() ?>" 
                class="more_details">Product Info</a>
		</div> 	
</div>
       <input type="hidden" name="bid" value="<?php echo $product->getBid() ?>" >
<?php $total_bid=$product->getBid() ;
	        $current_id=$product->getCurrent_bid_number();
			//$bid_required_to_win=$total_bid-$current_id;
			//$bid_in_percentage=($current_id/$total_bid)*100;
			//echo $bid_in_percentage;
	  
	  ?>
      
      <!-- flip -->
      <div>
        <div class="blackP">
          <div class="dis"> <strong><?php echo $product->getName();?></strong><br>
            Value $<?php echo $product->getPrice(); ?></div>
            <input type="hidden" name="product_id" value="<?php echo $product->getId() ?>" >

                     <input type="hidden" name="price" value="<?php echo $product->getPrice() ?>" >

          <div class="imag"> <?php if(file_exists("uploadedimages/thumb/".$product->getImage())&&($product->getImage()!=''))
							{ ?>
                      <img src="uploadedimages/thumb/<?php echo $product->getImage();?>" />
					  <?php }else
						{ ?>
						<img src="images/nopic.jpg" />
					<?php	}
					  ?>
            <p>Item # E5836</p>
          </div>
                               <input type="hidden" name="current_bid_number" value="<?php echo $product->getCurrent_bid_number() ?>" >

        </div>
        <p class="but"><input  class="quickFlipCta btn-green" type="submit"   id="apply" name="submit"  value="Apply Bid"><input name="fill" class="btn-gray"  type="submit" id="fill" value="FILL IT UP"> </p>
        <!--<div class="redPanel">
          <h3 class="first quickFlipCta">QuickFlip 2</h3>
         

          <h4>A plugin for jQuery</h4>
          <p><em>By Jon Raasch</em></p>
          <p><a href="#">More About QuickFlip</a> </p>
          <p><a href="#" class="quickFlipCta">Click to see QuickFlip in action</a></p>
        </div>-->
      </div>
    </div>
  </div>
  </form>
   <?php } ?>
  <!-- end of product item column -->
  

  <div class="col-md-12 pages"><a href="#">Previous</a><a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">Next</a></div>
</div>

<!-- footer -->
<?php include "includes/footer.php"; ?>
</html>