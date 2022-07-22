<?php

 class Create_user{
    
    private $id;
    
    private $username;
    
    private $password;
    
    
    
    public function getId()
	{
	    return $this->id;
	}
    public function setId($id)
	{
	    $this->id=$id;
	}
        
    public function getUsername()
	{
	    return $this->username;
	}
    public function setUsername($username)
	{
	    $this->username=$username;
	}
     
     public function getPassword()
	{
	    return $this->password;
	}
    public function setPassword($password)
	{
	    $this->password=$password;
	}
        
    
        
        
      public function addUser($memid){
        
            $query="insert into tbl_user(username, password) values('$this->username', '$this->password')";
            
               mysql_query($query) or die("error on insert");
        
          }
		  
		   public function setUser($username,$password){
        
            $query="insert into tbl_user(username, password) values('$this->username', '$this->password')";
            
               mysql_query($query) or die("error on insert");
        
          }
		  
		  
          
          
          
      public function getUser($user){
		  
		   $query="select * from tbl_user where username='$user'";
		   
             $resultSearch= mysql_query($query) or die(mysql_error());
			 
			  if($resultSearch){
				  
		        $row = mysql_fetch_array($resultSearch);
				
                       $this->setId($row['id']);
					   
                       $this->setUsername($row['username']);
					   
                       $this->setPassword($row['password']);
				    
                           }
						   
	             }
		
				
		
		public function changePassword(){
			
			$password=md5($this->password);
		
		     $query="update tbl_user set password='$password'";
			 
			       mysql_query($query)  or die("error on changing password");	
		  
		  
		        }
		
    
    }

 
 
 ?>