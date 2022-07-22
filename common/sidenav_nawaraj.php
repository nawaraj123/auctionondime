<?php
 include_once('Dristi_ad_test/classes/category.php');
  include_once('Dristi_ad_test/classes/company.php');
$subObj=new Company();	
$subList=$subObj->listCompany(); 
$comp=new Company();
$compObj=$comp->listCompany();
?>
<div id="sidemenu">
<div class="title"><h1>Brand Categories</h1></div>
   <div id="Accordion1" class="Accordion" tabindex="0">
  <div class="AccordionPanel">
	<?php foreach($compObj as $company)
	{ ?>
   
	
		  
		<li class="bottom"><a href="brands.php?id=<?php echo $company->getId() ?>"class="AccordionPanelTab"><?php echo $company->getName() ?></a></li>
                            
					        
	
	 <?php } ?>
	
 
          </div>
                           
                      </div>
					 </div>
                     <script type="text/javascript">
<!--
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
//-->
</script>