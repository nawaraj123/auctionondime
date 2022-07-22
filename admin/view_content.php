<?php 
	include_once('common/session.php');
	 
	include_once('../Dbconnection/db_conn.php');
 
	include_once("classes/menucontent.php");
	
	include_once("classes/submenu.php");
	
	include_once("classes/trimenu.php");
	
	$menucontent=new menucontent();
	
		if(isset($_GET['delete_id']))
				{
					$menucontent->delete();
				}
	
	$menucontentListDisplay=$menucontent->getAllMenuContent();
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
			var ab=confirm("Are you sure to delete this record Permanently?")
				if(ab)
					return true;
					else
					return false;
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
				<legend><a href="view_content.php"><input type="button" name="" value="VIEW MENU CONTENT"/></a></legend>
				<br/>
				 
				  <table width="100%" border="0" cellspacing="1" cellpadding="0">
  						<tr bgcolor="#ABABAB">
								<td width="4%" align="center"><strong class="p7">S.NO</strong></td>
								<td width="11%" align="center"><strong class="p7">MENU</strong></td>
								<td width="11%" align="center"><strong class="p7">MENU NAME</strong></td>
								<td width="12%" align="center"><strong class="p7">PAGE TITLE</strong></td>
								<td width="19%" align="center"><strong class="p7">PAGE KEYWORD</strong></td>
								<td width="17%" align="center"><strong class="p7">IMAGE</strong></td>
								<td width="9%" align="center"><strong class="p7">ATTRIBUTE</strong></td>
								<td width="8%" align="center"><strong class="p7">POSITION</strong></td>
								<td width="7%" align="center"><strong class="p7">STATUS</strong></td>
								<td align="center" colspan="2"><strong class="p7">OPERATION</strong></td>
							  </tr>
					   <?php 
					  				$sn=0;
									
									
									foreach($menucontentListDisplay as $menucontentObjs)
									 {
						 				 $sn++;
										 $name="";
										 
										 if($menucontentObjs->getMenu_name()=="Mainmenu"){
										     $name=$menucontentObjs->getMenu()->getMenu();
											 
										 }else if($menucontentObjs->getMenu_name()=="SubMenu"){
										 	$name=$menucontentObjs->getMenu()->getSub_menu();
										 }else{
										 	$name=$menucontentObjs->getMenu()->getTri_menu();
										 }
										 
										 
										 
					 		 ?>
					  <tr bgcolor="#C0C0C0">
								<td align="center"><?php echo $sn; ?></td>
								<td align="center"><?php echo $menucontentObjs->getMenu_name(); ?></td>
								<td align="center"><?php echo $name; ?></td>
								<td><?php echo $menucontentObjs->getPage_title(); ?></td>
								<td><?php echo $menucontentObjs->getKeyword(); ?></td>
                         
                         <?php  if(isset($menucontentObjs)) 
						 
						         if($menucontentObjs->getImage()==""){ ?>
                         
                           <td> <img src="image/no_profile.jpg" height="80"/></td>
                         
                         <?php }else{ ?>
                         
								<td align="center"><img src="<?php echo $menucontentObjs->getImage(); ?>" height="80"/></td>
                                <?php } ?>
								<td align="center"><?php echo $menucontentObjs->getAttribute(); ?></td>
								<td align="center"><?php echo $menucontentObjs->getPosition(); ?></td>
								<td align="center"><input type="checkbox" name="" <?php echo $menucontentObjs->getStatus()? "checked": ""; ?> /></td>
								<td align="center" width="4%"><a href="manage_menucontent.php?id=<?php echo $menucontentObjs->getId(); ?>"><img src="image/edite.png" alt="Edit" title="Edit"/></a></td>
								<td align="center" width="9%"><a href="view_content.php?delete_id=<?php echo $menucontentObjs->getId(); ?>" onClick="return ConfirmDelete();"><img src="image/delete.png" alt="Delete" title="Delete"/></a></td>
							  </tr>
							   <?php 
							  	}
							  ?>
                              <tr bgcolor="#ABABAB">
							  	<td colspan="11" align="right"><a href="manage_menucontent.php"><input type="button" value="Add new content"/></a></td>
							  </tr>
					 
					</table>
				 
				
				<br/>
				
				</fieldset>
				<br/>
			
			</div><!--banner closed-->
			
			</div><!-- right-content closed -->
							
		</div><!--content closed-->	
		<?php include_once("common/footer.php") ?>
	</div><!--wrapper closed-->
</body>
</html>