<?php 

    include_once('common/session.php');
     
    include_once('../Dbconnection/db_conn.php');
	
	include_once('classes/company.php');
	
	include_once('classes/subcategory.php');
	
	$comp=new Company();
	//$newprodObj=new Company();
	
	if(isset($_POST['submit'])){
	     
		$comp->setName($_POST['name']);
		
		$comp->setDetail($_POST['detail']);
		
		$comp->setDescription($_POST['description']);
		
		$comp->setPosition($_POST['position']);
		
		$comp->setPartnerId($_POST['selectpart']);
		
		if(isset($_GET['id']))
			{
				
				$comp->updateCompany($_GET['id']);
			}
		else
			{	
				$comp->addCompany();
			}
			
	  }
	  
	 if(isset($_GET['id']))
			{
				$newcompObj=$comp->getCompany($_GET['id']);
			}
			
	 if(isset($_GET['delete_id']))
			{
				$comp->delete();
			}		
	  
	  
	
	  $compObj=$comp->listCompany();



 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Brand Management</title>
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
			   alert("Please Enter brand Name");
			   document.getElementById('name').focus();
			   return false
			  	}
			
		 if(document.getElementById('selectpart').value=="")
		           {
			   alert("Please select partner");
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
                <legend><a href="manage_brand.php"><input type="button" name="" value="Brand Management"/></a></legend>
				<br/>
				 
				  <table width="100%" border="0" cellspacing="1" cellpadding="0">
  						<tr bgcolor="#ABABAB">
    					<td width="4%" align="center"><strong class="p7">S.NO</strong></td>
						<td width="30%" align="center"><strong class="p7">CATEGORY NAME</strong></td>
						<td width="30%" align="center"><strong class="p7">BRAND NAME</strong></td>
						<td align="20%" colspan="centre"><strong class="p7">LOGO</strong></td>	
                        <td align="8%" colspan="centre"><strong class="p7">POSITION</strong></td>	
						<td align="center" colspan="4"><strong class="p7">OPERATION</strong></td>		
					  </tr>
					  
					    <?php 
					  
					  	   $sn=0;
						
						   foreach($compObj as $company){
						   
						      $sn++;
							  
					  ?>
					  
					  <tr bgcolor="#C0C0C0">
						<td align="center"><?php echo $sn ?></td>
						<td align="center"><?php echo $company->getPartnerId()->getName()?></td>
						<td align="center"><?php echo $company->getName()?></td>
                        
                           <?php 
						         if($company->getImage()==""){ ?>
                         
                           <td> <img src="image/no_profile.jpg" height="80"/></td>
                         
                         <?php }else{ ?>
                        
						<td align="center"><img src="<?php echo $company->getImage(); ?>" height="80"/></td>
                        <?php } ?>
                        <td align="center"><?php echo $company->getPosition()?></td>
						<td width="8%" align="center"><a href="manage_brand.php?id=<?php echo $company->getId()?>"><img src="image/edite.png" alt="edit" title="Edit"/></a></td>
						<td width="10%" align="center"><a href="manage_brand.php?delete_id=<?php echo $company->getId()?>" onClick="return ConfirmDelete();"><img src="image/delete.png" alt="delete" title="Delete"/></a></td>
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
				<legend><a href="manage_brand.php"><input type="button" name="" value="Add New Brand"/></a></legend>
				<br/>
				<form action="" method="post"  name="frm"  enctype="multipart/form-data">
				
					<table width="100%" border="0" cellspacing="1" cellpadding="0">
					<tr bgcolor="#ABABAB">
					  
						<td align="right" colspan="4" width="50%"><strong class="p8">Select Category</strong></td>
                        
                        <td colspan="4" align="left"><select name="selectpart">
						                    <option>Select one</option>
											<?php 
											   $subcatObj=SubCategory::listSubCategory();
											   
											   foreach($subcatObj as $newsub){
												   
											  ?>
                                              
         <option  <?php if(isset($newprodObj)){ echo $newsub->getId()==$newprodObj->getSubcatId()->getId()?"selected":"";}?> value="<?php echo $newsub->getId()?>">
															<?php echo $newsub->getSubName() ?></option>
											  
											  <?php }?>
						
						              </select>
						</td>
						
					  </tr>
					
					  <tr bgcolor="#ABABAB">
						<td align="right" colspan="4"><strong class="p8">Brand Name</strong></td>
						
						<td width="76%" colspan="4"><input type="text" id="name" name="name" value="<?php if(isset($newcompObj)) echo  $newcompObj->getName() ?>" size="34" style="margin:0 0 0 5px" /></td>
					  </tr>
					  
					   <tr bgcolor="#ABABAB">
					  	<td width="11%" align="center"><strong class="p7">Brand detail</strong></td>
						<td colspan="10"><textarea name="detail" style="margin:0 0 0 5px; width:100px; width:530px"><?php if(isset($newcompObj)) echo  $newcompObj->getDetail() ?></textarea></td>
					  </tr>
                      
                      <tr bgcolor="#ABABAB">
					  	<td align="center"><strong class="p7">Position</strong></td>
						<td><input type="text" name="position" size="1" value="<?php if(isset($newcompObj)) echo $newcompObj->getPosition(); ?>" style="margin:0 0 0 5px"/></td>
					  </tr>
					  
					  
					  <tr bgcolor="#ABABAB">
						<td align="right" colspan="4"><strong class="p8">Logo</strong></td>
                        <?php 
						
						if(isset($newcompObj)){
							
						$newImage=new Company();
						
						 ?>
                         
                         <?php  if($newImage->getImages($_GET['id'])==""){ ?>
                         
                           <td> <img src="image/no_profile.jpg" height="80"/></td>
                         
                         <?php }else{ ?>
                         
                         
                <td><?php $thumb=explode('/',$newImage->getImages($_GET['id'])); $thumbing="gallery/".$thumb[1];?><img src="<?php echo $thumbing; ?>" height="80"/></td>
                      <?php } ?>
                      
						
						<td colspan="4"><input type="file" id="image" name="userfile" value="" /> </td>
                        
                        <?php }else{?>
                        
                        <td colspan="4"><input type="file" id="image" name="userfile" value="" /> </td>
                        
                        <?php } ?>
                        
					  </tr>
					  
					  <tr bgcolor="#ABABAB">
						<td align="center" colspan="6"><strong class="p8">Type your main content below</strong></td>
					  </tr>
						<tr bgcolor="#ABABAB">
					  	<td align="center" colspan="8" >
							<?php 
										include "fckeditor2/fckeditor.php";
										$oFCKeditor = new FCKeditor('description') ;
										$oFCKeditor->BasePath = 'fckeditor2/' ;
										if(isset($newcompObj))
										$oFCKeditor->Value	=  $newcompObj->getDescription();
										//echo $row['description'];
										$oFCKeditor->Create();
										//echo $data['description'];
											
									?>
						</td>
					  </tr>
                      
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