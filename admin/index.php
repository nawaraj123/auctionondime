<?php

  include_once('../Dbconnection/db_conn.php');
  
  if(!isset($_SESSION)) 
      { 
        session_start(); 
		
       }
  
   $msg='';
   
//if(isset($_POST['login']) && $_POST['login']=="true")
  if($_POST){
      $username=$_POST['username'];
      $password=$_POST['password'];
      $password_encp=md5($password);

   $query="select * from tbl_user where username='$username'"; 
   $result=mysql_query($query);
   $data=mysql_fetch_assoc($result);
  if($data){
	   
 $pass=$data['password'];
 
 if(strcmp($password_encp,$pass)==0)
    {

  $_SESSION['uname']=$username;
  $_SESSION['pass']=$password;
  
  header("Location:main.php");
  
  return;
  }
 else
 {
  echo '<script>alert("Password doesnot match!");</script>';
 }
}
else
{

 echo '<script>alert("Invalid username and password!");</script>';
}

}

  session_destroy();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Panel</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>


</head>

<body>
   <div id="admin"> <!--Admin Login Box -->
   
        <div class="logo"><!--Logo Area-->
		     <!-- <img src="images/logo.png" align="left" />-->
			  <h1>Login Window</h1>
		</div>
		
		<div class="lock">
		     <img src="images/lock.png" align="left" />		</div>
		
		<div class="form"> <!-- Admin Login Form -->
		
		<form method="post" action="index.php" name="myform" onsubmit="MM_validateForm('username','','R','password','','R');return document.MM_returnValue">
		    <p>
			<label for="username" >Username</label><br />
			<input type="text" class="input" name="username" size="24" />
			</p>
			
			<p>
			<label for="username">Password</label><br />
			<input type="password" class="input" name="password" size="24" />
			</p>
			
			<input type="checkbox" /> Remember me 
			<input type="submit" name="submit" value="Login" class="btn" />
		</form>
		</div>
   </div>
   <!--Admin Login Box Ends-->
</body>
</html>
