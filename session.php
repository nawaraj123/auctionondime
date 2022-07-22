<?php if(!isset($_SESSION)) 
                {  session_start();		
                 } $login=$_SESSION['username'];			  
			  if($login==null){
				  ?>				  
     <div class="col-md-3 log-box">
     <a href='sign.php'>Login</a> 
      <a href='sign.php'>Signup</a> 
	<p><a href="#"><i class="fa fa-facebook-square"></i></a> <a href="#"><i class="fa fa-twitter-square"></i></a> <a href="#"><i class="fa fa-google-plus-square"></i></a> <a href="#"><i class="fa fa-linkedin-square"></i></a> <a href="#"><i class="fa fa-youtube-square"></i></a> <a href="#"><i class="fa fa-pinterest-square"></i></a> </p></div>
            <?php } else { ?>
				<div class="col-md-3 log-box">
                     Welcome back <?php echo $_SESSION['username'] ?>!
    <!--<a href="change-pwd.php">Change password</a> <a href='logout.php'>Logout</a> -->
        <a href="account.php">My Account</a> <a href='logout.php'>Logout</a> 

	<p><a href="#"><i class="fa fa-facebook-square"></i></a> <a href="#"><i class="fa fa-twitter-square"></i></a> <a href="#"><i class="fa fa-google-plus-square"></i></a> <a href="#"><i class="fa fa-linkedin-square"></i></a> <a href="#"><i class="fa fa-youtube-square"></i></a> <a href="#"><i class="fa fa-pinterest-square"></i></a> </p></div>				
				<?php } 				
				return; 
?>