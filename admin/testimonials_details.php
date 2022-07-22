<?php

       include_once('common/session.php');

       include_once('../Dbconnection/db_conn.php');
	
	   include_once('classes/Testimonials.php');
	
	  $news=new Testimonials();
	
	if(isset($_POST['submit'])){
	     
		$news->setHeading($_POST['heading']);
		
		$news->setDetail($_POST['detail']);
		
		$news->setDescription($_POST['description']);
	
			if(isset($_POST['fnews']))
		
			$news->setFnews(1);
		else
			$news->setFnews(0);
		
	if(isset($_GET['id']))
			{
				$news->updateNews($_GET['id']);
			}
		else
			{	
				$news->add();
			}
			
	    }
		
		
	 if(isset($_GET['delete_id']))
			{
				$news->delete();
			}
			
	 if(isset($_GET['id']))
			{
				$newnewsObj=$news->getNews($_GET['id']);
			}
			
	 if(isset($_GET['delimage'])){
			 
			 $news->deleteImage($_GET['delimage']);
			 
			 }		
		
		
	
			   
		$newsObj=$news->listNews();   
	

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>News Management</title>
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
			   alert("Please Enter main heading of the news");
			   document.getElementById('heading').focus();
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
				<legend><a href="testimonials_details.php"><input type="button" name="" value="TESTIMONIALS MANAGEMENT"/></a></legend>
				<br/>
				 
				  <table width="100%" border="0" cellspacing="1" cellpadding="0">
  						<tr bgcolor="#ABABAB">
    					<td width="4%" align="center"><strong class="p7">S.NO</strong></td>
						<td width="30%" align="center"><strong class="p7">HEADING</strong></td>
						<td align="center" colspan="1"><strong class="p7">IMAGE</strong></td>	
						<td align="center" colspan="4"><strong class="p7">OPERATION</strong></td>		
					  </tr>
					  
					    <?php 
					  
					  	   $sn=0;
						
						   foreach($newsObj as $news){
						   
						      $sn++;
							  
					    ?>
                        				  
					  <tr bgcolor="#C0C0C0">
						<td align="center"><?php echo $sn?></td>
						<td align="center"><?php echo $news->getHeading()?></td>
					
                         <?php  if($news->getImage()==""){ ?>
                         
                           <td align="center"> <img src="image/no_profile.jpg" height="80"/></td>
                         
                         <?php }else{ ?>
                        
		<td align="center"><img src="../uploadedimages/original/<?php echo $news->getImage() ?>" height="80" /></td>
                        
                        <?php }?>
                        
						<td width="8%" align="center"><a href="testimonials_details.php?id=<?php echo $news->getId()?>"><img src="image/edite.png" alt="edit" title="Edit"/></a></td>
						<td width="10%" align="center"><a href="testimonials_details.php?delete_id=<?php echo $news->getId()?>" onClick="return ConfirmDelete();"><img src="image/delete.png" alt="delete" title="Delete"/></a></td>
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
				<legend><a href="testimonials_details.php"><input type="button" name="" value="Add New Testimonials"/></a></legend>
				<br/>
				<form action="" method="post"  name="frm" enctype="multipart/form-data" >
				
					<table width="100%" border="0" cellspacin="1" cellpadding="0">
					<tr bgcolor="#ABABAB">
						<td align="right" colspan="4"><strong class="p8">Heading</strong></td>
						
						<td width="76%" colspan="4"><input type="text" id="heading" name="heading" value="<?php if(isset($newnewsObj)) echo  $newnewsObj->getHeading() ?>" size="34" style="margin:0 0 0 5px" /></td>
					  </tr>
					
					  
					   <tr bgcolor="#ABABAB">
					  	<td width="11%" align="center"><strong class="p7">Testimonials Detail</strong></td>
						<td colspan="10"><textarea name="detail" style="margin:0 0 0 5px; width:100px; width:530px"><?php if(isset($newnewsObj)) echo  $newnewsObj->getDetail() ?></textarea></td>
					  </tr>
					  
					  <tr bgcolor="#ABABAB">
						<td align="right" colspan="4"><strong class="p8">Image</strong></td>
                        <?php 
						
						if(isset($newnewsObj)){
							
						$newImage=new News();
						
						 ?>
                         
                         <?php  if($newImage->getImages($_GET['id'])==""){ ?>
                         
                           <td> <img src="image/no_profile.jpg" height="80"/></td>
                         
                         <?php }else{ ?>
                         
                         
                       
						  <td><a href="testimonials_details.php?delimage=<?php echo $newnewsObj->getId()?>" onclick="return ConfirmDelete();"><img src="<?php echo $newnewsObj->getImages()?>" height="80" title="Click image to Remove" /></a></td>  
                      <?php } ?>
						
						<td colspan="4"><input type="file" id="image" name="userfile" value="" /> </td>
                        
                        <?php }else{?>
                        
                        <td colspan="4"><input type="file" id="image" name="userfile" value="" /> </td>
                        
                        <?php } ?>
                        
					  </tr>
					  <tr   bgcolor="#ABABAB">
					   <td colspan ="8" width="16%" align="left"><strong class="p8">Featuerd News</strong><input type="checkbox" name="fnews" <?php if(isset($newnewsObj)) echo $newnewsObj->getFnews()?"checked":"" ?>/></td>
					  </tr>
					  <tr bgcolor="#ABABAB">
						<td align="center" colspan="5"><strong class="p8">Type your main content below</strong></td>
					  </tr>
						<tr bgcolor="#ABABAB">
					  	<td align="center" colspan="8" >
							<?php 
										include "fckeditor2/fckeditor.php";
										$oFCKeditor = new FCKeditor('description') ;
										$oFCKeditor->BasePath = 'fckeditor2/' ;
										if(isset($newnewsObj))
										$oFCKeditor->Value	=  $newnewsObj->getDescription();
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