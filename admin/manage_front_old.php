<?php
        include_once('common/session.php');   

        include_once('../Dbconnection/db_conn.php');
	
	include_once('classes/front.php');
        
        $front=new Front();
		
	
	if(isset($_POST['submit'])){
	     
		$front->setHeading($_POST['heading']);
		
		$front->setDescription($_POST['description']);
		
		$front->setDetail($_POST['detail']);
		
	
		if(isset($_POST['position']))
			$front->setPosition($_POST['position']);
		
		if(isset($_GET['id']))
			{
				$front->updateFront($_GET['id']);
			}
		else
			{	
				$front->addFront();
			}
	    }
		
		
	 if(isset($_GET['delete_id']))
			{
				$front->delete();
			}
			
	 if(isset($_GET['id']))
			{
				$frontObj=$front->getFront($_GET['id']);
			}	
		
		
	 if(isset($_GET['delimage'])){
			 
			 $front->deleteImage($_GET['delimage']);
			 
			 }
	
	$fObj=$front->listFront();

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Front page Management</title>
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
		  
	       if(document.getElementById('heading').value=="")
		       {
			   alert("Please Enter Heading");
			   document.getElementById('heading').focus();
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
				<legend><a href="manage_front.php"><input type="button" name="" value="Manage Front"/></a></legend>
				<br/>
				 
				  <table width="100%" border="0" cellspacing="1" cellpadding="0">
  						<tr bgcolor="#ABABAB">
    					<td width="4%" align="center"><strong class="p7">S.NO</strong></td>
						<td width="30%" align="center"><strong class="p7">HEADING</strong></td>
						<td width="6%" align="center"><strong class="p7">IMAGE</strong></td>
						<td width="10%" align="center"><strong class="p7">POSITION</strong></td>
						<td align="center" colspan="4"><strong class="p7">OPERATION</strong></td>		
					  </tr>
						<?php 
					  
					  	   $sn=0;
						
						   foreach($fObj as $front){
						   
						      $sn++;
							  
					  ?>
						
					   
					  <tr bgcolor="#C0C0C0">
						<td align="center"><?php echo $sn ?></td>
						<td align="center"><?php echo $front->getHeading()?></td>
                        
                        <?php  if($front->getImage()==""){ ?>
                         
                           <td align="center"> <img src="image/no_profile.jpg" height="80"/></td>
                         
                         <?php }else{ ?>
                         
                         <td align="center"><img src="<?php echo $front->getImage(); ?>" height="80"/></td>
                         <?php } ?>
						<td align="center"><?php echo $front->getPosition()?></td>
						<td width="8%" align="center"><a href="manage_front.php?id=<?php echo $front->getId()?>"><img src="image/edite.png" alt="edit" title="Edit"/></a></td>
						<td width="10%" align="center"><a href="manage_front.php?delete_id=<?php echo $front->getId()?>" onClick="return ConfirmDelete();"><img src="image/delete.png" alt="delete" title="Delete"/></a></td>
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
				<legend><a href="manage_front.php"><input type="button" name="" value="Add New Front Heading"/></a></legend>
				<br/>
				<form action="" method="post"  name="frm"  enctype="multipart/form-data">
				
					<table width="100%" border="0" cellspacing="1" cellpadding="0">
					<tr bgcolor="#ABABAB">
						<td align="right" colspan="2" width="40%"><strong class="p8">Enter Heading</strong></td>
						
						<td colspan="4"><input type="text" id="heading" name="heading" value="<?php if(isset($frontObj)) echo  $frontObj->getHeading() ?>" size="34" style="margin:0 0 0 5px" /></td>
					  </tr>
					
					  <tr bgcolor="#ABABAB">
						<td align="right" colspan="4"><strong class="p8">Image</strong></td>
                        <?php 
						
						if(isset($frontObj)){
							
						$newImage=new Front();
						
						 ?>
                         
                         <?php  if($newImage->getImages($_GET['id'])==""){ ?>
                         
                           <td> <img src="image/no_profile.jpg"  height="80"/></td>
                         
                         <?php }else{ ?>
                         
                         
            <td><?php $thumb=explode('/',$newImage->getImages($_GET['id'])); $thumbing="gallery/".$thumb[1];?><a href="manage_front.php?delimage=<?php echo $frontObj->getId()?>" onclick="return ConfirmDelete();"><img src="<?php echo $thumbing; ?>" height="80" title="Click image to Remove"/></a>
             
            </td>
            
           
                      <?php } ?>
						
						<td colspan="4"><input type="file" id="image" name="userfile" value="" /> </td>
                        
                        <?php }else{?>
                        
                        <td colspan="4"><input type="file" id="image" name="userfile" value="" /> </td>
                        
                        <?php } ?>
                        
					  </tr>
					  
					   <tr bgcolor="#ABABAB">
						<td align="right" colspan="4" width="40%"><strong class="p8">Position</strong></td>
	
				<td width="6%">	<select name="position">
				<?php if(isset($frontObj)) echo  "<option>{$frontObj->getPosition()}</option>"; 
				  else { 
							echo '<option>Front Left</option>';
							echo'<option>Front Right</option>';
							echo'<option>Footer Left</option>';
							echo'<option>Footer Middle</option>';
							echo'<option>Footer Right</option>';
							echo'<option>Footer Bottom</option>';
							} ?>
						</select> </td>
					  </tr>
                      
                        <tr bgcolor="#ABABAB">
					 <td width="11%" align="center"><strong class="p7">Front description</strong></td>
<td colspan="10"><textarea name="detail" style="margin:0 0 0 5px; width:100px; width:530px"><?php if(isset($frontObj)) echo  $frontObj->getDetail() ?></textarea></td>
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
										if(isset($frontObj))
										$oFCKeditor->Value	=  $frontObj->getDescription();
										//echo $row['description'];
										$oFCKeditor->Create();
										//echo $data['description'];
											
							?>
						</td>
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