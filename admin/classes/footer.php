<?php
    class Footer{
	   
	    private $id;
		
		private $detail;
		private $header;
		private $position;
		
		
		public function getId()
			{
				return $this->id;
			}
		public function setId($id)
			{
				$this->id=$id;
			}
				
		public function getDetail()
			{
				return $this->detail;
			}
		public function setDetail($detail)
			{
				$this->detail=$detail;
			}	
			
			
			public function getHeader()
			{
				return $this->header;
				
			}
			public function setHeader($header)
			{
				$this->header=$header;
			}
			public function getPosition()
			{
			return $this->position;
			}
			public function setPosition($position)
			{
			$this->position=$position;
			}
			
		public function addFooter(){
		
		           $query="insert into tbl_footer set detail='$this->detail' ,heading='$this->header',position='$this->position' ";
				   
					 mysql_query($query)  or die("error on insert");	
		
		           }	
				   
				   
		public function getFooter($id){
		
		      $query="select * from tbl_footer where id=$id";
			  
			  $result=mysql_query($query); 
			  
	          $num=mysql_num_rows($result);		
	
		      $footObj= new Footer();
				
		     if($result)
		          {
		      $data=mysql_fetch_assoc($result);
			  
			  $footObj->setDetail($data['detail']);
		  
		      $footObj->setId($data['id']);
			    $footObj->setHeader($data['header']);
				  $footObj->setPosition($data['position']);
				  
			 
			    }
			  
		       return $footObj;
			 
		       }
			   
			   
		public function update($id){
			      
			$query="update  tbl_footer set detail='$this->detail',header='$this->heading',position='$this->position' where id=$id";
			
			   mysql_query($query)  or die("error on Update");	
			  
		
		} 
		
		
		public function delete(){
		      
			  $del_id=$_GET['delete_id'];
			      
			 $query="delete from tbl_footer where id=$del_id";
			
			   mysql_query($query)  or die(mysql_error());
			   
		      }  
		
		
		public function listFooter(){
		
		       $query="select * from tbl_footer ";
			   
			   $footList=array();
			   
			   $resultSearch= mysql_query($query);
			   
	           if($resultSearch){
				  
			   $numrows=mysql_num_rows($resultSearch);
				
			   for( $i=0;$i<$numrows;$i++){
				
				$row = mysql_fetch_array($resultSearch);
					
					$footObj=new Footer();
					
					$footObj->setId($row['id']);
					
					$footObj->setDetail($row['detail']);
					  $footObj->setHeader($row['heading']);
				  $footObj->setPosition($row['position']);
					
					array_push($footList,$footObj);
					
					    }
						
					return $footList;
					
					}else{
					
					   echo("<script>alert('".mysql_error()."')</script>");
					
					  }
		
		         }  		   
	
	
	
	  }
  


  ?>