<?php
include_once('Dristi_ad_test/classes/subcategory.php');
 include_once('Dristi_ad_test/classes/product.php');
$subObj=new SubCategory();
$subList=$subObj->listSubCategory();
$sideproduct=new Product();	  

	  ?>
 <div class="sidebarmenu">
<div class="title"><h1>Product Categories</h1></div>
 
  
	<?php foreach($subList as $newsub){ ?>
  
	
		<a class="menuitem submenuheader" href=""><?php echo $newsub->getSubName()?></a>
       
		<?php	$listcatpro=$sideproduct->getFrontCat($newsub->getId()); ?>
			 <div class="submenu">
              <ul>
		<?php	foreach($listcatpro as $catpro){ ?>
			
			
		
             <span> <a href="product_details.php?id=<?php echo $catpro->getId() ?>&s=1" panel=0><?php echo $catpro->getName();?></a></span>
             <br />
			
			<?php } ?>
            </ul>
		 </div>
                              
                              
                              
		
	
	 <?php } ?>
	
 
                 </div>
                           
                     
					 
    
