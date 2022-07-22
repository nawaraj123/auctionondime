<?php
    include_once('Dbconnection/db_conn.php');
	include_once('session.php');

   include_once('admin/classes/product.php');
   include("admin/classes/front.php");
include_once('admin/classes/subcategory.php');
include_once('admin/classes/alliance.php');
include_once('admin/classes/company.php');
	include_once('admin/classes/Pagesettings.classes.php');
	require_once("./include/membersite_config.php");


if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

    $product=new Product();
	$pagesettingObj=new Pagesettings();
	 $pagesettingObj->setSelf('products.php');
	 if(!empty($_GET['page']))
    {
	$pagesettingObj->setPagenum($_GET['page']);	
	}
	else
    {
   $pagesettingObj->setPagenum(1);
    }
  $pagesettingObj->setRowsperpage(8); 
  $pagesettingObj->getPageno(1,'tbl_product');
  $pagesettingObj->setOffset($pagesettingObj->getPagenum());
  $productsList=$product->listProduct($pagesettingObj->getOffset(),$pagesettingObj->getRowsperpage());	
 
?>
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

  <script src="js/modernizr.js"></script>

    <!--[if (gt IE 8) | (IEMobile)]><!-->
    <link rel="stylesheet" href="css/step4.css">
    <!--<![endif]-->
    <!--[if (lt IE 9) & (!IEMobile)]>
    <link rel="stylesheet" href="css/ie.css">
    <![endif]-->
</head>

<body>
<!-- header part -->
<header>
  <div class="container">
    <div class="col-md-3 logo">
   




<br><br><br>
<p></p>
      <h1>Auction on <br>
        A Dime</h1>
    </div>
    <div class="col-md-6 head-mid">
      <p>(Note on slide show below:
        There are three images in the banner . Each image would b a slide that shows up in the middle of the page to make up a 3 image slide show.)</p>
    </div>
   
    
            <a class="nav-btn" id="nav-open-btn" href="#nav">Menu</a>
  </header>

<!-- end of header part --> 
<div id="main" role="main">
<!-- navigation menu part -->

<nav id="nav" role="navigation">
        <div class="block">
            <h2 class="block-title">Menu</h2>
            <ul>
                <li class="is-active">
                     <a href="index.php">Home</a>
                </li>
            <li>
                    <a href="#">Categories</a>
                </li>
             <li>
                    <a href="#">How It Works</a>
                </li>
             <li>
                    <a href="#">Buy Bids</a>
                </li>
             <li>
                    <a href="#">Help</a>
                </li>
            </ul>
            <a class="close-btn" id="nav-close-btn" href="#top">Return to Content</a>
        </div>
    </nav>
<!-- end of navigation part --> 

<!-- banner part -->
<div class="banner"> </div>
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
							  
							  
							
							
                     
<!--							  <p> <?php echo $product->getDetail(); ?> </p>
--><!--                      <a href="product_details.php?id=<?php echo $product->getId() ?>" class="more_details">Product Details</a>
-->							   
							  
							 
  <div class="col-md-3">
    <div class="prod-box">
      <div class="bids"><?php echo $product->getBid();?> Bids</div>
      <div class="dis"> <strong><?php echo $product->getName();?></strong><br>
        Value $<?php echo $product->getPrice(); ?></div>
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
      <div class="but">
        <input name="apply" class="btn-green" type="button" id="apply" value="Apply Bid">
        <input name="fill" class="btn-gray" type="button" id="fill" value="Fill it up">
      </div>
    </div>
  </div>
   <?php } ?>
  <!-- end of product item column -->
  
  <!--<div class="col-md-3">
    <div class="prod-box">
      <div class="bids">4000 Bids</div>
      <div class="dis"> <strong>Beats by Dre Studio Headphones</strong><br>
        Value $199.99</div>
      <div class="imag"> <img src="images/pic2.jpg" >
        <p>Item # E5836</p>
      </div>
      <div class="but">
        <input name="apply" class="btn-green" type="button" id="apply" value="Apply Bid">
        <input name="fill" class="btn-gray" type="button" id="fill" value="Fill it up">
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="prod-box">
      <div class="bids">4000 Bids</div>
      <div class="dis"> <strong>Beats by Dre Studio Headphones</strong><br>
        Value $199.99</div>
      <div class="imag"> <img src="images/pic3.jpg" >
        <p>Item # E5836</p>
      </div>
      <div class="but">
        <input name="apply" class="btn-green" type="button" id="apply" value="Apply Bid">
        <input name="fill" class="btn-gray" type="button" id="fill" value="Fill it up">
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="prod-box">
      <div class="bids">4000 Bids</div>
      <div class="dis"> <strong>Beats by Dre Studio Headphones</strong><br>
        Value $199.99</div>
      <div class="imag"> <img src="images/pic4.jpg" >
        <p>Item # E5836</p>
      </div>
      <div class="but">
        <input name="apply" class="btn-green" type="button" id="apply" value="Apply Bid">
        <input name="fill" class="btn-gray" type="button" id="fill" value="Fill it up">
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="prod-box">
      <div class="bids">4000 Bids</div>
      <div class="dis"> <strong>Beats by Dre Studio Headphones</strong><br>
        Value $199.99</div>
      <div class="imag"> <img src="images/pic5.jpg" >
        <p>Item # E5836</p>
      </div>
      <div class="but">
        <input name="apply" class="btn-green" type="button" id="apply" value="Apply Bid">
        <input name="fill" class="btn-gray" type="button" id="fill" value="Fill it up">
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="prod-box">
      <div class="bids">4000 Bids</div>
      <div class="dis"> <strong>Beats by Dre Studio Headphones</strong><br>
        Value $199.99</div>
      <div class="imag"> <img src="images/pic6.jpg" >
        <p>Item # E5836</p>
      </div>
      <div class="but">
        <input name="apply" class="btn-green" type="button" id="apply" value="Apply Bid">
        <input name="fill" class="btn-gray" type="button" id="fill" value="Fill it up">
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="prod-box">
      <div class="bids">4000 Bids</div>
      <div class="dis"> <strong>Beats by Dre Studio Headphones</strong><br>
        Value $199.99</div>
      <div class="imag"> <img src="images/pic7.jpg" >
        <p>Item # E5836</p>
      </div>
      <div class="but">
        <input name="apply" class="btn-green" type="button" id="apply" value="Apply Bid">
        <input name="fill" class="btn-gray" type="button" id="fill" value="Fill it up">
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="prod-box">
      <div class="bids">4000 Bids</div>
      <div class="dis"> <strong>Beats by Dre Studio Headphones</strong><br>
        Value $199.99</div>
      <div class="imag"> <img src="images/pic8.jpg" >
        <p>Item # E5836</p>
      </div>
      <div class="but">
        <input name="apply" class="btn-green" type="button" id="apply" value="Apply Bid">
        <input name="fill" class="btn-gray" type="button" id="fill" value="Fill it up">
      </div>
    </div>
  </div>-->
  <div class="pages"><a href="#">&lt;&lt;Previous</a><a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">Next&gt;&gt;</a></div>
</div>
<!-- footer -->
<footer>
  <div class="container">
    <div class="col-md-4">Copyright &copy; 2015 by Auction on
      A Dime<br>
      All Rights Reserved.</div>
    <div class="col-md-4 social">Find us on <br>
      <p><a href="#"><i class="fa fa-facebook-square"></i></a> <a href="#"><i class="fa fa-twitter-square"></i></a> <a href="#"><i class="fa fa-google-plus-square"></i></a> <a href="#"><i class="fa fa-linkedin-square"></i></a> <a href="#"><i class="fa fa-youtube-square"></i></a> <a href="#"><i class="fa fa-pinterest-square"></i></a> </p>
    </div>
    <div class="col-md-4">Powered by <br>
      YKM SOLUTION </div>
  </div>
</footer>
<!-- end of footer --> 
</div>
<!-- end of products part -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>