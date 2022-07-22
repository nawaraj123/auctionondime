<?php 
$GLOBALS['DOT']="";
    include_once('common/session.php');

	include_once('../Dbconnection/db_conn.php');

	include_once('classes/banner.class.php');
	
	$banner=new banner();
	
    if(isset($_POST['updatestatus'])){
       
				$banner->removeStatus();
	   
				if(isset($_POST['statusList'])){
		   
						$checkarray=$_POST['statusList'];
			
						$countarray=count($checkarray);
       
				for($i=0;$i<$countarray;$i++)
	       		 {
						$banner->updateStatus($checkarray[$i]);
		  
		  		 }
	      }
		  
	    }  
		if(isset($_POST['submit']))
	   {
				$banner->setHeading(mysql_prep($_POST['heading']));
		
				$banner->setDiscription(mysql_prep($_POST['discription']));
					$banner->setLink($_POST['link']);
				if(isset($_POST['status']))
		
						$banner->setStatus(1);
			
				else
		
						$banner->setStatus(0);

				if(isset($_GET['id']))
				{
					$banner->setId($_GET['id']);
		
					$banner->update();
				}
				else
		
				{
					$banner->insert();
				}

		}
	
		if(isset($_GET['id']))
		{
			$newbannerObj=$banner->getDetail($_GET['id']);
		}
	  
		else 
	
	  {
		if(isset($_GET['delete_id']))
		
			$banner->delete();
			
	   }
	   
	$bannerListDisplay=$banner->display();
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Banner Management</title>
<link href="css/styleadmin.css" rel="stylesheet" type="text/css" />
<script>
function ConfirmDelete()
{
var ab=confirm("Are you sure you wish to delete this record permanently?");
if(ab)
return true;
else
return false;

}
</script>

<script>

function ConfirmUpdate()
{
var ab=confirm("Are you sure you wish to update this banner?");
if(ab)
return true;
else
return false;

}

</script>

</head>

<body>
	<div id="wrapper">
	<?php include_once("common/header.php") ?>
	
			<div class="content"><!--content open-->
			<?php include("common/nav.php") ?>
			
			<div class="right-content"><!-- right-content open -->
			<div class="banner"><!--banner open-->
			<br/>
			
				<fieldset>
				<legend><a href="manage_banner.php"><input type="button" name="" value="Banner Management"/></a></legend>
				<br/>
				  <form name="status" action="" method="post">	
				  <table width="100%" border="0" cellspacing="1" cellpadding="0">
  						<tr bgcolor="#ABABAB">
    					<td width="4%" align="center"><strong class="p7">S.NO</strong></td>
						<td width="70%" align="center"><strong class="p7">IMAGE</strong></td>
						<td width="8%" align="center"><strong class="p7">LINK</strong></td>
								<td width="8%" align="center"><strong class="p7">STATUS</strong></td>

						<td align="center" colspan="4"><strong class="p7">OPERATION</strong></td>	
						
						
					  </tr>
					
					  <?php
					  
					  	$sn=0;
						
						foreach($bannerListDisplay as $bannerObjs){
							
						  $sn++;
					  ?>
					  
					  <tr bgcolor="#C0C0C0">
						<td align="center"><?php echo $sn ?></td>
						<td align="center"><img src="../uploadedimages/original/<?php echo $bannerObjs->getImage()?>" width="300" height="80" /></td>
						<td align="center"><?php echo $bannerObjs->getLink()?></td>
						<td align="center"><input type="checkbox" name="statusList[]" value="<?php echo $bannerObjs->getId()?>" <?php if($bannerObjs->getStatus()){ ?>checked="checked" <?php } ?>/></td>
						
						
						
						
					
						<td width="9%" align="center"><a href="manage_banner.php?action=edit&amp;id=<?php echo $bannerObjs->getId()?>"><img src="image/edite.png" alt="edit" title="Edit"/></a></td>
						<td width="9%" align="center"><a href="manage_banner.php?delete_id=<?php echo $bannerObjs->getId()?>" onClick="return ConfirmDelete();"><img src="image/delete.png" alt="delete" title="Delete"/></a></td>
					  </tr>
					 
					  <?php 
					  	}
					  ?>
					   <tr bgcolor="#C0C0C0">
					    <td align="right" colspan="5"><input type="submit" name="updatestatus" value="updatebanner" onclick="return ConfirmUpdate();" /></td>
				    </tr>
					</table>
				  </form>
					<br/>
				</fieldset>
				<br/>
				
				<div class="operatebanner"><!--operatebanner open-->
				<fieldset>
				<legend><a href="manage_banner.php"><input type="button" name="" value="Add New Banner"/></a></legend>
				<br/>
				<form action="" method="post" enctype="multipart/form-data" name="" >
				
					<table width="100%" border="0" cellspacing="1" cellpadding="0">
					  <tr bgcolor="#ABABAB">
						<td width="30%" align="right"><strong class="p8">Select image</strong></td>
						<td width="70%"><input type="file"   name="image" style="margin:0 0 0 5px" /></td>
					  </tr>
					  	   <tr bgcolor="#ABABAB">
								<td width="30%" align="right"><strong class="p8">Heading</strong></td>
								<td width="76%" colspan="4"><input type="text" id="name" name="heading" value="<?php if(isset($newbannerObj)) echo  $newbannerObj->getHeading() ?>" size="34" style="margin:0 0 0 5px" /></td>
							</tr>
							 <tr bgcolor="#ABABAB">
								<td width="30%" align="right"><strong class="p8">Link</strong></td>
								<td width="76%" colspan="4"><input type="text" id="name" name="link" value="<?php if(isset($newbannerObj)) echo  $newbannerObj->getLink() ?>" size="34" style="margin:0 0 0 5px" /></td>
							</tr>
							 <tr bgcolor="#ABABAB">
					  	<td width="11%" align="center"><strong class="p7">Discription</strong></td>
						<td colspan="10"><textarea name="discription" style="margin:0 0 0 5px; width:227px; height:130px"><?php if(isset($newbannerObj)) echo  $newbannerObj->getDisciption() ?></textarea></td>
					  </tr>

					  <tr bgcolor="#ABABAB">
						<td align="right"><strong class="p8">Status</strong></td>
						<td><input type="checkbox" name="status"  checked="checked" value="" <?php if(isset($newbannerObj)) echo $newbannerObj->getStatus()?"checked":""?>/></td>
					  </tr>
				
                      
					  <tr bgcolor="#ABABAB">
						<td align="right" colspan="2"><input type="submit" name="submit" value="Submit" style="margin:0 5px 0 0" /></td>
					  </tr>
					</table>
					<br/>
                         
                                  <div align="center"><?php if(isset($newbannerObj)){ ?><img src="../uploadedimages/original/<?php echo $newbannerObj->getImage() ?>" width="200" height="80"  alt="banner image"/><?php }else{?><img src="image/no_profile.jpg" width="200" height="80"  alt="banner image"/><?php } ?></div>	
                        			<div style="text-align:center; font:normal 10px Arial, Helvetica, sans-serif; color:#FF0000">Banner image size : width: 1001px, height: 330px</div>																 
				</form>
				
				</fieldset>
				<br/>
				</div><!--operatebanner closed-->
			
			</div><!--banner closed-->
			
			</div><!-- right-content closed -->
								
		</div><!--content closed-->	
		<?php include_once("common/footer.php") ?>
	</div>	
		
	
</body>

</html>