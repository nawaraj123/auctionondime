<?php 

   include_once('Dbconnection/db_conn.php');
   
   include_once('admin/classes/news.php');
   
   $newsObj=new News();
   
   $frontnews=$newsObj->listNews();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Dristi</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>

<!--[if IE]>
<link href="css/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css"
href="css/stylecopy.css">
<![endif]-->

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
                			 
				
				  <?php 
									    $i=0;
											foreach($frontnews as $news){
										 if($i++==5)
					                      break;
										  
					                     ?>
										  <div class="content">
							      <?php    if($news->getImage()==""){?>
                                           
                                          
										  <h2><?php echo $news->getHeading() ?></h2>
										  <?php echo $news->getdetail() ?> <br />
										  <a href="view_news.php?id=<?php echo $news->getId() ?>"><input type="button" value="Read More" class="read_btn"></a>
                                          
									
                                          <?php }else{?>
                                           
                                        
						               <img align="left" src="uploadedimages/original/<?php echo $news->getImage() ?>" height="100px" width="130" hspace="5" />
										  <h2><?php echo $news->getHeading() ?></h2>
										<?php echo $news->getdetail() ?><br />
										  <a href="view_news.php?id=<?php echo $news->getId() ?>"><input type="button" value="Read More" class="read_btn"></a>
									
                                          <?php }
										  echo"</div>";
										  }?>
				<!-- <img src="images/juniper.jpg" align="left" />
				 <h2>Title of the news</h2><br />
                    Juniper Networks specializes in high-performance network infrastructure that is designed to help businesses create an environment for accelerating the deployment of services and applications over a single network.

Juniper delivers a high-performance network that enables the business, accelerating growth and innovation, while creating operational efficiencies and cost savings.

Dristi Tech is an authorized Juniper J Partner.
<br />
<a href="#"><input type="button" value="Read More" class="read_btn"></a>
                 </div> -->
				 
				 
            <!-- Body Contents Ends-->	
		 
		  <div class="clearfix"></div> 

		 
		
		<!-- Footer Section -->
		    <?php include('common/footer.php'); ?>
		<!-- Footer section ends -->

	 </div>
	 
	 
  <!-- Body contents wrapper Ends-->
</body>
</html>
