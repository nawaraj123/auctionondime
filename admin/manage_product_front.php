<?php

       include_once('common/session.php');

       include_once('../Dbconnection/db_conn.php');
	
	   include_once('classes/alliance.php');
	
	  $adds=new Alliance();
	
	if(isset($_POST['submit'])){
	     
		$adds->setLink($_POST['link']);
		
		$adds->setPosition($_POST['position']);
		
		
	if(isset($_GET['id']))
			{
				$adds->updateAdds($_GET['id']);
			}
		else
			{	
				$adds->add();
			}
			
	    }
		
		
	 if(isset($_GET['delete_id']))
			{
				$adds->delete();
			}
			
	 if(isset($_GET['id']))
			{
				$newaddsObj=$adds->getAdd($_GET['id']);
			}
			
	if(isset($_GET['delimage'])){
			 
			 $adds->deleteImage($_GET['delimage']);
			 
			 }
		
		
	
			   
		$addsObj=$adds->listAdds();	   
	

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Alliance Management</title>
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
		  
	       if(document.getElementById('link').value=="")
		       {
			   alert("Please Enter link of the advertisement");
			   document.getElementById('link').focus();
			   return false
			  	}
				
		if(document.getElementById('level').value=="")
		       {
			   alert("Please Enter level of the advertisement");
			   document.getElementById('level').focus();
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
				<legend><a href="manage_alliance.php"><input type="button" name="" value="ALLIANCE MANAGEMENT"/></a></legend>
				<br/>
				 
				  <table width="100%" border="0" cellspacing="1" cellpadding="0">
  						<tr bgcolor="#ABABAB">
    					<td width="4%" align="center"><strong class="p7">S.NO</strong></td>
						<td width="42%" align="center"><strong class="p7">DISCRIPTION</strong></td>
						<td width="24%" align="center"><strong class="p7">LINK</strong></td>
						<td width="12%" colspan="centre" align="30%"><strong class="p7">POSITION</strong></td>	
						<td align="center" colspan="4"><strong class="p7">OPERATION</strong></td>		
					  </tr>
					  
					    <?php 
					  
					  	   $sn=0;
						
						   foreach($addsObj as $add){
						   
						      $sn++;
							  
					    ?>
                        
                      
                         
					  
					  <tr bgcolor="#C0C0C0">
						<td align="center"><?php echo $sn?></td>
                        
                       <?php  if($add->getImage()==""){ ?>
                         
                         <td> <img src="image/no_profile.jpg"  align="middle" height="80"/></td>
                         
                         <?php }else{ ?>
                        
						<td align="center"><img src="<?php echo $add->getImage() ?>" height="80" /></td>
                        <?php } ?>
                        
						<td align="center"><?php echo $add->getLink()?></td>
						<td align="center"><?php echo $add->getPosition()?></td>
						<td width="8%" align="center"><a href="manage_alliance.php?id=<?php echo $add->getId()?>"><img src="image/edite.png" alt="edit" title="Edit"/></a></td>
						<td width="10%" align="center"><a href="manage_alliance.php?delete_id=<?php echo $add->getId()?>" onClick="return ConfirmDelete();"><img src="image/delete.png" alt="delete" title="Delete"/></a></td>
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
				<legend><a href="manage_alliance.php"><input type="button" name="" value="Add New alliance"/></a></legend>
				<br/>
				<form action="" method="post"  name="frm" enctype="multipart/form-data" >
				
					<table width="100%" border="0" cellspacin="1" cellpadding="0">
                    
					<tr bgcolor="#ABABAB">
						<td align="right" colspan="4"><strong class="p8">Image</strong></td>
                        <?php 
						
						if(isset($newaddsObj)){
						
						 
						  if($newaddsObj->getImage()==""){ ?>
                         
                         <td> <img src="image/no_profile.jpg" height="80"></td>
                         
                         <?php }else{ ?>
                        
                  <td><a href="manage_alliance.php?delimage=<?php echo $newaddsObj->getId()?>" onclick="return ConfirmDelete();"><img src="<?php echo $newaddsObj->getImage()?>" height="80" title="Click image to Remove" /></a></td>      
                                 
                        <?php } ?>
						
						<td colspan="4"><input type="file" id="image" name="userfile" value="" /> </td>
                        
                        <?php }else{ ?>
                        
                        <td colspan="4"><input type="file" id="image" name="userfile" value="" /> </td>
                        
                        <?php } ?>
                        
					  </tr>
					
					  
                      
                      <tr bgcolor="#ABABAB">
						<td align="right" colspan="4"><strong class="p8">Link*</strong></td>
						
						<td width="76%" colspan="4"><input type="text" id="link" name="link" value="<?php if(isset($newaddsObj)) echo  $newaddsObj->getLink() ?>" size="34" style="margin:0 0 0 5px" /></td>
					  </tr>
                      
                      <tr bgcolor="#ABABAB">
						<td align="right" colspan="4"><strong class="p8">Position</strong></td>
						
				<td width="76%" colspan="4"><input type="text" id="position" name="position" value="<?php if(isset($newaddsObj)) echo  $newaddsObj->getPosition() ?>" size="34" style="margin:0 0 0 5px" /></td>
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