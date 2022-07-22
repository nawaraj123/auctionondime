<?php   
include_once('Dbconnection/db_conn.php');
include("admin/classes/front.php");
include_once('admin/classes/subcategory.php');
include_once('admin/classes/alliance.php');
include_once('admin/classes/company.php');
include_once('admin/classes/product.php');

$proObj=new Product();
 if(!empty($_GET['id']))
    {
		 $productde=$proObj->getProduct($_GET['id']);
	}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Dime </title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<!--[if IE]>
<link href="css/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
</head>

<body>
  
  
  <!-- Body contents wrapper-->
     <div id="body-wrapper">
	     
		 
		 
		 <!-- Body Contents -->
             <div id="content-wrapper">
			 
			

                <div id="right_conts"><!-- Products Details -->
				
			<div id="order-wrapper">
			<?php if(file_exists("uploadedimages/thumb/".$productde->getImage())&&($productde->getImage()!='')) { ?>
				 <img src="<?php echo "uploadedimages/original/".$productde->getImage() ?>" align="left" border="3" height="80" />
           <?php }else
			{
		   ?>
					<img src="images/nopic.jpg" align="left" border="5" />
			<?php } ?>
				   <div class="product_detail">
				    <h1><?php echo $productde->getName() ?></h1>
			
					<?php if($productde->getOprice()) { ?>
					<p>Price: NPR <strike style="color:#0B0;"> <?php echo $productde->getPrice() ?></strike> /-</p>
							<p>Offered Price: NPR  <?php echo $productde->getOprice() ?> /-</p>
						<?php } else {?>
							<p>Price: NPR <?php echo $productde->getPrice() ?> /-</p> 
					<?php } ?>
			 
					<!--<a href="orderform.php?id=<?php echo $productde->getId(); ?> "><input type="button" class="order" value="Order Now"></a>-->
				  </div>
				  
				  <div class="clearfix"></div>
			</div>	  
				  <br />
				  <h2>Product Specifications</h2><hr />
				  <p><?php echo $productde->getDescription() ?> </p>
				  <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ac purus eget odio feugiat dictum quis non metus. Etiam ornare purus vel risus pharetra egestas. Mauris ut risus eget tellus varius hendrerit convallis vel dui. Vestibulum ipsum lacus, scelerisque quis porttitor id, ultricies consequat ipsum. </p>
				  <br />
				  <p>Suspendisse metus erat, laoreet id tincidunt et, imperdiet a nibh. Sed porttitor, ligula ut luctus feugiat, arcu arcu consequat arcu, eget euismod augue justo ut nunc. Morbi pulvinar urna eget tortor placerat vel tristique erat tincidunt. Proin justo urna, rutrum vitae auctor sit amet, blandit ut mi. Sed rutrum lectus a dolor pretium sed mollis diam vestibulum. Morbi elementum, sapien ac condimentum suscipit, lectus quam fermentum neque, eget rhoncus tellus dolor in turpis. Vivamus eleifend imperdiet odio, at lacinia nisi varius nec. Integer tempor hendrerit arcu, at cursus orci varius sed. Mauris in magna in nulla eleifend dapibus. Aenean tellus quam, sagittis ac facilisis bibendum, molestie id libero.

Nulla vel mauris eget erat laoreet blandit sagittis dictum nibh. Donec non odio augue, in tempus augue. Vestibulum lorem massa, hendrerit eget mollis a, facilisis non risus.</p>
                --></div>
                <!-- Products Details Ends -->

                <div class="clearfix"></div>
                
             </div>
		 <!-- Body Contents Ends-->	
		 
		  <div class="clearfix"></div> 

		 
		
		<!-- Footer Section -->
		  
		<!-- Footer section ends -->

	 </div>
	 
	 
  <!-- Body contents wrapper Ends-->
</body>
</html>
