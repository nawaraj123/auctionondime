<?php 
	include_once('common/session.php');
	 
	include_once('../Dbconnection/db_conn.php');
	
	include_once("classes/submenu.php");

	include_once("classes/menucontent.php");
	
	include_once("classes/trimenu.php");
	
	
	
	$menucontent=new menucontent();
	
		if(isset($_POST['submit']))
			{
				if($_POST['select']=="Mainmenu"){
					$menu=new Menu();
					$menu->setId($_POST['select2']);
					$menucontent->setMenu_name('Mainmenu');
					$menucontent->setMenu($menu);
				}
				else if($_POST['select']=="SubMenu"){
					$menu=new Submenu();
					$menu->setId($_POST['select2']);
					$menucontent->setMenu_name('SubMenu');
					$menucontent->setMenu($menu);
				}else{
					$menu=new Trimenu();
					$menu->setId($_POST['select2']);
					$menucontent->setMenu_name('TriMenu');
					$menucontent->setMenu($menu);
				}
				
//				$menucontent->setMenu_name($_POST['select2']);
				$menucontent->setPage_title($_POST['pagetitle']);
				$menucontent->setKeyword($_POST['keyword']);
				$menucontent->setAttribute($_POST['attribute']);
				$menucontent->setPosition($_POST['position']);
				//$menucontent->setMenu($_POST['status']);
				//$menucontent->setImage($_POST['userfile']);
				$menucontent->setDescription($_POST['des']);
				$menucontent->setDetails($_POST['details']);
				
				
				
				if(isset($_POST['status']))
					
					$menucontent->setstatus(1);
					else
					$menucontent->setstatus(0);
				
					if(isset($_GET['id']))
						{
						
							$menucontent->update($_GET['id']);
							
							 echo '<script>alert(" Menu content is updated successfully ")</script>';
						}
					else
						{
							$menucontent->insert();
							
							echo '<script>alert(" Menu content is Added successfully ")</script>';
							
						}
						
			}
			$menuname="";
					if(isset($_GET['id']))
						{
							$newmenucontentObj=$menucontent->getDetail($_GET['id']);
							if($newmenucontentObj->getMenu()=="Mainmenu"){
								$newmenu=new Menu();
								$newmenu=Menu::getDetail($newmenucontentObj->getMenu_name());
								
								$menuname=$newmenu->getMenu();
							}else if($newmenucontentObj->getMenu()=="SubMenu"){
								$newmenu=new Submenu();
								$newmenu=Submenu::getDetail($newmenucontentObj->getMenu_name());
								$menuname=$newmenu->getSub_menu();
							}
							
							else{
								$newmenu=new Trimenu();
								$newmenu=Trimenu::getDetail($newmenucontentObj->getMenu_name());
								$menuname=$newmenu->getTri_menu();
							}
		
						}
						
						
		if(isset($_GET['delimage'])){
			 
			 $menucontent->deleteImage($_GET['delimage']);
			 
			 }				
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Menu Content Management</title>
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
<script>
function combo()
       {
		 select1=document.getElementById("select");
		 select2=document.getElementById("select2");
		 len=select2.length=2;
		 val=select1.value;
		if(val=="Mainmenu")
		    {
		    
			<?php
				$rets=mysql_query("SELECT id,menu_name FROM tbl_mainmenu");
			?> 
			<?php
				$count=0;
				$optionlen=mysql_num_rows($rets);
				while($row=mysql_fetch_array($rets))
					{
			?>
						select2.options[<?php echo $count;?>]=new Option('<?php echo $row['menu_name'];?>','<?php echo $row['id'];?>');
						
			<?php 	
				$count++;
					}
			?>      
			
			}
		else if(val=="SubMenu")
		    {
			<?php
				$rets=mysql_query("SELECT id,sub_menu FROM tbl_submenu");
			?>
			<?php
				$count=0;
				$optionlen=mysql_num_rows($rets);
				while($row=mysql_fetch_array($rets))
					{
			?>
					select2.options[<?php echo $count;?>]=new Option('<?php echo $row['sub_menu'];?>','<?php echo $row['id'];?>');
			<?php 	
				$count++;
					}
			?>      
				
			}
		else if(val=="TriMenu")
			{
			<?php
				$rets=mysql_query("SELECT id,tri_menu FROM tbl_trimenu");
			?>
			<?php
				$count=0;
				$optionlen=mysql_num_rows($rets);
				while($row=mysql_fetch_array($rets))
					{
			?>
					select2.options[<?php echo $count;?>]=new Option('<?php echo $row['tri_menu'];?>', '<?php echo $row['id'];?>');
			<?php 	
				$count++;
					}
			?>      
			}
		
				
	   }
</script>



<script type="text/javascript">

	    function validate_required(field,alerttxt)
	      {
		  
	       if(document.getElementById('select').value=="0")
		       {
			   alert("Please Select Menu Type");
			   document.getElementById('select').focus();
			   return false 
			   }
			   
			   if(document.getElementById('pagetitle').value=="")
		       {
			   alert("Please Type pagetitle");
			   document.getElementById('pagetitle').focus();
			   return false 
			   }
			   
			   if(document.getElementById('attribute').value=="0")
		       {
			   alert("Please Select attribute");
			   
			   document.getElementById('attribute').focus();
			   
			   return false 
			   }

		   			   
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
							
                            <legend><a href="manage_menucontent.php"><input type="button" name="" value="Add menu content"/></a></legend>
							<form action="" method="post"  name="frm" enctype="multipart/form-data" >
							<table width="100%" border="0" cellspacing="1" cellpadding="0">
							  <tr bgcolor="#ABABAB">
								<td width="19%" align="center"><strong class="p7">Select Menu</strong></td>
								<td width="19%">
									<select  style="width:150px; margin:0 0 0 5px" name="select" id="select" onchange="combo()">
										<option value="0">Select Menu type</option>
                                        
						   <option <?php if(isset($newmenucontentObj)) echo $newmenucontentObj->getMenu()=="Mainmenu"?"selected":"" ?> value="Mainmenu">Mainmenu</option>
                                        
					        <option <?php if(isset($newmenucontentObj)) echo $newmenucontentObj->getMenu()=="SubMenu"?"selected":"" ?> value="SubMenu">SubMenu</option>
                            
							<option <?php if(isset($newmenucontentObj)) echo $newmenucontentObj->getMenu()=="TriMenu"?"selected":"" ?> value="TriMenu">TriMenu</option>			
							 		 </select>
								</td>
								<td width="19%" align="center"><strong class="p7">Select Menu name</strong></td>
								<td width="19%">
									<select name="select2" id="select2" style="margin:0 0 0 5px; width:140px">
										
										<option value="<?php if(isset($newmenucontentObj)) echo $newmenucontentObj->getMenu_name(); ?>">
										   <?php  echo $menuname ?>
                                           
										</option>
									</select>
								</td>
								<td width="9%" align="center"><strong class="p7">Page Title</strong></td>
								<td width="23%" colspan="3"><input type="text" name="pagetitle" id="pagetitle" size="25" value="<?php if(isset($newmenucontentObj)) echo $newmenucontentObj->getPage_title(); ?>" style="margin:0 0 0 5px"/></td>
								
							  </tr>
							  <tr bgcolor="#ABABAB">
							  	<td width="8%" align="center"><strong class="p7">Keywords</strong></td>
								<td>
									<textarea name="keyword" style="margin:0 0 0 5px; width:150px"><?php if(isset($newmenucontentObj)) echo $newmenucontentObj->getKeyword() ?></textarea>
								</td>
								<td align="center"><strong class="p7">Attribute</strong></td>
								<td>
									<select name="attribute" style="margin:0 0 0 5px; width:100px">
                                    
                                    <?php if(isset($newmenucontentObj)){?>
										<option><?php if(isset($newmenucontentObj)) echo $newmenucontentObj->getAttribute(); ?></option>
                                        <?php }?>
                                        
                                        <option value="0">Select One</option> 
										<option>Read more</option>
										<option>Read all</option>
									</select>
								</td>
								<td align="center"><strong class="p7">Position</strong></td>
								<td><input type="text" name="position" size="1" value="<?php if(isset($newmenucontentObj)) echo $newmenucontentObj->getPosition(); ?>" style="margin:0 0 0 5px"/></td>
								<td align="center"><strong class="p7">Status</strong></td>
								<td><input type="checkbox" checked="checked" name="status" <?php if(isset($newmenucontentObj)) echo $newmenucontentObj->getStatus()? "checked":""; ?> /></td>
							  </tr>
							  <tr bgcolor="#ABABAB">
							  	<td align="center"><strong class="p7">Select Image</strong></td>
                                 <?php 
						
						if(isset($newmenucontentObj)){
							
							$newImage=new menucontent();
						
						  if($newImage->getImages($_GET['id'])==""){  ?>
                         
                           <td> <img src="image/no_profile.jpg"  height="80"/></td>
                         
                         <?php }else{ ?>
                         
                          <td> <?php $thumb=explode('/',$newImage->getImages($_GET['id'])); $thumbing="gallery/".$thumb[1];?><a href="manage_menucontent.php?delimage=<?php echo $newmenucontentObj->getId()?>" onclick="return ConfirmDelete();"><img src="<?php echo $thumbing; ?>" height="80" title="Click image to Remove"/></a></td>
                       
                      <?php } ?>
						
                                
                                
								<td class="3"><input type="file" name="userfile" size="10" style="margin:0 0 0 5px"/></td>
                                <?php }else{?>
                                <td class="3"><input type="file" name="userfile" size="10" style="margin:0 0 0 5px"/></td>
                                
                                <?php } ?>
                                
                                
								<td align="center"><strong class="p7">Description</strong></td>
								<td colspan="5">
									<textarea name="des" style="margin:0 0 0 5px; width:370px"><?php if(isset($newmenucontentObj)) echo $newmenucontentObj->getDescription() ?></textarea>
								</td>
							  </tr>
							  <tr bgcolor="#ABABAB">
							  	<td colspan="8" align="center"><strong class="p7">Type Details</strong></td>		
							  </tr>
							  <tr bgcolor="#ABABAB">
									<td colspan="8">
									<?php 
										include "fckeditor2/fckeditor.php";
										$oFCKeditor = new FCKeditor('details') ;
										$oFCKeditor->BasePath = 'fckeditor2/' ;
										if(isset($newmenucontentObj))
										$oFCKeditor->Value	=  $newmenucontentObj->getDetails();
										//echo $row['details'];
										$oFCKeditor->Create();
										//echo $data['details'];
											
									?>
                                    		
									</td>	
							  </tr>
							  <tr bgcolor="#ABABAB">
							  	<td colspan="8" align="right"><input type="submit" name="submit" value="Submit" onclick="return validate_required();" style="margin:0 5px 0 0" /><input type="reset" name="reset" value="Reset"/></td>
							  </tr>
							</table>
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