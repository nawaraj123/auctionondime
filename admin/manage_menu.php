<?php

  include_once('common/session.php');
	 
	include_once('../Dbconnection/db_conn.php');
	
	include_once('classes/menu.php');
	
	$menu=new Menu();
	 
	if(isset($_POST['submit'])){
	     
		$menu->setMenu($_POST['menuname']);
		
		$menu->setMethod($_POST['method']);
		
		if(isset($_POST['link']))
		
		$menu->setLink($_POST['link']);
		
		$menu->setPosition($_POST['position']);
		
	if(isset($_POST['status']))
		
			$menu->setStatus(1);
		else
			$menu->setStatus(0);
			
			
	if(isset($_GET['id']))
			{
				$menu->update($_GET['id']);
			}
		else
			{	
				$menu->insert();
			}
			
	    }
	
	
	
	if(isset($_GET['delete_id']))
			{
				$menu->delete();
			}
			
			
	if(isset($_GET['id']))
			{
				$newmenuObj=$menu->getDetail($_GET['id']);
			}
			
			
	   $menuListDisplay=$menu->display();
		
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Menu Management</title>
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
		  
	       if(document.getElementById('menuname').value=="")
		       {
			   alert("Please Enter Menu Name");
			   document.getElementById('menuname').focus();
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
				
			else
			return true;   
	      
		  }
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
				<legend><a href="manage_menu.php"><input type="button" name="" value="Menu Management"/></a></legend>
				<br/>
				 
				  <table width="100%" border="0" cellspacing="1" cellpadding="0">
  						<tr bgcolor="#ABABAB">
    					<td width="4%" align="center"><strong class="p7">S.NO</strong></td>
						<td width="30%" align="center"><strong class="p7">MENU NAME</strong></td>
						<td width="13%" align="center"><strong class="p7">MENU TYPE</strong></td>
						<td width="19%" align="center"><strong class="p7">LINK</strong></td>
						<td width="10%" align="center"><strong class="p7">POSITION</strong></td>
						<td width="6%" align="center"><strong class="p7">STATUS</strong></td>
						<td align="center" colspan="4"><strong class="p7">OPERATION</strong></td>		
					  </tr>
					   <?php 
					  	$sn=0;
						
						foreach($menuListDisplay as $menuObjs)
						 {
						  $sn++;
					  ?>
                      
					  <tr bgcolor="#C0C0C0">
						<td align="center"><?php echo $sn ?></td>
						<td align="center"><?php echo $menuObjs->getMenu()?></td>
						<td align="center"><?php echo $menuObjs->getMethod()?></td>
						<td align="center"><?php echo $menuObjs->getLink()?></td>
						<td align="center"><?php echo $menuObjs->getPosition()?></td>
						<td align="center"><input type="checkbox" <?php echo $menuObjs->getStatus()? "checked":""?> name="status"  /></td>
						<td width="8%" align="center"><a href="manage_menu.php?id=<?php echo $menuObjs->getId()?>"><img src="image/edite.png" alt="edit" title="Edit"/></a></td>
						<td width="10%" align="center"><a href="manage_menu.php?delete_id=<?php echo $menuObjs->getId()?>" onClick="return ConfirmDelete();"><img src="image/delete.png" alt="delete" title="Delete"/></a></td>
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
				<legend><a href="manage_menu.php"><input type="button" name="" value="Add New Menu"/></a></legend>
				<br/>
			<form action="" method="post"  name="demoform"  onsubmit="return valid(this.menu,this.link)">
				
					<table width="100%" border="0" cellspacing="1" cellpadding="0">
					  <tr bgcolor="#ABABAB">
						<td align="right" colspan="4" width="40%"><strong class="p8">Enter Menu</strong></td>
						
						<td colspan="4"><input type="text" id="menuname" name="menuname" value="<?php if(isset($newmenuObj)) echo  $newmenuObj->getMenu() ?>" size="34" style="margin:0 0 0 5px" /></td>
					  </tr>
					  <tr bgcolor="#ABABAB">
						<td align="right" colspan="4" width="40%"><strong class="p8">Menu type</strong></td>
						
				<td colspan="4"><select style="margin:0 0 0 5px" name="method" id="method" onchange="process_choice(this,document.demoform.link)">
                        
                                 <?php if(isset($newmenuObj)){ ?>
											<option><?php if(isset($newmenuObj)) echo $newmenuObj->getMethod()?></option>
                                            <?php }else{?>
                                            <option value="0">Select Method</option><?php } ?>
											<option value="Post">Post</option>
											<option value="Link">Link</option>
										</select>
                                        
                                        <noscript>
                                        <input type="text" name="link" value="<?php if(isset($newmenuObj)) echo $newmenuObj->getLink()?>" size="34" style="margin:0 0 0 5px"></noscript>
                                        
                                        
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
						<td align="right" colspan="4" width="40%"><strong class="p8">Enter Link</strong></td>
						
						<td colspan="4"><input type="text" name="link" id="forpost" value="<?php if(isset($newmenuObj)) echo $newmenuObj->getLink()?>" size="34" style="margin:0 0 0 5px" /></td>
					  </tr>
					  <tr bgcolor="#ABABAB">
						<td align="right" colspan="4" width="40%"><strong class="p8">Set Position</strong></td>
						<td width="5%"><input type="text" name="position" id="position" value="<?php if(isset($newmenuObj)) echo $newmenuObj->getPosition()?>" size="2" style="margin:0 0 0 5px"/></td>
						<td width="16%" align="center"><strong class="p8">Status</strong></td>
			<td width="41%"><input type="checkbox" checked="checked" name="status" <?php if(isset($newmenuObj)) echo $newmenuObj->getStatus()? "checked":""?>/></td>
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