<?php
$GLOBALS['DOT']="";
  include_once('common/session.php');

  include_once('../Dbconnection/db_conn.php'); 


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Panel</title>
<link href="css/styleadmin.css" rel="stylesheet" type="text/css" />

</head>

<body>
	<div id="wrapper"><!-- wrapper open -->
	
		<?php include_once("common/header.php") ?>
	
		<div class="content"><!-- content open -->
			
			<?php include("common/nav.php") ?>
			
			<?php // include("welcome.php") ?>
								
		</div><!-- content closed -->
		
	</div><!-- wrapper closed -->
			
		<?php include_once("common/footer.php") ?>
	
</body>

</html>