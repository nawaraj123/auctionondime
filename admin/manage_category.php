<?php

  include_once('common/session.php');
	 
	include_once('../Dbconnection/db_conn.php');
	
	include_once('classes/category.php');
	
	$catObj=new Category();
	 
	if(isset($_POST['submit'])){
	     
		$catObj->setName($_POST['name']);
		
		$catObj->setPosition($_POST['position']);
			
	if(isset($_GET['id']))
			{
				$catObj->update($_GET['id']);
			}
		else
			{	
				$catObj->addCategory();
			}
			
	    }
	
	
	
	if(isset($_GET['delete_id']))
			{
				$catObj->delete();
			}
			
			
	if(isset($_GET['id']))
			{
				$newcatObj=$catObj->getCategory($_GET['id']);
			}
			
			
	  $catList=$catObj->listCategory();
	   
	   //var_dump($catList);
		
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>News Category</title>
<link href="css/styleadmin.css" rel="stylesheet" type="text/css" />
<script>
function ConfirmDelete()
{
 var ab=confirm("Are you sure you wish to delete this record permanantly?");
 if(ab)
 return true;
 else
 return false;
}
</script>

<script type="text/javascript">
	    function validate_required(field,alerttxt)
	      {
		  
	       if(document.getElementById('name').value=="")
		       {
			   alert("Please Enter News Category");
			   document.getElementById('name').focus();
			   return false
			  	}
				
			else
			return true;   
	      
		  }
</script>





</head>

<body>
	<div id="wrapper"><!--wrapper open-->
	<?php include_once("common/header.php") ?>
	<div class="content"><!--content open-->
			
			<?php include("common/nav.php") ?>
			
			<div class="right-content"><!-- right-content open -->
			<div class="banner"><!--banner open-->
			<br/>
			
				<fieldset>
				<legend><a href="manage_category.php"><input type="button" name="" value="News Category Management"/></a></legend>
				<br/>
				 
				  <table width="100%" border="0" cellspacing="1" cellpadding="0">
  						<tr bgcolor="#ABABAB">
    					<td width="4%" align="center"><strong class="p7">S.NO</strong></td>
						<td width="30%" align="center"><strong class="p7">CATEGORY NAME</strong></td>
                        <td width="10%" align="center"><strong class="p7">POSITION</strong></td>
						<td align="center" colspan="4"><strong class="p7">OPERATION</strong></td>		
					  </tr>
					   <?php 
					  	$sn=0;
						
						foreach($catList as $category)
						 {
						  $sn++;
					  ?>
                      
					  <tr bgcolor="#C0C0C0">
						<td align="center"><?php echo $sn ?></td>
						<td align="center"><?php echo $category->getName()?></td>
                        <td align="center"><?php echo $category->getPosition()?></td>
						<td width="5%" align="center"><a href="manage_category.php?id=<?php echo $category->getId()?>"><img src="image/edite.png" alt="edit" title="Edit"/></a></td>
						<td width="5%" align="center"><a href="manage_category.php?delete_id=<?php echo $category->getId()?>" onClick="return ConfirmDelete();"><img src="image/delete.png" alt="delete" title="Delete"/></a></td>
					  </tr>
					  <?php 
					  	}
					  ?>
					 
					</table>
				 
				
				<br/>
				
				</fieldset>
				<br/>
				
				<div class="operatebanner"><!--operatebanner open-->
				<fieldset>
				<legend><a href="manage_category.php"><input type="button" name="" value="Add New Category"/></a></legend>
				<br/>
			<form action="" method="post"  name="demoform"  onsubmit="return valid(this.menu,this.link)">
				
					<table width="100%" border="0" cellspacing="1" cellpadding="0">
					  <tr bgcolor="#ABABAB">
						<td align="right" colspan="4" width="40%"><strong class="p8">Enter Menu</strong></td>
						
						<td colspan="4"><input type="text" id="name" name="name" value="<?php if(isset($newcatObj)) echo  $newcatObj->getName() ?>" size="34" style="margin:0 0 0 5px" /></td>
					  </tr>
                      <tr bgcolor="#ABABAB">
						<td align="right" colspan="4" width="40%"><strong class="p8">Set Position</strong></td>
						<td width="5%"><input type="text" name="position" id="position" value="<?php if(isset($newcatObj)) echo $newcatObj->getPosition()?>" size="2" style="margin:0 0 0 5px"/></td>
                        </tr>
                      
					  
					   <tr bgcolor="#ABABAB">
						<td align="right" colspan="7"><input type="submit" name="submit" value="Submit" onclick="return validate_required();" style="margin:0 5px 0 0" /><input type="reset" name="reset" value="Reset"/></td>
					  </tr>
					</table>
					<br/>
																											 
				</form>
				
				</fieldset>
				<br/>
				</div><!--operatebanner closed-->
			
			</div><!--banner closed-->
			
			</div><!-- right-content closed -->
							
		</div><!--content closed-->	
		<?php include_once("common/footer.php") ?>
	</div><!--wrapper closed-->
</body>
</html>