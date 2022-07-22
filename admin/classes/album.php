<?php 

 class Album{
 
      private $id;
	  
	  private $name;
	  
	  private $date;
	  
	  private $detail;
	  
	  
    public function getId()
	  {
	    return $this->id;
	  }
    public function setId($id)
	  {
	    $this->id=$id;
	  }
	
	public function getName()
	  {
	    return $this->name;
	  }
    public function setName($name)
	  {
	    $this->name=$name;
	  }
	  
	public function getDate()
	  {
	    return $this->date;
	  }
    public function setDate($date)
	  {
	    $this->date=$date;
	  }
	  
    public function getDetail()
	  {
	    return $this->detail;
	  }
    public function setDetail($detail)
	  {
	    $this->detail=$detail;
	  }
	  
	
	  
	  public function addAlbum(){
	       
		    $query="insert into tbl_album(name, date, detail) values('$this->name', '$this->date', '$this->detail')";
            
            mysql_query($query) or die("error on insert");
	     
		          }
		 
		 
		 
	 public function getAlbum($id){
		 
		     $query="select * from tbl_album where id=$id";
			 
			  $result=mysql_query($query);
             
	          $num=mysql_num_rows($result);
                
		    if($result){
                    
		             $row=mysql_fetch_assoc($result);
                  
		             $album=new Album;
                     
                     $album->setId($row['id']);
					 
					 $album->setName($row['name']);
					  
					 $album->setDate($row['date']);
					 
					 $album->setDetail($row['detail']);
					 
					       }
					 
					      return $album;
		 
		             }
				   
				   
				   
			public function listAlbum(){
				 
				     $query="select * from tbl_album order by date desc";
					 
					 $List= array();
					 
					 $resultSearch= mysql_query($query);
			   
	                 if($resultSearch){
				  
			             $numrows=mysql_num_rows($resultSearch);
				
			             for( $i=0;$i<$numrows;$i++){
				
				         $row = mysql_fetch_array($resultSearch);
				
				         $album= new Album();
						 
						 $album->setId($row['id']);
					 
					     $album->setName($row['name']);
					  
					     $album->setDate($row['date']);
						 
						 $album->setDetail($row['detail']);
						 
						    array_push($List, $album);
							
							}
							
							return $List;
							
							}else{
					
					            echo("<script>alert('".mysql_error()."')</script>");
					
					          }
				  
				 
				       }
					   
			
					   
			public function update($id){
				
				   $query="update tbl_album  set  name='$this->name', date='$this->date', detail='$this->detail' where id=$id";
				   
				   mysql_query($query)  or die("error on Update");	
				   
				
				        } 
						
						
						
		  public function delete(){
		  
			$del_id=$_GET['delete_id'];
			
			$query="delete from tbl_album where id='$del_id'";
			
			    if(mysql_query($query))
				
				  mysql_query("delete from tbl_gallery where albumid='$del_id'");
			
		          }
 
 
 
 
 
   }


?>