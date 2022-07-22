<?php 

    include_once('common/session.php');
     
    include_once('../Dbconnection/db_conn.php');
	
	include_once('classes/subcategory.php');
	
	//include_once('classes/category.php');
	
	$subObj=new SubCategory();
	
	
	if(isset($_POST['submit'])){
	     
		$subObj->setSubName($_POST['subname']);
		
		$subObj->setPosition($_POST['position']);
	
	if(isset($_POST['banner_visibility']))
	{
		$subObj->setBanner_visibility($_POST['banner_visibility']);
		echo $_POST['banner_visibility'];
	}	
	else
	{
			$subObj->setBanner_visibility("0");
	}
		if(isset($_GET['id']))
			{
				
				$subObj->update($_GET['id']);
			}
		else
			{	
				$subObj->addSubCategory();
			}
			
	  }
	  
	 if(isset($_GET['id']))
			{
				$newSubObj=$subObj->getSubCategory($_GET['id']);
			}
			
	 if(isset($_GET['delete_id']))
			{
				$subObj->delete();
			}		
	  
	  
	
	  $subList=$subObj->listSubCategory();



 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>subcategory Management</title>
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
		  
	      if(document.getElementById('subname').value=="")
		       {
			   alert("Please Enter Sub-Category Name");
			   document.getElementById('subname').focus();
			   return false
			  	}
			
		 if(document.getElementById('selectpart').value=="")
		           {
			   alert("Please select Category");
			   document.getElementById('selectpart').focus();
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
                <legend><a href="../Dristi_ad_test/manage_company.php"><input type="button" name="" value="Company Management"/></a></legend>
				<br/>
				 
				  <table width="100%" border="0" cellspacing="1" cellpadding="0">
  						<tr bgcolor="#ABABAB">
    					<td width="4%" align="center"><strong class="p7">S.NO</strong></td>
						<td width="30%" align="center"><strong class="p7">CATEGORY</strong></td>
                        <td align="8%" colspan="centre"><strong class="p7">POSITION</strong></td>	
						<td align="8%" colspan="centre"><strong class="p7">IMAGE</strong></td>	
						<td align="8%" colspan="centre"><strong class="p7">BANER VISIBILITY</strong></td>	
						<td align="center" colspan="4"><strong class="p7">OPERATION</strong></td>		
					  </tr>
					  
					    <?php 
					  
					  	   $sn=0;
						
						   foreach($subList as $newsub){
						   
						      $sn++;
							  
					  ?>
					  
					  <tr bgcolor="#C0C0C0">
						<td align="center"><?php echo $sn ?></td>
						<td align="center"><?php echo $newsub->getSubName()?></td>
                        <td align="center"><?php echo $newsub->getPosition()?></td>
						
						
						
						  <?php  if($newsub->getImage()=="")  
						  { ?>
                       
                         <td> <img src="image/no_profile.jpg"  align="middle" height="80"/></td>
                         
                         <?php }
						 else
						 { ?>
                        <td align="center"><img src="<?php echo $newsub->getImage(); ?>" height="80"/></td>
					
                        <?php } ?>
						
						
						
						
					
						<td align="8%" colspan="centre"><strong class="p7"><?php if($newsub->getBanner_visibility()) echo "yes";else echo"No"; ?></strong></td>	
						<td width="8%" align="center"><a href="manage_subcategory.php?id=<?php echo $newsub->getId()?>"><img src="image/edite.png" alt="edit" title="Edit"/></a></td>
						<td width="10%" align="center"><a href="manage_subcategory.php?delete_id=<?php echo $newsub->getId()?>" onClick="return ConfirmDelete();"><img src="image/delete.png" alt="delete" title="Delete"/></a></td>
					  </tr>
					  
					  <?php 
					  	}
					  ?>
					 
					  
					</table>
				 
				
				<br/>
				
				</fieldset>
				<br/>
				
				<div class="operatebanner"  style="width:650px; margin:0"><!--operatebanner open-->
				<fieldset>
				<legend><a href="manage_subcategory.php"><input type="button" name="" value="Add New Subcategory"/></a></legend>
				<br/>
				<form action="" method="post"  name="frm" enctype="multipart/form-data" >
				
					<table width="100%" border="0" cellspacing="1" cellpadding="0">
					
					
					  <tr bgcolor="#ABABAB">
						<td align="right" colspan="4"><strong class="p8">Category Name</strong></td>
						
						<td width="76%" colspan="4"><input type="text" id="name" name="subname" value="<?php if(isset($newSubObj)) echo  $newSubObj->getSubName() ?>" size="34" style="margin:0 0 0 5px" /></td>
					  </tr>
					  
					   
                      <tr bgcolor="#ABABAB">
					  	<td align="center"><strong class="p7">Position</strong></td>
						<td><input type="text" name="position" size="1" value="<?php if(isset($newSubObj)) echo $newSubObj->getPosition(); ?>" style="margin:0 0 0 5px"/></td>
					  </tr>
					  
					  
					  <tr bgcolor="#ABABAB">
						<td align="right" colspan="4"><strong class="p8">Image</strong></td>
                        <?php 
						
						if(isset($newSubObj)){
						
						 
						  if($newSubObj->getImage()==""){ ?>
                         
                         <td> <img src="image/no_profile.jpg" height="80"></td>
                         
                         <?php }else{ ?>
                        
                  <td><a href="../Dristi_ad_test/manage_contact.php?delimage=<?php echo $newSubObj->getId()?>" onclick="return ConfirmDelete();"><img src="<?php echo $newSubObj->getImage()?>" height="80" title="Click image to Remove" /></a></td>      
                                 
                        <?php } ?>
						
						<td colspan="4"><input type="file" id="image" name="userfile" value="" /> </td>
                        
                        <?php }else{ ?>
                        
                        <td colspan="4"><input type="file" id="image" name="userfile" value="" /> </td>
                        
                        <?php } ?>
                        
					  </tr>
					   <tr bgcolor="#ABABAB">
					   <td align="right" colspan="4"><strong class="p8">Banner visibility</strong></td>
						<td><input type="checkbox" name="banner_visibility" value="1"  <?php if(isset($newSubObj)){if($newSubObj->getBanner_visibility()){echo "checked";}} ?> /> </td>
				
					  
					  
					  
                      
					   <tr bgcolor="#ABABAB">
                       
						<td align="right" colspan="7"><input type="reset" name="reset" value="reset"/><input type="submit" name="submit" value="submit" onclick="return validate_required();" style="margin:0 5px 0 0" /></td>
                        
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