<?php

    include_once('common/session.php');

    include_once('../Dbconnection/db_conn.php');
	
	include_once('classes/product.php');
	
	include_once('classes/company.php');
	
	include_once('classes/Pagesettings.classes.php');
	
	
	$product=new Product();
	
	if(isset($_POST['submit'])){
	     
		$product->setName($_POST['pname']);
		
		
		$product->setCompanyId($_POST['company']);
		
		$product->setSubcatId($_POST['subcat']);
		
		$product->setPrice($_POST['price']);
		
		$product->setDetail($_POST['detail']);
		
		$product->setDescription($_POST['description']);
		
		if(isset($_POST['lproduct']))
		
			$product->setLproduct(1);
		else
			$product->setLproduct(0);
			
		
		if(isset($_GET['id']))
			{
				$product->updateProduct($_GET['id']);
			}
		else
			{	
				$product->addProduct();
			}
			
	    }
			 
	if(isset($_GET['id']))
			{
				$newprodObj=$product->getProduct($_GET['id']);
			}
			
	if(isset($_GET['delete_id']))
			{
				$product->delete();
			}
			
			
$pagesettingObj=new Pagesettings();
   
if(!empty($_GET['page']))
    {
	$pagesettingObj->setPagenum($_GET['page']);	
	}
else
    {
   $pagesettingObj->setPagenum(1);
    }
  $pagesettingObj->setRowsperpage(15); 
  $pagesettingObj->getPageno(1,'tbl_product');
  $pagesettingObj->setOffset($pagesettingObj->getPagenum());
			   
		$prodObj=$product->listProduct($pagesettingObj->getOffset(),$pagesettingObj->getRowsperpage());	   
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Product Management</title>
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
		  
	       if(document.getElementById('pname').value=="")
		       {
			    alert("Please Enter Product Name");
			    document.getElementById('pname').focus();
			   return false
			  	}
			
			if(document.getElementById('position').value=="")
		       {
			   alert("Please Enter position");
			   document.getElementById('position').focus();
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
				<legend><a href="manage_product.php"><input type="button" name="" value="Manage Product"/></a></legend>
				<br/>
				 
				  <table width="100%" border="0" cellspacing="1" cellpadding="0">
  						<tr bgcolor="#ABABAB">
    					<td width="2%" align="center"><strong class="p7">S.NO</strong></td>
                        <td width="30%" align="center"><strong class="p7">BRAND</strong></td>   
                        <td width="25%" align="center"><strong class="p7">CATEGORY</strong></td>                        
						<td width="30%" align="center"><strong class="p7">NAME</strong></td>
                        <td width="25%" align="center"><strong class="p7">PRICE</strong></td>
                        <td width="5%" align="center"><strong class="p7">LATEST</strong></td>
						<td align="25%" colspan="center"><strong class="p7">IMAGE</strong></td>	
						<td align="center" colspan="4"><strong class="p7">OPERATION</strong></td>		
					  </tr>
                      
                       <?php 
					   
					     $i=1;
						 
					   if($pagesettingObj->getPagenum()>1){
					   		$i+=15*($pagesettingObj->getPagenum()-1);
					      }
					  	   
						   foreach($prodObj as $product){
						   
					  ?>
					  
					   <tr bgcolor="#C0C0C0">
						<td align="center"><?php echo $i++ ?></td>
						<td align="center"><?php echo $product->getCompanyId()->getName()?></td>
                        <td align="center"><?php echo $product->getSubcatId()->getSubName()?></td>
						<td align="center"><?php echo $product->getName()?></td>
                        <td align="center"><?php echo $product->getPrice()?></td>
                        
                        <td align="center"><input type="checkbox" <?php echo $product->getLproduct()? "checked":""?> name="lproduct"  /></td>
                        
						<?php   
						
						if($product->getImage()==""){ 
						
						?>
                           <td> <img src="image/no_profile.jpg" width="100" height="80"/></td>
                         
                         <?php }else{ ?>
                        
						<td align="center"><img src="<?php echo $product->getImage(); ?>" height="80"/></td>
                        <?php } ?>
                        
						<td width="8%" align="center"><a href="manage_product.php?id=<?php echo $product->getId()?>"><img src="image/edite.png" alt="edit" title="Edit"/></a></td>
						<td width="10%" align="center"><a href="manage_product.php?delete_id=<?php echo $product->getId()?>" onClick="return ConfirmDelete();"><img src="image/delete.png" alt="delete" title="Delete"/></a></td>
					  </tr>
                      <?php } ?>
					  
					</table>
				 
				
				<br/>
                
                <tr>
   <td style="" align="center">
     
      <?php echo $pagesettingObj->getFirst().'&nbsp;&nbsp;'.$pagesettingObj->getPrev().'&nbsp;&nbsp;'.$pagesettingObj->getNext().'&nbsp;&nbsp;'.$pagesettingObj->getLast(); ?>
      
    </td>
    
    
    </tr>
				
				</fieldset>
				<br/>
				
				<div class="operatebanner"><!--operatebanner open-->
				<fieldset>
				<legend><a href="manage_product.php"><input type="button" name="" value="Add New Product"/></a></legend>
				<br/>
				<form action="" method="post"  name="frm"  enctype="multipart/form-data">
				
					<table width="100%" border="0" cellspacing="1" cellpadding="0">
					  <tr bgcolor="#ABABAB">
						<td align="right" colspan="4" width="50%"><strong class="p8">Select Brand</strong></td>
						
						<td colspan="4" align="left"><select name="company">
						                    <option>Select Brand</option>
											<?php 
											   $compObj=Company::listCompany();
											   
											   foreach($compObj as $comp){
												   
											  ?>
                                              
         <option  <?php if(isset($newprodObj)){ echo $comp->getId()==$newprodObj->getCompanyId()->getId()?"selected":"";}?> value="<?php echo $comp->getId()?>">
															<?php echo $comp->getName() ?></option>
											  
											  <?php }?>
						
						              </select>
						
						
						</td>
					  </tr>
                      
                      
                      <tr bgcolor="#ABABAB">
						<td align="right" colspan="4" width="50%"><strong class="p8">Select Category</strong></td>
						
						<td colspan="4" align="left"><select name="subcat">
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
						<td align="right" colspan="4"><strong class="p8">Product name</strong></td>
						
						<td colspan="5"><input type="text" id="pname" name="pname" value="<?php if(isset($newprodObj)) echo  $newprodObj->getName() ?>" size="34" style="margin:0 0 0 5px" /></td>
					  </tr>
					  
					  <tr bgcolor="#ABABAB">
						<td align="right" colspan="4" width="40%"><strong class="p8">Price</strong></td>
						
						<td width="5%"><input type="text" id="price" name="price" value="<?php if(isset($newprodObj)) echo  $newprodObj->getPrice() ?>" size="34" style="margin:0 0 0 5px" /></td>
                      <td width="16%" align="center"><strong class="p8">Latest product</strong><input type="checkbox" name="lproduct" <?php if(isset($newprodObj)) echo $newprodObj->getLproduct()?"checked":"" ?>/></td>
						
                           </td>
                        
					  </tr>
					  
					  <tr bgcolor="#ABABAB">
					  	<td width="9%" align="center"><strong class="p7">Product detail</strong></td>
						<td colspan="5"><textarea name="detail"  style="margin:0 0 0 5px; width:100px; width:530px"><?php if(isset($newprodObj)) echo  $newprodObj->getDetail() ?></textarea></td>
					  </tr>
					  
					  <tr bgcolor="#ABABAB">
						<td align="right" colspan="4"><strong class="p8">Image</strong></td>
                        <?php 
						
						if(isset($newprodObj)){
							
						$newImage=new Product();
						
						 ?>
                         
                         <?php  if($newImage->getImages($_GET['id'])==""){ ?>
                         
                           <td> <img src="image/no_profile.jpg" width="100" height="80"/></td>
                         
                         <?php }else{ ?>
                         
                         
        <td><?php $thumb=explode('/',$newImage->getImages($_GET['id'])); $thumbing="gallery/".$thumb[1];?><img src="<?php echo $thumbing; ?>" height="80"/></td>
                      <?php } ?>
                      
						
						<td colspan="4"><input type="file" id="image" name="userfile" value="" /> </td>
                        
                        <?php }else{?>
                        
                        <td colspan="4"><input type="file" id="image" name="userfile" value="" /> </td>
                        
                        <?php } ?>
                        
					  </tr>
					  
					  <tr bgcolor="#ABABAB">
						<td align="center" colspan="8"><strong class="p8">Type your main content below</strong></td>
					  </tr>
						<tr bgcolor="#ABABAB">
					  	<td align="center" colspan="8" >
							<?php 
										include "fckeditor2/fckeditor.php";
										$oFCKeditor = new FCKeditor('description') ;
										$oFCKeditor->BasePath = 'fckeditor2/' ;
										if(isset($newprodObj))
										$oFCKeditor->Value	=  $newprodObj->getDescription();
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