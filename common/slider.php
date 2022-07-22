<?php 
 include_once('Dbconnection/db_conn.php');
 
 include_once('Dristi_ad_test/classes/banner.class.php');
 
 $bannerObj=new banner();
 
 $newbanner=$bannerObj->displayfront();
?>
<script type="text/javascript">
 $(document).ready( function(){	
		var buttons = { previous:$('#featuredslider .previous') ,
						next:$('#featuredslider .next') };
						
		$obj = $('#featuredslider').lofJSidernews( { interval : 4000,
												direction		: 'opacity',	
											 	easing			: 'easeOutBounce',
												duration		: -5000,
												auto		 	: true,
												mainWidth       : 980,
												buttons			: buttons} );	
	});
</script>
<link rel="stylesheet" type="text/css" href="css/slider.css" />
<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery.easing.js"></script>
<script language="javascript" type="text/javascript" src="js/script.js"></script>
<div id="slider-container">
    		
<!------------------------------------- THE CONTENT ------------------------------------------------->
<div id="featuredslider" class="slidecontent" style="width:980px; height:300px;">

<div class="preload"><div></div></div>

 <!-- MAIN CONTENT --> 
  <div class="main-outer" style="width:980px; height:300px;">
  
    <div onclick="return false" href="" class="previous">Previous</div>
    
  	<ul class="main-wapper">
  		
		  <?php 
	 
         $i=0;
      foreach($newbanner as $banner){
		$i++;
   
      ?>
       <li>
         
      <?php 
	  
       if(($banner->getHeading()))
       { ?> 
       	<img src="uploadedimages/original/<?php echo $banner->getImage(); ?>" alt="Slideshow Image <?php echo $i; ?>"  />
         <div class="main-item-desc">
           <h2><?php echo $banner->getHeading(); ?></h2>
           <p><?php echo $banner->getDisciption(); ?>
				
				 <?php if(($banner->getDisciption()))
				 
							   { ?>
				
                <a class="readmore" href="<?php echo $banner->getLink();?>">Read more </a>
				<?php } ?>
                </p>
         </div>
              <?php  }?>
			
            
              <img src="uploadedimages/original/<?php echo $banner->getImage();?>" alt="Slideshow Image <?php echo   $i; ?>"  />
          	  
          <?php } ?>
           </li> 
      </ul>  	
         <div onclick="return false" href="" class="next">Next</div>
  </div>
 
 </div> 

<!------------------------------------- END OF THE CONTENT ------------------------------------------------->
</div>
