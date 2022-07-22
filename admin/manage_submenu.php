<?php
    include_once('common/session.php');
	include_once('../Dbconnection/db_conn.php');
	include_once('classes/submenu.php');
	include_once('classes/menu.php');
	
	$submenu=new Submenu();
	
	
	if(isset($_POST['submit']))
	{
		$submenu->setMainmenu($_POST['selectmenu']);
		
		$submenu->setSub_menu($_POST['submenu']);
		
		$submenu->setMethod($_POST['method']);
		
		$submenu->setPosition($_POST['position']);
		$submenu->setBottom_position($_POST['bottom_position']);
		
	if(isset($_POST['link']))
		
		$submenu->setLink($_POST['link']);
		
		if(isset($_POST['status']))
		
			$submenu->setStatus(1);
			
			else
			$submenu->setStatus(0);
		
		if(isset($_GET['id']))
			{
				
				$submenu->update($_GET['id']);
			}
		else
			{	
				$submenu->insert();
			}
	}
	if(isset($_GET['delete_id']))
			{
				$submenu->delete();
			}
	if(isset($_GET['id']))
			{
				$newsubmenuObj=$submenu->getDetail($_GET['id']);
			}
			
	$submenuListDisplay=$submenu->display();
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SubMenu Management</title>
<link href="css/styleadmin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	    function validate_required(field,alerttxt)
	      {
		  
	       if(document.getElementById('selectmenu').value=="0")
		       {
			   alert("Please Enter Menu Name");
			   document.getElementById('selectmenu').focus();
			   return false
			  	}
				
			if(document.getElementById('method').value=="0")
		       {
			   alert("Please Select Method");
			   document.getElementById('method').focus();
			   return false
			  	}
			if(document.getElementById('menutype').value=="")
		       {
			   alert("Please Select Menu Type");
			   document.getElementById('menutype').focus();
			   return false
			  	}
			
			if(document.getElementById('position').value=="")
		       {
			   alert("Please Enter position");
			   document.getElementById('position').focus();
			   return false
			  	}
				
			if(document.getElementById('submenu').value=="")
		       {
			   alert("Please Enter Submenu");
			   document.getElementById('submenu').focus();
			   return false
			  	}
				
			else
			return true;   
	      
		  }
</script>
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

</script>


<script type="text/javascript" language="JavaScript"><!--

function activate(field) {

  field.disabled=false;

  if(document.styleSheets)field.style.visibility  = 'visible';

  field.focus(); }

function last_choice(selection) {

  return selection.selectedIndex==selection.length - 1; }

function process_choice(selection,textfield) {

  if(last_choice(selection)) {

    activate(textfield); }

  else {

    textfield.disabled = true;    

    if(document.styleSheets)textfield.style.visibility  = 'hidden';

    textfield.value = ''; }}

function valid(menu,txt) {

  if(menu.selectedIndex == 0) {

    alert('You must make a selection from the menu');

    return false;} 

  if(txt.value == '') {

    if(last_choice(menu)) {

      alert('You need to type your choice into the text box');

      return false; }

    else {

      return true; }}

  else {

    if(!last_choice(menu)) {

      alert('Incompatible selection');

      return false; }

    else {

      return true; }}}

function check_choice() {

  if(!last_choice(document.demoform.menu)) {

    document.demoform.link.blur();

    alert('Please check your menu selection first');

    document.demoform.menu.focus(); }}

//--></script>








<script>
function combo()
       {
		 select1=document.getElementById("menutype");
		 select2=document.getElementById("mainmenu");
		 len=select2.length=2;
		 val=select1.value;
		if(val=="Mainmenu")
		    {
		    
			<?php
				$rets=mysql_query("SELECT menu_name,id FROM tbl_mainmenu ");
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
		else if(val=="Leftmenu")
		    {
			<?php
				$rets=mysql_query("SELECT menu_name, id FROM tbl_mainmenu ");
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
				<legend><a href="manage_submenu.php"><input type="button" name="" value="Submenu Management"/></a></legend>
				<br/>
				 
				  <table width="100%" border="0" cellspacing="1" cellpadding="0">
  						<tr bgcolor="#ABABAB">
    					<td width="4%" align="center"><strong class="p7">S.NO</strong></td>
						<td width="21%" align="center"><strong class="p7">MAINMENU NAME</strong></td>
						<td width="21%" align="center"><strong class="p7">SUBMENU NAME</strong></td>
						<td width="13%" align="center"><strong class="p7">MENU TYPE</strong></td>
						<td width="11%" align="center"><strong class="p7">LINK</strong></td>
						<td width="9%" align="center"><strong class="p7">POSITION</strong></td>
						<td width="7%" align="center"><strong class="p7">STATUS</strong></td>
						<td>Botton position</td>
					
						<td align="center" colspan="4"><strong class="p7">OPERATION</strong></td>		
					  </tr>
					  <?php 
					  	$sn=0;
						
						foreach($submenuListDisplay as $submenuObjs)
						 {
						 	if((strcmp(strtolower($submenuObjs->getMainmenu()->getMenu()),'products')))
								{
						  $sn++;
					  ?>
					  <tr bgcolor="#C0C0C0">
						<td align="center"><?php echo $sn ?></td>
						<td align="center"><?php
					
	
						echo $submenuObjs->getMainmenu()->getMenu()?>

						</td>	
						
						<td align="center"><?php echo $submenuObjs->getSub_menu()?></td>
						<td align="center"><?php echo $submenuObjs->getMethod()?></td>
						
						<td align="center"><?php echo $submenuObjs->getLink()?></td>
						
						<td align="center"><?php echo $submenuObjs->getPosition()?></td>
						
						<td align="center"><input type="checkbox" name="" value="" <?php echo $submenuObjs->getStatus()? "checked":""?>/></td>
						<td align="center"> <?php echo $submenuObjs->getBottom_position() ?></td>
					
							
						<td width="8%" align="center"><a href="manage_submenu.php?id=<?php echo $submenuObjs->getId()?>"><img src="image/edite.png" alt="edit" title="Edit"/></a></td>
						<td width="10%" align="center"><a href="manage_submenu.php?delete_id=<?php echo $submenuObjs->getId()?>" onClick="return ConfirmDelete();"><img src="image/delete.png" alt="delete" title="Delete"/></a></td>
						<?php } ?>
					  </tr>
					  <?php 
					  	}
					  ?>
					 
					</table>
				 
				
				<br/>
				
				</fieldset>
				<br/>
				
				<div class="operatebanner"><!--operatebanner open-->
				<fieldset>
				<legend><a href="manage_submenu.php"><input type="button" name="" value="Add New SubMenu"/></a></legend>
				<br/>
				<form action="" method="post"  name="demoform"  onsubmit="return valid(this.menu,this.link)" >
				
					<table width="100%" border="0" cellspacing="1" cellpadding="0">
				
					  	
					  <tr bgcolor="#ABABAB">
					  
						<td align="right" colspan="4" width="50%"><strong class="p8">Select Menu name</strong></td>
						
						<td colspan="4" align="left"><select name="selectmenu" id="selectmenu" style="margin:0 0 0 5px; width:230px" >
						
						                          <option value="0">Select Main Menu</option>
														
														<?php 
														 	$menus=Menu::display();
															foreach($menus as $menuObj)
						 									{
						 										if((strcmp(strtolower($menuObj->getMenu()),'products')))
															{
					  									  ?>
	<option  <?php if(isset($newsubmenuObj)){ echo $menuObj->getId()==$newsubmenuObj->getMainMenu()->getId()?"selected":"";}?> value="<?php echo $menuObj->getId()?>">
															<?php 
															
															
																echo $menuObj->getMenu() ?></option>
															
															
															

														
														
														<?php  } }?>								                                    
						                                
													</select>
						</td>
					  </tr>
					   <tr bgcolor="#ABABAB">
						<td align="right" colspan="4" width="50%"><strong class="p8">Enter SubMenu</strong></td>
						
						<td colspan="4" align="left"><input type="text" name="submenu" id="submenu" value="<?php if(isset($newsubmenuObj)) echo  $newsubmenuObj->getSub_menu() ?>" size="34" style="margin:0 0 0 5px"/></td>
					  </tr>
					  <tr bgcolor="#ABABAB">
						<td align="right" colspan="4" width="50%"><strong class="p8">Menu type</strong></td>
						
						<td colspan="4"><select style="margin:0 0 0 5px" name="method" id="method" onchange="process_choice(this,document.demoform.link)">
                        
                          <?php if(isset($newsubmenuObj)){ ?>
											<option><?php if(isset($newsubmenuObj)) echo $newsubmenuObj->getMethod()?></option>
                                            <?php }else{?>
                                            <option value="0">Select Method</option><?php } ?>
						                    <option value="Post">Post</option>
											<option value="Link">Link</option>
										</select>	
                                        
                                        
                    <noscript><input type="text" name="link" value="<?php if(isset($newsubmenuObj)) echo $newsubmenuObj->getLink()?>" size="34" style="margin:0 0 0 5px"></noscript>
                                        
                                        
 <script type="text/javascript" language="JavaScript"><!--

disa = ' disabled';

if(last_choice(document.demoform.menu)) disa = '';

document.write('<input type="text" name="choicetext"'+disa+

' onfocus="check_choice()">');

if(disa && document.styleSheets)

   document.demoform.choicetext.style.visibility  = 'hidden';

//--></script>        
                                        					
                                     
                                        </td>
					  </tr>
					  <tr bgcolor="#ABABAB">
						<td align="right" colspan="4" width="50%"><strong class="p8">Enter Link</strong></td>
						
						<td colspan="4"><input type="text" name="link" value="<?php if(isset($newsubmenuObj)) echo  $newsubmenuObj->getLink() ?>" size="34" style="margin:0 0 0 5px" /></td>
					  </tr>
					  <tr bgcolor="#ABABAB">
					  <td align="right" colspan="4" width="50%"><strong class="p8">Set Bottom Position</strong></td>
					  <td colspan="3" width="9%" ><input type="text" name="bottom_position" id="position" value="<?php if(isset($newsubmenuObj)) echo  $newsubmenuObj->getBottom_position(); ?>" size="2" style="margin:0 0 0 5px"/></td>
					  </tr>
					  <tr bgcolor="#ABABAB">
						<td align="right" colspan="4" width="50%"><strong class="p8">Set Position</strong></td>
						<td width="9%"><input type="text" name="position" id="position" value="<?php if(isset($newsubmenuObj)) echo  $newsubmenuObj->getPosition() ?>" size="2" style="margin:0 0 0 5px"/></td>
						<td width="16%" align="right"><strong class="p8">Status</strong></td>
						<td width="37%"><input type="checkbox"  checked="checked" name="status" <?php if(isset($newsubmenuObj)) echo $newsubmenuObj->getStatus()? "checked":""?>/></td>
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