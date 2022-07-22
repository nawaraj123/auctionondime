<?php 
 class Useraccount{
 
     private $id;
	 public $conxn;
	 private $user_id;
	 private $username;
	 private $balance_cents;
	 private $name;
	 private $password;
	 private $email; 	
	
	
	 
	 
	 function __construct(){
		/*$this->connectdatabase("localhost","root","","db_peace");*/
		}	
		function __destruct(){
		//mysql_close($this->conxn);
		}		
			
			public function getUser_id()
			{
				return $this->user_id;
			}
		public function setUser_id($user_id)
			{
				$this->user_id=$user_id;
			}	
			
			public function getUsername()
			{
				return $this->username;
			}
		public function setUsername($username)
			{
				$this->username=$username;
			}	
			
			public function getBalance_cents()
			{
				return $this->balance_cents;
			}
		public function setBalance_cents($balance_cents)
			{
				$this->balance_cents=$balance_cents;
			}	
			
			
			public function getName()
			{
				return $this->name;
			}
		public function setName($name)
			{
				$this->name=$name;
			}	
			
			
			public function getPassword()
			{
				return $this->password;
			}
		public function setPassword($password)
			{
				$this->password=$password;
			}	
			
			public function getEmail()
			{
				return $this->email;
			}
		public function setEmail($email)
			{
				$this->email=$email;
			}		
			
	
	  
	  public function addBid(){					
					
			   $query="insert into bid_record set product_id='$this->product_id', price='$this->price', user_name='$this->user_name',current_bid_number='$this->current_bid_number'";
			   
				
		              mysql_query($query) or die("error on insert");	
					  
			   
			   
			   echo "<script> alert('Bid Added successfully') </script>";
	
	        }		
			
			
		   
		   public function getCurrentbalance($username){
		        
				$query="select balance_cents  from  tbl_users where  username='$username'";
				
				$resultSearch= mysql_query($query);
	 
			if($resultSearch){
			
			  $row = mysql_fetch_array($resultSearch);
				  
		        $account=new Useraccount();
		
		        $account->setBalance_cents($row['balance_cents']-10);
		
		       
		      
		            }
				   
		       return $account;
		
		    }	 
			 
		   public function getLoginUser($username){
		        
				$query="select *  from  tbl_users where  username='$username'";
				
				$resultSearch= mysql_query($query);
	 
			if($resultSearch){			
			  $row = mysql_fetch_array($resultSearch);				  
		        $account=new Useraccount();		
		        $account->setBalance_cents($row['balance_cents']);
				$account->setName($row['name']);
				$account->setPassword($row['password']);
				$account->setEmail($row['email']);
				$account->setusername($row['username']);	      
		            }
				   
		       return $account;
		
		    }	 
			public function updateUseraccount($username){ 	 
			
			$query="select balance_cents  from  tbl_users where  username='$username'";
				
				$resultSearch= mysql_query($query);
			
			
			  $row = mysql_fetch_array($resultSearch);	        
		
		        $balance= $row['balance_cents']-10;		            		
			
	        $query="update  tbl_users set  balance_cents = $balance where username='$username'";			
	        mysql_query($query) or die("error on update");					 
	
	       }	
	
	
    }
  ?>