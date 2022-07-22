<?php 

    include_once('common/session.php');

    include_once('../Dbconnection/db_conn.php');
	
	include_once('classes/footer.php');
	
	$footObj= new Footer();
	
	if(isset($_POST['submit'])){
		
		$footObj->setDetail($_POST['detail']);
		
		if(isset($_GET['id']))
			{
				$footObj->update($_GET['id']);
			}
		 else
			{	
				$footObj->addFooter();
			}
		
		}
		
		
	if(isset($_GET['id']))
			{
				$newFooter=$footObj->getFooter($_GET['id']);
			}
			
			
	if(isset($_GET['delete_id']))
			{
				$footObj->delete();
			}	
		
		
	$footerObj=$footObj->listFooter();



 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Footer Management</title>
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
		  
	       if(document.getElementById('detail').value=="")
		       {
			   alert("Please Enter footer detail");
			   document.getElementById('detail').focus();
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
				<legend><a href="manage_footer.php"><input type="button" name="" value="Footer Management"/></a></legend>
				<br/>
				 
				  <table width="100%" border="0" cellspacing="1" cellpadding="0">
  						<tr bgcolor="#ABABAB">
    					<td width="4%" align="center"><strong class="p7">S.NO</strong></td>
						<td width="4%" align="center"><strong class="p7">Left</strong></td>
						<td width="4%" align="center"><strong class="p7">Middle</strong></td>
						<td width="4%" align="center"><strong class="p7">Right</strong></td>
						    <td width="20%" align="center"><strong class="p7">HEADER</strong></td>
                        <td width="60%" align="center"><strong class="p7">FOOTER DETAIL</strong></td>
						<td align="center" colspan="4"><strong class="p7">OPERATION</strong></td>		
					  </tr>
					   <?php 
					  	$sn=0;
						
						foreach($footerObj as $newfoots)
						{
						  $sn++;
					  ?>
					  
					  
					  <tr bgcolor="#C0C0C0">
						<td align="center"><?php echo $sn ?></td>
						<td align="center"><input type="radio" name="radio" /></td>
						<td align="center"><input type="radio" name="radio" /></td>
						<td align="center"><input type="radio" name="radio" /></td>
						 <td align="center"><?php echo $newfoots->getHeader()?></td>
                        <td align="center"><?php echo $newfoots->getDetail()?></td>
						<td width="8%" align="center"><a href="manage_footer.php?id=<?php echo $newfoots->getId()?>"><img src="image/edite.png" alt="edit" title="Edit"/></a></td>
						<td width="10%" align="center"><a href="manage_footer.php?delete_id=<?php echo $newfoots->getId()?>" onClick="return ConfirmDelete();"><img src="image/delete.png" alt="delete" title="Delete"/></a></td>
					  </tr>
					  
					  <?php }?>
					 
					  
					</table>
				 
				
				<br/>
				
				</fieldset>
				<br/>
				
				<div class="operatebanner"><!--operatebanner open-->
				<fieldset>
				<legend><a href="manage_footer.php"><input type="button" name="" value="Add New Footer"/></a></legend>
				<br/>
				<form action="" method="post"  name="frm" >
				
					<table width="100%" border="0" cellspacing="1" cellpadding="0">
					  <tr bgcolor="#ABABAB">
					  	<td width="9%" align="center"><strong class="p7">Footer detail</strong></td>
						<td colspan="6"><textarea name="detail"  style="margin:0 0 0 5px; width:100px; width:530px"><?php if(isset($newFooter)) echo  $newFooter->getDetail() ?></textarea></td>
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