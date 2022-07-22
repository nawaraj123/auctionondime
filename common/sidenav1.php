<?php
 include_once('admin_control/classes/subcategory.php');
  include_once('admin_control/classes/product.php');
$subObj=new SubCategory();
	  $subList=$subObj->listSubCategory();
$sideproduct=new Product();	  

	  ?>

<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script>
	
	$(document).ready(function () {
		
		$('#accordion a.item').click(function () {

			//slideup or hide all the Submenu
			$('#accordion li').children('ul').slideUp('fast');	
			
			/*remove all the "Over" class, so that the arrow reset to default*/
			$('#accordion a.item').each(function () {
				if ($(this).attr('rel')!='') {
					$(this).removeClass($(this).attr('rel') + 'Over');	
				}
			});
			
			//show the selected submenu
			$(this).siblings('ul').slideDown('fast');
			
			//add "Over" class, so that the arrow pointing down
			//$(this).children('a').addClass($(this).children('li a').attr('rel') + 'Over');			

			return false;

		});
	
	});
	
	
	</script>
	

<div id="sidemenu">
<div class="title">
  <h1>Brand Categories</h1></div>
  <ul id="accordion">
	 
	<?php foreach($subList as $newsub){ ?>
	 
	 <li>
		<a href="#" class="item nav" rel="h2"><h2><?php echo $newsub->getSubName() ?></h2></a>
		<?php 
			$listcatpro=$sideproduct->getFrontCat($newsub->getId());
			foreach($listcatpro as $catpro){ ?>
			
			<ul>
			<li><a href="product_details.php?id=<?php echo $catpro->getId() ?>"><?php echo $catpro->getName()?></a></li>
		</ul>
			
			<?php } ?>
		
	 </li>
	 <?php } ?>
	<!-- <li>
		<a href="#" class="item nav" rel="h2" ><h2>Popular Post</h2></a>
		<ul>
		    <li><a href="#">Popular Post 1</a></li>
			<li><a href="#">Popular Post 2</a></li>
			<li><a href="#">Popular Post 3</a></li>
			<li><a href="#">Popular Post 4</a></li>
			<li><a href="#">Popular Post 5</a></li>
			<li><a href="#">Popular Post 6</a></li>
			<li><a href="#">Popular Post 7</a></li>
			<li><a href="#">Popular Post 8</a></li>
			<li><a href="#">Popular Post 9</a></li>
		</ul>
	 </li>
	 
	 <li>
		<a href="#" class="item nav" rel="h2"><h2>Popular Post</h2></a>
		<ul>
			<li><a href="#">Popular Post 1</a></li>
			<li><a href="#">Popular Post 2</a></li>
			<li><a href="#">Popular Post 3</a></li>
			<li><a href="#">Popular Post 4</a></li>
			<li><a href="#">Popular Post 5</a></li>
			<li><a href="#">Popular Post 6</a></li>
		</ul>
	 </li>-->
	
  </ul>
                </div>