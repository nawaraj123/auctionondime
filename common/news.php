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
<!--[if IE]>
<link href="css/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<link rel="stylesheet" type="text/css" href="style1.css" />


<script type="text/javascript" src="ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	 //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>
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
                                           
                                          
										  <h2><a href="#" class="heading"><?php echo $news->getHeading() ?></h2></a>
										  <?php echo $news->getdetail() ?> <br />
										  <a href="view_news.php?id=<?php echo $news->getId() ?>"><input type="button" value="Read More" class="read_btn"></a>
                                          
									
                                          <?php }else{?>
                                           
                                        
						               <img align="left" src="admin/<?php echo $news->getImage() ?>" height="100px" width="150px" hspace="5" />
										  <h2><a href="#" class="heading"><?php echo $news->getHeading() ?></h2></a>
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
