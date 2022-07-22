<?php  
             if(!isset($_SESSION)) 
                { 
                  session_start(); 
		
                 }
			 
			  $login=$_SESSION['uname'];
			  
			  if($login==null){
				  
			  	header('location:index.php');
				
				return; 
				
				}
				
				
?>		