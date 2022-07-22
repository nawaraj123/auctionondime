<?php 
include_once('Dristi_ad_test/classes/front.php');
$frontObj=new front();  ?>
<div id="footer-wrapper">
		
		<div style="position:absolute; top:-10px; z-index:100; left:20px;"><center><img src="images/divider.png" border="0"></center></div>
		
		  <div id="footer">
		  
		     <div class="footer_cont">
			 	<?php $front=$frontObj->frontbyposition("footer left"); ?>
				<h1><?php echo $front->getHeading(); ?></h1>
                
					 
			    
			   <!-- <h1>Client Testimonials</h1> -->
			<div class="divide_footer"><img src="images/divide-footer.jpg" /></div>

				<blockquote>
				 <?php  
				  			echo strip_tags($front->getDescription(),'<li><a>');
						?></br>
                        <a href="testimonials.php"  class="color_orange">Readmore</a>
                        
				<!--   “Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
				   Aenean ac purus eget odio feugiat dictum quis non metus. 
				   Etiam ornare purus vel risus pharetra egestas. 
				   Mauris ut risus eget tellus varius hendrerit convallis vel dui. “ -->
				</blockquote>
			 </div>
			 
			 <div class="footer_cont">
			  	<?php $front=$frontObj->frontbyposition("footer middle"); ?>
				<h1><?php echo $front->getHeading(); ?></h1>
			   <!-- <h1>Trainings and Courses</h1>-->
				
				<div class="divide_footer"><img src="images/divide-footer.jpg" /></div>

				<ul class="listing">
				  <!-- <li><a href="#">Basic Networking </a></li>
				   <li><a href="#">Basic Linux Training </a> </li>
				   <li><a href="#">CCNA (Cisco Certified Network Associate) </a></li>
				   <li><a href="#">ISP Essential (System and Network Dristi_ad_testistration) </a></li>-->
				    <?php  
				  			echo strip_tags($front->getDescription(),'<li><a>');
						?>
				</ul>
				
			 </div>
			 
			 <div class="footer_cont">
			   	<?php $front=$frontObj->frontbyposition("footer right"); ?>
				<h1><?php echo $front->getHeading(); ?></h1>
			  <!-- <h1>About Dristi Tech</h1> -->
			   
			   <div class="divide_footer"><img src="images/divide-footer.jpg" /></div>

			   <ul class="listing">
			     <?php  
				  			echo trim(strip_tags($front->getDescription(),'<li><a>'));
						?>
				   <!--<li><a href="#">Our services</a></li>
				   <li><a href="#">Our Products</a></li>
				   <li><a href="#">Our Alliances</a></li>
				   <li><a href="#">Our Customers</a></li>
				   <li><a href="#">Trainings and Courses</a></li>-->
				</ul>
			 </div>
			 
			 <div id="footer_final">
		  <p class="credits"> <?php $front=$frontObj->frontbyposition("Footer Bottom"); ?> <?php  
				  			echo strip_tags($front->getDetail(),'<li><a>');
						?></p>
		  
		   <p class="links">
		    <?php $front=$frontObj->frontbyposition("Footer Bottom"); ?> <?php  
				  			echo strip_tags($front->getDescription(),'<li><a>');
						?></p>
		   </p>
		</div>  
		
		<div class="clearfix"></div>
		   
		  </div>
		 
</div>  