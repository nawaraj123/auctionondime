<?php  include("Dbconnection/db_conn.php");
include_once('admin/classes/menu.php');
include_once('admin/classes/submenu.php');
include_once('admin/classes/trimenu.php');
include_once('admin/classes/subcategory.php');
include_once('admin/classes/company.php');
$comp=new Company();
$compObj=$comp->listCompany();
$subObj=new SubCategory();
$subList=$subObj->listSubCategory();
$menuObj=new Menu();
$menu=$menuObj->display();
	  
	  
  global $search;

?>
<link rel="stylesheet" type="text/css" href="style1.css" />


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

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24180510-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


<div id='cssmenu'>
<ul>
   <li class='active'><a href='allreport.php'><span>All Report</span></a></li>
   <li><a href='districtwise.php'><span>District Wise Report</span></a></li>
   <li><a href='subjectwise.php'><span>Subject Name Wise Report</span></a></li>
   <li class='last'><a href='sifarishwise.php'><span>Sifarish Wise Report</span></a></li>
   <li class='last'><a href='fiscalyearwise.php'><span>Fiscal Year Wise Report</span></a></li>
      <li class='last'><a href='nonetakeup.php'><span>None Takeup Report</span></a></li>

</ul>
</div>

    <div id="header-wrapper">
	    <div id="header">
		   <!--<div id="header_left">
		     <a href="index.php"> <img src="images/logo.jpg" alt="" height="55" width="133" border="0" /></a>
             
		   </div>-->
          
           
		   <div id="header_right">
		     <div id="callus">
             <!--<div class="facebook">
          <a href="http://www.facebook.com/dristitech" title="Send to Facebook" class="border"></a>
          
          </div>-->
          
		<!--<table>
                <tr><td colspan="2"><h4>Call us now: +97714427949</h4></td></tr>
                <tr>
                  <form action="searchResults.php" method="post">
                     <td><input type="text" value ="<?php  echo $search; ?>"  name="search" class="search" /></td>
                     <td><input class="read_btn" type="submit" value="Search" /></td>
                   </form>  
                </tr>
                </table>    -->
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
