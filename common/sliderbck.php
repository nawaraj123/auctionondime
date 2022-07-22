<?php 
 include_once('Dbconnection/db_conn.php');
 
 include_once('uploadedimages/thumb/classes/banner.php');
 
 $bannerObj=new banner();
 
 $newbanner=$bannerObj->displayfront();
?>


<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>

<script type="text/javascript">

/*** 
    Simple jQuery Slideshow Script
    Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
***/

function slideSwitch() {
    var $active = $('#slideshow DIV.active');

    if ( $active.length == 0 ) $active = $('#slideshow DIV:last');

    // use this to pull the divs in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow DIV:first');

    // uncomment below to pull the divs randomly
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
});

</script>

<style type="text/css">

/*** set the width and height to match your images **/

#slideshow {
    position:relative;
    height:300px;
	width:970px;
	overflow:hidden;
	margin:5px auto;

}

#slideshow DIV {
    position:absolute;
    top:0;
    left:0;
    z-index:8;
    opacity:0.0;
    height: 300px;
    background-color: #FFF;
}

#slideshow DIV.active {
    z-index:10;
    opacity:1.0;
}

#slideshow DIV.last-active {
    z-index:9;
}

#slideshow DIV IMG {
    height: 300px;
	width:970px;
	border-radius:5px;
    display: block;
    border: 0;
    margin-bottom: 10px;
}

#slideshow DIV .caption {
    width:300px; 
    height:auto; 
    position:absolute; 
    top:100px; 
    left:40px; 
    opacity:0.8; 
    z-index:1000; 
    padding:5px;
    background:#000000; 
}

#slideshow p{opacity:0.9; color:#FFF;}
#slideshow h1 {opacity:0.9; color:#FF0000;}
    
</style>



<div id="slider-wrapper"> <!--Slider-->

  <div id="slideshow">
    <?php 
	 
         $i=0;
      foreach($newbanner as $banner){
		$i++;
   
      ?>
      
       <div class="active">
       
       <?php
       if(($banner->getHeading()))
       { ?> 
         <div class="caption">
           <img src="uploadedimages/thumb/<?php echo $banner->getImage()?>" alt="Slideshow Image <?php echo $i; ?>"  />
		   <h1><?php echo $banner->getHeading(); ?></h1>
				 			   <p> <?php echo $banner->getDisciption(); ?> </p>
							   <?php if(($banner->getDisciption()))
							   { ?>
							   	 <ul class="listing"><li><a href=<?php echo $banner->getLink();?>>Read more</a></li></ul>
								<?php } ?>
         </div>
              <?php  }?> 
              
              <img src="uploadedimages/thumb/<?php echo $banner->getImage()?>" alt="Slideshow Image <?php echo $i; ?>"  />
              
 
	
    </div>
                   
                   <?php } ?>
	 
  </div>           		
</div>