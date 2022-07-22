<?php
  
  include_once('common/session.php');

  include_once('../Dbconnection/db_conn.php'); 
  
  include_once('classes/create_user.php');
  
  
   
   $user= new Create_user();
   
	if(isset($_POST['submit'])){
		 
	   $username=$_POST['oldpass'];
	   
	   $password=$_POST['newpass'];
	   
	   $repassword=$_POST['repass'];
	   
  if ($password==$repassword){
	
		   $user->setUsername($username);
		    $password_encp=md5($password);
		   $user->setPassword($password_encp);
		   $user->setUser($username,$password_encp);
		   
		  // $user->changePassword();
		   
		   // $_SESSION['pass']=$newpassword;
		   
		    echo "<script>alert('User created successfully');</script>";
			
			echo '<script>window.location="create_user.php";</script>';
			
		    
	     }else{
			 
	   echo "<script>alert('Password and confrim password doesnot match');</script>";
	   
	        echo '<script>window.location="create_user.php";</script>';
	      }
	   
	  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Create User</title>
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
with (field)
  {
  
  if (value==null||value=="")
    {
    alert(alerttxt);
	return false;
    }
  else
    {
    return true;
    }
  }
}

function validate_form(thisform)
{
with (thisform)
  {
  if (validate_required(oldpass," Username cannot be blank")==false)
  {
   oldpass.focus();
  return false;
  } 
  if (validate_required(newpass," password cannot be blank")==false)
  {
   newpass.focus();
  return false;
  } 
  if (validate_required(repass," Confirm password cannot be blank")==false)
  {
   repass.focus();
  return false;
  } 
  return true;
   
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
				
		<div class="operatebanner"><!--operatebanner open-->
				<fieldset>
                
                <legend><a href="create_user.php"><input type="button" name="" value="Create User"/></a></legend>
				
				<br/>
				    <form action="" method="post"  name="frm" onsubmit="return validate_form(this)" >
															
															
				      <table border="0" align="center" style="color:#360" >
                      
					  			<tr>
									<td>Username</td>
												<td><input type="text" name="oldpass" size="30" /></td>
													</tr>
									<tr>
								<td>Password</td>
											<td><input type="password" name="newpass" size="30" /></td>
										</tr>
                                        
									<tr>
										<td>Confirm  password</td>
											<td><input type="password" name="repass" size="30" /></td>
													</tr>	
												<tr>
											<td  colspan="3" align="right"><input type="submit" name="submit" value="Save" />
                                          
                                             
                                            <a href="main.php"><input type="button" name="" value="Cancel" style="float:right"/></a></td>
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