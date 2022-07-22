<?php  include("Dbconnection/db_conn.php");
include_once('uploadedimages/thumb/classes/menu.php');
include_once('uploadedimages/thumb/classes/submenu.php');
  include_once('uploadedimages/thumb/classes/trimenu.php');
  	include_once('uploadedimages/thumb/classes/subcategory.php');
	  	include_once('uploadedimages/thumb/classes/company.php');

		$comp=new Company();
		$compObj=$comp->listCompany();
  	$subObj=new SubCategory();
	$subList=$subObj->listSubCategory();
$menuObj=new Menu();
$menu=$menuObj->display();
	  
	  
  global $search;

?>

    <div id="header-wrapper">
	    <div id="header">
		   <div id="header_left">
		     <a href="index.php"> <img src="images/logo.jpg" alt="" height="55" width="133" border="0" /></a>
             
		   </div>
          
           
		   <div id="header_right">
		     <div id="callus">
             <div class="facebook">
          <a href="www.facebook.com" title="Send to Facebook" class="border">Facebook</a>
          
          </div>
           <div class="twitter">
           <a href="www.twitter.com" title="Send to Twitter" class="border">Twitter</a>
           </div>
            <div class="youtube">
           <a href="www.youtube.com" title="Send to YouTube" class="border">YouTube</a>
           </div>
           
		<table>
                <tr><td colspan="2"><h4>Call us now: +97714427949</h4></td></tr>
                <tr>
                  <form action="searchResults.php" method="post">
                     <td><input type="text" value ="<?php  echo $search; ?>"  name="search" class="search" /></td>
                     <td><input class="read_btn" type="submit" value="Search" /></td>
                   </form>  
                </tr>
                </table>    
			 </div>
		   
		      
			  <div id="menu">
			      <ul class="nav">
				     <?php
			 			$i=0;
						foreach($menu as $menus){
					 	$submenuListDisplay=Submenu::getSubmenuForMenu($menus->getId());
					   	$i++;
				   	?>
                  
                   <?php if($menus->getLink()!="")
				   			{?>
                	<li><a href="<?php echo $menus->getlink() ?>"><?php echo $menus->getMenu() ?></a>
                    <?php }
					
					else{
					?>
                     <li><a href="menudetails.php?type=Mainmenu&id=<?php echo $menus->getId() ?>"><?php echo $menus->getMenu() ?></a>
                   	<?php } ?>
						   
					<?php   
						if(sizeof($submenuListDisplay)>0)
						{    
							if($i>=5)
								{
								echo "<ul class=\"nav_right\">";
								}
							else
							   {
								echo "<ul class=\"nav_left\">";
							   }
						   ?>
					
                    <li>
							<?php 
							$j=0;
							foreach($submenuListDisplay as $submenuList)
							{ 
								$j++;
								$trymenuListDisplay=Trimenu::displayForSubmenu($submenuList->getId());
								?>
								<?php if($j>1) 
									{ ?>   
								<div class="divide"></div> 
									<?php } ?>
                                    <div class="sub">
									<?php if($submenuList->getLink()!="")
									{?>
									<h1><a href="<?php echo $submenuList->getlink() ?>"><?php echo $submenuList->getSub_menu() ?></a></h1>
                     				<?php }
									
									else{?>
         <h1><a href="menudetails.php?type=Mainmenu&id=<?php echo $submenuList->getId() ?>"><?php echo $submenuList->getSub_menu() ?></a></h1>
                     	<?php } ?>
								
                                
                                <ol class="listing">
									<?php  if(sizeof($trymenuListDisplay)>0) { ?>
											
									<?php foreach($trymenuListDisplay as $trymenuList){ ?>
										
									<?php if($trymenuList->getLink()!=""){?>
                                    
							<li><a href="<?php echo $trymenuList->getlink() ?>"><?php echo $trymenuList->getTri_menu() ?></a></li>
                     				<?php } 
									
							else{?>
								<?php if(!strcmp(strtolower($submenuList->getSub_menu()),'categories'))
									{
									foreach($subList as $newsub)
									{ ?>
									<li><a href="categories.php?id=<?php echo $newsub->getId() ?>"><?php echo $newsub->getSubName() ?></a></li> 
									<?php 
									}  //this is a place for category. 
							}
						else if(!strcmp(strtolower($submenuList->getSub_menu()),'brands'))
								{
								foreach($compObj as $company){ ?>
								  <li><a href="brands.php?id=<?php echo $company->getId() ?>"><?php echo $company->getName() ?></a></li> 
								<?php  //this is a place for brands.
								}
							}
                                
						 else {?>
																					
		<li><a href="menudetails.php?type=Mainmenu&tid=<?php echo $trymenuList->getId() ?>"><?php echo $trymenuList->getTri_menu() ?></a></li>
                     <?php  } ?> 
																			
					<?php }//end of else statement
						}
					}
					?>
                 
					</ol>
                      
					</div>
					<?php	}  ?>
					<div class="clearfix"></div>
                    
					</li>
                   
					</ul>
					<?php  } 	 ?>
					</li>
					<?php }  ?>
					 
				
			
				  <!--   <li><a href="#">Home</a></li>
					 <li><a href="#">About us</a></li>
					 <li><a href="#">Services</a></li>
					 
					<li><a href="#">Products</a>
					      <ul class="nav_left">
						     <li>
							     <div class="sub">
								    <h1>Brands</h1>
									<ol class="listing">
								      <li><a href="#">Cisco</a></li>
									  <li><a href="#">AAAA</a></li>
									  <li><a href="#">BBBB</a></li>
									  <li><a href="#">Wireless Survey and Installation</a></li>
									  <li><a href="#">Smoethings</a></li>
									  <li><a href="#">Smoethings</a></li>
									  <li><a href="#">Smoethings</a></li>
									  <li><a href="#">Smoethings</a></li>
								   </ol>
								 </div>
								 
								 <div class="divide"></div>
								 
								 <div class="sub">
								    <h1>Category</h1>
									<ol class="listing">
								      <li><a href="#">Cisco</a></li>
									  <li><a href="#">AAAA</a></li>
									  <li><a href="#">BBBB</a></li>
									  <li><a href="#">Network Architecture and Design</a></li>
									  <li><a href="#">Smoethings</a></li>
									  <li><a href="#">Smoethings</a></li>
									  <li><a href="#">Smoethings</a></li>
									  <li><a href="#">Smoethings</a></li>
									  <li><a href="#">Smoethings</a></li>
									  <li><a href="#">Smoethings</a></li>
								   </ol>
								 </div>
								 
								 <div class="clearfix"></div>
								 
							  </li>
						  </ul>
				    </li>
					 
					 <li><a href="#">Alliances</a>
					 <ul class="nav_right">
						     <li>
							     <div class="sub">
								    <h1>Brands</h1>
									<ol class="listing">
								      <li><a href="#">Cisco</a></li>
									  <li><a href="#">AAAA</a></li>
									  <li><a href="#">BBBB</a></li>
									  <li><a href="#">Wireless Survey and Installation</a></li>
									  <li><a href="#">Smoethings</a></li>
									  <li><a href="#">Smoethings</a></li>
									  <li><a href="#">Smoethings</a></li>
									  <li><a href="#">Smoethings</a></li>
								   </ol>
								 </div>
								 
								 <div class="divide"></div>
								 
								 <div class="sub">
								    <h1>Category</h1>
									<ol class="listing">
								      <li><a href="#">Cisco</a></li>
									  <li><a href="#">AAAA</a></li>
									  <li><a href="#">BBBB</a></li>
									  <li><a href="#">Network Architecture and Design</a></li>
									  <li><a href="#">Smoethings</a></li>
									  <li><a href="#">Smoethings</a></li>
									  <li><a href="#">Smoethings</a></li>
									  <li><a href="#">Smoethings</a></li>
									  <li><a href="#">Smoethings</a></li>
									  <li><a href="#">Smoethings</a></li>
								   </ol>
								 </div>
								 
								 <div class="clearfix"></div>
								 
							  </li>
						  </ul>
						  </li>
					 <li><a href="#">Customers</a></li>
					 <li><a href="#">Training</a></li>
					 <li><a href="#">Contact us</a></li>
				  </ul>-->
			  </div>
              

			  
			  
		   </div>
		</div>
	</div>
