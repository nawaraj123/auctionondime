<?php 
	
   include_once('Dbconnection/db_conn.php');
   include_once('admin/classes/product.php');
   include("admin/classes/front.php");
include_once('admin/classes/subcategory.php');
include_once('admin/classes/alliance.php');
include_once('admin/classes/company.php');
	include_once('admin/classes/Pagesettings.classes.php');
	
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
  $pagesettingObj->setRowsperpage(6); 
  $pagesettingObj->getPageno(1,'tbl_product');
  $pagesettingObj->setOffset($pagesettingObj->getPagenum());
  $productsList=$product->listProduct($pagesettingObj->getOffset(),$pagesettingObj->getRowsperpage());	   
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Dristi</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<!--[if IE]>
<link href="css/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css"
href="css/stylecopy.css">
<![endif]-->
<!--[if gte IE 9]>
<link rel="stylesheet" type="text/css"
href="css/ie9.css">
<![endif]-->


<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>







</head>

<body>

  <!-- Header Here -->
     <?php include('common/header.php'); ?>
  <!-- Header Here -->
  
  <!-- Body contents wrapper-->
     <div id="body-wrapper">
	     
		 <!-- Slider section -->
		   <?php include('common/slider.php'); ?>
		 <!-- Slider section Ends-->
		 
		 <!-- Body Contents -->
             <div id="content-wrapper">
             
  
             
                              <?php include('common/sidenav.php') ?>
                <div id="right_conts"><!-- Products list -->
                           <h1>Our Products</h1><hr /><br/>
				 <?php 
				 
				    $i=0;
								   if($pagesettingObj->getPagenum()>1){
					   		 $i+=6*($pagesettingObj->getPagenum()-1);
					      }
				 foreach($productsList as $product){
									$i++;
							  ?>
							  
							  
							 <div class="items">
							<?php if(file_exists("uploadedimages/thumb/".$product->getImage())&&($product->getImage()!=''))
							{ ?>
                      <img src="uploadedimages/thumb/<?php echo $product->getImage();?>" height="80",width="100"/>
					  <?php }else
						{ ?>
						<img src="images/nopic.jpg" height="80",width="100"/>
					<?php	}
					  ?>
                      <h1><?php echo $product->getName();?></h1> 
							  <p> <?php echo $product->getDetail(); ?> </p>
                      <a href="product_details.php?id=<?php echo $product->getId() ?>" class="more_details">Product Details</a>
							   </div>  
							  
							  <?php } ?>
                 <!--  <div class="items">
                      <img src="images/product.jpg" />
                      <h1>Product Name</h1>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                      Aenean ac purus eget odio feugiat dictum quis non metus. </p>
                      <a href="#" class="more_details">Product Details</a>
                   </div>
                   
                   <div class="items">
                      <img src="images/product.jpg" />
                      <h1>Product Name</h1>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                      Aenean ac purus eget odio feugiat dictum quis non metus. </p>
                      <a href="#" class="more_details">Product Details</a>
                   </div>
                   
                   <div class="items">
                      <img src="images/product.jpg" />
                      <h1>Product Name</h1>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                      Aenean ac purus eget odio feugiat dictum quis non metus. </p>
                      <a href="#" class="more_details">Product Details</a>
                   </div>
                   
                   <div class="items">
                      <img src="images/product.jpg" />
                      <h1>Product Name</h1>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                      Aenean ac purus eget odio feugiat dictum quis non metus. </p>
                      <a href="#" class="more_details">Product Details</a>
                   </div>
                   
                   <div class="items">
                      <img src="images/product.jpg" />
                      <h1>Product Name</h1>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                      Aenean ac purus eget odio feugiat dictum quis non metus. </p>
                      <a href="#" class="more_details">Product Details</a>
                   </div>
                   
                   <div class="items">
                      <img src="images/product.jpg" />
                      <h1>Product Name</h1>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                      Aenean ac purus eget odio feugiat dictum quis non metus. </p>
                      <a href="#" class="more_details">Product Details</a>
                   </div>-->
                   
                </div><!-- Products list Ends -->
                
          <div id="pagination-wrapper"><!-- Pagination -->
			
                    <ul id="page">
	<?php echo $pagesettingObj->getFirst().'&nbsp;&nbsp;'.$pagesettingObj->getPrev().'&nbsp;&nbsp;';
	if($pagesettingObj->getMaxpage()>1)
	echo $pagesettingObj->getNav();
	echo '&nbsp;&nbsp;'.$pagesettingObj->getNext().'&nbsp;&nbsp;'.$pagesettingObj->getLast(); ?>
                  <!--  <a href="#"><li>Prev</li></a>
                    <a href="#"><li class="active">01</li></a>
                    <a href="#"><li>02</li></a>
                    <a href="#"><li>03</li></a>
                    <a href="#"><li>04</li></a>
                    <a href="#"><li>05</li></a>
                    <a href="#"><li>06</li></a>
                    <a href="#"><li>07</li></a>
                    <a href="#"><li>08</li></a>
                    <a href="#"><li>09</li></a>
                    <a href="#"><li>10</li></a>
                    <a href="#"><li>Next</li></a>-->
                    </ul>
                </div><!-- Pagination -->
                
                <div class="clearfix"></div>
                
             </div>
		 <!-- Body Contents Ends-->	
		 
		  <div class="clearfix"></div> 

		 
		
		<!-- Footer Section -->
		    <?php include('common/footer.php'); ?>
		<!-- Footer section ends -->

	 </div>
	 
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1", {defaultTab: params.tab ? params.tab : 0});
var Accordion1 = new Spry.Widget.Accordion("Accordion1", {defaultPanel: params.acc1 ? params.acc1: 0});
var Accordion2 = new Spry.Widget.Accordion("Accordion2", {defaultPanel: params.acc2 ? params.acc2: 0});
var Accordion3 = new Spry.Widget.Accordion("Accordion3", {defaultPanel: params.acc3 ? params.acc3: 0});
</script>
  <!-- Body contents wrapper Ends-->
</body>
</html>
